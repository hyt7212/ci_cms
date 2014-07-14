<?php
/**
* 登录验证模型
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 *验证规则
	 */
	public function rules()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', '用户名', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', '密码', 'trim|required');
		$this->form_validation->set_message('required', '%s 不能为空!');
	}

	/**
	 *验证用户名密码是否正确
	 */
	public function check()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$query = $this->db->get_where('user', array('username' =>$username, 'password'=>$password));
		$data = $query->row_array();
		if(empty($data)){
			//用户名密码不存在
			return false;
		}
		return true;
		
	}
}