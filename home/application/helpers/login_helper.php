<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('is_logged_in'))
{
    function is_logged_in()
    {
        $CI = & get_instance();  //get instance, access the CI superobject
		$isLoggedIn = $CI->session->userdata('logged_in');
		if( $isLoggedIn ) 
		{
			return TRUE;
		} else
		{
			return FALSE;  
		}
    }   
}