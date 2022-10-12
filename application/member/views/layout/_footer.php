</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
    <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php echo date("Y"); ?>
            <a href="#" target="_blank">@askSoft LLP</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made in
            <i class="mdi mdi-heart text-danger"></i> India
        </span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
<script>
    var app = angular.module('shona', []);
    app.controller('navside', function ($scope, $http,$sce) {
        $scope.OpenLink = function (url) {
            
            $http.get(url)
                    .then(function (response) {
                        $scope.results = $sce.trustAsHtml(response.data);
                        url=url+1;
                        history.pushState(null,"any",url);
                    });
        };
    });
</script>
</body>

</html>
