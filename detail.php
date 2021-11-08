<?php session_start(); ?>
<?php include_once "front_panel/head.php"; ?>
<title>Home</title>
<?php include_once "front_panel/side_header.php"; ?>
<?php
if (isset($_GET['id'])){
    $id =$_GET['id'];
    $current=post($id);
}else{
    linkTo("index.php");
}
if (!$current){
    linkTo("index.php");
}
$currentCat =$current['category_id'];
$currentPostId =$current['id'];

if (isset($_SESSION['user']['id'])){
    $userId = $_SESSION['user']['id'];
}else{
    $userId = 0;
}

viewerRecord($userId,$current['id'],$_SERVER['HTTP_USER_AGENT']);
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb bg-white p-2 rounded mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post Detail</li>
                </ol>
            </nav>
            <div class="card mb-4">
                <div class="card-body mb-0"
                    <div class="">
                       <div class="d-flex justify-content-between align-items-center">
                           <h4>
                               <?php echo $current['title']; ?>
                           </h4>
                           <a href="#" class="btn btn-outline-secondary pb-0 full-screen-btn" >
                               <i class="a feather-maximize-2"></i>
                           </a>
                       </div>
                        <div class="my-3">
                            <i class="feather-user text-primary"></i>
                            <?php echo user($current['user_id'])['name'];  ?>
                            <i class="feather-layers text-success"></i>
                            <?php echo category($current['category_id'])['title'];  ?>
                            <i class="feather-calendar text-danger"></i>
                            <?php echo showTime($current['created_at'],'j M Y'); ?>
                        </div>
                        <div>
                            <?php echo html_entity_decode($current['description'],ENT_QUOTES); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="card bg-secondary mx-1 mb-1">
                                <div class="card-body">
                                    <audio controls="" class="w-100">
                                        <source src="<?php echo $url;?>/<?php echo $current['music_link']; ?>" type="audio/mp3" >
                                    </audio>
                                    <img src="<?php echo $url;?>/<?php echo $current['image_link']; ?>" class="w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <?php foreach (fPostsBYCat($currentCat,4,$currentPostId) as $p){?>
                    <div class="col-12 col-md-6">
                        <div class="card shadow-sm mb-4 post">
                            <div class="card-body">
                                <a href="detail.php?id=<?php echo $p['id']; ?>" class="text-primary">
                                    <h4> <?php echo $p['title']; ?></h4>
                                </a>
                                <div class="my-3">
                                    <i class="feather-user text-primary"></i>
                                    <?php echo user($p['user_id'])['name'];  ?>
                                    <i class="feather-layers text-success"></i>
                                    <?php echo category($p['category_id'])['title'];  ?>
                                    <i class="feather-calendar text-danger"></i>
                                    <?php echo showTime($p['created_at'],'j M Y'); ?>
                                </div>
                                <p class="text-black-50">
                                    <?php echo short(strip_tags(html_entity_decode($p['description'])),200); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
        <?php require_once "right_sidebar.php"?>
    </div>
</div>
<?php include_once "front_panel/footer.php"; ?>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>




