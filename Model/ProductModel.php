<?php
class ProductModel {
  // Properties
  private $id;
  private $name;
  private $price;
  private $category;
  private $nostock;
  private $image;

  // Methods  
  
  function __construct($i,$n,$p,$c,$ns,$im) {
    $this->id = $i;
    $this->name = $n;
    $this->price = $p;
    $this->category = $c;
    $this->nostock = $ns;
    $this->image = $im;
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

  function set_price($p) {
    $this->price = $p;
  }
  function get_price() {
    return $this->price;
  }

  function set_category($c) {
    $this->category = $c;
  }
  function get_category() {
    return $this->category;
  }

  function set_nostock($ns) {
    $this->nostock = $ns;
  }
  function get_nostock() {
    return $this->nostock;
  }

  function set_image($im) {
    $this->image = $im;
  }
  function get_image() {
    return $this->image;
  }

  public static function convertJSON($json){
    if(isset($json['id'])&&isset($json['name'])&&isset($json['price'])&&isset($json['category'])&&isset($json['number_in_stock'])&&isset($json['photo'])){
      $returnObj = new ProductModel($json['id'],$json['name'],$json['price'],$json['category'],$json['number_in_stock'],$json['photo']);
    }
    else{
      $returnObj = new ProductModel(-1,'empty','empty','empty','empty','empty');
    }
    return $returnObj;
  }

}
?>
