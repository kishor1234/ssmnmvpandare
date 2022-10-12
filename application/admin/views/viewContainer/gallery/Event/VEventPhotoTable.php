<?php

echo '<table class="table table-bordered"><tr><th>#</th><th>Title</th><th>Date</th><th>Images</th><th>Action</th></tr>';
            $sql=$main->select("events",$_SESSION["db_1"]).$main->whereSingle(array("title"=>$title));
            $rs=$main->adminDB[$_SESSION["db_1"]]->query($sql);
            while ($row = $rs->fetch_assoc()) {
            ?><tr><td style='padding-top: 40px;'><?php echo $row["id"]; ?></td>
                  <td style='padding-top: 40px;'><?php echo $row["title"]; ?></td>
                  <td style='padding-top: 40px;'><?php echo $row["dates"]; ?></td>
                  <td style="width: 200px;height: 100px; margin: 1px;"><img class="img-responsive lazy" src="logo.gif" data-src='<?php echo $row["url"]; ?>' alt="" style="height: 100px; margin: 1px;" /></td>
                  <td style='padding-top: 40px;'><a href="javascript:void(0)" onclick='postURL("<?php echo $obj->encdata("C_DeleteEventPhoto");?>","#mg1","<?php echo $row["id"];?>")' class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> Remove </a></td>
             </tr>
            <?php }?> 
            
</table>