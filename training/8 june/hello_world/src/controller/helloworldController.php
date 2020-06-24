<?php
namespace Drupal\hello_world\Controller;

class helloworldController
{
public function content($user)
    {
$users=array('1'=>
array('id'=>1,'candidatename'=>'abc'),
'2'=>array('id'=>2,'candidatename'=>'lmn'),
'3'=>array('id'=>3,'candidatename'=>'lkh')
        );


if(in_array($user, $users[$user]))
    {
      return array(
      '#theme'=>'user_list',
      '#users'=>$users[$user],
      '#title'=>$users[$user]['candidatename']
        );
    }
    }
}

?>

