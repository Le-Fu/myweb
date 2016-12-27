<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this -> load -> model('admin_model');
            $this -> load -> model('blog_category_model');
            $this -> load -> model('blog_model');
            $this -> load -> model('comment_model');
    }

   public function index(){
        $this -> load -> view('adminssm521/admin_index');
    }

    public function login(){
        $this -> load -> view('adminssm521/admin_login');
    }

    public function do_login()
    {
        $email = $this -> input -> post('email');
        $pwd = $this -> input -> post('pwd');
        $row = $this -> admin_model -> get_by_email_pwd($email, $pwd);
        if($row > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function mgr_category(){
        $categories = $this -> blog_category_model -> get_all();
        $this -> load -> view('adminssm521/admin_category', array(
            'categories' => $categories
        ));

    }

    public function add_category(){
        $this -> load -> view('adminssm521/add_category');

    }

    public function save_category(){
        $cate_name = $this -> input -> post('cate_name');
        $rows = $this -> blog_category_model -> save($cate_name);
        if($rows > 0){
            redirect('adminssm521/category');
        }else{
            echo '添加类型失败!';
        }
    }

    public function delete_category(){
        $cate_id = $this -> input -> get('cateId');
        $rows = $this -> blog_category_model -> delete($cate_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function delete_selected_category(){
        $cate_ids = $this -> input -> get('cateIdStr');
        $rows = $this -> blog_category_model -> delete_selected($cate_ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function mgr_blog($cate_id=0, $offset=0){
        $title = $this -> input -> get('title');
        $total_rows = $this -> blog_model -> get_all_count($cate_id, $title);

        /*分页配置信息开始*/
        $this->load->library('pagination');

        $config['base_url'] = 'adminssm521/blog/'.$cate_id.'/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        /*分页配置信息结束*/

        $categories = $this -> blog_category_model -> get_all();
        $blogs = $this -> blog_model -> get_by_page($cate_id, $title, $config['per_page'], $offset);
        $this -> load -> view('adminssm521/admin_blog', array(
            'categories' => $categories,
            'blogs' => $blogs
        ));

    }

    public function add_blog(){
        $categories = $this -> blog_category_model -> get_all();

        $this -> load -> view('adminssm521/add_blog', array(
            'categories' => $categories,
        ));
    }

    public function post_blog(){


        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3076';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);


        $this->load->library('upload', $config);

        if ($this->upload->do_upload("img"))
        {
            $title = htmlspecialchars($this -> input -> post('title'));
            $author = htmlspecialchars($this -> input -> post('author'));
            $cate_id = $this -> input -> post('cateId');
            $desc = htmlspecialchars($this -> input -> post('desc'));
            $content = htmlspecialchars($this -> input -> post('content'));

            $upload_data = $this -> upload -> data();

            $this -> load -> library("image_lib");
            //压缩小图
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['thumb_marker'] = '_thumb';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = 600;
            $config['height'] = 240;
            $config['maintain_ratio'] = FALSE;

            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
            $this -> image_lib -> clear();

            $img = 'upload/'.$upload_data['raw_name'] . '_thumb'  . $upload_data['file_ext'];

            //压缩大图
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['thumb_marker'] = '';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = 1170;
            $config['height'] = 400;

            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
            $this -> image_lib -> clear();

            $big_img = 'upload/'.$upload_data['raw_name'] . $upload_data['file_ext'];


            $rows = $this -> blog_model -> save($title, $author, $cate_id, $desc, $content, $img, $big_img);
            if($rows > 0){
                redirect('adminssm521/blog');
            }else{
                echo '发表文章失败';
            }
        }else{
            var_dump($this->upload->display_errors());
            echo '文件上传失败!';
        }


    }


}