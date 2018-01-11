<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class We extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('reg');
	}
    public function add(){
        $name = $this->input->post('username');

        $this->load->model('a');
        $row = $this->a->add($name);
        if($row > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function user_list(){
        $this->load->model('a');
        $users = $this->a->user_list();
        $this->load->view('list',array('list'=>$users));
    }
    public function del_user($id){
        $this->load->model("a");
        $rows=$this->a->del_list($id);
        if($rows > 0){
            redirect('We/user_list');
        }
    }
    public function update_user($id){
        $this->load->model("a");
        $result= $this->a->get_user_by_id($id);
        $this->load->view('update_user',array('user'=>$result));
    }

    public function update($id){
        $this->load->model("a");
        $name = $this->input->post('username');
        $rows = $this->a->update($id,$name);
        if($rows > 0){
            redirect('We/user_list');
        }
        else{
            echo '修改失败';
        }
    }
}
