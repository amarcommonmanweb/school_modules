

1.
<script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script> is used at a header..
this enables us to use the name baseurl in any of the js files that follow

2.
in the views folder -- there are two mandatory folders "layout_main" and "layout_admin" ... these will contain the headers and the footer
and any other file that comes into the layout category... like "side_nav"

3.
$data = array(
                'pageLoad' => 'home_page',
                'pageData' => $pageDataArray
                );
this is the format of the data that is usually used to pass to the page via the layout

4.
copy the "jquery" folder in the '/js' folder .. to support the includes in the header
and copy the part 
<!-- start : jquery stuff -->
        <script type="text/javascript" src="<?= base_url('js/jquery/js/jquery-1.8.0.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('js/jquery/js/jquery-ui-1.8.23.custom.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('js/jquery/js/jquery-1.8.0.min.js'); ?>"></script>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url('js/jquery/css/ui-lightness/jquery-ui-1.8.23.custom.css'); ?>" />
<!-- end : jquery stuff -->

5.
The '/js/third_party/' folder consists of the js files from outside, distrbuted for free... like the md5.js
and each module has a file in the js folder <module name>.js 

6.
three main divisions in the header scripts and css
  >> main jquery stuff
  >> third party scripts and style sheets
  >> custom scripts and style sheets

7.
<div id="wrapper">  is one tag which starts in the header file and ends in the footer file

8.
use this in any controller to check and redirect the control if unauthorized

if ($this->session->userdata('role_id')) {
            $this->pageRedirect($this->session->userdata('role_id'));
}

9.
While initiating any ajax request or pinging a controller for data or status the following is to be followed

    a. call the controller with appropriate data
    b. on the controller use " if ($this->input->is_ajax_request()) {}" to isolate the ajax action and put everything else in the "else" clause of this
    c. use the following patter to set form rules if any and check for data 
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $errorData = validation_errors();
                $errorData = str_replace('<p>', '', $errorData);
                $errorData = str_replace('</p>', '<br>', $errorData);
                $ret_val = array('status' => 'error',
                    'data' => $errorData);
                echo json_encode($ret_val);
            } else {
                // do some passed stuff
            }
    d. always use the following pattern anywhere in the code to indicate error
                    $ret_val = array('status' => 'error',
                        'data' => 'Invalid credentials! Please try again');
                    echo json_encode($ret_val);
                    exit();
    e. use the following patter for success
                $ret_val = array('status' => 'success',
                        'data' => $url<can be any form of data>);
                    echo json_encode($ret_val);
    f. on the js side .... use "dataType: 'json'," in the ajax request and parse the data in the above points as follows
                        if(response.status == 'error'){
                        $('#loginErrorMsg').html(response.data);
                        <if it were an array .. then store 'response.data' in the array and then process it
    g. Finally display the result or redirect using --> "window.location.replace(response.data); "

10.
the logout function is 
    function logout() {
        $this->session->sess_destroy();
        redirect(base_url(), 'location');
    }

11.
in the "/css" folder all the styles will be clearly marked out separately according to the modules.
and one section in the beginning for the generalized thing
also, there are 2 css files --> style_main.css and style_admin.css

12.
js files and the css files to be used are supplied in the controller of that module by the following part 
        $jsIncludes = array('js/third_party/md5.js',
                            'js/third_party/masonry.pkgd.js');

        $cssIncludes = array('css/style_main.css');

        $pageDataArray = array('jsIncludes' => $jsIncludes,
                               'cssIncludes' => $cssIncludes,
                               <some more parameters ... what ever we need on the page >);

13.
to render a php view file and use the whole file as a html string ... use the following ..
        $msg = $this->load->view('emails/phpviewfilename','',true);	
	$this->email->message($msg);
        here ... it is been used to send the email of that format
        
14.
Except reading/select all other requests to database should go through the baseDbClass protected methods

15.
"created_datetime", "updated_datetime", "created_userid", "updated_userid", "delete_flag" are the mandatory fields in all the tables in the db.
all these will be updated through the base class, by attaching extra modules to the already existing array columns

16.
