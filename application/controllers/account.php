<?php

/*
 * The main controller where the whole magic starts
 */

/**
 * The main class
 */
class Account extends CI_Controller {

    function __construct() {
        //the constructor
        parent::__construct();
    }

    function index() {
        //third party and custom style and js files
        $jsIncludes = array('js/third_party/md5.js',
                            'js/third_party/masonry.pkgd.js');
        
        $cssIncludes = array('css/style_main.css');
        
        $pageDataArray = array('jsIncludes' => $jsIncludes,
                               'cssIncludes' => $cssIncludes,
                               'greeting' => 'Good Morning!!');
        
        $data = array('pageLoad' => 'account_page',
                      'pageData' => $pageDataArray);

        $this->load->view('account/layout/content_layout', $data);
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url(), 'location');
    }

}