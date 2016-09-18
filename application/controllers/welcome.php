<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('blog_category_model');
		$this->load->model('blog_model');
		$categories = $this->blog_category_model->get_all();
		$blogs = $this->blog_model->get_all();
		$this->load->view('index', array(
			"categories" => $categories,
				"blogs" => $blogs
		));
	}
}