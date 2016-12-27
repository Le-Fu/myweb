<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function get_all()
    {
        $this -> db -> limit(5);
        $this -> db -> order_by('post_time', 'desc');
        return $this -> db -> get('t_blog') -> result();
    }

    public function get_by_category($cate_id){
        $this -> db -> limit(5);
        $this -> db -> order_by('post_time', 'desc');
        return $this -> db -> get_where('t_blog',array(
            'cate_id' => $cate_id
        )) -> result();
    }

    public function get_by_id($blog_id){
        $this -> db -> select('blog.*, cate.cate_name');
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_blog_category cate', 'blog.cate_id=cate.cate_id');
        $this -> db -> where('blog.blog_id', $blog_id);
        return $this -> db -> get() -> row();
    }

    public function get_by_page($offset=0, $cate_id){
        $this -> db -> order_by('post_time', 'desc');
        $this -> db -> limit(5, $offset);
        if($cate_id){
            return $this -> db -> get_where('t_blog',array(
                'cate_id' => $cate_id
            )) -> result();
        } else {
            return $this -> db -> get('t_blog') -> result();
        }
    }

    public function get_all_count($cate_id, $title){
        $this -> db -> select('blog.*, cate.cate_name');
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_blog_category cate', 'blog.cate_id=cate.cate_id');
        $this -> db -> where('cate.is_delete', 0);
        if($cate_id != 0){
            $this -> db -> where('cate.cate_id', $cate_id);
        }
        if($title){
            $this -> db -> like('blog.title', $title);
        }
        return $this->db->count_all_results();
    }

    public function save($title, $author, $cate_id, $desc, $content, $img, $big_img){
        $this -> db -> insert('t_blog', array(
            'title' => $title,
            'author' => $author,
            'cate_id' => $cate_id,
            'desc' => $desc,
            'content' => $content,
            'img' => $img,
            'big_img' => $big_img
        ));
        return $this -> db -> affected_rows();
    }


}