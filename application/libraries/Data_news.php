<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_news {

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	public function getNews($newsName,$newsStatus,$start,$limit) {
	$url = 'http://localhost/kumparan_api/api/news/list/'.$start.'/'.$limit;
//Auth credentials
	$username = "admin";
	$password = "1234";
	$userData = array(
    'news_name' => $newsName,
    'status_name'=>$newsStatus
	);
//create a new cURL resource
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
	$result = curl_exec($ch);
//close cURL resource
	curl_close($ch);
	return $result;		
	}
public function postNews($title,$summary,$content,$status,$topic) {
	$url = 'http://localhost/kumparan_api/api/news/insert';
//Auth credentials
	$username = "admin";
	$password = "1234";
	$userData = array(
    'title' => $title,
    'summary'=>$summary,
    'content'=>$content,
    'status'=>$status,
    'topic'=>$topic

	);
//create a new cURL resource
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userData));
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
	$result = curl_exec($ch);
	$result = JSON_DECODE($result,TRUE);
	$result = $result['status'];
	if($result!=FALSE):
	return $result;	
else:
	return FALSE;
endif;

	curl_close($ch);	
	}	

	public function detailNews($id) {
	$url = 'http://localhost/kumparan_api/api/news/detail/'.$id;

//Auth credentials
$username = "admin";
$password = "1234";

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

$result = curl_exec($ch);
$result = JSON_DECODE($result,TRUE);

$status = $result['status'];
if($status!=FALSE):
	return $result;	
else:
	return FALSE;
endif;

//close cURL resource
curl_close($ch);	
	}	

public function getTag($id) {	
$url = 'http://localhost/kumparan_api/api/news/tag/'.$id;

//API key
//Auth credentials
$username = "admin";
$password = "1234";
//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

$result = curl_exec($ch);

$result = JSON_DECODE($result,TRUE);
$cek = $result['status'];


if($cek!=FALSE):
	return $result;	
else:
	return FALSE;
endif;

//close cURL resource
curl_close($ch);
	}





public function updateAerticle($artdata) {	
	$url = 'http://localhost/kumparan_api/api/news/article';

//API key
//Auth credentials
$username = "admin";
$password = "1234";
$userData = array(
    'id' => $artdata['id'],
    'title'=> $artdata['title'],
    'summary'=> $artdata['summary'],
    'content'=> $artdata['content'],
    'status'=> $artdata['status'],
    'topic'=>$artdata['topic']
);
//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userData));

$result = curl_exec($ch);
$result = JSON_DECODE($result,TRUE);
	$result = $result['status'];


if($result!=FALSE):
	return $result;	
else:
	return FALSE;
endif;

//close cURL resource
curl_close($ch);
	}





public function updateStatus($id,$status) {
	$url = 'http://localhost/kumparan_api/api/news/status/'.$status;

//API key
//Auth credentials
$username = "admin";
$password = "1234";
$userData = array(
    'id' => $id
);

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userData));

$result = curl_exec($ch);

$result = JSON_DECODE($result,TRUE);
	$result = $result['status'];

if($result!=FALSE):
	return $result;	
else:
	return FALSE;
endif;

//close cURL resource
curl_close($ch);
	}

	public function deleteData($id) {
	$url = 'http://localhost/kumparan_api/api/topic/item/'.$id;


//API key
//Auth credentials
$username = "admin";
$password = "1234";

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

$result = curl_exec($ch);

$result = JSON_DECODE($result,TRUE);
	$result = $result['status'];
if($result!=FALSE):
	return $result;	
else:
	return FALSE;
endif;

//close cURL resource
curl_close($ch);
	}			


}