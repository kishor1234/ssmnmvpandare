
<section class="content-header">
    <h1>
        Pre-Booking
        <small>Booking Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Booking List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="form-group">
            <div class="col-lg-12">
                <div id="display" style="overflow: auto;">
                    <?php $main->isLoadView("VListofPreBooking", false, array()); ?>
                </div>
                
            </div>
        </div>

    </div>
</section><!-- /.content -->

