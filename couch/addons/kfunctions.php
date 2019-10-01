<?php
if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

//require_once( K_COUCH_DIR.'addons/cart/cart.php' );
//require_once( K_COUCH_DIR.'addons/inline/inline.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-folders.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-comments.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
require_once( K_COUCH_DIR.'addons/routes/routes.php' );
//require_once( K_COUCH_DIR.'addons/jcropthumb/jcropthumb.php' );

// Extended Users
require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
require_once( K_COUCH_DIR.'addons/cart/session.php' );
require_once( K_COUCH_DIR.'addons/data-bound-form/data-bound-form.php' );
// Extended Users

// Template Grouping
if( defined('K_ADMIN') ){
    $FUNCS->add_event_listener( 'register_admin_menuitems', 'my_register_admin_menuitems' );

    function my_register_admin_menuitems(){
        global $FUNCS;
        
        $FUNCS->register_admin_menuitem( array('name'=>'_users_', 'title'=>'Login Users', 'is_header'=>'1', 'weight'=>'1')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_stud_', 'title'=>'Sudents Feedback', 'is_header'=>'2', 'weight'=>'1')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_princi_', 'title'=>'Principal Report', 'is_header'=>'3', 'weight'=>'1')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_teach_', 'title'=>'Teachers Report', 'is_header'=>'4', 'weight'=>'1')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_sett_', 'title'=>'Settings', 'is_header'=>'5', 'weight'=>'1')  );

        
    }
}
// Template Grouping