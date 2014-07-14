<?php
/**
* 文章分类模型
*/
class Article_model extends CI_Model
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

		$this->form_validation->set_rules('cid', '分类', 'trim|required');
		$this->form_validation->set_rules('title', '标题', 'trim|required|xss_clean');
		$this->form_validation->set_message('required', '%s 不能为空!');
	}

	/**
	*获得所有文章列表
	*/
	public function get_list($num,$offset)
	{
		$this->db->select('article.id, article.title, article.ptime, article.click, article.cid, category.name');
		$this->db->from('article');
		$this->db->join('category', 'article.cid = category.id', 'left');
		$this->db->order_by("id", "desc");
		$this->db->limit($num, $offset);
		$query = $this->db->get();
		$arts = $query->result_array();
		return $arts;
	}

	/**
	*获得指定ID的文章
	*/
	public function get_art($id)
	{
		$this->db->select('id, title, content, cid');
		$query = $this->db->where('id', $id)->get('article');
		$art = $query->result_array();
		return $art;
	}

	/**
	*执行添加文章
	*/
	public function addart()
	{
		//获得当前时间
		$_POST['ptime'] = time();
		if($this->db->insert('article', $_POST)){
			return true;
		}
		return false;
	}

	/**
	*删除分类
	*/
	public function delart($id)
	{
		$query = $this->db->delete('article', array('id' => $id));
		if($query){
			return true;
		}
		return false;
	}

	/**
	*执行修改文章
	*/
	public function modart()
	{
		//获得当前时间
		$_POST['ptime'] = time();
		$id = $_POST['id'];
		unset($_POST['id']);
		$this->db->where('id', $id);
		// p($res);exit;
		if($this->db->update('article', $_POST)){
			return true;
		}
		return false;
	}
}