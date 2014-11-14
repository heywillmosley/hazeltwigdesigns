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
<style>
.atm-hero-img { position: relative; max-height: 350px; overflow: hidden; width: 100%; margin-bottom: 50px; }
.atm-hero-img img { width: 100%; max-width: none; }
.atm-on-img { position: absolute; top: 15px; left: 10px; z-index: 2; }
.atm-on-img.btn-default { margin-top: 10px; }
</style>
<?php // Field variables
$ad_text_field = field_view_field('node', $node, 'field_ad_text', array('label' => 'hidden'));
$field_content_after_hero = field_view_field('node', $node, 'field_content_after_hero', array('label' => 'hidden'));
$field_benefit_headlines_items  = field_get_items('node', $node, 'field_benefit_headlines');
$field_content_after_sales_messag = field_view_field('node', $node, 'field_content_after_sales_messag', array('label' => 'hidden'));
$cta_short = field_view_field('node', $node, 'field__visible_cta_copy', array('label' => 'hidden'));
$cta_long = field_view_field('node', $node, 'field_call_to_action_copy_4_7_wo', array('label' => 'hidden'));
$scta = field_view_field('node', $node, 'field_visible_secondary_call_to_', array('label' => 'hidden'));
$hero_image = field_get_items('node', $node, 'field_image');
$field_content_after_sales_messag = field_view_field('node', $node, 'field_content_after_sales_messag', array('label' => 'hidden'));
$field__visible_closing_argument = field_view_field('node', $node, 'field__visible_closing_argument', array('label' => 'hidden'));
$field__visible_content_after_clo = field_view_field('node', $node, 'field__visible_content_after_clo', array('label' => 'hidden'));



?>

<?php print render($page['styles_js']); ?>
<?php $e->get_header($page); ?>

<div class="pure-g cf">
	<?php print render($page['admin_first']); ?>
	<?php if ($tabs): ?><div class="tabs cf"><?php print render($tabs); ?></div><?php endif; ?>
	<?php print render($page['promo_top']); ?>
	<?php print render($page['help']); ?>
	<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
	<?php print $messages; ?>
	<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
	
	<section id="solohero">
		<div class="atm-l-ps cf">
			<?php if ($title): ?>
				<div class="atm-t-hl"><?php print render($title); ?></div>
			<?php endif; ?>
			<?php if( $ad_text_field ) : ?>
				<div class="atm-t-sh"><?php print render($ad_text_field); ?></div>
			<?php endif; ?>
		</div><!-- end atm-l-ps cf -->
		<?php if( !empty($hero_image) ) : ?>
			<div class="relative">
				<a href="#action" class="btn btn-primary atm-on-img hidden-xs"><?php print render($cta_long); ?></a>
				<a href="#action" class="btn btn-primary atm-on-img visible-xs"><?php print render($cta_short); ?></a>
				<a href="#action" class="btn btn-primary atm-on-img visible-xs" style="margin-top: 10px;"><?php print render($scta); ?></a>
				<img class="mbl hidden-xs shadow" style="width: 100%; max-width: none;" src="<?php print image_style_url('panorama', file_load($hero_image[0]['fid'])->uri);?>" />
				<img class="mbl visible-xs shadow" style="width: 100%; max-width: none;" src="<?php print image_style_url('3x2', file_load($hero_image[0]['fid'])->uri);?>" />
			</div><!-- end relative -->
		<?php endif; ?>
	</section><!-- end solohero -->
	<?php if( !empty($field_content_after_hero) ) : ?>
		<div class="atm-l-ms phs">
			<div class="atm-break"></div>
			<?php print render($field_content_after_hero); ?>
			<div class="atm-break"></div>
		</div><!-- end atm-l-ms -->
	<?php endif; ?>
	<?php sales_messages($node); ?>
	<?php if( !empty($field_content_after_sales_messag) ) : ?>
		<div class="atm-l-ms phs">
			<div class="atm-break"></div>
			<?php print render($field_content_after_sales_messag); ?>
			<div class="atm-break"></div>
		</div><!-- end atm-l-ms -->
	<?php endif; ?>
	<?php if( !empty($field__visible_closing_argument) ) : ?>
		<div class="atm-l-ps phs" id="action">
			<div class="atm-t-hl mbs"><?php print render($field__visible_closing_argument); ?></div>
		</div><!-- end atm-l-ms -->
	<?php endif; ?>
	<?php if( !empty($field__visible_content_after_clo) ) : ?>
		<div class="atm-l-ps">
			<div class="pure-g">
				<div class="pure-u-1-1 pure-u-md-1-2">
					<div class="pam shadow" style="background-color: rgb(229,182,141);">
						<div id="wufoo-zvevz8o0fnmhij">
	Fill out my <a href="https://esberls.wufoo.com/forms/zvevz8o0fnmhij">online form</a>.
	</div>
	<div id="wuf-adv" style="font-family:inherit;font-size: small;color:#a7a7a7;text-align:center;display:block;">The easy to use <a href="http://www.wufoo.com/form-builder/">Wufoo form builder</a> helps you make forms easy, fast, and fun.</div>
	<script type="text/javascript">var zvevz8o0fnmhij;(function(d, t) {
	var s = d.createElement(t), options = {
	'userName':'esberls',
	'formHash':'zvevz8o0fnmhij',
	'autoResize':true,
	'height':'520',
	'async':true,
	'host':'wufoo.com',
	'header':'show',
	'ssl':true};
	s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
	s.onload = s.onreadystatechange = function() {
	var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
	try { zvevz8o0fnmhij = new WufooForm();zvevz8o0fnmhij.initialize(options);zvevz8o0fnmhij.display(); } catch (e) {}};
	var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
	})(document, 'script');</script>
					</div><!-- end phs -->
				</div><!-- end pure-u-1-1 pure-u-md-1-2 -->
				<div class="pure-u-1-1 pure-u-md-1-2">
					<div class="pam" style="background-color: #FFB884">
						<?php print render($field__visible_content_after_clo); ?>
					</div><!-- end phs -->
				</div><!-- end pure-u-1-1 pure-u-1-2 -->
			</div><!-- end pure-g -->
		</div><!-- end atm-l-ms -->
	<?php endif; ?>
	

	<?php $e->get_footer($page); ?>
</div><!-- end pure-g -->
	
	
	

<?php

function sales_messages($node) {

	$benefits = field_get_items('node', $node, 'field_benefit_headlines');
	$sm = field_get_items('node', $node, 'field_marketing_sales_messages');
	$smi = field_get_items('node', $node, 'field__visible_sales_images');
	$smc = field_get_items('node', $node, 'field__visible_sales_content');
	$num_benefits_headlines = count($benefits);
	$num = 0;
	$cta_frequency = array(1,4, 8);
	$cta_short = field_view_field('node', $node, 'field__visible_cta_copy', array('label' => 'hidden'));
	$cta_long = field_view_field('node', $node, 'field_call_to_action_copy_4_7_wo', array('label' => 'hidden'));
	
	
	foreach($benefits as $benefit) { ?>
	
		<div class="cf">
			<div class="atm-l-ps phs">
			    <div class="atm-t-hl"><?php echo $benefit['value']; ?></div>
			    <p class="mbl atm-mc" style="text-align: center"><?php echo $sm[$num]['value']; ?></p>
			</div><!-- end atm-l-ms -->
			<?php 
			$img_url = image_style_url('logo-1000', file_load($smi[$num]['fid'])->uri);
			
			if( !strpos($img_url, 'Blank') !== false) : ?>
			
				<div class="relative">
					<!-- cta button every odd -->
					<?php if( in_array($num, $cta_frequency)) : ?>
					
						<a href="#action" class="btn btn-primary atm-on-img hidden-xs"><?php print render($cta_long); ?></a>
						<a href="#action" class="btn btn-primary atm-on-img visible-xs"><?php print render($cta_short); ?></a>
					
					<?php endif; ?>
					
					<img class="mbl shadow" style="width: 100%; max-width: none;" src="<?php print image_style_url('panorama', file_load($smi[$num]['fid'])->uri);?>" />
				</div><!-- end relative -->
				
			<?php endif; ?>
			
			<?php if( !empty($smc[$num]['value']) ) : ?>
				<div class="atm-break"></div>
				<div class="atm-l-ms phs cf"><?php echo $smc[$num]['value']; ?></div>
				<div class="atm-break"></div>
			<?php endif; ?>
			<?php ++$num; ?>
		</div><!-- end cf -->


	<?php }
}


?>