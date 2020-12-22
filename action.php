<?php
require_once 'ViewExam.php';

$view=new ViewExam();

$name=$_POST['name'];
switch($name) {
case 'Question':
    $offset=$_POST['offset'];
    $data=$view->viewExam($offset);
    echo $data;
    break;  
}

?>