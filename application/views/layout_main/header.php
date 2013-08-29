<html>
    <head>
        <title>Costrategix collection</title>
        <script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>

        <!-- start : main jquery stuff -->
        <script type="text/javascript" src="<?= base_url('js/jquery/js/jquery-1.8.0.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/jquery/js/jquery-ui-1.8.23.custom.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/jquery/js/jquery-1.8.0.min.js'); ?>"></script>

        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url('js/jquery/css/ui-lightness/jquery-ui-1.8.23.custom.css'); ?>" />
        <!-- end : main jquery stuff -->

        <!-- start: third party and custom scripts and style sheets -->
        <?php foreach($jsIncludes as $jsFile){ ?>
            <script type="text/javascript" src="<?= base_url($jsFile); ?>"></script>
        <?php } ?>       
            
        <?php foreach($cssIncludes as $cssFile){ ?>
            <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($cssFile); ?>" />
        <?php } ?>
        <!-- end: third party and custom scripts and style sheets -->

    </head>   
    <body>
        <div id="wrapper">
            <div id="header">              
                <div id='header_links'>
                    <?php
                    $loggedIn = 1;
                    if ($loggedIn == 1) {
                        ?>
                        Hi, <a href="#">User's Name</a>&nbsp;|&nbsp;<a href="/">Log Out</a> 
                    <?php } ?>
                </div>   
            </div>