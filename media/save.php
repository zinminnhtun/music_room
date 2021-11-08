<?php
echo "<pre>";
require_once "../core/base.php";
if (!con()){
    die("connection fail:".mysqli_connect_error());
}

$file = $_FILES["music_upload"];
$fileNameArr = $file["name"];
$fileTmpArr = $file["tmp_name"];
$saveFolder = "store/music/";
foreach ($fileNameArr as $key=>$fn){
    $newName = $saveFolder.$fn;
    $sql = "INSERT INTO posts (image_link) VALUES ('$newName')";
    if(move_uploaded_file($fileTmpArr[$key],$newName) && $query = mysqli_query(con(),$sql)){
        header("location:../multiple_image_upload.php");
    }
}
