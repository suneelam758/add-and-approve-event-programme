<?php

/**
 * Login Controller
 * Controls the login processes
 */

class Login extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
		
    }

    /**
     * Index, default action (shows the login form), when you do login/index
     */
    function index()
    {
        // show the view
        $this->view->render('index/index');
    }
	


    /**
     * The logout action, login/logout
     */
    function logout()
    {	
        $login_model = $this->loadModel('Login');
        $data=$login_model->login();
        print_r($data);
        // redirect user to base URL
        // header('location: ' . URL);
    }

    
}
