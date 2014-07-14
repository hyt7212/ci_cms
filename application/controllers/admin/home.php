<?php
class Home extends CI_Controller
{
	/**
	 *默认后台控制器
	 *
	 */
	public function Index ()
	{
		/**
		 *默认控制的默认动作
		 */
		$this->load->view('admin/public/header');
		$this->load->view('admin/home');
		$this->load->view('admin/public/footer');
	}
}
