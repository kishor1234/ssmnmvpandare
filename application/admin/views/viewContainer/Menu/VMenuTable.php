
<?php
$limit = 10;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("menu", "id"); // . $main->whereSingle(array("isActive" => "0"));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
$r = $result->fetch_assoc();
$max_count = $r["count(id)"];

$page = 1;
$offset = 0;

if (isset($pg)) {
    $page = $pg;
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
        <h3 class="box-title">Menu List's</h3>
        <a href="javascript:void(0)" data-toggle="modal" data-target="#newMenu" id="right" class="bnt btn-primary btn-sm"><i class="fa fa-plus"></i> ADD NEW</a>
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

            </div>


        </div>

        <div class="form-group" id='adp'>
            <div class="col-lg-12" style="overflow: auto;">
                <table class="table table-hover table-responsive table-striped table-bordered">

                    <tr>
                        <th>ID</th>
                        <th>POST_ID</th>
                        <th>TITLE</th>
                        <th>MENU</th>
                        <th>CONTROLLER</th>
                        <th>MODAL</th>
                        <th>VIEW</th>
                        <th>PARENT</th>
                        <th>POSITION</th>
                        <th>DATE</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                    $sql = $main->select("menu", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["postid"]; ?></td>
                            <td><?php echo $row["title"]; ?></td>
                            <td><?php echo $row["mtitle"]; ?></td>
                            <td><?php echo $row["controller"]; ?></td>
                            <td><?php echo $row["modal"]; ?></td>
                            <td><?php echo $row["view"]; ?></td>
                            <td><?php echo $row["parent"]; ?></td>
                            <td><?php echo $row["position"]; ?></td>
                            <td><?php echo $row["onCreate"]; ?></td>

                            <td>
                                <a href="#" class="btn btn-danger btn-xs" title="Delete" onclick="return deleteMenu('<?=$row["id"]?>')"><i class="fa fa-trash"></i></a>
                                <a href="#" class="btn btn-primary btn-xs" title="Edit" data-toggle="modal" data-target="#newMenu" onclick="return view('<?=$row["id"]?>')"><i class="fa fa-edit"></i></a>
                                <?php
                                if ($row["active"]) {
                                    ?>
                                <a href="#" class="btn btn-default btn-xs" title="Click to Un-Publish" onclick="return unpublish('<?=$row["id"]?>')"><i class="fa fa-check-circle" style="color:green;"></i></a>
                                    <?php
                                } else {
                                    ?>
                                <a href="#" class="btn btn-default btn-xs" title="Click to Publish" onclick="return publish('<?=$row["id"]?>')"><i class="fa fa-close" style="color:red"></i></a>
                                    <?php
                                }
                                ?>
                            </td>

                        </tr>
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
                        ?> <li class = 'disabled'><a href="javascript:void(0)">&laquo;</a></li><?php
                    } else {
                        $t = $page - 1;
                        ?> <li><a href = 'javascript:void(0)' onclick="return loadTable('<?php echo  $t ?>');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="javascript:void(0)"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return loadTable('<?php echo  $k ?>')"> <?php echo $k; ?></a></li><?php
                            }
                            $k++;
                            $i = $i + $limit;
                        }
                        $k--;
                        if ($fl == $k) {
                            $t = $page + 1;
                            ?> <li class = 'disabled'><a href="javascript:void(0)">&raquo;</a></li><?php
                        } else {
                            $t = $page + 1;
                            ?> <li><a href = 'javascript:void(0)' onclick="return loadTable('<?php echo  $t ?>')">&raquo;</a></li><?php
                        }
                        ?>
                </ul>
            </div>
        </div>

    </div>
</div>
