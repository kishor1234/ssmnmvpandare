<table class="table table-hover table-responsive table-striped table-bordered">

    <tr>
        <th>Branch Code</th>
        <th>Branch Location</th>
        <th>Address</th>
        <th>Contact</th>
       
        <th>Action</th>
    </tr>
    <?php
    $sql = $main->select("hf_branch", $_SESSION["db_1"]) . $main->whereSingleLike(array("id" => $_POST["empid"])) . $main->limitWithOutOffset(10);
    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["blocation"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["contact"]; ?></td>
            
            <td><a href="javascript:void(0)" title="Edit Branch" data-toggle="modal" data-target="#updatebranch<?php echo $row["id"]; ?>" class="btn btn-default bnt-sm "><i class="fa fa-edit"></i> Edit</a><!-- Modal -->
                <div id="updatebranch<?php echo $row["id"]; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-edit"></i> Edit Branch Profile </h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button class="btn btn-danger btn-xs" id="" data-dismiss="modal" >&times;</button>

                                </div>
                            </div>

                            <form action="/?r=<?php echo $obj->encdata("C_UpdateBranch") ?>" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Branch Location(City name)<span>*</span></label>
                                        <input type="text" id="blocation" name="blocation" required value="<?php echo $row["blocation"]; ?>"  class="form-control" placeholder="Branch Location ex. Karmala" autocomplete="off" onkeypress="return onlyAlphabets(event, this);">
                                    </div>
                                    <div class="form-group">
                                        <label>Address <rq>*</rq></label>
                                        <textarea name="address" id="address" placeholder="Address" class="form-control" required="" style="height: 100px;">
                                            <?php echo $row["address"]; ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone No. with STD Code</label>
                                        <input type="text" id="contact" name="contact" maxlength="10" onkeypress="return isNumber(event)"  value="<?php echo $row["contact"]; ?>" class="form-control" placeholder="Pbone no with STD Code ex 022-20XXXXX " required="" autocomplete="off">
                                        <input type="hidden" id="id" name="id" value="<?php echo $row["id"]; ?>" required="">
                                    </div>
                                </div>   
                                <div class="box-footer">
                                    <div class="col-lg-4">
                                        <input type="submit" value="Update Branch" class="btn btn-primary form-control">
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>


                    <!--| <a href="javascript:void(0)" onclick="deleteBranch('<php echo $row["id"];?>','#display')" title="Delete Branch">Delete</a></td>
                --></tr>
        <?php
    }
    ?>
</table>