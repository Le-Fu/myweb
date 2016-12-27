<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_category_model extends CI_Model {

    public function get_all(){
		//return $this -> db -> get('t_blog_category') -> result();
		$query = $this -> db -> query('select cate.*, (select count(*) from t_blog blog where blog.cate_id=cate.cate_id) as blog_count from t_blog_category cate where cate.is_delete=0');
		return $query -> result();
	}

	public function save($cate_name){
		$this -> db -> insert('t_blog_category', array(
			'cate_name' => $cate_name
		));
		return $this -> db -> affected_rows();
	}
	public function delete($cate_id){
		$this -> db -> where('cate_id', $cate_id);
		$this -> db -> update('t_blog_category', array(
			'is_delete' => '1'
		));
		//update t_blog_category set is_delete=1 where cate_id=4
		return $this -> db -> affected_rows();
	}

	public function delete_selected($cate_ids_str){ //"1,2"
		$cate_ids = explode(',', $cate_ids_str);//[1,2]
		$this -> db -> where_in('cate_id', $cate_ids);
		$this -> db -> update('t_blog_category', array(
			'is_delete' => '1'
		));
		//update t_blog_category set is_delete=1 where cate_id=4
		return $this -> db -> affected_rows();
	}
}