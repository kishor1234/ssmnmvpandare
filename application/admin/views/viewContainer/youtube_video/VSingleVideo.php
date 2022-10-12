
<section class="content-header">
    <h1>
        Link YouTube Video
        <small>Video</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Your Page Content Here -->
    <div id="display">
        <div class="form-group">
            <div class="box box-primary">
                <div class="box-body">
                    <form action="#" method="post" id="myvideo" onsubmit=" return postData('<?php echo $obj->encdata("C_SingleVideo"); ?>', '#display', '#myvideo')">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <label style="padding-top: 5px;">Insert Youtube URL:</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" id="inputUrl" class="form-control" name="inputUrl" placeholder="Enter Youtub video url">
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" id="submit" name="submit" class="btn btn-primary btn-sm form-control" value="Upload">
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="box box-dark">
                <div class="box box-header">
                    <h3 class="box-title">Video Table</h3>
                </div>
                <div class="box-body">
                    <div  class="form-group">
                        <table id="example" class="table table-hover  table-responsive table-bordered table-striped">
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>YouTube Video</th>
                                <th>YouTube Video ID</th>
                                <th>YouTube Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $r=$main->adminDB[$_SESSION["db_1"]]->query($main->select("home_video",$_SESSION["db_1"]));
                            while ($row = $r->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td><img src='" . $row["image_url"] . "' style='width:200px;height:100px;'></td>";
                                echo "<td><iframe src='".$row["youtube_url"]."?autoplay=0' frameborder='0' style='width:300px;height:100px;'></iframe></td>";
                                echo "<td>" . $row["youtube_id"] . "</td>";
                                echo "<td>" . $row["video_title"] . "</td>";
                                echo "<td>" . $row["uploaded"] . "</td>";
                                ?>
                            <td>
                                <button onclick="return deleteLogo('<?php echo $obj->encdata("C_DeleteYoutubeVideo");?>', '#msg', '<?php echo $row["id"]; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            <?php
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- /.content -->
