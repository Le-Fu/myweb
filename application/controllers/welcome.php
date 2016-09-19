<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

//	public function index()
//	{
//		$this -> load -> model('blog_category_model');
//		$this -> load -> model('blog_model');
//		$categories = $this -> blog_category_model -> get_all();
//
//		$cate_id = $this -> input -> get('cateId');
//		if($cate_id){
//			$blogs = $this -> blog_model -> get_by_category($cate_id);
//		}else{
//			$blogs = $this -> blog_model -> get_all();
//		}
//
//		$this -> load -> view('index', array(
//				"categories" => $categories,
//				"blogs" => $blogs
//		));
//	}
	public function index(){
		$this -> load -> model('blog_category_model');
		$this -> load -> model('blog_model');
		$categories = $this -> blog_category_model -> get_all();
		$blogs = $this -> blog_model -> get_all();
		$this -> load -> view('index', array(
				"categories" => $categories,
				"blogs" => $blogs
		));
	}
	public function get_blogs(){
		$this -> load -> model('blog_model');

		$cate_id = $this -> input -> get('cateId');
		if(!$cate_id){
			$blogs = $this -> blog_model -> get_all();
		}else{
			$blogs = $this -> blog_model -> get_by_category($cate_id);
		}
		echo json_encode($blogs);
	}

	public function view_blog(){
		$this -> load -> model('blog_model');
		$blog_id = $this -> input -> get('blogId');
		$blog = $this -> blog_model -> get_where('t_blog',array(
			blog => $blog
		)) -> row();

		$this -> load -> view('blog_detail');

	}


	}