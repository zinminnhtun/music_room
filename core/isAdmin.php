<?php
if($_SESSION['user']['role'] != 0){
    echo "<script>location.href='dashboard.php'</script>";
}
