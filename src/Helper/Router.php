<?php
namespace Helper;

/**
* @author      Wesley Dekkers <wesley@wd-media.nl>
* @copyright   Copyright (c), 2015 wd-media.nl
* @license     MIT public license
*/



class Router{
  
  public $path;
  public $params = array();
  public $redirect = array();

  /**
  * Router to link a url to a specific function
  *
  * @param String
  * @param Array
  * @param Array
  *
  * @example
  * <code>
  * Useage Example
  * </code>
  *
  *
  * @since   2015-11-05
  * @author  Wesley Dekkers <wesley@sdicg.com> 
  **/

  public function route($path, $params = array(), $redirect = array()){

    // Check if redirect is empty if it is not put in the redirect
    if(isset($redirect['url']) && $redirect['url'] != ''){

      // If code is given (301) make header permanent
      if(isset($redirect['code']) && $redirect['code'] == '301'){
        header("HTTP/1.1 301 Moved Permanently"); 
      }
      // Redirect the user to this page
      header("Location: ".$redirect['url']);
      exit; 
    }

    // Load the correct function and pass throug the id
    call_user_func_array($path, $params);

  }
}