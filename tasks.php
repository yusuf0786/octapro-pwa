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

    <!-- loader -->
    <?php require_once("./components/footer-bar.php") ?>

    <!-- Page Content - Only Page Elements Here-->
    <div class="page-content footer-clear">

        <!-- Main header -->
        <?php require_once("./main-header.php") ?>

        <!-- tasks tabs -->
        <div class="card card-style px-0 mx-2">
            <div class="content mb-0 mx-0">
                <div class="tabs tabs-borders" id="tab-group-2">
                    <div class="tab-controls">
						<a class="font-13" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">Current</a>
						<a class="font-13 collapsed" data-bs-toggle="collapse" href="#tab-5" aria-expanded="false">Upcoming</a>
					</div>
                    <div class="mt-2"></div>
                    <!-- Tab Current -->
                    <div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">

                        <!-- task card starts here -->
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-bill" class="d-flex py-1 mb-2">

                            <div class="card card-style w-100 border mx-2 mb-0">
                                <div class="content">

                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="d-flex align-items-start mb-2">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark me-2"></i>
                                            <h3 class="mb-0">Keyur Joshi</h3>
                                        </div>
                                        <div class="mb-2 ms-auto">
                                            <button type="button" class="btn bg-blue-dark shadow-none py-1 px-3 rounded ms-auto me-2">Repair</button>
                                            <button type="button" class="btn border-blue-dark color-blue-dark shadow-none py-1 px-3 rounded">scheduled</button>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="me-2">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark"></i>
                                        </div>
                                        <p>Problem</p>
                                    </div>
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="me-2">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark"></i>
                                        </div>
                                        <p>Address</p>
                                    </div>
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="me-2">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark"></i>
                                        </div>
                                        <p>21/03/2023 - 04:00pm</p>
                                    </div>
                                    <div class="d-flex align-items-center border-top pt-2">
                                        <div class="border-end w-50">
                                            <button type="button" class="btn bg-blue-dark shadow-none py-1 px-3 rounded me-2">Accept</button>
                                        </div>
                                        <div class="ps-3 w-50">
                                            <button type="button" class="btn border-blue-dark color-blue-dark shadow-none py-1 px-3 rounded">Reject</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </a> <!-- task card ends here -->

                    </div>
                    
                    <!-- Tab Upcoming -->
                    <div class="collapse" id="tab-5" data-bs-parent="#tab-group-2">
                    
                        <!-- task card starts here -->
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-bill" class="d-flex py-1 mb-2">

                            <div class="card card-style border w-100">
                                <div class="content">

                                    <div class="d-flex align-items-center mb-2">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark me-2"></i>
                                            <h3 class="mb-0">Keyur Joshi</h3>
                                        </div>
                                        <button type="button" class="btn bg-blue-dark shadow-none py-1 px-3 rounded ms-auto me-2">Repair</button>
                                        <button type="button" class="btn border-blue-dark color-blue-dark shadow-none py-1 px-3 rounded">scheduled</button>
                                    </div>
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="me-2">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark"></i>
                                        </div>
                                        <p>Problem</p>
                                    </div>
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="me-2">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark"></i>
                                        </div>
                                        <p>Address</p>
                                    </div>
                                    <div class="d-flex align-items-center border-top pt-2">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-check-circle-fill font-24 color-green-dark me-2"></i>
                                            <p>21/03/2023 - 04:00pm</p>
                                        </div>
                                        <div class="border-start ms-auto ps-3">
                                            <button type="button" class="btn bg-blue-dark shadow-none py-1 px-3 rounded me-2">Accept</button>
                                            <button type="button" class="btn border-blue-dark color-blue-dark shadow-none py-1 px-3 rounded">Reject</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </a> <!-- task card ends here -->

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

    <!-- Activity Sidebar Menu -->
    <div id="menu-activity" class="offcanvas offcanvas-start">
        <!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
        <div class="menu-size" style="width:100vw;"><!-- 100 Viewport Width = 100% -->
            <div class="d-flex mx-3 mt-3 py-1">
                <div class="align-self-center">
                    <span class="icon icon-l gradient-red shadow-bg shadow-bg-xs me-3"><i class="bi bi-droplet color-white"></i></span>
                </div>
                <div class="align-self-center">
                    <h1 class="font-24 mb-0">Utilities</h1>
                    <h2 class="mt-n1 mb-0 font-13 opacity-50 font-500">$1530.41 - 24.53%</h2>
                </div>
                <div class="align-self-center ms-auto">
                    <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                        <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                    </a>
                </div>
            </div>
            <div class="divider divider-margins my-3"></div>
            <div class="content">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-single" class="d-flex py-1 mb-2">
                    <div class="align-self-center">
                        <h5 class="pt-1 mb-n1">Water Bill</h5>
                        <p class="mb-0 font-11 opacity-70">15th June <span class="copyright-year"></span></p>
                    </div>
                    <div class="align-self-center ms-auto text-end">
                        <h4 class="pt-1 mb-n1">$15.35</h4>
                        <p class="mb-0 font-11 color-blue-dark opacity-70">Download</p>
                    </div>
                </a>
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-single" class="d-flex py-1 mb-2">
                    <div class="align-self-center">
                        <h5 class="pt-1 mb-n1">Telephone Bill</h5>
                        <p class="mb-0 font-11 opacity-70">15th June <span class="copyright-year"></span></p>
                    </div>
                    <div class="align-self-center ms-auto text-end">
                        <h4 class="pt-1 mb-n1">$31.41</h4>
                        <p class="mb-0 font-11 color-blue-dark opacity-70">Download</p>
                    </div>
                </a>
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-single" class="d-flex py-1 mb-2">
                    <div class="align-self-center">
                        <h5 class="pt-1 mb-n1">Cloud Storage</h5>
                        <p class="mb-0 font-11 opacity-70">15th June <span class="copyright-year"></span></p>
                    </div>
                    <div class="align-self-center ms-auto text-end">
                        <h4 class="pt-1 mb-n1">$43.21</h4>
                        <p class="mb-0 font-11 color-blue-dark opacity-70">Download</p>
                    </div>
                </a>
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-single" class="d-flex py-1 mb-2">
                    <div class="align-self-center">
                        <h5 class="pt-1 mb-n1">Spotify Music</h5>
                        <p class="mb-0 font-11 opacity-70">15th June <span class="copyright-year"></span></p>
                    </div>
                    <div class="align-self-center ms-auto text-end">
                        <h4 class="pt-1 mb-n1">$19.21</h4>
                        <p class="mb-0 font-11 color-blue-dark opacity-70">Download</p>
                    </div>
                </a>
            </div>
            <a href="#" data-bs-dismiss="offcanvas" class="mx-3 btn btn-full gradient-highlight shadow-bg shadow-bg-s">Back to Activity View</a>
        </div>
    </div>    
    
    <!-- Activity Sidebar Menu -->
    <div id="menu-activity-single" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        <!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
        <div class="menu-size" style="height:350px;">
            
            <div class="content">
                <div class="row">
                    <strong class="col-5 color-theme">Company</strong>
                    <strong class="col-7 text-end">Water Company Inc</strong>
                    <div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
                    <strong class="col-5 color-theme">Invoice Number</strong>
                    <strong class="col-7 text-end">#INV-123-5166</strong>
                    <div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
                    <strong class="col-5 color-theme">Billing Period</strong>
                    <strong class="col-7 text-end">June <span class="copyright-year"></span></strong>
                    <div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
                    <strong class="col-5 color-theme">Invoice Amount</strong>
                    <strong class="col-7 text-end color-blue-dark">$315.31</strong>
                    <div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
                    <strong class="col-5 color-theme">Payment Date</strong>
                    <strong class="col-7 text-end">15th August</strong>
                    <div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
                    <strong class="col-5 color-theme">Payment Via</strong>
                    <strong class="col-7 text-end">Credit Card</strong>
                    <div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
                </div>
            </div>

            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-activity" class="mx-3 btn btn-full gradient-highlight shadow-bg shadow-bg-s">Back to Category</a>
        </div>
    </div>

</div>
<!-- End of Page ID-->

<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
<script src="scripts/pages/tasks.js" class="added-script tasks.js"></script>
</body>
</html>