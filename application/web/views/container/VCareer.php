<?php $main->isLoadview("banner", false, array("title" => "Career")); ?>
<style>
    tr th{
        background-color: #ddbb00;

    }
    .theam{
        background-color: #ddbb00;
        border-color: #ddbb00;
        color: #000;
        font-weight:bold;
    }
    .theam:hover{
        background-color: #000000;
        border-color: #000000;
        color: #ddbb00;
        font-weight:bold;

    }
</style>
<div class="sp_choose_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                <div class="sp_choose_heading_main_wrapper pst_bottompadder50">
                    <h2><span>New Job Vacancies</span></h2>
                    <p>Tahaan Pest Solutions & Fumigations is one of the emerging Pest Control agencies in India. We offer professional quality pest management services results since the last 20 years.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="wrapper_second_useful">

                    <?php
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("job_post", $_SESSION["db_1"]));
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="panel panel-body">
                    <h1><strong><?= $row["opening"]; ?></strong></h1>
                        <p><?php echo $row["summery"]; ?></p>

                        <div><strong>Required Vacancy<span>:</span></strong><?php echo $row["positions"]; ?> Number of Positions.</div>
                        <div><strong>Minimum Qualifications Required<span>:</span></strong><?php echo $row["qualification"]; ?></div>
                        <div><strong>Minimum Experience Required<span>:</span></strong><?php echo $row["experience"]; ?></div>
                        <div><strong>Job Location <span>:</span></strong><?php echo $row["work_location"]; ?></div>
                        <div><strong>Required Age<span>:</span></strong><?php echo $row["age"]; ?></div>
                        <div><strong>Salary<span>:</span></strong>₹ <?php echo $row["salary"]; ?></div>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalCareear<?php echo $row["id"]; ?>" style="border-radius: 50px;">Apply Now</button>
</div>
                        <div class="modal fade" id="myModalCareear<?php echo $row["id"]; ?>" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Application Form</h4>
                                        <div class="modal-body" >
                                            <div id="disp<?php echo $row["id"]; ?>"></div>
                                            <form action="javascript:void(0)" method="post" id="fbform<?php echo $row["id"]; ?>" onsubmit=" return postDataCL('<?php echo $obj->encdata("C_SaveForm"); ?>', '#disp<?php echo $row["id"]; ?>', '#fbform<?php echo $row["id"]; ?>')" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <label>Name <i> (required)</i></label>
                                                        <input type="text" class="form-control" name="inputName" id="inputName" required>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Email <i> (Required)</i></label>

                                                        <input type="email" class="form-control"  name="inputEmail" id="inputEmail" required>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Mobile <i> (Required)</i></label>
                                                        <input type="text" class="form-control" name="inputMobile" id="inputMobile" required>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Opening <i> (Required)</i></label>
                                                        <input type="text" class="form-control" readonly="" value="<?php echo $row["opening"]; ?>" name="inputOpening" id="inputOpening" required>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Message <i> (Required)</i></label>
                                                        <textarea class="form-control"  name="inputMsg" id="inputMsg" required></textarea>
                                                        <input type="hidden" value="careear" name="type" id="type"/>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Resume</i></label>
                                                        <input type="file" name="file" id="file"  required="" placeholder="Upload Resume" accept=".doc, .docx"/>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <br>
                                                        <input class="btn btn-primary" type="submit" id="inputSend" name="inputSend"  ><br>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
        </div>
    </div>
</div>

<?php
$main->isLoadView("VTestimonalis", false, array());
