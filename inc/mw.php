<?php

function project_app_app_mw_init() {
	
	register_nav_menus(
    array(
      'Prime_App_Menu' => __( 'App Menu', 'project-app' ),
          )
    );
     
    register_sidebar( array( 
		'name'          =>  __('App Sidebar', 'project-app' ),
		'id'            => 'app-sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebarWidget">',
		'after_title'   => '</h2>',
	) );
    
}