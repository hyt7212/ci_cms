<?php
/**
* 操作成功、失败跳转模型
*/
class Redirect extends CI_Model
{
	//成功提示
	public function success($info,$sec,$url){
		$succ = array(
			"ico"   =>"√",
			"class" =>"success",
			'info'  =>$info,
			'sec'   =>$sec,
			'redirect'=>'/'.$url
			);
		$this->load->view('info', $succ);
		// exit;
	}

	//错误提示
	public function error($info,$sec,$url){
		$succ = array(
			"ico"   =>"X",
			"class" =>"error",
			'info'  =>$info,
			'sec'   =>$sec,
			'redirect'=>'/'.$url
			);
		$this->load->view('info', $succ);
		// exit;
	}
}