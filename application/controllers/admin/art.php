<?php
/**
* 文章管理控制器
*/
class Art extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form', 'url');
		$this->load->model('article_model');
		$this->load->model('category_model');
		$this->load->helper('date');

		// $this->output->enable_profiler();
	}

	/**
	*文章列表
	*/
	public function index()
	{
		//分页显示
		$this->load->library('pagination');//加载分页类
		$config['base_url'] = site_url().'/admin/art/index';//设置基地址
		$config['uri_segment'] = 4;//设置URI 的哪个部分包含页数
		$config['total_rows'] = $this->db->count_all('article');//自动从数据库中取得total_row信息
		$config['per_page'] = 5;        //每页显示的记录数

		//分页连接最外层标签
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		//当前页标签
		$config['cur_tag_open'] = '<li><a style="color:#ccc;">';
		$config['cur_tag_close'] = '</a></li>';

		//上一页标签
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		//下一页标签
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		//数字链接标签
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config); //设置完成分页器
		$arts =$this->article_model->get_list($config['per_page'],$this->uri->segment(4));//载入模型

		$this->load->view('admin/public/header');
		$this->load->view('admin/art', array('arts'=>$arts));
		$this->load->view('admin/public/footer');
	}

	/**
	*添加文章
	*/
	public function addart()
	{
		if(!empty($_POST)){
			//调用验证规则
			$this->article_model->rules();
			//判断是否验证通过
			if ($this->form_validation->run() == TRUE){
				if($this->article_model->addart()){
					//插入成功
					$this->Redirect->success('添加成功',2,'admin/art');
				}else{
					//插入失败
					$this->Redirect->error('添加失败',2,'admin/art');
				}
			}
		}else{
			//获得所有分类
			$data = $this->category_model->get_all();
			foreach($data as $cate){
				$cates[$cate['id']] = $cate['name'];
			}

			$this->load->view('admin/public/header');
			$this->load->view('admin/addart', array('options'=>$cates));
			$this->load->view('admin/public/footer');
		}
	}

	/**
	*修改文章
	*/
	public function modart()
	{
		$id = $this->uri->segment(4);
		if(!empty($_POST)){
			if($this->article_model->modart()){
				//插入成功
				$this->Redirect->success('修改成功',2,'admin/art');
			}else{
				//插入失败
				$this->Redirect->error('修改失败',2,'admin/art');
			}
		}else{
			//获得所有分类
			$data = $this->category_model->get_all();
			foreach($data as $cate){
				$cates[$cate['id']] = $cate['name'];
			}

			//获得当前ID的文章
			$art = $this->article_model->get_art($id);
			$art = $art[0];

			$this->load->view('admin/public/header');
			$this->load->view('admin/modart', array('options'=>$cates, 'art'=>$art));
			$this->load->view('admin/public/footer');
		}
	}

	/**
	*删除文章
	*/
	public function delart()
	{
		$id = $this->uri->segment(4);

		//如果不是整形先转换为整型
		if(!is_int($id)){
			$id = (int)$id;
		}
		if($this->article_model->delart($id)){
			//执行删除
			$this->Redirect->success('删除成功',2,'admin/art');
		}else{
			//错误参数
			$this->Redirect->error('错误参数',2,'admin/art');
		}
	}
}