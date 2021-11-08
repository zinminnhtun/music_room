<?php include "core/auth.php"?>
<?php include "template/header.php"?>
<link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/bootstrap/bootstrapv4.0.0-beta/css/bootstrap.min.css">

<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Post</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if (isset($_GET['id'])){
    $id =$_GET['id'];
    $current=post($id);
}else{
    linkTo("post_list.php");
}
if (!$current){
    linkTo("post_list.php");
}



if (isset($_POST['updatePost'])){
    $jpg = strpos($_FILES['image_upload']['name'][0],'.jpg');
    $png = strpos($_FILES['image_upload']['name'][0],'.png');
    $mp3 = strpos($_FILES['music_upload']['name'][0],'.mp3');
    $jpgpng =$_FILES['image_upload']['name'][0];
    $mp33 =$_FILES['music_upload']['name'][0];

    if ((($jpg == false && $png == false) && $jpgpng != "" ) || ($mp3 == false && $mp33 != "")){
        echo alert("သီချင်းထည့်ရမည့်နေရာ (သို့မဟုတ်) ပုံထည့်ရမည့်နေရာမှားနေတယ်");
    }else{
        if (postUpdate()){
            linkTo('post_list.php');
        }
    }


}
?>
<form class="row" method="post" enctype="multipart/form-data">
    <div class="col-12 col-xl-8">
        <div class="card mb-1 mb-lg-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle text-primary"></i>Update Post
                    </h4>
                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary pb-0">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="my-3">
                        <label for="">Song Name</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $current['title']; ?>" style="line-height: 1.7em;" required>
                    </div>
                    <?php include_once "music_image_edit.php"; ?>
                    <div class="my-0">
                        <label for="">Song Details</label>
                        <textarea name="description" rows="15" id="description" class="form-control"><?php echo html_entity_decode($current['description']); ?></textarea>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-layers text-primary"></i>Select Category
                    </h4>
                    <a href="<?php echo $url; ?>/category_add.php" class="btn btn-outline-primary pb-0">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                <div class="my-3">
                    <label for="">Select Category</label>

                    <?php
                    foreach (categories() as $key=>$c ){
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category_id" value="<?php echo $c['id']; ?>" id="flexRadioDefault<?php echo $c['id']; ?>" <?php echo $c['id'] == $current['category_id']?"checked":"" ?> required>
                            <label class="form-check-label" for="flexRadioDefault<?php echo $c['id']; ?>">
                                <?php echo $c['title']; ?>
                            </label>
                        </div>

                    <?php } ?>
                </div>
                <hr>
                <button class="btn btn-primary w-100" name="updatePost">Update Post</button>
            </div>
        </div>
    </div>
</form>
<?php include "template/footer.php"?>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/bootstrapv4.0.0-beta/js/bootstrap.min.js"></script>
<script>
    $("#description").summernote({
        placeholder : "hello bootstrap 4",
        tabsize : 2,
        height : 200
    });
</script>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>




