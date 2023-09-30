<?php
require ('GetDataDetails.php');

if($_POST){
    $value = $_POST['record_value'];
    $type = $_POST['record_type'];
    $tid = $_POST['tid'];
    $time = time();
}
$sentdetail = new GetDataDetails($tid);
$back_url = 'https://s.awoz.co/class/comp1006/student_details?tid='.$tid;
if($sentdetail->set_record_details($type, $value, $time)) {
    header("location: $back_url");
}