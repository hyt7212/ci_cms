<?php
/**
* 新闻分类控制器
*/
class Cate extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('category_model');
	}

	/**
	*分类列表
	*/
	public function index()
	{
		//分页显示
		$this->load->library('pagination');//加载分页类
		$config['base_url'] = site_url().'/admin/cate/index';//设置基地址
		$config['uri_segment'] = 4;//设置URI 的哪个部分包含页数
		$config['total_rows'] = $this->db->count_all('category');//自动从数据库中取得total_row信息
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
		$cates =$this->category_model->get_list($config['per_page'],$this->uri->segment(4));//载入模型

		$this->load->view('admin/public/header');
		$this->load->view('admin/cate', array('cates'=>$cates));
		$this->load->view('admin/public/footer');
	}

	/**
	*添加分类
	*/
	public function addcate()
	{
		if(!empty($_POST['name'])){
			$res = $this->db->insert('category', $this->input->post());
			if($res){
				//插入成功
				$this->Redirect->success('添加成功',2,'admin/cate');
			}else{
				//插入失败
				$this->Redirect->error('添加失败',2,'admin/cate/addcate');
			}
		}else{
			$this->load->view('admin/public/header');
			$this->load->view('admin/addcate');
			$this->load->view('admin/public/footer');
		}
	}

	/**
	*删除分类
	*/
	public function delcate($id)
	{
		//如果不是整形先转换为整型
		if(!is_int($id)){
			$id = (int)$id;
		}
		//判断该分类下是否有文章
		$query = $this->db->where('cid', $id)->count_all_results('article');
		if($query == 0){
			//分类下没有文章
			if($this->category_model->delcate($id)){
				//执行删除
				$this->Redirect->success('删除成功',2,'admin/cate');
			}else{
				//错误参数
				$this->Redirect->error('错误参数',2,'admin/cate');
			}
		}else{
			//分类下有文章
			$this->Redirect->error('请先删除该分类下所有文章',2,'admin/cate');
		}
	}

	/**
	*修改分类
	*/
	public function modcate()
	{
		//接收id值
		$id = $this->uri->segment(4);

		//判断是否有数据提交
		if(!empty($_POST['name'])){
			$res = $this->category_model->modcate();
			if($res){
				//修改成功
				$this->Redirect->success('修改成功',2,'admin/cate/index');
			}else{
				//修改失败
				$this->Redirect->error('修改成功',2,'admin/cate/index');
			}
		}else{
			//显示修改表单
			$cate = $this->category_model->get_cate($id);
			$cate = $cate[0];
			$this->load->view('admin/public/header');
			$this->load->view('admin/modcate', array('cate'=>$cate));
			$this->load->view('admin/public/footer');	
		}
	}
}