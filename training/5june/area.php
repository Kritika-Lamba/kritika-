<?php
class area {
  public $height;
  public $width;
  public $area;
  

  function __construct($height,$width) {
    $this->name = $height*$width; 
  }
  function get_area() {
    return $this->name;
  }
}

$areas = new area(5,10);
echo 'Area = ', $areas->get_area();
?>
 