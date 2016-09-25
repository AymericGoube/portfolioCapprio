<?php if ( function_exists('register_sidebar') ) register_sidebar( array(
        'name' => __( '', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( '', 'theme-slug' ),
        'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => '',
    ) ); ?>
<?php // Menus de navigation
register_nav_menus( array(
        'Top' => 'Navigation principale',
    ) );?>
