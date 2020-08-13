<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_dept_head_speech_entry')?>" method="post">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">Entry</h4>
                            <div class="col-sm-6 text-right">
                                <a href="<?=base_url('admin/all_dept_head_speech')?>" class="btn btn-primary">All</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2" >
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="dept_head_speech_id" id="dept_head_speech_id">
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
                                    <label>Description:</label>
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter Text"
                                              name="description" id="description" required><?php if(!empty($info)) echo $info->description;?></textarea>
                                </div>
                            </div>
                        </div>
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
                </form>
            </div>
        </div>
    </div>
</div>