<?php include "core/auth.php"?>
<?php include "template/header.php"?>
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
?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post List</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $current['title']; ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-info text-primary"></i>Post Detail
                    </h4>
                    <div class="">
                        <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary pb-0">
                            <i class="feather-plus-circle"></i>
                        </a>
                        <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary pb-0">
                            <i class="feather-list"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <h4>
                    <?php echo $current['title']; ?>
                </h4>
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
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-9">
                        <div class="card bg-secondary">
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
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-users text-primary"></i>Post Viewers
                    </h4>
                    <div class="">
                        <a href="#" class="btn btn-outline-secondary pb-0 full-screen-btn" >
                            <i class="a feather-maximize-2"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Who</th>
                        <th>Device</th>
                        <th>Viewed Time</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (viewerCountByPost($current["id"]) as $key=>$v){ ?>
                        <tr>

                            <td class="text-nowrap text-capitalize">
                                <?php
                                if ($v['user_id'] == 0){
                                    echo "guest";
                                }else{
                                    echo user($v['user_id'])['name'];
                                }
                                ?>
                            </td>
                            <td><?php echo $v['device']; ?></td>
                            <td class="text-nowrap"><?php echo showTime($v['created_at']); ?></td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<?php include "template/footer.php"; ?>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            responsive:true,
            order:[[0,"desc"]]
        });
    } );
</script>




