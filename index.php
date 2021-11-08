<?php
session_start();
?>
<?php include_once "front_panel/head.php"; ?>
<title>Music_Room</title>
<?php include_once "front_panel/side_header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="position-relative">
                <ol class="breadcrumb bg-white p-2 rounded mb-3">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
                <div class="dropdown sort_by_date">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="feather-calendar"></i> Sort
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="?order_col=created_at&order_type=desc">
                                <i class="feather-arrow-down-circle"></i>Newest To Oldest </a></li>
                        <li><a class="dropdown-item" href="?order_col=created_at&order_type=asc">
                                <i class="feather-arrow-up-circle"></i>Oldest To Newest</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url; ?>/index.php">
                                <i class="feather-list"></i>Default</a></li>
                    </ul>
                </div>
            </nav>
            <div class="">

                <?php
                if ($_GET){
                    $orderCol = $_GET['order_col'];
                    $orderType = strtoupper($_GET['order_type']);
                }else{
                    $orderCol = "id";
                    $orderType = "DESC";
                }
                foreach (fPosts($orderCol,$orderType) as $p){
                    ?>
                    <?php include "single.php"; ?>
                <?php  } ?>

            </div>
        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>
<?php include_once "front_panel/footer.php"; ?>









