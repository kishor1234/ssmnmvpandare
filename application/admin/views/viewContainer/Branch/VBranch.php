
<section class="content-header">
    <h1>
        All Branches
        <small>All Branch Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List of Branch</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="form-group">
            <div class="col-lg-12">
                <div id="display" style="overflow: auto;">
                    <?php $main->isLoadView("VListofBranches", false, array()); ?>
                </div>
                <datalist id="alluserlist">
                    <?php
                    $sql = $sql = $main->select("hf_branch", $_SESSION["db_1"]) . $main->orderBy("DESC", "id");
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option>" . $row["blocation"]  . "|" . $row["id"] . "</option>";
                    }
                    ?>
                </datalist>
            </div>
        </div>

    </div>
</section><!-- /.content -->

