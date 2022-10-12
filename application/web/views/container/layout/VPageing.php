
<div class="form-group">
                    <div class="col-lg-6">
                        <?php
                       
                        //array("ct"=>$ct,"limit"=>$limit,"offset"=>$offset,"max_count"=>$max_count,"page"=>$page,"file"=>$obj->decdata($_REQUEST["v"]));
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
                                $t = $page - 1;
                                ?> <li><a href = '/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata($file) . "&pg=" . $t . "&tk=0"; ?>' >&laquo;</a></li><?php
                                }

                                while ($i < $max_count) {
                                    if ($k == $page) {
                                        $fl = $k;
                                        ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                                    } else {
                                        ?><li><a href ='/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata($file) . "&pg=" . $k . "&tk=0"; ?>' > <?php echo $k; ?></a></li><?php
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
                                    ?> <li><a href = '/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata($file) . "&pg=" . $t . "&tk=0"; ?>' >&raquo;</a></li><?php
                                }
                                ?>



                        </ul>
                    </div>
                </div>