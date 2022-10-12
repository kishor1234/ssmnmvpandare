
<?php
$limit = 10;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("newsletter", "id"); // . $main->whereSingle(array("isActive" => "0"));
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
        <h3 class="box-title">Subscription Email List</h3>
        
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
                            <select id="limit" name="limit" onchange="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VListofjob") . "&pg=" . $page . "&tk=0"; ?>', '#display', '1');">
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
        <br><br>
        <div class="form-group" id='adp'>
            <div class="col-lg-12" style="overflow: auto;">
                <table class="table table-hover table-responsive table-striped table-bordered">

                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>IP</th>
                        <th>Subscribe Date</th>
                     
                    </tr>
                    <?php
                    $sql = $main->select("newsletter", $_SESSION["db_1"]) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["ip"] . "</td>";
                        echo "<td>" . $row["isDate"] . "</td>";
                       echo "</tr>";
                    }
                    ?>
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
                        ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VSubList") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VSubList") . "&pg=" . $k . "&tk=0"; ?>', '#display', '1');"> <?php echo $k; ?></a></li><?php
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
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VSubList") . "&pg=" . $t . "&tk=0"; ?>', '#display', '1');">&raquo;</a></li><?php
                        }
                        ?>
                </ul>
            </div>
        </div>

    </div>
</div>


