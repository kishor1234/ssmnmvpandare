
<section class="content-header">
    <h1>
        Mail to  
        <small>Subscriber</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Subscriber</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <div id="display" style="overflow: auto;">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Send Mail to all Newsletter User</h3>
                        </div>
                        <div class="box-body">
                            <div id="dispd"></div>
                            <form action="#" method="post" id="myformM" onsubmit="return postData('<?php echo $obj->encdata('C_SendNeweletterMail');?>','#dispd','#myformM')">
                                <div class="form-group">
                                    <label>Subject *</label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject" required="">
                                </div>
                                <div class="form-group">
                                    <label>Message *</label>
                                    <textarea id="Msg" name="Msg" placeholder="Enter your Message" class="form-control" required="" style="height: 200px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Send Mail" class="btn btn-primary btn-sm">
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section><!-- /.content -->