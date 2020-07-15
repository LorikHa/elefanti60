<?php
class AboutModel {
  // Properties
  private $image;
  private $title;
  private $text;

  // Methods  
  
  function __construct($im,$t,$txt) {
    $this->image = $im;
    $this->title = $t;
    $this->text = $txt;
  }

  function set_image($u) {
    $this->image = $u;
  }

  function get_image() {
    return $this->image;
  }

  function set_title($r) {
    $this->title = $r;
  }
  function get_title() {
    return $this->title;
  }

  function set_text($p) {
    $this->text = $p;
  }
  function get_text() {
    return $this->text;
  }

  public static function convertJSON($json){
    if(isset($json['image'])&&isset($json['title'])&&isset($json['text'])){
      $returnObj = new AboutModel($json['image'],$json['title'],$json['text']);
    }
    else{
      $returnObj = new AboutModel('empty','empty','empty');
    }
    return $returnObj;
  }

}
?>
