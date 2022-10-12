
<?php
$limit = 10;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("hf_branch", "id"); // . $main->whereSingle(array("isActive" => "0"));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
$r = $result->fetch_assoc();
$max_count = $r["count(id)"];

$page = 1;
$offset = 0;

if (isset($_REQUEST["pg"])) {
    $page = $_REQUEST["pg"];
    $tempLimit = $limit;
    $tempLimit = $limit * $page;
    $offset = $tempLimit - $limit;
} else {
    $limit = $limit * $page;
    $offset = 0;
}
$i = 0;
//$sql = $main->update(array("rd" => "1"), "notification"); //. $this->whereSingle(array("tid" => $_REQUEST["id"]));
//$main->adminDB[$_SESSION["db_1"]]->query(($sql));
?>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List of Active Branch</h3>
        <a href="javascript:void(0)" onclick="openAjaxURL('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VNewBranchAdd") . "&tk=0"; ?>', '#main')" id="right" class="bnt btn-primary btn-sm"><i class="fa fa-plus"></i> ADD NEW</a>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td>
                            <strong>Select Record Per Page</strong>
                        </td>
                        <td>
                            <select id="limit" name="limit" onchange="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VLoanTypeTable") . "&pg=" . $page . "&tk=0"; ?>', '#display', '1');">
                                <option value="<?php echo $limit; ?>"><?php echo $limit; ?></option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-lg-6"> 
                <table style="width:100%;">
                    <tr>
                        <td>
                            <strong>Search</strong>
                        </td>
                        <td>
                            <input type="text" class="form-control" list="alluserlist"  name="keyword" id="keyword" placeholder="Search User by Name" onkeyup="SearchByNameBySelect('#keyword', '#alluserlist', '<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VBranchSearchTable") . "&tk=0"; ?>', '#adp')">

                        </td>
                    </tr>
                </table>
            </div>


        </div>
        <br><br>
        <div class="form-group" id='adp'>
            <div class="col-lg-12" style="overflow: auto;">
                <table class="table table-hover table-responsive table-striped table-bordered">

                    <tr>
                        <th>Branch Code</th>
                        <th>Branch Location</th>
                        <th>Address</th>
                        <th>Contact</th>
                        
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = $main->select("hf_branch", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
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

                </table>
            </div>

        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <?php
                $ct = ($limit + $offset);
                if ($ct > $max_count) {
                    $ct = $max_count;
                }
                ?>
                Showing Restul <?php echo $offset . " to " . $ct . " of " . $max_count . " entries"; ?>
            </div>
            <div class="col-lg-6">
                <ul class = "pagination pagination-sm" style="float: right;">
                    <?php
                    $i = 0;
                    $k = 1;
                    $fl = 0;
                    if ($k == $page) {
                        $t = $page - 1;
                        ?> <li class = 'disabled'><a href="#">&laquo;</a></li><?php
                    } else {
                        ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VListofBranches") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VListofBranches") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');"> <?php echo $k; ?></a></li><?php
                            }
                            $k++;
                            $i = $i + $limit;
                        }
                        $k--;
                        if ($fl == $k) {
                            $t = $page + 1;
                            ?> <li class = 'disabled'><a href="#">&raquo;</a></li><?php
                        } else {
                            $t = $page + 1;
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VListofBranches") . "&pg=" . $t . "&tk=0"; ?>', '#display', '1');">&raquo;</a></li><?php
                        }
                        ?>
                </ul>
            </div>
        </div>

    </div>
</div>


