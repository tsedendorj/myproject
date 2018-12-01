<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newsn_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


function add_new_category($c){
  global $conn;
  $sql = "insert into category(name) values('{$c}') ";
  $conn->query($sql);
}

function get_all_category(){
  global $conn;
  
  $sql = "select * from category";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;
}

function delete_item($id){
  global $conn;
  $sql = "delete from category where id='{$id}' ";
  $conn->query($sql);
}

function add_new_post($c, $t, $d, $a, $i){
  global $conn;
  
  $t = $conn->real_escape_string($t);
  $d = $conn->real_escape_string($d);
  $a = $conn->real_escape_string($a);
  
  $sql = "insert into news(category, title, description, image, content, created_at, created_by) values('{$c}','{$t}','{$d}','{$i}','{$a}', NOW(),'1')";
  
  $conn->query($sql);
  
}

function upload_file($tmp_name, $real_name){
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($real_name);
  
  if( move_uploaded_file($tmp_name, $target_file) ){
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}


function get_one_post($id){
  global $conn;
  
  $sql = "select * from news where id='{$id}' ";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;
}

function delete_file($id, $file){
  global $conn;
  
  $sql = "update news set image = NULL where id='{$id}' ";
  $conn->query($sql);
  
  $target_dir = "uploads/";
  $target_file = $target_dir . $file;
  
  chmod($target_file, 0777);
  unlink($target_file);
}


function update_post($id, $c, $t, $d, $a, $i){
  global $conn;
  
  $t = $conn->real_escape_string($t);
  $d = $conn->real_escape_string($d);
  $a = $conn->real_escape_string($a);
  
  $sql = "UPDATE news SET 
  category='{$c}',
  title='{$t}',
  description='{$d}',
  image='{$i}',
  content='{$a}',
  edited_at=NOW()
  WHERE id='{$id}' ";
  
  $conn->query($sql);
}

function get_all_post(){
  global $conn;
  
  $sql = "select * from news ORDER BY created_at DESC";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;
}


function delete_news($id){
  global $conn;
  $sql = "delete from news where id='{$id}' ";
  $conn->query($sql);
}

function add_new_member($dn, $un, $ps, $rl){
  global $conn;
  
  $dn = $conn->real_escape_string($dn);
  $un = $conn->real_escape_string($un);
  $ps = $conn->real_escape_string($ps);
  
  $ps = md5($ps);
  
  $sql = "INSERT INTO members(display_name,username,password,role) 
  VALUES('{$dn}','{$un}','{$ps}','{$rl}') ";
  
  $conn->query($sql);
}

function get_members(){
  global $conn;
  
  $sql = "select * from members";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;
}

function check_user($u, $p){
  global $conn;
  
  $u = $conn->real_escape_string($u);
  $p = $conn->real_escape_string($p);
  $p = md5($p);
  
  $sql = "SELECT * FROM members WHERE username='{$u}' AND password='{$p}' ";
//  $result=$conn->query($sql);
//  
//  if($result->num_rows>0){
//    $aa = true;
//  }else{
//    $aa = false;
//  }
//  return $aa;
  
  $conn->query($sql);
  return ($conn->affected_rows==1) ? true:false;
}

function get_user_info($u, $p){
  global $conn;
  
  $u = $conn->real_escape_string($u);
  $p = $conn->real_escape_string($p);
  $p = md5($p);
  
  $sql = "select * from members where username='{$u}' and password='{$p}' ";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;
}

function get_news_with_category($id){
    
  global $conn;
  
  $sql = "select * from news where category='{$id}' order by created_at desc ";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;  
}

function get_category_name($id){
  global $conn;
  
  $sql = "select name from category where id='{$id}' ";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;   
    
}


function get_mostreached(){
    global $conn;
  
  $sql = "select from news order by view count desc ";
  $result = $conn->query($sql);
  
  $list = array();
  while( $row = $result->fetch_assoc() ){
    $list[] = $row;
  }
  return $list;   
}
    

?>