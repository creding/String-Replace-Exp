<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$plugin_info = array(
		'pi_name'			=> 'String Replace Exp',
		'pi_version'		=> '1.0',
		'pi_author'			=> 'Christopher Reding',
		'pi_author_url'		=> 'http://christopherreding.com/',
		'pi_description'	=> 'Tag for PHP str_replace() function.',
		'pi_usage'			=>  Strexp::usage()
	);
					
/**
 * Strexp
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Christopher Reding
 * @copyright		Copyright (c) 2011, Christopher Reding
 * @link			http://christopherreding.com
 */
					
class Strexp {
  
	var $return_data = '';
	
	function Strexp()
	{
		//ExpressionEngine super object
		$this->EE =& get_instance();
		
		$haystack = $this->EE->TMPL->fetch_param('string', '');
		$needle   = $this->EE->TMPL->fetch_param('pattern', '');
		$replace  = $this->EE->TMPL->fetch_param('replace', '');
		
		//Output transformed string
		$this->return_data = str_replace($needle, $replace, $haystack);
	}

	// --------------------------------------------------------------------
	/**
	 * Usage
	 *
	 * This function describes how the plugin is used.
	 *
	 * @access	public
	 * @return	string
	 */	
  
	function usage()
	{
	  ob_start(); 
	  ?>
	  
	  Sometimes you need to use PHP functions but don't want to
	  enable PHP in the template. This plugin allows you to use 
	  the PHP string replace function in an EE tag passing the
	  pattern, replacement, and string to search as parameters. 
	  
	  With this plugin you can pass EE variables to the tag 
	  which will process them and return the string with the 
	  replaced text.
	  
	  This example replaces spaces in a string with a dash
	  if the var is {title} use this in it's place
	  
	  {exp:strrexp pattern=" " replace="-" string="{title}" }
	  
	  <?php
	  $buffer = ob_get_contents();
	  	
	  ob_end_clean(); 
	  
	  return $buffer;
	}

}
/* End of file pi.strexp.php */ 
/* Location: ./system/expressionengine/third_party/str_rexp/pi.strexp.php */ 