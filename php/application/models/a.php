<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/1/11
 * Time: 上午10:40
 */
class a extends CI_Model
{

    public function add($name){
        $this->db->insert('a',array(
            'uname'=>$name
        ));
        return $this->db->affected_rows();
    }
    public function user_list(){
        $query = $this -> db -> get_where("a",array('uname'));
        return $query->result();
    }
    public function del_list($id){
         $this -> db -> delete("a",array('uid'=>$id));
        return $this->db->affected_rows();
    }
    public function update($id,$name){
        $this->db->where('uid', $id);
        $this->db->update('a', array(
            "uname" => $name,
        ));
        return $this->db->affected_rows();
    }
    public function get_user_by_id($id){
        $query = $this->db->get_where('a', array('uid' => $id));
        return $query->row();
    }

}
