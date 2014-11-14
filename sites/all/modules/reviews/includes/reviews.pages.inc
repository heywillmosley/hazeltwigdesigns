<?php

/**
 * @file
 * This file contain all function necessary for displaying and
 * leaving reviews.
 */

/**
 * Gather reviews for current displayed node and pass to theming function.
 */
function reviews_get_reviews($nid) {
  $reviews_count = reviews_reviews_count($nid);
  $pending_count = reviews_reviews_pending_count($nid);

  if ($reviews_count == 0) {
    return theme('reviews_no_reviews', array('nid' => $nid));
  }

  // Get the sort order for reviews.
  if (variable_get('reviews_sort_order', 0) == 0) {
    $sort = 'ASC';
  }
  else {
    $sort = 'DESC';
  }

  if (user_access('administer reviews')) {
    $operand = '<=';
  }
  else {
    $operand = '=';
  }

  // Get the reviews from the database.
  $reviews = db_select('reviews', 'r')->extend('PagerDefault')
    ->fields('r')
    ->condition('nid', $nid, '=')
    ->condition('status', 1, $operand)
    ->orderBy('created', $sort);

  // change this number to amount of reviews you want per page
  $page_size = variable_get('reviews_per_page', 0);
  if ($page_size == 0) {$page_size = 25000;}
  $result = $reviews->limit($page_size)->execute();

  return theme('reviews', array(
    'nid' => $nid,
    'review_count' => $reviews_count,
    'pending_count' => $pending_count,
    'reviews' => $result,
    'pager' => array('#theme' => 'pager'),
  ));
}

/**
 * Form builder for add review page.
 */
function reviews_add_review($form, &$form_state, $nid) {
  global $user;

  $form = array();

  $node = node_load($nid);
  $title = $node->title;

  $form['intro'] = array(
    '#type' => 'item',
    '#markup' => t('Complete the form below to leave a review of <em>!title</em>', array('!title' => check_plain($title))),
  );

  $form['nid'] = array(
    '#type' => 'hidden',
    '#value' => $nid,
  );

  $form['uid'] = array(
    '#type' => 'hidden',
    '#value' => $user->uid,
  );

  $form['review'] = array(
    '#type' => 'text_format',
    '#title' => t('Your review'),
    '#rows' => 10,
    '#required' => TRUE,
  );

  $form['actions'] = array('#type' => 'actions');
  $form['actions']['submit'] = array('#type' => 'submit', '#value' => t('Submit Review'));

  return $form;
}

/**
 * Submit handler for reviews_add_review form.
 */
function reviews_add_review_submit($form, &$form_state) {
  $nid      = $form_state['values']['nid'];
  $uid      = $form_state['values']['uid'];
  $review   = $form_state['values']['review'];
  $created  = REQUEST_TIME;

  // get the node type to see if it is moderated or not
  $node = node_load($nid);
  $status = in_array($node->type, array_filter(variable_get('reviews_moderate_content_types', ''))) ? 1 : 0;

  $record   = array(
    'nid' => $nid,
    'uid' => $uid,
    'review' => serialize($review),
    'status' => $status,
    'created' => $created,
  );

  $result = drupal_write_record('reviews', $record);

  if ($result == SAVED_NEW) {
    reviews_update_review_count_for_node($nid);
    reviews_notify_admin($nid);
    if ($status == 0) {
      drupal_set_message(t('Your review has been submitted. It will be moderated before it is published.'), 'status');
    }
    else {
      drupal_set_message(t('Thankyou! Your review has been submitted.'), 'status');
    }
    drupal_goto('node/' . $nid);
  }
  else {
    drupal_set_message(t('There seems to have been a problem submitting your review. Please try again later'), 'error');
    drupal_goto('node/' . $nid . '/add-review');
  }
}

/**
 * Form builder for edit review page.
 */
function reviews_edit_review($form, &$form_state, $nid, $rid) {
  global $user;

  $form = array();

  $node = node_load($nid);
  $title = $node->title;

  $review = reviews_load($rid);

  $form['intro'] = array(
    '#type' => 'item',
    '#markup' => t('Use the form below to edit your review of <em>!title</em>', array('!title' => check_plain($title))),
  );

  $form['nid'] = array(
    '#type' => 'hidden',
    '#value' => $nid,
  );

  $form['rid'] = array(
    '#type' => 'hidden',
    '#value' => $rid,
  );

  $form['review'] = array(
    '#type' => 'text_format',
    '#title' => t('Your review'),
    '#rows' => 10,
    '#required' => TRUE,
    '#default_value' => $review->review['value'],
    '#format' => $review->review['format'],
  );

  $form['actions'] = array('#type' => 'actions');
  $form['actions']['submit'] = array('#type' => 'submit', '#value' => t('Save Review'));

  return $form;
}

/**
 * Submit handler for reviews_edit_review form.
 */
function reviews_edit_review_submit($form, &$form_state) {
  $rid      = $form_state['values']['rid'];
  $nid      = $form_state['values']['nid'];
  $review   = $form_state['values']['review'];

  // get the node type to work out if it needs to be re-moderated
  $node = node_load($nid);
  $status = in_array($node->type, array_filter(variable_get('reviews_moderate_content_types', ''))) ? 1 : 0;

  $record   = array(
    'rid' => $rid,
    'nid' => $nid,
    'review' => serialize($review),
    'status' => $status,
  );

  $result = drupal_write_record('reviews', $record, 'rid');

  if ($result == SAVED_UPDATED) {
    reviews_update_review_count_for_node($nid);
    drupal_set_message(t('Your edited review has been saved. It will be moderated again before it is re-published.'), 'status');
    drupal_goto('node/' . $nid);
  }
  else {
    drupal_set_message(t('There seems to have been a problem submitting your review. Please try again later'), 'error');
    drupal_goto('node/' . $nid);
  }
}

/**
 * Send email to site wide email address when new review is left.
 */
function reviews_notify_admin($nid) {
	global $base_url;
	$email = variable_get('site_mail', NULL);

	if (!is_null($email) && variable_get('reviews_notify_admin', 0) == 1) {
		$node = node_load($nid);
		$body = "A new review has been left for on node '$node->title'\r\n\r\n";
		$body .= "Click here to view: $base_url/admin/content/reviews/moderate";
		$hdrs  = 'MIME-Version: 1.0' . "\r\n";
		$hdrs .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
		$hdrs .= "From: Site Admin <$email>\r\n";
		mail($email, t('New Content Review'), $body, $hdrs);
	}
}
