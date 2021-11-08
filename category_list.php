<table class="table my-3">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>user</th>
        <th>Control</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (categories() as $key=>$c){
        ?>
        <tr class="<?php echo $c['ordering'] == 1 ? 'table-secondary':''; ?>">
            <td><?php echo $c['id']; ?></td>
            <td><?php echo $c['title']; ?></td>
            <td><?php echo user($c['user_id'])['name']; ?></td>
            <td>
                <a href="category_delete.php?id=<?php echo $c['id']; ?>" onclick="return confirm('Are You Sure To Delete. 😊')" class="btn btn-outline-danger btn-sm"><i class="feather-trash-2 fa-fw"></i></a>
                <a href="category_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm"><i class="feather-edit-2 fa-fw"></i></a>
                <?php if ($c['ordering'] != 1){ ?>
                <a href="category_pin_to_top.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm"><i class="feather-upload fa-fw"></i></a>
                <?php }else{ ?>
                    <a href="category_remove_pin.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm"><i class="feather-arrow-down fa-fw"></i></a>
                <?php } ?>
            </td>
            <td><?php echo showTime($c['created_at'],"d-M-Y"); ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
