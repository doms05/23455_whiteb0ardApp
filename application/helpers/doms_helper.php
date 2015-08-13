<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('printr_wrap') ) {
	function printr_wrap($print_r, $style="", $id='')
	{
		echo "<pre".(!empty($style) ? ' style="'.$style.'"': '').(!empty($id) ? ' id="'.$id.'"' : '').">";
		print_r($print_r);
		echo "</pre>";
		
	}
}


if( ! function_exists('dd') ) {
	function dd($print_r, $style="", $id='') {
		echo "<pre".(!empty($style) ? ' style="'.$style.'"': '').(!empty($id) ? ' id="'.$id.'"' : '').">";
		print_r($print_r);
		echo "</pre>";
		die;
	}
}

