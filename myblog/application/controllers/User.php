<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('a');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function login()
    {
        $this->load->view('login');
    }
    public function admin_index()
    {
        $this->load->view('adminIndex');
    }
    public function captcha()
    {
        $this->load->helper('captcha');

        $rand = rand(1000, 9999);

        $this->session->set_userdata(array(
            "captcha" => $rand
        ));
        $vals = array(
            'word' => $rand,
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 7200,
            'word_length' => 8,
            'font_size' => 16,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
        $cap = create_captcha($vals);
        $img = $cap['image'];
        return $img;
    }

    public function change_code(){
        $img = $this->captcha();
        echo $img;
    }
    public function reg()
    {
        $img = $this->captcha();
        $this->load->view('reg',array('img'=>$img));
    }
    public function add_user(){
        $email = $this->input->get('email');
        $name = $this->input->get('name');
        $pwd = $this->input->get('pwd');
        $pwd2 = $this->input->get('pwd2');
        $gender = $this->input->get('gender');
        $province = $this->input->get('province');
        $city = $this->input->get('city');
        $code = $this->input->get('code');

        if($pwd != $pwd2){
            echo 'pwd-error';
            die();
        }
        $captcha = $this->session->userdata('captcha');
        if($code != $captcha){
            echo 'code-error';
            die();
        }

        $rows = $this->a->add(array(
            'username'=>$name,
            'email'=>$email,
            'password'=>$pwd,
            'sex'=>$gender,
            'province'=>$province,
            'city'=>$city
        ));
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }

    }
    public function check_email(){
        $email = $this->input->get('email');
        $result = $this->a->get_user_by_email($email);
        if(count($result) > 0){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function check_login(){
        $pwd = $this->input->get('pwd');
        $email = $this->input->get('email');
        $result = $this->a->get_user_by_email($email);
        if(count($result) == 0){
            echo 'email not exist';
        }else{
            if($result[0]->password == $pwd){
                $this->session->set_userdata(array(
                    'user'=>$result[0]
                ));
                echo 'success';
            }else{
                echo 'password error';
            }
        }
    }
    public function auto_login(){
        $email = $this->input->get('email');
        $result = $this->a->get_user_by_email($email);
        $this->session->set_userdata(array(
            'user'=>$result[0]
        ));
        redirect("We");
    }
    public function logout(){

        $this->session->unset_userdata('user');
        redirect("We");

    }
    public function new_blog()
    {
        $this->load->model('Article_model');
        $user = $this->session->userdata('user');
        $types = $this->Article_model->get_type_by_user_id($user->user_id);
        $this->load->view('newBlog',array('types'=>$types));
    }
}