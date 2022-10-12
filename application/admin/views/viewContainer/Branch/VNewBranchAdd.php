
<section class="content-header">
    <h1>
        Create New Branch
        <small>New Branch Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">New Branch</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="form-group">

            <div class="col-lg-8 col-lg-offset-2">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create New Branch</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>

                        </div>
                    </div>

                    <form action="javascript:void(0)" method="post" id="myForm" onsubmit="return postDataWithValidationform('<?php echo $obj->encdata("C_CreateNewBranch") ?>', '#display', '#myForm', 'addBranchValidation', '<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VAddNewBranch") . "&tk=0"; ?>')">
                        <div class="box-body">

                            <div class="form-group">
                                <label>Branch Location(City name)<span>*</span></label>
                                <input type="text" id="blocation" name="blocation" required  class="form-control" placeholder="Branch Location ex. Karmala" autocomplete="off" onkeypress="return onlyAlphabets(event, this);">
                            </div>
                            <div class="form-group">
                                <label>Address <rq>*</rq></label>
                                <textarea name="address" id="address" placeholder="Address" class="form-control" required="" style="height: 100px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone No. with STD Code</label>
                                <input type="text" id="contact" name="contact" maxlength="10" onkeypress="return isNumber(event)"  class="form-control" placeholder="Pbone no with STD Code ex 022-20XXXXX " required="" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Balance <small>Starting Capital</small></label>
                                <input type="number" id="balance" name="balance"   class="form-control" placeholder="Enter Amount in Rupees" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-lg-3">
                                <button type="submit"  class="btn btn-primary btn-sm form-control"><i class="fa fa-save"></i> Save Branch</button>

                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-danger btn-sm form-control" onclick="openAjaxURL('<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VAddNewBranch") . "&tk=0"; ?>', '#main')"><i class="fa fa-close"></i> Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section><!-- /.content -->

