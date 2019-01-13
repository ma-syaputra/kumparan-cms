<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_form extends CI_Model {
	public function __construct(){
		$this->load->database();

	}
	public function list_unit(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->order_by('id','ASC');
		$query= $this->db->get();
		return $query->result();
	}
public function list_service(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->order_by('id','ASC');
		$query= $this->db->get();
		return $query->result_array();
	}	

public function update_user($data,$id){
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}	

	public function update_servicetype($data,$id){
		$this->db->where('id',$id);
		$this->db->update('service_type',$data);
	}	

	
	public function delete_user($id){
		$this->db->where('id', $id);
  		$this->db->delete('users');
	}

	public function list_sub(){

		$this->db->select('service_type.id,service.service_name,service_type.id_service,service_type.service_typename');
		$this->db->from('service_type');
		$this->db->join('service','service.id=service_type.id_service');
		$this->db->order_by('service_type.id','ASC');
		$query= $this->db->get();
		return $query->result();	


	}


	public function list_service_type(){

		$this->db->select('service_type.id,service.service_name,service_type.id_service,service_type.service_typename');
		$this->db->from('service_type');
		$this->db->join('service','service.id=service_type.id_service');
		$this->db->order_by('service_type.id','ASC');
		$query= $this->db->get();
		return $query->result_array();	


	}
public function detail_servicetype($id){

		$this->db->select('service_type.id,service.service_name,service_type.id_service,service_type.service_typename');
		$this->db->from('service_type');
		$this->db->join('service','service.id=service_type.id_service');
		$this->db->where('service_type.id',$id);
		$query= $this->db->get();
		return $query->row_array();	


	}	

	public function save_servicetype($data){
		$this->db->insert('service_type',$data);
		return  $this->db->insert_id();
	}

public function save_service($data){
		$this->db->insert('service',$data);
		return  $this->db->insert_id();
	}

	public function save_data($data){
		$this->db->insert('form',$data);
		return  $this->db->insert_id();
	}
	
	public function list_admin($admin){
		$this->db->select('users.id,users.name,users.username,users.email,role.role_name');
		$this->db->from('users');
		$this->db->join('role','users.id_role=role.id');
		$this->db->where_in('users.id_role', $admin);
		$this->db->order_by('users.id','DESC');
		$query= $this->db->get();
		return $query->result_array();	
		
	}	
public function list_user($admin){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('role','users.id_role=role.id');
		$this->db->where_in('users.id_role', $admin);
		$this->db->order_by('users.id','DESC');
		$query= $this->db->get();
		return $query->result_array();	
		
	}		

public function list_role($not){
		$this->db->select('*');
		$this->db->from('role');
		$this->db->where_not_in('role.id', $not);
		$query= $this->db->get();
		return $query->result_array();	
		
	}	
public function save_user($data){
		$this->db->insert('users',$data);
		return  $this->db->insert_id();
	}	

	public function check_user($username){
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query= $this->db->get();
		return $query->result_array();	
		
	}	


	public function detail_user($id){
		$this->db->select('users.id,users.name,users.username,users.email,role.role_name,users.id_role');
		$this->db->from('users');
		$this->db->join('role','users.id_role=role.id');
		$this->db->where('users.id', $id);
		$query= $this->db->get();
		return $query->row_array();	
		
	}	

public function detail_service($id){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('id', $id);
		$query= $this->db->get();
		return $query->row_array();	
		
	}		

public function update_service($data,$id){
		$this->db->where('id',$id);
		$this->db->update('service',$data);
	}		

public function delete_service($id){
		$this->db->where('id', $id);
  		$this->db->delete('service');
	}		
	public function delete_servicetype($id){
		$this->db->where('id', $id);
  		$this->db->delete('service_type');
	}	
	
	public function update_pass($data,$id){
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
	public function count_allstaff(){
		$this->db->select('id');
		$this->db->from('form');
		$query= $this->db->get();
		return $query->num_rows();
	}	
	public function get_user($id_user){
	 $query = $this->db->get_where('users',array('id' => $id_user));
	 return $query->row();
	}



}