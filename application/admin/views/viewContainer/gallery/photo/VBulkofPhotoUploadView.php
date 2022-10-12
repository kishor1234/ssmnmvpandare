<section class="content-header">

    <h1>
        Upload
        <small>Bulk of Photo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Photo</a></li>
        <li class="active">Bulk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="col-md-12">
    <h2>Multiple Image upload</h2>
    <form action="/?r=<?php echo $obj->encdata("C_UploadBulkImage");?>" enctype="multipart/form-data" class="dropzone">
        <div class="dz-message needsclick">
<strong>Drop files here or click to upload.</strong><br />
<span class="note needsclick"></span>
</div>
    </form>

</div>
  
</section>