<?php
Interface MyInterface {
      public function addition(int $a, int $b);
      public function subtraction(int $a, int $b);
      public function multiplication(int $a, int $b);
      public function division(int $a, int $b);
   }
class MyClass implements MyInterface{
    public function addition(int $a, int $b) {
        return $a + $b;
    }
    public function subtraction(int $a, int $b){
        return $a - $b;
    }
    public function multiplication(int $a, int $b){
        return $a * $b;
  }
  public function division(int $a, int $b){
        return $a / $b;
}
 }
$obj = new MyClass; 
echo "addition of two no is \n",$obj->addition(5,5); 
echo "\nsubtraction of two no is \n",$obj->subtraction(8,4); 
echo "\nmultiplaction of two no is\n ",$obj->multiplication(9,6); 
echo "\ndivision of two no is \n",$obj->division(8,2); 
?>