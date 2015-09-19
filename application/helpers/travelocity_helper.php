<?php 
if( !function_exists('app_name') )
{
	function app_name()
	{
		$ci=& get_instance();
		return $ci->config->item('app_name');
	}

	function post_value($name,$def_val="",$return=false)
	{
		global $flush;
		$v = '';
		if(isset($_POST[$name]))
		{
			$v = $_POST[$name];
		}
		elseif($def_val!="")
		{
			$v = $def_val;
		}
		if($flush==true)
		{
			$v = $def_val;
		}
		if($return==true)
		{
			return $v;	
		}
		else
		{
			echo $v;
		}
	}

	function pre($array_name)
	{
		echo '<pre>'.print_r($array_name,1).'</pre>';
	}

	function clean_post($name)
	{
		return mysql_real_escape_string(trim($_POST[$name]));
	}
	function clean_get($name)
	{
		return mysql_real_escape_string(trim($_GET[$name]));
	}
	function form_post($name)
	{
		return $_POST[$name];
	}
	function form_get($name)
	{
		return $_GET[$name];
	}
}
?>