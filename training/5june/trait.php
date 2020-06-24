<?php
trait message1 {
  public function msg1() {
    echo "page  is loading with traits "; 
  }
}

class Welcome {
  use message1;
}

$obj = new Welcome();
$obj->msg1();
?>