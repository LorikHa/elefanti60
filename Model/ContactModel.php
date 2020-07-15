<?php
class ContactModel {
  // Properties
  private $id;
  private $name;
  private $last_name;
  private $rateUs;
  private $comment;

  // Methods  
  
  function __construct($i,$n,$ln,$r,$c) {
    $this->id = $i;
    $this->name = $n;
    $this->last_name = $ln;
    $this->rateUs = $r;
    $this->comment = $c;
  }
  function get_id() {
    return $this->id;
  }

  function set_name($u) {
    $this->name = $u;
  }

  function get_name() {
    return $this->name;
  }

  function set_last_name($r) {
    $this->last_name = $r;
  }
  function get_last_name() {
    return $this->last_name;
  }

  function set_rateUs($p) {
    $this->rateUs = $p;
  }
  function get_rateUs() {
    return $this->rateUs;
  }

  function set_comment($p) {
    $this->comment = $p;
  }
  function get_comment() {
    return $this->comment;
  }

  public static function convertJSON($json){
    if(isset($json['id'])&&isset($json['name'])&&isset($json['last_name'])&&isset($json['rateUs'])&&isset($json['comment'])){
      $returnObj = new ContactModel($json['id'],$json['name'],$json['last_name'],$json['rateUs'],$json['comment']);
    }
    else{
      $returnObj = new ContactModel(-1,'empty','empty','empty','empty');
    }
    return $returnObj;
  }

}
?>
