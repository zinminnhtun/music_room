<?php
$id = $_GET['id'];
require_once "../core/base.php";
function Deletephoto($id){
    $sql1 = "SELECT * FROM posts WHERE id = $id";
    $query = mysqli_query(con(),$sql1);
    $row = mysqli_fetch_assoc($query);
    $photoLink = $row['image_link'];
    $sql = "DELETE FROM posts where id = $id";
    if (mysqli_query(con(),$sql)  && unlink($photoLink)){
        header('location:../multiple_image_upload.php');
    }else{
        die("Delete fail:".mysqli_error());
    }
}
Deletephoto($id);