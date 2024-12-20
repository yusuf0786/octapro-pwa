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

<style>
    .form-custom .tasks-date-filter-select,
    .form-custom .other-details-filter-select,
    .form-custom .revenue-filter-select {
        height: auto !important;
        padding: 5px !important;
    }

    /* .legend-color {
        padding: 0px 8px;
        border-radius: 100%;
        margin-right: 5px;
    } */

    .legend-item > span:first-child  {
        min-width: 58px;
    }
    .legend-item > span:nth-child(2),
    .legend-item > span:nth-child(3)  {
        justify-self: flex-end;
    }
    .legend-item > span:nth-child(3) {
        margin-left: 5px;
    }
</style>

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

        <!-- punch in/punch out section -->
        <div class="contianer-fluid px-2 bg-white rounded-s rounded-top mx-2">
            <div class="row">
                <div class="col-12">
                    <div class="punch-in-check-out-container rounded-s my-2 d-flex rounded-xl ambouse-lg">
                        <button id="punchInButton" class="btn bg-green-dark border-0 rounded-xl rounded-start w-50 py-1 font-13 shadow-0">
                            <span>In Time</span>
                            <span class="d-block">-- : -- --</span>
                        </button>
                        <button id="punchOutButton" class="btn bg-red-dark border-0 rounded-xl rounded-end w-50 py-1 font-13 shadow-0" disabled>
                            <span>Punch Out</span>
                            <span class="d-block">-- : -- --</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- chart section -->
        <div class="card card-style px-0 mx-0 rounded-s rounded-bottom shadow-0 mb-2 mx-2">
            <div class="row g-0">
                <div class="col-6">
                    
                    <h3 class="text-center pt-3 px-2 mb-2">Task Details:</h3>
                    <div class="pie-chart mx-auto no-clicks w-100s" id="pieChart" style="width: 100%;"></div>
                    <div id="pieChartLegendsContainer" class="row g-2 ps-2 pe-0"></div>

                </div>
                <div class="col-6">

                    <div class="content mt-0 mb-0">

                        <div class="form-custom d-flex align-items-center ">
                            <label for="c6" class="color-theme form-label-active ps-0 pe-2s">Show: </label>
                            <select class="form-select rounded-xs tasks-date-filter-select" id="c6" aria-label="Floating label select example"></select>
                        </div>

                        <div class="d-flex pb-3" id="chartDataItem_1">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-red shadow-bg shadow-bg-xs"><i class="bi bi-droplet font-16 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1 d-flex align-self-center">
                                <h5 class="mb-n1 text-break fw-normal"></h5>
                                <span class="mx-1"> - </span>
                                <h4 class="mb-n1 color-red-dark"></h4>
                            </div>
                        </div>

                        <div class="d-flex pb-3" id="chartDataItem_2">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-green shadow-bg shadow-bg-xs"><i class="bi bi-wallet font-16 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1 d-flex align-self-center">
                                <h5 class="mb-n1 text-break fw-normal"></h5>
                                <span class="mx-1"> - </span>
                                <h4 class="mb-n1 color-green-dark"></h4>
                            </div>
                        </div>

                        <div class="d-flex pb-3" id="chartDataItem_3">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-blue shadow-bg shadow-bg-xs"><i class="bi bi-arrow-repeat font-18 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1 d-flex align-self-center">
                                <h5 class="mb-n1 text-break fw-normal"></h5>
                                <span class="mx-1"> - </span>
                                <h4 class="mb-n1 color-red-dark"></h4>
                            </div>
                        </div>

                        <div class="d-flex pb-3" id="chartDataItem_4">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-mint shadow-bg shadow-bg-xs"><i class="bi bi-plus font-20 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1 d-flex align-self-center">
                                <h5 class="mb-n1 text-break fw-normal"></h5>
                                <span class="mx-1"> - </span>
                                <h4 class="mb-n1 color-red-dark"></h4>
                            </div>
                        </div>

                        <div class="d-flex pb-3" id="chartDataItem_5">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-magenta shadow-bg shadow-bg-xs"><i class="bi bi-heart font-14 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1 d-flex align-self-center">
                                <h5 class="mb-n1 text-break fw-normal"></h5>
                                <span class="mx-1"> - </span>
                                <h4 class="mb-n1 color-red-dark"></h4>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>

        </div>

        <!-- open jobs section -->
        <div class="contianer-fluid mx-2 mb-4">
            <div class="row g-3 pb-3">
                <h3 class="color-white fw-normal mb-2">Open Jobs :</h3>
                <div class="col-4 mt-0">
                    <div class="card card-style border-0 shadow-0 rounded m-0 h-100 ambouse-primary">
                        <div class="card-body pt-2 pb-0">
                            <p class="text-center font-15 color-primary-custom mb-3">
                                <span class="icon icon-very-small rounded-xs bg-primary-custom"><i class="bi bi-list-task font-14 color-white"></i></span>
                            </p>
                            <p class="text-center font-32 fw-bold color-primary-custom mb-0 open-jobs-current-task-value">01</p>
                        </div>
                        <div class="card-footer bg-white text-center border-0 py-1 px-1">
                            <h3 class="font-14 mb-0 color-primary2-custom">Current Task</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-4 mt-0">
                    <div class="card card-style border-0 shadow-0 rounded m-0 h-100 ambouse-primary">
                        <div class="card-body pt-2 pb-0">
                            <p class="text-center font-15 color-green-light mb-3">
                                <span class="icon icon-very-small rounded-xs bg-green-light"><i class="bi bi-clock font-14 color-white"></i></span>
                            </p>
                            <p class="text-center font-32 fw-bold color-green-light mb-0 open-jobs-overdue-task-value">01</p>
                        </div>
                        <div class="card-footer bg-white text-center border-0 py-1 px-1">
                            <h3 class="font-14 mb-0 color-primary2-custom">Overdue Task</h3>
                        </div>
                    </div>
                </div>

                <div class="col-4 mt-0">
                    <div class="card card-style border-0 shadow-0 rounded m-0 h-100 ambouse-primary">
                        <div class="card-body pt-2 pb-0">
                            <p class="text-center font-15 color-blue-dark mb-3">
                                <span class="icon icon-very-small rounded-xs bg-blue-dark"><i class="bi bi-hourglass-split font-14 color-white"></i></span>
                            </p>
                            <p class="text-center font-32 fw-bold color-blue-dark mb-0 open-jobs-upcoming-task-value">01</p>
                        </div>
                        <div class="card-footer bg-white text-center border-0 py-1 px-1">
                            <h3 class="font-14 mb-0 color-primary2-custom">Upcoming Task</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- other details section -->
        <div class="contianer-fluid px-2 bg-white rounded-s mx-2 mb-4">
            <div class="row pb-2 g-3">

                <div class="col-12 m-0 mb-n2">

                    <div class="form-custom d-flex align-items-center">
                        <label for="otherFilterSelect" class="color-black form-label-active ps-0 w-50 font-16 me-3">Show For: </label>
                        <select class="form-select rounded-xs color-black font-14 other-details-filter-select w-50" id="otherFilterSelect" aria-label="Floating label select example"></select>
                    </div>

                </div>

                <div class="col-6">
                    <div class="card card-style border-0 shadow-0 rounded-s m-0 h-100 ambouse-primary">
                        <div class="card-body p-2 px-3">
                            <div class="row attendence-details fw-bold g-2">
                                <div class="col-6 d-flex flex-column text-center font-15 color-primary2-custom">
                                    <span class="attendence-details-present-value font-20 color-green-dark">10</span> <span>Present</span>
                                </div>
                                <div class="col-6 d-flex flex-column text-center font-15 color-primary2-custom">
                                    <span class="attendence-details-abscent-value font-20 color-red-dark">2</span> <span>Abscent</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-primary2-custom text-center border-0 py-1 px-2">
                            <h3 class="font-14 mb-0 color-white">Attendence</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-style border-0 shadow-0 rounded-s m-0 h-100 ambouse-primary">
                        <div class="card-body p-2 px-3">
                            <div class="row attendence-details fw-bold justify-content-center g-2">
                                <div class="col-6 d-flex flex-column text-center font-15 color-primary2-custom">
                                    <span class="travel-details-unit font-20 color-blue-dark">000</span> <span>Kms</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-primary2-custom text-center border-0 py-1 px-2">
                            <h3 class="font-14 mb-0 color-white">Travelled Distance</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-style border-0 shadow-0 rounded-s m-0 h-100 ambouse-primary">
                        <div class="card-body p-2 px-3">

                            <div class="row attendence-details fw-bold g-2">
                                <div class="col-6 d-flex flex-column text-center font-15 color-primary2-custom">
                                    <span class="collection-details-collect font-20 color-blue-dark">10</span> <span>Collect</span>
                                </div>
                                <div class="col-6 d-flex flex-column text-center font-15 color-primary2-custom">
                                    <span class="collection-details-transfer font-20 color-blue-dark">2</span> <span>Transfer</span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer bg-primary2-custom text-center border-0 py-1 px-2">
                            <h3 class="font-14 mb-0 color-white">Collection</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-style border-0 shadow-0 rounded-s m-0 h-100 ambouse-primary">
                        <div class="card-body p-2 px-3">
                            <div class="row attendence-details fw-bold justify-content-center g-2">
                                <div class="col-6 d-flex flex-column text-center font-15 color-primary2-custom">
                                    <span class="expense-details-amount font-20 color-blue-dark">1cr</span> <span>Amount</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-primary2-custom text-center border-0 py-1 px-2">
                            <h3 class="font-14 mb-0 color-white">Expense</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- revenue section -->
        <div class="contianer-fluid px-2 bg-white rounded-s mx-2">
            <div class="row pb-2 g-3">

                <div class="col-12 m-0 mb-n2">

                    <div class="form-custom d-flex align-items-center">
                        <label for="otherFilterSelect" class="color-black form-label-active ps-0 w-50 font-16 me-3">Revenue by me: </label>
                        <select class="form-select rounded-xs color-black font-14 revenue-filter-select w-50" id="revenueFilterSelect" aria-label="reventue select label"></select>
                    </div>

                </div>

                <div class="col-6">
                    <div class="card card-style border-0 shadow-0 rounded-s m-0 h-100 ambouse-primary">
                        <div class="card-body p-3 px-3 bg-primary2-custom">
                            <div class="row attendence-details fw-bold justify-content-center g-2">
                                <div class="col-12 d-flex flex-column text-center font-15 color-white">
                                    <span class="service-amount font-20">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center border-0 py-1 px-2">
                            <h3 class="font-14 mb-0 color-primary2-custom">Service Amount</h3>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-style border-0 shadow-0 rounded-s m-0 h-100 ambouse-primary">
                        <div class="card-body p-3 px-3 bg-primary2-custom">
                            <div class="row attendence-details fw-bold justify-content-center g-2">
                                <div class="col-12 d-flex flex-column text-center font-15 color-white">
                                    <span class="parts-amount font-20">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center border-0 py-1 px-2">
                            <h3 class="font-14 mb-0 color-primary2-custom">Parts Amount</h3>
                        </div>
                    </div>
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

	<!-- <div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-ios">
        <div class="content">
        <img src="app/icons/icon-128x128.png" alt="img" width="80" class="rounded-m mx-auto my-4">
            <h1 class="text-center">Install PayApp</h1>
            <p class="boxed-text-xl">
                Install PayApp on your home screen, and access it just like a regular app. Open your Safari menu and tap "Add to Home Screen".
            </p>
            <a href="#" class="pwa-dismiss close-menu color-theme text-uppercase font-900 opacity-50 font-11 text-center d-block mt-n2" data-bs-dismiss="offcanvas">Maybe Later</a>
        </div>
    </div>

    <div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-android">
        <div class="content">
            <img src="app/icons/icon-128x128.png" alt="img" width="80" class="rounded-m mx-auto my-4">
            <h1 class="text-center">Install PayApp</h1>
            <p class="boxed-text-l">
                Install PayApp to your Home Screen to enjoy a unique and native experience.
            </p>
            <a href="#" class="pwa-install btn btn-m rounded-s text-uppercase font-900 gradient-highlight shadow-bg shadow-bg-s btn-full">Add to Home Screen</a><br>
            <a href="#" data-bs-dismiss="offcanvas" class="pwa-dismiss close-menu color-theme text-uppercase font-900 opacity-60 font-11 text-center d-block mt-n1">Maybe later</a>
        </div>
    </div> -->

</div>
<!-- End of Page ID-->

<script src="scripts/bootstrap.min.js"></script>

<!-- Datepicker Core JS -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/bootstrap-datetimepicker.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="scripts/custom.js"></script>
<script src="scripts/pages/dashboard.js" class="added-script dashboard.js"></script>
</body>
</html>