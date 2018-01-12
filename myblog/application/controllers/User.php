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

    public function reg()
    {
        $this->load->view('reg');
    }

    public function add_user(){
        $email = $this->input->get('email');
        $name = $this->input->get('name');
        $pwd = $this->input->get('pwd');
        $pwd2 = $this->input->get('pwd2');
        $gender = $this->input->get('gender');
        $province = $this->input->get('province');
        $city = $this->input->get('city');


        if($pwd != $pwd2){
            echo 'pwd-error';
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
}