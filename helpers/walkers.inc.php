<?php


#-----------------------------------------------------------------#
# Taxonomy Walker for Portfolio Filter
#-----------------------------------------------------------------# 

	class Nucleus_Category_Walker extends Walker_Category {
		
	   function start_el(&$output, $category, $depth = 0, $args = array(), $current_object_id = 0) {

	      extract($args);
	      $cat_slug = esc_attr( $category->slug );
	      $cat_slug = apply_filters( 'list_cats', $cat_slug, $category );
	      $cat_url  = get_term_link( $category->slug , $category->taxonomy );

	      $link = '<li><a href="'. esc_url($cat_url) .'" data-filter=".'. strtolower(preg_replace('/\s+/', '-', $cat_slug)) .'">';
		  
		  $cat_name = esc_attr( $category->name );
	      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
		  	
	      $link .= $cat_name;
		  
	      if(!empty($category->description)) {
	         $link .= ' <span>'.$category->description.'</span>';
	      }
		  
	      $link .= '</a></li>';
	     
	      $output .= $link;
	       
	   }
	}

