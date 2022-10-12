<section class="content-header">

    <h1>
        New Event
        <small>Bulk of Photo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Event Photo</a></li>
        <li class="active">Upload</li>
    </ol>
</section>
<style>

    div.gallery img {
        width: 150px;
        height: auto;
        float: left;
        border: 1px solid #ccc;
        padding: 5px;

    }

</style>
<!-- Main content -->
<section class="content">
   
    <?php  $title="";?>
        
            <div class=" panel panel-primary from-group" id="eventGrooup">
                <fieldset>
                    <div class="col-lg-6">
                        <legend>Event Photos'</legend>
                    
                    </div>
                    <div class="col-lg-6">
                         <div style="float:right;">
                        <label>Select Event: </label>
                        <select id="eventName" class="form-control"  onclick="getEvent('<?php echo $obj->encdata('C_ViewEventWisePhoto')?>','#mg1')">
                           <?php
                           $sql=$main->selectDistinct("events","title");
                           $rp=$main->adminDB[$_SESSION["db_1"]]->query($sql);
                           $i=0;
                          
                           while($r=$rp->fetch_assoc())
                           {
                                echo "<option value='".$r["title"]."'>".$r["title"]."</option>";
                           }
                           
                           ?>
                        </select>
                        <?php
                        /*f(isset($_POST["title"]))
                           {
                               
                               $title=$_POST["title"];
                               echo $title;
                           }*/
                        ?>
                    </div>
                    </div>
                   
                    <div id="mg1" class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                       
                    </table>

                    </div>
                </fieldset>
            </div>
       
      
</section>