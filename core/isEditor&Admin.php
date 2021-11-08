<?php
if($_SESSION['user']['role'] > 1){
    echo "<script>location.href='dashboard.php'</script>";
}