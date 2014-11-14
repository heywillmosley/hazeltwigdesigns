<?php require_once 'classes/class.Element.php';
/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 *
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */


/**
 * Add Stylesheets
 */
function default_preprocess_html(&$variables) {
	drupal_add_css('//cdn.jsdelivr.net/pure/0.5.0/pure-min.css', array('type' => 'external'));
	drupal_add_css('//cdn.jsdelivr.net/pure/0.5.0/grids-responsive.css', array('type' => 'external'));
	drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array('type' => 'external'));
	// drupal_add_css('//codepen.io/williammosley/pen/yDfGm.css', array('type' => 'external'));
	drupal_add_css('//codepen.io/williammosley/pen/yDhxI.css', array('type' => 'external'));
	drupal_add_css('//codepen.io/williammosley/pen/ByKpm.css', array('type' => 'external'));
	drupal_add_css('//codepen.io/williammosley/pen/CjriE.css', array('type' => 'external'));
	drupal_add_css('//fonts.googleapis.com/css?family=Julius+Sans+One', array('type' => 'external'));
	drupal_add_css(drupal_get_path('theme', 'superamazing') .'/css/style.css');
	drupal_add_js('//checkout.stripe.com/checkout.js', array('type' => 'external'));
	drupal_add_js(drupal_get_path('theme', 'default') .'/js/default.js');
}

/**
 * Preprocess page display.
 */
function default_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
    // If the node type is "brand_page" the template suggestion will be "page--node-brand_page.tpl.php".
    $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
    //krumo($vars['theme_hook_suggestions']);
		//krumo($vars);
		//die();
  }
}

function default_preprocess_block(&$vars, $hook) {
$vars['theme_hook_suggestions'][] = 'block__'. $vars['block']->title;
//krumo($vars['theme_hook_suggestions']);
//krumo($vars);
//die();
}