<?php
/**
 * @package VVH Studies
 * @version 0.5
 */
/*
Plugin Name: VVH Studies
Plugin URI: http://asynchrony.com
Description: Embed Studies
Author: Asynchrony
Version: 0.5
Author URI: http://asynchrony.com
*/

class Studies_Plugin {

	public static $base_url;

	public function __construct() {
		$this->base_url = site_url('/api/');

		$this->add_shortcode ( 'rails_all_studies', array( $this, 'all_studies_shortcode_function') );
		$this->add_shortcode ( 'rails_one_study',  array( $this, 'one_study_shortcode_function') );
		$this->add_shortcode ( 'rails_request_information', array( $this, 'request_information_shortcode_function') );

		add_action( 'admin_menu', array( $this, 'studies_menu') );

		register_activation_hook( basename(__FILE__) , array( $this, 'create_study_admin_role') );
	}

	public function studies_menu() {
		add_menu_page( 'VVH Studies', 'Study Admin', 'manage_studies', 'study-admin-top', array( $this, 'study_admin_contents') );
		add_submenu_page('study-admin-top', 'Manage Studies', 'Manage Studies', 'manage_studies', 'study-admin-manage-studies', array( $this, 'manage_studies_contents'));
		add_submenu_page('study-admin-top', 'Manage Tags', 'Manage Tags', 'manage_studies', 'study-admin-manage-tags', array( $this, 'manage_tags_contents'));
		add_submenu_page('study-admin-top', 'Manage Information Requests', 'Manage Information Requests', 'manage_studies', 'study-admin-manage-information_requests', array( $this, 'manage_information_requests_contents'));

		add_submenu_page('study-admin-top', 'Create New Study', 'Create New Study', 'manage_studies', 'study-admin-create-study', array( $this, 'create_new_studies'));
		add_submenu_page('study-admin-top', 'Create New Tag', 'Create New Tag', 'manage_studies', 'study-admin-create-tag', array( $this, 'create_new_tags'));
		add_submenu_page(null, 'Edit Tag', 'Edit Tag', 'manage_studies', 'study-admin-edit-tag', array( $this, 'edit_tag'));
		add_submenu_page(null, 'Edit Study', 'Edit Study', 'manage_studies', 'study-admin-edit-study', array( $this, 'edit_study'));
		add_submenu_page(null, 'Show Study', 'Show Study', 'manage_studies', 'study-admin-show-study', array( $this, 'show_study'));
	}

	public function create_study_admin_role() {
		global $wp_roles;
		if ( ! isset( $wp_roles ) ) {
	        $wp_roles = new WP_Roles();
		}

		$administrator = $wp_roles->get_role('administrator');

		remove_role('study_administrator');
		$role = add_role('study_administrator', 'Study Administrator', $administrator->capabilities);
		$role->add_cap('manage_studies');
	}

	public function render_rails_url($url) {
		//create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    			'X-VVH-Frontend: 1'
		));

		// grab URL and pass it to the browser
		$embed = curl_exec($ch);
		// close cURL resource, and free up system resources
		curl_close($ch);
		return apply_filters( 'embed_studies', $embed);
	}

	public function replacements($in) {
		$str = $in;
		$str = str_replace('/information_requests/new.wp', site_url('/request-information/'), $str);
		$str = str_replace('/studies.wp_admin', site_url('/wp-admin/admin.php?page=study-admin-manage-studies'), $str);
		$str = str_replace('/tags.wp_admin', site_url('/wp-admin/admin.php?page=study-admin-manage-tags'), $str);
		$str = preg_replace('@/studies/([^\/]+)/edit\.wp_admin@', site_url('/wp-admin/admin.php?page=study-admin-edit-study&study=${1}'), $str);
		$str = preg_replace('@/studies/([^\/]+)\.wp_admin@', site_url('/wp-admin/admin.php?page=study-admin-show-study&study=${1}'), $str);
		$str = preg_replace('@/studies/([^\'\"]+)\.wp@', site_url('/study-detail/?study=${1}'), $str);
		$str = preg_replace('@/tags/(\d+)/edit.wp_admin@', site_url('/wp-admin/admin.php?page=study-admin-edit-tag&tag=${1}'), $str);
		return $str;
	}

	public function unroll() {
	}

	public function all_studies_shortcode_function ( $atts ) {
		$url = $this->base_url . 'studies.wp';
		if (array_key_exists('QUERY_STRING', $_SERVER) && $_SERVER['QUERY_STRING'] != '') {
			$url .= '?' . $_SERVER['QUERY_STRING'];
		}
		$raw = $this->render_rails_url($url);
		return $this->replacements($raw);
	}

	public function one_study_shortcode_function ( $atts ) {
		$url = $this->base_url . 'studies/';
		$url .= $_GET['study'];
		$url .= '.wp';
		$raw = $this->render_rails_url($url);
		return $this->replacements($raw);
	}

	public function request_information_shortcode_function ( $atts ) {
		$url = $this->base_url . 'information_requests/new.wp';
		$url .= "?study=" . $_GET['study'];
		return $this->render_rails_url($url);
	}

	// Exists as a passthrough so we can mock it when testing __construct()
	public function add_shortcode($tag, $callable) {
		add_shortcode ($tag, $callable);
	}
	
	private function die_if_can_not_manage_studies() {
		if ( !current_user_can( 'manage_studies' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
	}

	public function study_admin_contents() {
		$this->die_if_can_not_manage_studies();
		echo "<h2>You can manage Information Requests, Studies, and Tags</h2>";
	}

	public function manage_studies_contents() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . 'studies.wp_admin';
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}
	
	public function manage_information_requests_contents() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . 'information_requests.wp_admin';
		$url .= "?filter_date=" . $_GET['filter_date'];
		foreach ($_GET['filter_status'] as $selectedOption)
			$url .= "&filter_status[]=" . $selectedOption;
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}

	public function create_new_studies() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . '/studies/new.wp_admin';
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}

	public function edit_study() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . 'studies/';
		$url .= $_GET['study'];
		$url .= '/edit.wp_admin';
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}

	public function show_study() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . 'studies/';
		$url .= $_GET['study'];
		$url .= '.wp_admin';
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}

	public function manage_tags_contents() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . 'tags.wp_admin';
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}

	public function create_new_tags() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . '/tags/new.wp_admin';
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}

	public function edit_tag() {
		$this->die_if_can_not_manage_studies();
		$url = $this->base_url . '/tags/';
		$url .= $_GET['tag'];
		$url .= '/edit.wp_admin';
		$raw = $this->render_rails_url($url);
		echo $this->replacements($raw);
	}

}

$my_studies_plugin = new Studies_Plugin();

?>
