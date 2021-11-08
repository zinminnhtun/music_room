<?php require_once "core/auth.php"?>
<?php include "template/header.php"?>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('https://google.com')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-heart h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bold">
                            <span class="counter-up"><?php echo countTotal("viewers"); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Visitors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/post_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-list h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bold">
                            <span class="counter-up"><?php echo countTotal("posts"); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/category_add.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-layers h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bold">
                            <span class="counter-up"><?php echo countTotal("categories"); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/user_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-users h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bold">
                            <span class="counter-up"><?php echo countTotal("users"); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-7">
        <div class="card overflow-hidden shadow mb-4">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Visitors</h4>
                    <div class="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" class="ov-img rounded-circle" alt="">
                    </div>
                </div>


                <canvas id="ov" height="146"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-5">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Posts / Category</h4>
                    <div class="">
                        <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                    </div>
                </div>

                <canvas id="op" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card overflow-hidden mb-4">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0 font-weight-bold">Recent Posts</h4>
                    <div class="">
                        <?php
                        $postTotal = countTotal('posts');
                        $currentUserPostTotal = countTotal('posts',"user_id={$_SESSION['user']['id']}");
                        $currentUserPostPercentage = (($currentUserPostTotal/$postTotal)*100);
                        $finalPercentage = floor($currentUserPostPercentage)."%";
                        ?>
                        <small>Your Post : <?php echo $currentUserPostTotal; ?></small>
                        <div class="progress" style="width: 300px; height: 10px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $finalPercentage; ?>" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover">
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach (dashboardPosts('5') as $key=>$p){
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
<script src="<?php echo $url; ?>/assets/vendor/chart/chartv2.9.3.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/waypoints/imakewebthings-waypoints-34d9f6d/jquery.waypoints.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/counterup/counter.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>
<!--<script src="--><?php //echo $url; ?><!--/assets/js/dashboard.js"></script>-->

<script>
    $('.counter-up').counterUp({
        delay: 10,
        time: 1000
    });

    <?php
    $visitorRate = [];

    $dateArr = [];
    $today = date('Y-m-d');
    $date =date_create($today);
    for($i=0;$i<10;$i++){

        date_sub($date,date_interval_create_from_date_string("1 days"));
        $current = date_format($date,"Y-m-d");
        array_push($dateArr,$current);
        array_push($visitorRate,countTotal('viewers',"CAST(created_at AS DATE)='$current'"));

    }

    ?>

    let dateArr = <?php echo json_encode($dateArr) ;?>;
    let viewerCountArr = <?php echo json_encode($visitorRate) ;?>;
    dateArr.reverse();
    viewerCountArr.reverse();

    let ov = document.getElementById('ov').getContext('2d');
    let ovChart = new Chart(ov, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [
                // {
                //     label: 'Transition Count',
                //     data: transitionCountArr,
                //     backgroundColor: [
                //         '#007bff30',
                //     ],
                //     borderColor: [
                //         '#007bff',
                //     ],
                //     borderWidth: 1,
                //     tension:0
                // },
                {
                    label: 'Viewer Count',
                    data: viewerCountArr,
                    backgroundColor: [
                        '#28a74530',
                    ],
                    borderColor: [
                        '#28a745',
                    ],
                    borderWidth: 1,
                    tension:0
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    display:false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes:[
                    {
                        display:false,
                        gridLines:[
                            {
                                display:false
                            }
                        ]
                    }
                ]
            },
            legend:{
                display: true,
                shape:"circle",
                position: 'top',
                labels: {
                    fontColor: '#333',
                    usePointStyle:true
                }
            }
        }
    });

    <?php
    $countPostByCategory = [];
    $catNames = [];

    foreach (categories() as $c) {
        array_push($countPostByCategory,countTotal('posts',"category_id={$c['id']}"));
        array_push($catNames,$c['title']);
    }
    ?>

    let countArr = <?php echo json_encode($countPostByCategory,JSON_UNESCAPED_UNICODE); ?>;
    let catArr = <?php echo json_encode($catNames,JSON_UNESCAPED_UNICODE); ?>;

    let backgroundColorArr = ["#0d6efd33", "#6f42c133",  "#dc354533", "#fd7e1433", "#19875433", "#0dcaf033", "#343a4033", "#6c757d33", "#0dcaf033", "#dc354533", "#21252933"];
    let borderColorArr = ["#0d6efd", "#6f42c1", "#dc3545", "#fd7e14", "#198754", "#0dcaf0", "#343a40", "#6c757d", "#0dcaf0", "#dc3545", "#212529"];



    let op = document.getElementById('op').getContext('2d');
    let opChart = new Chart(op, {
        type: 'doughnut',
        data: {
            labels:catArr,
            datasets: [{
                label: '# of Votes',
                data:countArr,
                backgroundColor: backgroundColorArr,
                borderColor : borderColorArr,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display:false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [
                    {
                        display:false
                    }
                ]
            },
            legend:{
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#333',
                    usePointStyle:true
                }
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            responsive:true,
            order:[[0,"desc"]]
        });
    } );
</script>
