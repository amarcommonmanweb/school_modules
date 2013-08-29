<?php

/*
 * The main controller where the whole magic starts
 */

/**
 * The main class
 */
class Home extends CI_Controller {

    function __construct() {
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
        
        $data = array('pageLoad' => 'home_page',
                      'pageData' => $pageDataArray);

        $this->load->view('home/layout/content_layout', $data);
    }

}