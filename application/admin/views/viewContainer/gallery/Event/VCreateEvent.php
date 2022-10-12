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
    <div class="form-group">
        <center><div id='Messg'></div></center>
        <h2>Create Event and Upload Multiple Image    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Image Preview</h2>
        <form action="#"  id="myForm" method="post" onsubmit="return uploadEvent('<?php echo $obj->encdata("C_UploadBulkEventImage"); ?>', '#Messg', '#myForm')" >
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" name="title" id="title" class="form-control" required="" placeholder="Enter Event Name/Title"/>
                </div>
                <div class="form-group">
                    <label>Event Date</label>
                    <input type="date" name="dates" id="dates" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <label>Image's</label>
                    <input type="file" name="files[]" id="gallery-photo-add" multiple/>
                </div>
                <div class="form-group">

                    <input type="submit" class="btn btn-success btn-sm" value="Upload Images"/>
                </div>
            </div>


        </form>
        <div class="col-lg-6" >
            <div class="gallery" style="overflow-y:scroll; max-height: 250px;"></div>
        </div>
    </div>
    
      
</section>