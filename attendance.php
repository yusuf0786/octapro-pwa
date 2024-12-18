<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Octapro - PWA</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="manifest" href="_manifest.json">
<meta id="theme-check" name="theme-color" content="#FFFFFF">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png"></head>

<!-- jquery -->
<script src="scripts/jquery.min.js"></script>

<!-- Daterangepikcer CSS -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<!-- Page Wrapper-->
<div id="page">

    <!-- footer bar -->
    <?php require_once("./components/footer-bar.php") ?>

    <!-- Page Content - Only Page Elements Here-->
    <div class="page-content footer-clear">

        <!-- Main header -->
        <?php require_once("./main-header.php") ?>

        <!-- calendar section -->
        <div class="contianer-fluid px-2 bg-white rounded-s mx-2 mt-3 mb-3 pb-2">
            <div class="row pb-2 g-3">

                <div class="col-12 m-0 mb-n2">

                    <div id="calendar-container">
                        <div id="calendar-header" class="mb-2 pb-2 pt-2 border-bottom bg-theme-primary mb-0 rounded-top-5 position-relative d-flex justify-content-between align-items-center">
                            <button id="prev-month" class="btn btn-info bg-transparent border-0 text-primary rounded-circle"><i class="bi bi-arrow-left" aria-hidden="true"></i></button>
                            <h4 id="month-year" class="fw-bold text-primary mb-0"></h4>
                            <button id="next-month" class="btn btn-info bg-transparent border-0 text-primary rounded-circle"><i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                        </div>
                        <div id="calendar-body">
                            <div id="calendar-content"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- indecators section -->
        <div class="contianer-fluid bg-white rounded-s mx-2">
            <div class="row g-0">

                <div class="col-12">

                    <div class="indecators-container py-1">

                        <div class="indecators-box">
                            <div class="indecator indecator-present me-1">
                                <span>00</span>
                            </div>
                            Present
                        </div>

                        <div class="indecators-box">
                            <div class="indecator indecator-absent me-1">
                                <span>00</span>
                            </div>
                            Absent
                        </div>

                        <div class="indecators-box">
                            <div class="indecator indecator-leave me-1">
                                <span>00</span>
                            </div>
                            Leave
                        </div>

                        <div class="indecators-box">
                            <div class="indecator indecator-holiday me-1">
                                <span>00</span>
                            </div>
                            Holiday / W.O
                        </div>

                    </div> <!-- /.indecators container -->

                </div>

            </div>
        </div>

    </div>
    <!-- End of Page Content-->

    <!-- Off Canvas and Menu Elements-->
    <!-- Always outside the Page Content-->

    <!-- Main Sidebar Menu -->
    <div id="menu-sidebar" data-menu-active="nav-welcome" data-menu-load="menu-sidebar.html"
        class="offcanvas offcanvas-start offcanvas-detached rounded-m">
    </div>

	<!-- Notifications Bell -->
	<div id="menu-notifications" data-menu-load="menu-notifications.html"
		class="offcanvas offcanvas-top offcanvas-detached rounded-m">
	</div>

</div>
<!-- End of Page ID-->

<script src="scripts/bootstrap.min.js"></script>

<!-- Datepicker Core JS -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/bootstrap-datetimepicker.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="scripts/custom.js"></script>
<script src="scripts/pages/attendance.js" class="added-script attendance.js"></script>
</body>
</html>