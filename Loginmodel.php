<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loginmodel extends CI_Model{

	function __construct()
	{
		  parent::__construct();
		  $this->load->database();
	}

  function user_signup_detail($data) //This function is used for adminlogin
	{  
      $this->db->insert('user',$data);
      return $this->db->insert_id();
  }

  function checkuser($email)
  {
      $sql = "SELECT * from user where email='$email'";
      $res = $this->db->query($sql);
      $resArr = $res->row_array();
      return $resArr;
  }

  function checkuserlogin($email,$password)
  {
      $sql = "SELECT * from user where email='$email' and password='$password'";
      $res = $this->db->query($sql);
      $resArr = $res->row_array();
      return $resArr;
  }

  function getAllMessage()
  {
      $sql = "SELECT * from user join message on user.user_id=message.user_id order by message.created_date asc";
      $res = $this->db->query($sql);
      $resArr = $res->result_array();
      return $resArr;
  }

  function save_message($data)
  {
      $this->db->insert('message',$data);
      return $this->db->insert_id();   
  }

  function getAllUsers($user_id)
  {
      $sql = "SELECT * from user WHERE user_id !='$user_id'";
      $res = $this->db->query($sql);
      $resArr = $res->result_array();
      return $resArr;
  }

  function getUserInfo($user_id)
  {
      $sql = "SELECT * from user where user_id='$user_id'";
      $res = $this->db->query($sql);
      $resArr = $res->row_array();
      return $resArr;
  }

  function getUsertoUserChat($sender_id,$user_id)
  {
      $sql = "SELECT * from user join message on user.user_id=message.user_id where (message.sender_id='$sender_id' and message.user_id='$user_id') || (message.sender_id='$user_id' and message.user_id='$sender_id') order by message.created_date asc";
      $res = $this->db->query($sql);
      $resArr = $res->result_array();
      return $resArr;   
  }

  function save_chat_message($data)
  {
      $this->db->insert('message',$data);
      return $this->db->insert_id();   
  }

  
  function getUsertoUserSingleChat($msg_id)
  {
      $sql = "SELECT * from user join message on user.user_id=message.user_id where msg_id='$msg_id' order by message.created_date asc";
      $res = $this->db->query($sql);
      $resArr = $res->row_array();
      return $resArr;   
  }  




}
?>