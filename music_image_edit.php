<?php
//print_r($_FILES['music_upload']['name'][0]);
?>
<div class="mb-3">
    <label for="" class="text-warning">သီချင်းကို ပြောင်းရန်</label>
    <div class="d-flex justify-content-between">
        <input type="file" name="music_upload[]" accept="audio/*" class="form-control text-warning" >
        <!--                            <button class="btn btn-primary ml-3" name="upload_music">Upload</button>-->
    </div>
</div>
<div class="mb-3">
    <label for="" class="text-info">သီချင်းစာသားပြောင်းရန်</label>
    <div class="d-flex justify-content-between">
        <input type="file" name="image_upload[]" accept="image/*,image/jpeg,image/png" class="form-control text-info">
        <!--                            <button class="btn btn-primary ml-3" name="upload_image">Upload</button>-->
    </div>
</div>