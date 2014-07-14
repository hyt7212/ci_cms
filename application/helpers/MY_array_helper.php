<?php

if ( ! function_exists('p'))
{
	function p($data)
	{
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
}