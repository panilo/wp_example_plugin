<?php
  /**
   * Plugin Name: My Example Plugin
   * Version: 1.0.0
   * Requires at least: 5.8
   * Requires PHP: 7.2
   * Author: Webbame Ltd
   * Text Domain: mep
   * Domain Path: /languages
   */




  mep_hook_in_admin_menu();

  /**
   * Add a menu entry to display mep_print_paths HTML
   *
   * @return void
   */
  function mep_add_menu_entry() {

    $page_title = "MEP";
    $menu_title = "MEP";
    $capability = "manage_options"; // capabilities (security), 'manage_options' is available to admin only
    $menu_slug = "mep-main";
    $call_back_fn = "mep_print_paths"; //function that will be called when the user open this menu's entry
    $icon = "";
    $position = 1; //position of this menu's entry in the admin-menu sidebar

    add_menu_page(
      $menu_title,
      $menu_title,
      $capability,
      $menu_slug,
      $call_back_fn,
      $icon,
      $position
    );
  }

  /**
   * Display an HTML with some functions outcome
   *
   * @return void
   */
  function mep_print_paths() {
?>
    <h1>Working with paths</h1>

    <h3>Plugins</h3>
    <ul>
      <li>plugins_url("test-file.js", __FILE__) '<?php echo plugins_url("test-file.js", __FILE__); ?>'</li>
      <li>plugin_dir_url(__FILE__) '<?php echo plugin_dir_url(__FILE__); ?>'</li>
      <li>plugin_dir_path(__FILE__) '<?php echo plugin_dir_path(__FILE__); ?>'</li>
      <li>plugin_basename(__FILE__) '<?php echo plugin_basename(__FILE__); ?>'</li>
    </ul>

    <h3>Theme</h3>
    <ul>
      <li>get_template_directory_uri() '<?php echo get_template_directory_uri(); ?>'</li>
      <li>get_stylesheet_directory_uri() '<?php echo get_stylesheet_directory_uri(); ?>'</li>
      <li>get_stylesheet_uri() '<?php echo get_stylesheet_uri(); ?>'</li>
      <li>get_theme_root_uri() '<?php echo get_theme_root_uri(); ?>'</li>
      <li>get_theme_root() '<?php echo get_theme_root(); ?>'</li>
      <li>get_theme_roots() '<?php echo get_theme_roots(); ?>'</li>
      <li>get_stylesheet_directory() '<?php echo get_stylesheet_directory(); ?>'</li>
      <li>get_template_directory() '<?php echo get_template_directory(); ?>'</li>
    </ul>

    <h3>Site home</h3>
    <ul>
      <li>home_url() '<?php echo home_url(); ?>'</li>
      <li>get_home_path() '<?php echo get_home_path(); ?>'</li>
    </ul>

    <h3>WordPress</h3>
    <ul>
      <li>admin_url() '<?php echo admin_url(); ?>'</li>
      <li>site_url() '<?php echo site_url(); ?>'</li>
      <li>content_url() '<?php echo content_url(); ?>'</li>
      <li>includes_url() '<?php echo includes_url(); ?>'</li>
      <li>wp_upload_dir() '<?php var_dump(wp_upload_dir()); ?>'</li>
    </ul>
<?php
  }

  /**
   * Hook-in the admin_menu hook to add the menu entry as defined above by mep_add_menu_entry()
   *
   * @return void
   */
  function mep_hook_in_admin_menu() {
    /**
     * The add_action function let you hook-into a pre-defined action or a custom action.
     * Actions in WordPress are named `hooks`.
     */
    add_action("admin_menu", "mep_add_menu_entry", 1);
  }


?>
