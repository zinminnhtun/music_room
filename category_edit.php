<?php require_once "core/auth.php"?>
<?php require_once "core/isEditor&Admin.php" ?>
<?php include "template/header.php"?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-layers text-primary"></i>Category Manager
                    </h4>
                </div>
                <hr>
                <?php
                if (isset($_GET['id'])){
                    $id =$_GET['id'];
                    $current = category($id);
                }else{
                    linkTo("category_add.php");
                }
                if (!$current){
                    linkTo("category_add.php");
                }



                if (isset($_POST['updateCat'])){
                    if (categoryUpdate()){
                        linkTo('category_add.php');
                    };
                }
                ?>
                <form method="post">
                    <div class="form-inline">
                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                        <input type="text" name="title" class="form-control d-inline w-auto" value="<?php echo $current['title'];?>">
                        <button class="btn btn-primary mx-3" name="updateCat">Update Category</button>
                    </div>
                </form>
                <hr>
                <?php include "category_list.php"; ?>
            </div>
        </div>
    </div>
</div>
<?php include "template/footer.php"?>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            responsive:true,
            order:[[0,"asc"]]
        });
    } );
</script>





