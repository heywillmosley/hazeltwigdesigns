<?php $e = new Element;

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<?php // Field variables
$field_collection_description = field_view_field('node', $node, 'field_collection_description', array('label' => 'hidden'));

?>

<?php print render($page['styles_js']); ?>
<?php $e->get_header($page); ?>
<section class="atm-l-ps">
	<div class="cf">
		<div class="pure-g">
			<div class="pure-u-1-1 pure-u-lg-2-3">
				<div class="prm-md">

					<?php print render($page['admin_first']); ?>
					<?php if ($tabs): ?><div class="tabs cf"><?php print render($tabs); ?></div><?php endif; ?>
					<?php print render($page['promo_top']); ?>
					<?php print render($page['help']); ?>
					<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
					<?php print $messages; ?>
					<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
					
				
						<?php if ($title): ?>
							<div class="atm-t-hl"><?php print render($title); ?></div>
						<?php endif; ?>
						<?php if( !empty($field_collection_description) ) : ?>
							<div class="atm-mc" style="text-align: center; font-size: 20px"><?php print render($field_collection_description); ?></div>
						<?php endif; ?>
						<div class="atm-break"></div>
					<?php collection($node); ?>
					
					</div><!-- end prs-md -->
			</div><!-- end pure-u-1-1 -->
			<div class="pure-u-1-1 pure-u-lg-1-3">
				<div class="prs-sm">
					<?php print render($page['sidebar_first']); ?>
					<?php print render($page['sidebar_second']); ?>
					<?php print $feed_icons; ?>
				</div><!-- end prs-sm 
			</div><!-- end pure-u-1-1 -->
		</div><!-- end pure-g -->
	</div><!-- end cf -->
	

	<?php $e->get_footer($page); ?>
</div><!-- end pure-g -->
	
	
	

<?php

function collection($node) {

	$field_item_title = field_get_items('node', $node, 'field_item_title');
	$field_item_image = field_get_items('node', $node, 'field_item_image');
	$field_item_description = field_get_items('node', $node, 'field_item_description');
	$field_item_price = field_get_items('node', $node, 'field_item_price');
	$field_item_call_to_action = field_view_field('node', $node, 'field_item_call_to_action', array('label' => 'hidden'));
	$num = 0;

	
	foreach($field_item_title as $item_title) { ?>
	
		<div class="cf">
			<div class="media media-xs-b">
				<div class="pull-left">
					<?php 
					$img_url = image_style_url('3x2', file_load($field_item_image[$num]['fid'])->uri);
			
					if( !strpos($img_url, 'Blank') !== false) : ?>
				
						<img class="mbs hidden-xs" src="<?php print image_style_url('medium', file_load($field_item_image[$num]['fid'])->uri);?>" />
				
					<?php endif; ?>
				</div><!-- end pull-left -->
				<div class="media-body mtn ptn">
					<h2 class="mtn ptn"><?php echo $item_title['value']; ?></h2>
					<?php if( !strpos($img_url, 'Blank') !== false) : ?>
				
						<img class="mbs visible-xs atm-mc" src="<?php print image_style_url('medium', file_load($field_item_image[$num]['fid'])->uri);?>" />
				
					<?php endif; ?>
					<p class="secondary atm-t-left"><?php echo $field_item_description[$num]['value']; ?></p>
					<div class="cf"></div>
					<?php print render($field_item_call_to_action[$num]) ?>
				</div><!-- end media-body -->
			</div><!-- end media -->
			<div class="cf mbm"></div>
			
			<?php ++$num; ?>
		</div><!-- end cf -->


	<?php }
}


?>