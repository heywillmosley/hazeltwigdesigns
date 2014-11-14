<?php
/**
 * Helper Elements
 */
class Element
{
  /**
   * Theme Url
   */
  function the_theme_url() {
    return url(path_to_theme(), array('absolute' => TRUE));
  }

  /**
   * Theme Url
   */
  function theme_url() {
    echo $this->the_theme_url();
  }

  function get_header($page)  { ?>

      <header>
        <?php print render($page['global_nav']); ?>
        <?php print render($page['app_nav']); ?>
      </header>
      <?php print render($page['ceiling']); ?>
    <?php }


    function get_footer($page)
    { global $feed_icons; global $breadcrumb; ?>
	<footer class="atm-l-ps">
		<div class="atm-break"></div>		
       		<?php print render($page['floor']); ?>
       		<?php print $feed_icons; ?>
		<?php if ($breadcrumb && $breadcrumb != '<div class="breadcrumb"></div>'): ?>
		  <?php print $breadcrumb; ?>
		<?php else: ?>
		  <div class="breadcrumb">&nbsp;</div>
		<?php endif; ?>
		<?php print render($page['footer_first']); ?>
      		<?php print render($page['development']); ?>
    	</footer>

   <?php }
 
	
	

} // end class elements