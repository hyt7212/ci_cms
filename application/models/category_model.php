<?php
/**
* 文章分类模型
*/
class Category_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	*获得所有分类
	*/
	public function get_all()
	{
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('category');
		$data = $query->result_array();
		return $data;
	}

	/**
	*分页获得所有分类,以及分类对应文章数量
	*/
	public function get_list($num,$offset)
	{
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('category', $num, $offset);
		$data = $query->result_array();
		foreach($data as &$cate){
			$cate['CateCount'] = $this->get_Count($cate['id']);;
		}
		return $data;
	}

	//通过分类的主键ID，找到对应的文章个数
	public function get_Count($id)
	{
		$this->db->where('cid', $id);
		$count = $this->db->count_all_results('article');
		return $count;
	}

	/**
	*获得单个分类
	*/
	public function get_cate($id)
	{
		$query = $this->db->get_where('category', array('id'=>$id));
		// p($query->result_array());
		$cate = $query->result_array();
		return $cate;
	}

	/**
	*删除分类
	*/
	public function delcate($id)
	{
		$query = $this->db->delete('category', array('id' => $id));
		if($query){
			return true;
		}
		return false;
	}

	/**
	*修改分类
	*/
	public function modcate()
	{
		$id = $_POST['id'];
		unset($_POST['id']);
		$this->db->where('id', $id);
		if($this->db->update('category', $_POST)){
			return true;
		}
		return false;
	}
}