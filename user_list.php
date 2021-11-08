<?php include "core/auth.php"; ?>
<?php include "core/isAdmin.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        <i class="feather-users text-primary"></i>User List
                    </h4>
                    <a href="#" class="btn btn-outline-secondary pb-0 full-screen-btn" >
                        <i class="a feather-maximize-2"></i>
                    </a>
                </div>
                <hr>
                <table class="table table-striped table-hover my-3">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>role</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach (users() as $key=>$u){
                        ?>

                        <tr>
                            <td><?php echo $u['id']; ?></td>
                            <td><?php echo $u['name']; ?></td>
                            <td><?php echo $u['email']; ?></td>
                            <td><?php echo $role[$u['role']]; ?></td>
                            <td>
<!--                                <a href="post_delete.php?id=--><?php //echo $u['id']; ?><!--" onclick="return confirm('Are You Sure To Delete. 😊')" class="btn btn-outline-danger btn-sm"><i class="feather-trash-2 fa-fw"></i></a>-->
<!--                                <a href="post_edit.php?id=--><?php //echo $u['id']; ?><!--" class="btn btn-outline-warning btn-sm"><i class="feather-edit-2 fa-fw"></i></a>-->

                            </td>
                            <td><?php echo showTime($u['created_at'],"d-M-Y"); ?></td>
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
            order:[[0,"asc"]]
        });
    } );
</script>



