<?php
class UserModel {
  // Properties
  private $id;
  private $username;
  private $role;
  private $password;

  // Methods  
  
  function __construct($i,$u,$r,$p) {
    $this->id = $i;
    $this->username = $u;
    $this->role = $r;
    $this->password = $p;
  }

  function get_id() {
    return $this->id;
  }

  function set_username($u) {
    $this->username = $u;
  }

  function get_username() {
    return $this->username;
  }

  function set_role($r) {
    $this->role = $r;
  }
  function get_role() {
    return $this->role;
  }

  function set_password($p) {
    $this->password = $p;
  }
  function get_password() {
    return $this->password;
  }

  public static function convertJSON($json){
    if(isset($json['id'])&&isset($json['username'])&&isset($json['role'])&&isset($json['password'])){
      $returnObj = new UserModel($json['id'],$json['username'],$json['role'],$json['password']);
    }
    else{
      $returnObj = new UserModel(-1,'empty','empty','empty');
    }
    return $returnObj;
  }

}
?>
