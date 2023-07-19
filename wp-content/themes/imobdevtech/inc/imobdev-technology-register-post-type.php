<?php

add_action('init', 'create_career_post_type');

add_action('init', 'create_services_post_type');

add_action('init', 'create_portfolio_post_type');

add_action('init', 'create_development_post_type');

add_action('init', 'create_industries_post_type');

add_action('init', 'create_hire_developer_post_type');

function create_career_post_type() {



 	$labels = array(

 					'name' 					=> __( 'Career','imobdev-technology' ),

 					'singular_name' 		=> __( 'Career','imobdev-technology' ),

					'add_new'				=> __( 'Add New Career','imobdev-technology' ),

					'add_new_item'			=> __( 'Add New Career','imobdev-technology' ),

					'edit_item'				=> __( 'Edit Career','imobdev-technology' ),

					'new_item'				=> __( 'New Career','imobdev-technology' ),

					'all_items'				=> __( 'All Career','imobdev-technology' ),

					'view_item'				=> __( 'View Career','imobdev-technology' ),

					'search_items'			=> __( 'Search Career','imobdev-technology' ),

					'not_found'				=> __( 'No Career found','imobdev-technology' ),

					'not_found_in_trash'	=> __( 'No Career found in Trash','imobdev-technology' ),

					'menu_name'         	=> __( 'Career','imobdev-technology' ),



 				);

    

    $args = array(

        'labels' 		=> $labels,

        'public' 		=> true, /* shows in admin on left menu etc */

        'has_archive' 	=> true,

        'menu_icon'     => 'dashicons-megaphone',

        'rewrite' 		=> array('slug' => 'imobdev-career','with_front' => true),

        'supports'		=> array('title','thumbnail'),

    );

 

    register_post_type('imobdev-career', $args);

}

function create_services_post_type() {



	$labels = array(

					'name' 					=> __( 'Services','imobdev-technology' ),

					'singular_name' 		=> __( 'Services','imobdev-technology' ),

				   'add_new'				=> __( 'Add New Services','imobdev-technology' ),

				   'add_new_item'			=> __( 'Add New Services','imobdev-technology' ),

				   'edit_item'				=> __( 'Edit Services','imobdev-technology' ),

				   'new_item'				=> __( 'New Services','imobdev-technology' ),

				   'all_items'				=> __( 'All Services','imobdev-technology' ),

				   'view_item'				=> __( 'View Services','imobdev-technology' ),

				   'search_items'			=> __( 'Search Services','imobdev-technology' ),

				   'not_found'				=> __( 'No Services found','imobdev-technology' ),

				   'not_found_in_trash'	=> __( 'No Services found in Trash','imobdev-technology' ),

				   'menu_name'         	=> __( 'Services','imobdev-technology' ),



				);

   

   $args = array(

	   'labels' 		=> $labels,

	   'public' 		=> true, /* shows in admin on left menu etc */

	   'has_archive' 	=> true,

	   'menu_icon'     => 'dashicons-admin-tools',

	   'rewrite' 		=> array('slug' => 'services','with_front' => true),

	   'supports'		=> array('title','editor','thumbnail'),

   );



   register_post_type('imobdev-services', $args);

}

function create_portfolio_post_type() {



	$labels = array(

					'name' 					=> __( 'Portfolio','imobdev-technology' ),

					'singular_name' 		=> __( 'Portfolio','imobdev-technology' ),

				   'add_new'				=> __( 'Add New Portfolio','imobdev-technology' ),

				   'add_new_item'			=> __( 'Add New Portfolio','imobdev-technology' ),

				   'edit_item'				=> __( 'Edit Portfolio','imobdev-technology' ),

				   'new_item'				=> __( 'New Portfolio','imobdev-technology' ),

				   'all_items'				=> __( 'All Portfolio','imobdev-technology' ),

				   'view_item'				=> __( 'View Portfolio','imobdev-technology' ),

				   'search_items'			=> __( 'Search Portfolio','imobdev-technology' ),

				   'not_found'				=> __( 'No Portfolio found','imobdev-technology' ),

				   'not_found_in_trash'	=> __( 'No Portfolio found in Trash','imobdev-technology' ),

				   'menu_name'         	=> __( 'Portfolio','imobdev-technology' ),



				);

   

   $args = array(

	   'labels' 		=> $labels,

	   'public' 		=> true, /* shows in admin on left menu etc */

	   'has_archive' 	=> true,

	   'menu_icon'     => 'dashicons-portfolio',

	   'rewrite' 		=> array('slug' => 'portfolio','with_front' => true),

	   'supports'		=> array('title','editor','thumbnail'),

   );



   register_post_type('imobdev-portfolio', $args);

}

function create_development_post_type() {



	$labels = array(

					'name' 					=> __( 'Development','imobdev-technology' ),

					'singular_name' 		=> __( 'Development','imobdev-technology' ),

				   'add_new'				=> __( 'Add New Development','imobdev-technology' ),

				   'add_new_item'			=> __( 'Add New Development','imobdev-technology' ),

				   'edit_item'				=> __( 'Edit Development','imobdev-technology' ),

				   'new_item'				=> __( 'New Development','imobdev-technology' ),

				   'all_items'				=> __( 'All Development','imobdev-technology' ),

				   'view_item'				=> __( 'View Development','imobdev-technology' ),

				   'search_items'			=> __( 'Search Development','imobdev-technology' ),

				   'not_found'				=> __( 'No Development found','imobdev-technology' ),

				   'not_found_in_trash'	=> __( 'No Development found in Trash','imobdev-technology' ),

				   'menu_name'         	=> __( 'Development','imobdev-technology' ),



				);

   

   $args = array(

	   'labels' 		=> $labels,

	   'public' 		=> true, /* shows in admin on left menu etc */

	   'has_archive' 	=> true,

	   'menu_icon'     => 'dashicons-hammer',

	   'rewrite' 		=> array('slug' => 'development','with_front' => true),

	   'supports'		=> array('title','editor','thumbnail'),

   );



   register_post_type('imobdev-development', $args);

}

function create_industries_post_type() {



	$labels = array(

					'name' 					=> __( 'Industries','imobdev-technology' ),

					'singular_name' 		=> __( 'Industries','imobdev-technology' ),

				   'add_new'				=> __( 'Add New Industries','imobdev-technology' ),

				   'add_new_item'			=> __( 'Add New Industries','imobdev-technology' ),

				   'edit_item'				=> __( 'Edit Industries','imobdev-technology' ),

				   'new_item'				=> __( 'New Industries','imobdev-technology' ),

				   'all_items'				=> __( 'All Industries','imobdev-technology' ),

				   'view_item'				=> __( 'View Industries','imobdev-technology' ),

				   'search_items'			=> __( 'Search Industries','imobdev-technology' ),

				   'not_found'				=> __( 'No Industries found','imobdev-technology' ),

				   'not_found_in_trash'	=> __( 'No Industries found in Trash','imobdev-technology' ),

				   'menu_name'         	=> __( 'Industries','imobdev-technology' ),



				);

   

   $args = array(

	   'labels' 		=> $labels,

	   'public' 		=> true, /* shows in admin on left menu etc */

	   'has_archive' 	=> true,

	   'menu_icon'     => 'dashicons-networking',

	   'rewrite' 		=> array('slug' => 'industries','with_front' => true),

	   'supports'		=> array('title','editor','thumbnail'),

   );



   register_post_type('imobdev-industries', $args);

}

function create_hire_developer_post_type() {



	$labels = array(

					'name' 					=> __( 'Hire Developer','imobdev-technology' ),

					'singular_name' 		=> __( 'Hire Developer','imobdev-technology' ),

				   'add_new'				=> __( 'Add New Hire Developer','imobdev-technology' ),

				   'add_new_item'			=> __( 'Add New Hire Developer','imobdev-technology' ),

				   'edit_item'				=> __( 'Edit Hire Developer','imobdev-technology' ),

				   'new_item'				=> __( 'New Hire Developer','imobdev-technology' ),

				   'all_items'				=> __( 'All Hire Developer','imobdev-technology' ),

				   'view_item'				=> __( 'View Hire Developer','imobdev-technology' ),

				   'search_items'			=> __( 'Search Hire Developer','imobdev-technology' ),

				   'not_found'				=> __( 'No Hire Developer found','imobdev-technology' ),

				   'not_found_in_trash'	=> __( 'No Hire Developer found in Trash','imobdev-technology' ),

				   'menu_name'         	=> __( 'Hire Developer','imobdev-technology' ),



				);

   

   $args = array(

	   'labels' 		=> $labels,

	   'public' 		=> true, /* shows in admin on left menu etc */

	   'has_archive' 	=> true,

	   'menu_icon'     => 'dashicons-welcome-learn-more',

	   'rewrite' 		=> array('slug' => 'hiredeveloper','with_front' => true),

	   'supports'		=> array('title','editor','thumbnail'),

   );



   register_post_type('imobdev-hiredev', $args);

}