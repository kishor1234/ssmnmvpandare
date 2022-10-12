<style>
    #titles{
        font-size: 20px;
        color:#000000;
    }
    #price{
        font-size: 20px;
        color:#FFFFFF;

    }
    #prise{
        font-size: 20px;
        color:#000000;

    }
    .news{
        border-radius: 0px;
        padding: 1px;
        margin-top:  2px;
        height: 32px;
    }
</style>

<div id="pricecalc" >
  
    <div class="page_header text-center">

        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="row">
                <div class="page_header_bottom"id='page_header_bottom' >
                    <ul class="sub_title">
                        <li id="titles">&nbsp; LOCATION &nbsp;</li>
                        <li>
                            <select onchange="callcalc()" class="form-control news" name="location" id="location" required="">
                                <option value="">Select</option>
                                <?php
                                $branchResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("hf_branch", $_SESSION["db_1"]));
                                while ($branch = $branchResult->fetch_assoc()) {
                                    echo "<option value='" . $branch["blocation"] . "'>" . $branch["blocation"] . "</option>";
                                }
                                ?>
                            </select>
                        </li>
                        <li id="titles"> &nbsp;PEST &nbsp;</li>
                        <li>
                            <select onchange="callcalc()" class="form-control news" name="pest" id="pest" required="">
                                <option value="">Select</option>
                                <?php
                                $pestResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("category" => "Services")));
                                while ($pest = $pestResult->fetch_assoc()) {
                                    echo "<option value='" . $pest["title"] . "'>" . $pest["title"] . "</option>";
                                }
                                ?>
                            </select>
                        </li>
                        <li id="titles"> &nbsp;AREA &nbsp;</li>
                        <li>
                            <select onchange="callcalc()" class="form-control news" name="area" id="area" required="">
                                <option value="">Select</option>
                                <?php
                                $areaResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("area", $_SESSION["db_1"]));
                                while ($area = $areaResult->fetch_assoc()) {
                                    echo "<option value='" . $area["area"] . "'>" . $area["area"] . "</option>";
                                }
                                ?>
                            </select>
                        </li>
                        <li id="titles">&nbsp; TYPE &nbsp;</li>
                        <li>
                            <select onchange="callcalc()" class="form-control news" name="type" id="type" required="">
                                <option value="">Select</option>
                                <?php
                                $typeResult = $main->adminDB[$_SESSION["db_1"]]->query($main->select("type", $_SESSION["db_1"]));
                                while ($type = $typeResult->fetch_assoc()) {
                                    echo "<option value='" . $type["type"] . "'>" . $type["type"] . "</option>";
                                }
                                ?>
                            </select>
                        </li>
                        <li id="prise"> &nbsp; PRICE &nbsp;: &nbsp;</li>
                        <li id="titles">RS. <span id='price'>0000</span></li>
                        <li>&nbsp;&nbsp; 
                            <button onclick="popup()" class="btn btn-warning black">BOOK NOW</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="space">
    <br><br>   
</div>
