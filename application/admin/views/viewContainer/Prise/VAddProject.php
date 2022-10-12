
<section class="content-header">
    <h1>
        Project Path
        <small>New Project Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">New Project</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create New Project</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="javascript:void(0)" method="post" id="myForm" onsubmit="return postDataWithValidationform('<?php echo $obj->encdata("C_NewProject") ?>', '#display', '#myForm', 'addBranchValidation', '<?php echo $obj->encdata("C_OpenLinkFalse") . "&v=" . $obj->encdata("VAddNewBranch") . "&tk=0"; ?>')">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Root <small class="text-danger">*</small></label>
                                    <input type="text" name="root" id="root" placeholder="Enter Unquie Title" required="" class="form-control">
                                
                                </div>
                                <div class="col-lg-6">
                                    <label>Controller <small class="text-danger">*</small></label>
                                    <input type="text" name="controller" id="controller" placeholder="Enter Controller" required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>View <rq>*</rq></label>
                                    <input type="text" name="view" id="view" placeholder="View" required="" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label>Domain <rq>*</rq></label>
                                    <input type="text" name="domain" id="domain" placeholder="Domain" required="" class="form-control">
                                </div>
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