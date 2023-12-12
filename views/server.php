<?php
$data = $_POST['data'];
$info = json_decode($data);
$data = json_encode($info);
echo $data;
?>