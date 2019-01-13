<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_topic {

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	public function getTopic($topicName,$start,$limit) {
	$url = 'http://localhost/kumparan_api/api/topic/list/'.$start.'/'.$limit;
//Auth credentials
	$username = "admin";
	$password = "1234";
	$userData = array(
    'topic_name' => $topicName
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
public function postTopic($topicName) {
	$url = 'http://localhost/kumparan_api/api/topic/insert';
//Auth credentials
	$username = "admin";
	$password = "1234";
	$userData = array(
    'topic_name' => $topicName
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
	$result = JSON_DECODE($result,TRUE);
	$result = $result['status'];
	if($result!=FALSE):
	return $result;	
else:
	return FALSE;
endif;

	curl_close($ch);	
	}	

	public function detailTopic($id) {
	$url = 'http://localhost/kumparan_api/api/topic/detail/'.$id;

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


	return $result;	


//close cURL resource
curl_close($ch);	
	}	

public function updateData($topicName,$id) {
	$url = 'http://localhost/kumparan_api/api/topic/update';

//API key
//Auth credentials
$username = "admin";
$password = "1234";
$userData = array(
    'id' => $id,
    'topic_name' => $topicName
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