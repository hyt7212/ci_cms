<?php
class Rbac_test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Rbac');
	}

	public function index ()
	{

		$id=1;
		$v='add';

		header("content-type:text/html;charset=utf-8");
		// 创建一个操作
		$cp = $this->rbac->create_operation("add", "新建 页面");
		var_dump($cp);

		// 创建角色
		$admin 	= $this->rbac->create_role("系统管理员", "系统管理 角色");
		var_dump($admin);

		// 给角色授权
		$this->rbac->add_childs($admin, array($cp));

		// 分配角色给用户
		$this->rbac->assign("系统管理员", $id); //admin

		$this->output->enable_profiler(TRUE);

		// 验证权限
		if ($this->rbac->check_user_access($id, $v))
		{
			echo "<span style='color:green'>有权限 $v</span>";
		}
		else
		{
			echo "<span style='color:red'>无权限 $v</span>";
		}
	}
}