<?php $main->isLoadview("banner", false, array("title" => "Contact Us")); ?>
<style>
    .btn-custom-black{
        background-color: #000;
        border-color: #000;
        color:#FFF;
    }
</style>
<div class="sp_choose_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                <div class="sp_choose_heading_main_wrapper pst_bottompadder50">
                    <h2><span>Leave Message Here</span></h2>
                    <p>Tahaan Pest Solutions & Fumigations is one of the emerging Pest Control agencies in India. We offer professional quality pest management services results since the last 20 years.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="wrapper_second_useful">
                    <div class="abt_txt_page_wrapper pst_bottompadder40">
                        <div class="sidebar_widget about_page_heading_wrapper">
                            <h4>Book a Pest Control Service Today <span></span></h4>
                            <p>Tahaan Pest Solutions & Fumigations is one of the emerging Pest Control agencies in India.</p>
                            <h4>Why choose us? <span></span></h4>
                            <ul class="featurs_list">
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Eco Friendly Product</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Best Rated Proffesional</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Quick Response</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i> 100% Warranty</li>
                            </ul>
                            <a class="btn btn-custom-black" href="#" onclick="popup();"> Book now </a> </div>

                    </div>
                </div>
                <div class="form-group">
                    <h3><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Address</strong></h3>
                    <div class="col-lg-4">
                        
                        <h5>Head Office </i></h5>
                        <p>Vani CHS, C-15 Behind Saibaba Mandir,<br> Opposite Borla Society,<br> CG Rd, Chembur, <br>Mumbai, Maharashtra 400074</p>
                    </div>
                    <div class="col-lg-4">
                        
                        <h5>Branch Office </h5>
                        <p><?= $_SESSION["address1"] ?></p>
                    </div>
                    
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="wrapper_second_useful">
                    <form class="form-horizontal" id="contactform" action="javascript:void(0)" method="post" onsubmit="return postData('<?php echo $obj->encdata("C_AdBook"); ?>', '#msgfms', '#contactform')">
                        <div class="form-group ">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                <input type="date" min="<?php echo date("Y-m-d");?>" class="form-control" style='color: black;' id="date" data-title="Date" placeholder="Date" name="cdate" id="cdate"  required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" style='color: black;' id="exampleName" data-title="Plese Enter Valid Name" placeholder="Name" name="name" id="name" onkeypress="return onlyAlphabetswithspace(event, 1)" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <input type="email" class="form-control" style='color: black;' id="exampleemail" placeholder="Email" name="email" id="email"  required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" id="examplePhone" style='color: black;' placeholder="Phone" name="mobile" id="mobile" maxlength="10" onkeypress="return isNumber(event, 1)" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-server" aria-hidden="true"></i></div>
                                <select class="form-control" onchange="selectBranch('#dis', '<?php echo $obj->encdata("C_GetBranch"); ?>')" id="ourservices" name="ourservices" required="" style='color: black;'>
                                    <option value="">Select Services</option>
                                    <?php
                                    $result = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services")));
                                    while ($services = $result->fetch_assoc()) {
                                        echo "<option value=" . $services["id"] . " >" . $services["title"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-braille" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" style='color: black;' id="branch" name="branch" data-title="Branch" placeholder="Branch Name"  onkeypress="return onlyAlphabetswithspace(event, 1)" required  readonly=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-area-chart" aria-hidden="true"></i></div>&nbsp;&nbsp;
                                <input type="radio" name="area" required value="Residential">&nbsp;&nbsp;Residential&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="area" required value="Commercial">&nbsp;&nbsp;Commercial
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-comment" aria-hidden="true"></i></div>
                                <textarea class="form-control" rows="2" style='color: black;' name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="msgfms"></div>
                            <div class="quick_btn">
                                <button type="submit" id="sendbtn" class="btn btn-custom-black "><i class="fa fa-paper-plane"></i> Send </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="row mapouter"><div class="gmap_canvas col-lg-12"><iframe width="1400" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Vani%20CHS,%20C-15%20Behind%20Saibaba%20Mandir,%20Opposite%20Borla%20Society,%20CG%20Rd,%20Chembur,%20Mumbai,%20Maharashtra%20400074&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:inherit;text-align:right;height:auto;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:auto;width:100%;}</style></div>

</div>
</div>

<?php
$main->isLoadView("VTestimonalis", false, array());

?>

