
</div>
</div>
</div>
</section>
<script src="<?php echo $url; ?>/assets/vendor/jQuery/jquery3.6.0.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/bootstrap-5.0.0-beta3-dist/js/popper.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/datatable/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/datatable/DataTables-1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/datatable/DataTables-1.10.25/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/summernote/summernote-bs4.min.js"></script>

<script>
  let currentPage = location.href;
  $(".menu-item-link").each(function () {
    let links = $(this).attr("href");
    if (currentPage == links){
        $(this).addClass("active")
    }
  })
</script>
</body>
</html>