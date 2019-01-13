<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News
 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('data_news');
		
	}
public function index()
	{ 
		if(isset($_POST['searchNews']) && isset($_POST['searchStatusNews'])):
			$newsName = $this->input->post('searchNews');
			$newsStatus = $this->input->post('searchStatusNews');
			$this->session->set_userdata('searchNews',$newsName);
			$this->session->set_userdata('searchStatusNews',$newsStatus);
		elseif(isset($_SESSION['searchNews']) && isset($_SESSION['searchStatusNews']) ):
			$newsName = $this->session->userdata('searchNews');
			$newsStatus = $this->session->userdata('searchStatusNews');			
		else:
			$newsName='';
			$newsStatus='';
		endif;

		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'administrator/news/index';
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;	
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;	
		$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$getData=$this->data_news->getNews($newsName,$newsStatus,$data['page'],$config['per_page']);
		$getData=JSON_DECODE($getData,TRUE);
		$config['total_rows'] = $getData['rowNews'];
		$this->pagination->initialize($config);		
		$data  = array ('isi'			=> 'news/list',
						'number'		=> $data['page'],
						'item'			=> $getData['listNews'],
						'pagination'	=> $this->pagination->create_links());
		
		$this->load->view('template/wrapper',$data);
		
	}
	public function add(){
		$this->load->library('data_topic');
		if(isset($_POST['submit'])):
		$title 			= trim($this->input->post('title'));
        $summary 		= trim($this->input->post('summary'));
        $content 		= trim($this->input->post('content'));
        $status     	= 'draft';
        $topic 	    	= $this->input->post('topic');       	
			$postData=$this->data_news->postNews($title,$summary,$content,$status,$topic);	
			
			if($postData!=FALSE):
				$this->session->set_flashdata('success', "Data Saved !");
			else:
				$this->session->set_flashdata('failed', "Data Not Save !");
			endif;
			redirect(base_url('administrator/topic'));
		else:
		$id=0;
		$detailTopic=$this->data_topic->detailTopic($id);	
		$data  = array ('isi'			=> 'news/add',
						'item'			=> $detailTopic);
		endif;
		$this->load->view('template/wrapper',$data);

	}
	public function edit(){
		$this->load->library('data_topic');
			if(isset($_POST['submit'])):
				$artdata['id'] 		= $this->input->post('id');
				$artdata['title'] 		= trim($this->input->post('title'));
        		$artdata['summary'] 	= trim($this->input->post('summary'));
        		$artdata['content'] 	= trim($this->input->post('content'));
       	 		$artdata['status']     = trim($this->input->post('status'));				
				$artdata['topic'] 		= $this->input->post('topic');
				$updateData=$this->data_news->updateAerticle($artdata);	
				if($updateData!=FALSE):
					$this->session->set_flashdata('success', "Data Updated !");
				else:
					$this->session->set_flashdata('failed', "Data Not Updated !");
				endif;
				redirect(base_url('administrator/news'));
			else:
				$id =$this->uri->segment(4);
				$idTopic=0;
				$detailData=$this->data_news->detailNews($id);
				$detailTopic=$this->data_topic->detailTopic($idTopic);	
				$data  = array ('isi'			=> 'news/edit',
						'id'		=>$id,
						'item'			=> $detailData,
						'topic'		=> $detailTopic);
				$this->load->view('template/wrapper',$data);
			endif;	
	}	

	public function status($id,$status){
		$updateStatus=$this->data_news->updateStatus($id,$status);	
		if($updateStatus!=FALSE):
					$this->session->set_flashdata('success', "Data Deleted !");
				else:
					$this->session->set_flashdata('failed', "Data Not Deleted !");
				endif;
				redirect(base_url('administrator/news'));		
	}

public function view($id)
	{ 
		$detailData=$this->data_news->detailNews($id);

		$data  = array ('isi'			=> 'news/view',
						'item'			=> $detailData);
		$this->load->view('template/wrapper',$data);

	}	

	public function resetNews()
	{ 
		$this->session->unset_userdata('searchNews');
		$this->session->unset_userdata('searchStatusNews');
		redirect(base_url('administrator/news'));
	}

}