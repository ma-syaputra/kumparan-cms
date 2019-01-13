<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('data_topic');
		
	}
public function index()
	{ 
		if(isset($_POST['searchTopic'])):
			$topicName = $this->input->post('searchTopic');
			$this->session->set_userdata('searchTopic',$topicName);
		elseif(isset($_SESSION['searchTopic'])):
			$topicName = $this->session->userdata('searchTopic');
		else:
			$topicName='';
		endif;
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'administrator/topic/index';
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;	
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;	
		$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$getData=$this->data_topic->getTopic($topicName,$data['page'],$config['per_page']);	
		$getData=JSON_DECODE($getData,TRUE);
		$config['total_rows'] = $getData['rowTopic'];
		$this->pagination->initialize($config);		
		$data  = array ('isi'			=> 'topic/list',
						'number'		=> $data['page'],
						'item'			=> $getData['contentTopic'],
						'pagination'	=> $this->pagination->create_links());
		
		$this->load->view('template/wrapper',$data);
		
	}
	public function add(){
		if(isset($_POST['submit'])):
			$topicName = $this->input->post('topic_name');
			$postData=$this->data_topic->postTopic($topicName);	
			if($postData!=FALSE):
				$this->session->set_flashdata('success', "Data Saved !");
			else:
				$this->session->set_flashdata('failed', "Data Not Save !");
			endif;
			redirect(base_url('administrator/topic'));
		else:
		$data  = array ('isi'			=> 'topic/add');
		endif;
		$this->load->view('template/wrapper',$data);

	}
	public function edit(){
			if(isset($_POST['submit'])):
				$id = $this->input->post('id');
				$topicName = $this->input->post('topic_name');
				$updateData=$this->data_topic->updateData($topicName,$id);	
				if($updateData!=FALSE):
					$this->session->set_flashdata('success', "Data Updated !");
				else:
					$this->session->set_flashdata('failed', "Data Not Updated !");
				endif;
				redirect(base_url('administrator/topic'));
			else:
				$id = $this->uri->segment(4);
				$detailData=$this->data_topic->detailTopic($id);	
				if($detailData==FALSE):
					redirect(base_url('administrator/topic'));
				endif;
				$data = array('id'=>$detailData['id'],
								'topic_name'=>$detailData['topic_name'],
								'isi'			=> 'topic/edit');
				$this->load->view('template/wrapper',$data);


			endif;

		

	}	
	public function delete($id){
		$deleteData=$this->data_topic->deleteData($id);	
		if($deleteData!=FALSE):
					$this->session->set_flashdata('success', "Data Deleted !");
				else:
					$this->session->set_flashdata('failed', "Data Not Deleted !");
				endif;
				redirect(base_url('administrator/topic'));		



	}
	public function resetTopic()
	{ 
		$this->session->unset_userdata('searchTopic');
		redirect(base_url('administrator/topic'));
	}

}