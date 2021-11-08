<?php
function con()
{
    return mysqli_connect('localhost', "admin", "123456", "music_room");
//    return mysqli_connect('sql203.epizy.com',"epiz_27640076","eCXfUlyYmNDYcEO","epiz_27640076_music_room");
}

$info = array(
    "name" => "Sample Blog",
    "short"=> "SB",
    "description" => "ကျောင်းသားများအတွက် Sample Project"
);

$role = ['admin','editor','user'];

$url = "http://{$_SERVER["HTTP_HOST"]}";
//$url = "http://zinminnhtun.epizy.com";

date_default_timezone_set('Asia/Yangon');
