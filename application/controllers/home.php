<?php
class Home extends CI_Controller
{
	/**
	 *默认首页控制器
	 *
	 */
	public function Index ()
	{
		/**
		 *默认控制的默认动作
		 */
		$this->load->view('home');
	}
}
