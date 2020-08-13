<style>
    .rr{
        margin-top: 10px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_slider_image_entry')?>" method="post" enctype="multipart/form-data">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                Add Images
                            </h4>
                            <div class="col-sm-6 text-right">
                                <a href="<?=base_url('admin/all_slider_image/')?>" class="btn btn-primary">All Images</a>

                            </div>
                        </div>
                        <div class="row rr">
                            <div class="col-md-8 col-md-offset-2" >
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="slider_image_id" id="slider_image_id">
                                <div class="form-group">
                                    <label>Image Alt:</label>
                                    <input type="text" class="form-control" name="alt" id="alt" value="<?php if(!empty($info)) echo $info->alt;?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Department</label>
                                    <select name="dept_id" class="form-control">
                                        <option value="0">-- Select Department --</option>
                                        <?php
                                        foreach ($all_dept as $key => $d) {
                                            ?>
                                            <option value="<?php echo $d['id'];?>"<?php if(!empty($info)){if($info->dept_id==$d['id']) echo 'selected';}?>>
                                                <?php echo $d['name'];?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Image:</label>
                                        <input type="file" class="form-control" name="slider_image" id="slider_image">
                                    </div>
                                    <div class="col-sm-6" id="image-holder">
                                        <?php if(!empty($info->image)):?>
                                            <img src="<?=base_url('assets/images/slider_image/').$info->image?>" width="200" height="100">
                                        <?php endif;?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row rr">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <?php if(!empty($info)) {
                                        echo "Update";
                                    }else{
                                        echo "Submit";
                                    }?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $("#slider_image").on('change', function () {

        //Get count of selected files
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "thumb-image",
                            "width":"100",
                            "height":"100"
                        }).appendTo(image_holder);
                    }

                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }

            } else {
                alert("This browser does not support FileReader.");
            }
        } else {
            alert("Pls select only images");
        }
    });


</script>