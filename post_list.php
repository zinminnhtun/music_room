<?php include "core/auth.php"?>
<?php include "template/header.php"?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_add.php">Add Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-list text-primary"></i>Post List
                    </h4>
                    <div class="">
                        <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary pb-0">
                            <i class="feather-plus-circle"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary pb-0 full-screen-btn" >
                            <i class="a feather-maximize-2"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table-striped table-hover my-3">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                    <?php
                        if($_SESSION['user']['role'] == 0){
                    ?>
                        <th>user</th>
                    <?php } ?>
                        <th>Viewer Count</th>
                        <th>Control</th>
                        <th>Created</th>
                        <th>Listen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach (posts() as $key=>$p){
                        ?>

                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo short($p['title']); ?></td>
                            <td><?php echo short(strip_tags(html_entity_decode($p['description']))); ?></td>
                            <td class="text-nowrap"><?php echo category($p['category_id'])['title']; ?></td>

                        <?php
                        if($_SESSION['user']['role'] == 0){
                        ?>
                            <td class="text-nowrap"><?php echo user($p['user_id'])['name']; ?></td>
                        <?php } ?>

                            <td>
                                <?php echo count(viewerCountByPost($p['id']));  ?>
                            </td>
                            <td class="text-nowrap">
                                <a href="post_detail.php?id=<?php echo $p['id']; ?>" class="btn btn-outline-info btn-sm"><i class="feather-info fa-fw"></i></a>
                                <a href="post_delete.php?id=<?php echo $p['id']; ?>" onclick="return confirm('Are You Sure To Delete. 😊')" class="btn btn-outline-danger btn-sm"><i class="feather-trash-2 fa-fw"></i></a>
                                <a href="post_edit.php?id=<?php echo $p['id']; ?>" class="btn btn-outline-warning btn-sm"><i class="feather-edit-2 fa-fw"></i></a>

                            </td>
                            <td class="text-nowrap"><?php echo showTime($p['created_at'],"d-M-Y"); ?></td>
                            <td><audio controls="" class="text-nowrap w-100">
                                    <source src="<?php echo $url;?>/<?php echo $p['music_link']; ?>" type="audio/mp3" >
                                </audio>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
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
            order:[[0,"desc"]]
        });
    } );
</script>




