<?php
/*
Plugin Name: A-eight site custom plugin
Description: Mindset site custom post types: students and staff
Author: Lisa Leung
Licence: GPL2
*/

function a8_register_custom_post_types() {
	// this is for students CPT
	$labels = array(
            'name'               => _x( 'Students', 'post type general name' ),
            'singular_name'      => _x( 'Student', 'post type singular name'),
            'menu_name'          => _x( 'Students', 'admin menu' ),
            'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'Student' ),
            'add_new_item'       => __( 'Add New Student' ),
            'new_item'           => __( 'New Student' ),
            'edit_item'          => __( 'Edit Student' ),
            'view_item'          => __( 'View Student' ),
            'all_items'          => __( 'All Students' ),
            'search_items'       => __( 'Search Students' ),
            'parent_item_colon'  => __( 'Parent Students:' ),
            'not_found'          => __( 'No Students found.' ),
            'not_found_in_trash' => __( 'No Students found in Trash.' ),
	);

	$args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'students' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'thumbnail', 'editor' ),
            'menu_icon'          => 'dashicons-universal-access-alt',
	);
	register_post_type( 'student', $args );


		// staff section CPT
	$labels = array(
            'name'               => _x( 'Staff', 'post type general name' ),
            'singular_name'      => _x( 'Staff', 'post type singular name'),
            'menu_name'          => _x( 'Staff', 'admin menu' ),
            'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'Staff' ),
            'add_new_item'       => __( 'Add New Staff' ),
            'new_item'           => __( 'New Staff' ),
            'edit_item'          => __( 'Edit Staff' ),
            'view_item'          => __( 'View Staff' ),
            'all_items'          => __( 'All Staff' ),
            'search_items'       => __( 'Search Staff' ),
            'parent_item_colon'  => __( 'Parent Staff:' ),
            'not_found'          => __( 'No Staff found.' ),
            'not_found_in_trash' => __( 'No Staff found in Trash.' ),
	);

	$args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'staff' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'thumbnail', 'editor' ),
            'menu_icon'          => 'dashicons-admin-users',
	);
	register_post_type( 'staff', $args );

}
  add_action( 'init', 'a8_register_custom_post_types' ); // make sure the function name matches!!!


//always need to reflush ... copy the code.. after this, just go to setting to permalinks and update
function a8_rewrite_flush() {
  
  // match this with the CPT function name
  a8_register_custom_post_types();

  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'a8_rewrite_flush' );


//taxonomies
function a8_register_taxonomies() {
      // Add studentType taxonomy - hierarchical (like categories)
      $labels = array(
            'name'              => _x( 'Student Types', 'taxonomy general name' ),
            'singular_name'     => _x( 'Student Type', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Student Types' ),
            'all_items'         => __( 'All Student Types' ),
            'parent_item'       => __( 'Parent Student Type' ),
            'parent_item_colon' => __( 'Parent Student Type:' ),
            'edit_item'         => __( 'Edit Student Type' ),
            'update_item'       => __( 'Update Student Type' ),
            'add_new_item'      => __( 'Add New Student Type' ),
            'new_item_name'     => __( 'New Student Type Name' ),
            'menu_name'         => __( 'Student Type' ),
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menu'  => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'student-types' ),
      );
 register_taxonomy( 'student-type', array( 'student' ), $args );   


       // staff taxonomies
      $labels = array(
            'name'              => _x( 'Staff Types', 'taxonomy general name' ),
            'singular_name'     => _x( 'Staff Type', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Staff Types' ),
            'all_items'         => __( 'All Staff Types' ),
            'parent_item'       => __( 'Parent Staff Type' ),
            'parent_item_colon' => __( 'Parent Staff Type:' ),
            'edit_item'         => __( 'Edit Staff Type' ),
            'update_item'       => __( 'Update Staff Type' ),
            'add_new_item'      => __( 'Add New Staff Type' ),
            'new_item_name'     => __( 'New Staff Type Name' ),
            'menu_name'         => __( 'Staff Type' ),
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menu'  => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'staff-types' ),
      );
 register_taxonomy( 'staff-type', array( 'staff' ), $args );     

}
 add_action( 'init', 'a8_register_taxonomies', 0 );

?>
