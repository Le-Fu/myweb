<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function get_all()
    {
        $this -> db -> limit(6);
        $this -> db -> order_by('post_time', 'desc');
        return $this -> db -> get('t_blog') -> result();
    }

    public function get_by_category($cate_id){
        $this -> db -> limit(6);
        $this -> db -> order_by('post_time', 'desc');
        return $this -> db -> get_where('t_blog',array(
            'cate_id' => $cate_id
        )) -> result();
    }

    public  function get_by_id(){
        return $this -> db  ->get_where('t_blog', array(
            ''
        )) ->row();
    }
}