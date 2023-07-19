<?php

// Create Custom Taxonomy 'Issue Type'

add_action('init', 'imobdev_create_portfolio_category_taxonomy');


function imobdev_create_portfolio_category_taxonomy() {

	$taxonomy_slug 		= 'imobdev-portfolio-category';
	$post_type_slug 	= 'imobdev-portfolio';
	$taxonomy_labels	= array(
							'name'				=> __( 'Portfolio Category','imobdev-technology' ),
							'singular_name'		=> __( 'Portfolio Category','imobdev-technology' ),
							'search_items'		=> __( 'Search Portfolio Category','imobdev-technology' ),
							'all_items'			=> __( 'All Portfolio Categories','imobdev-technology' ),
							'parent_item'		=> __( 'Parent Portfolio Category','imobdev-technology' ),
							'parent_item_colon'	=> __( 'Parent Portfolio Category','imobdev-technology' ),
							'edit_item'			=> __( 'Edit Portfolio Category','imobdev-technology' ), 
							'update_item'		=> __( 'Update Portfolio Category','imobdev-technology' ),
							'add_new_item'		=> __( 'Add New Portfolio Category','imobdev-technology' ),
							'new_item_name'		=> __( 'New Topic Portfolio Category','imobdev-technology' ),
							'menu_name'			=> __( 'Portfolio Categories','imobdev-technology' ),
							);

	// checking whether taxonomy with particular slug exist or not
	if( ! taxonomy_exists( $taxonomy_slug ) )
	{
		/* Create taxonomy and attach it to the object type (post type) */
		register_taxonomy(
						$taxonomy_slug,
						$post_type_slug,
						array(
							'hierarchical'		=> true,
							'labels'			=> $taxonomy_labels,
							'show_ui'			=> true,
							'show_admin_column'	=> true,
							'query_var'			=> true,
							'rewrite'			=> array( 'slug' => 'portfolio-category' ),
						)
					);
	}
}