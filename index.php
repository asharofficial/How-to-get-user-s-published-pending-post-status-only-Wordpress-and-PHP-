 function allow_pending_listings($qry) {
        $status = get_post_status ( $_GET['eid'] );
        if(is_user_logged_in()){
        $edit_data = get_post($_GET['eid']);    
         if (!is_admin() && $edit_data->post_author == $userdata->ID && $status !='publish' ) {
        $qry->set('post_status', array('publish','pending','draft'));
         }
        }
    }
    add_action('pre_get_posts','allow_pending_listings');
