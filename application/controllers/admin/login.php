<?php
/**
* 后台登陆页面
*/
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
  		$this->load->model('Login_model');
	}

	public function index()
	{
		//调用验证规则
		$this->Login_model->rules();

		//判断是否验证通过
		if ($this->form_validation->run() == TRUE){
			if($this->Login_model->check()){
				//验证通过
				//设置session
				$this->session->set_userdata('username', $this->input->post('username'));
				//跳转到后台首页
				redirect('/admin/home', 'location');
			}else{
				echo '<script>alert("用户名或密码错误")</script>';
				$this->load->view('admin/login');
			}
		}else{
			//显示登录界面
			$this->load->view('admin/login');
		}
	}

	/**
	 *退出登录处理
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/admin/login', 'location');
	}
}