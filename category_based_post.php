<?php include_once "front_panel/head.php"; ?>
<title>Home</title>
<?php include_once "front_panel/side_header.php"; ?>
<?php
if (isset($_GET['category_id'])){
    $category_id =$_GET['category_id'];
}else{
    linkTo("index.php");
}
if (!category($category_id)){
    linkTo("index.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb bg-white p-2 rounded mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo category($category_id)['title']; ?></li>

                </ol>
            </nav>
            <div class="">
                <?php foreach(fPostsBYCat($category_id) as $p){ ?>
                    <?php include "single.php"; ?>
                <?php  } ?>

            </div>
        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>
<?php include_once "front_panel/footer.php"; ?>




