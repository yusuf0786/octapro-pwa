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

        <!-- chart -->
        <div class="card card-style px-0">
            <div class="form-custom form-label form-border form-icon px-3 pt-1">
                <i class="bi bi-calendar font-13"></i>
                <select class="form-select rounded-xs" id="c6a">
                    <option value="0" selected>Current Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">Octomber</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="pie-chart mx-auto no-click" id="pieChart"></div>

                </div>
                <div class="col-12">

                    <div class="content mt-0 mb-0">
        
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-red shadow-bg shadow-bg-xs"><i class="bi bi-droplet font-18 color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">Utilities</h5>
                                <p class="mb-0 font-11 opacity-50">12 Transactions</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-red-dark">$1530.41</h4>
                                <p class="mb-0 font-12 opacity-50">24.53%</p>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-xs"><i class="bi bi-wallet font-18 color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">Income</h5>
                                <p class="mb-0 font-11 opacity-50">15 Transactions</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-green-dark">$4530.55</h4>
                                <p class="mb-0 font-12 opacity-50">41.27%</p>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-blue shadow-bg shadow-bg-xs"><i class="bi bi-arrow-repeat font-20 color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">Subscriptions</h5>
                                <p class="mb-0 font-11 opacity-50">23 Transactions</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-red-dark">$340.31</h4>
                                <p class="mb-0 font-12 opacity-50">21.27%</p>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-mint shadow-bg shadow-bg-xs"><i class="bi bi-plus font-24 color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">Medical</h5>
                                <p class="mb-0 font-11 opacity-50">3 Transactions</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-red-dark">$270.31</h4>
                                <p class="mb-0 font-12 opacity-50">14.43%</p>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3">
                            <div class="align-self-center">
                                <span class="icon rounded-s me-2 gradient-magenta shadow-bg shadow-bg-xs"><i class="bi bi-heart font-16 color-white"></i></span>
                            </div>
                            <div class="align-self-center ps-1">
                                <h5 class="pt-1 mb-n1">Random</h5>
                                <p class="mb-0 font-11 opacity-50">3 Transactions</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 color-red-dark">$480.31</h4>
                                <p class="mb-0 font-12 opacity-50">12.31%</p>
                            </div>
                        </a>
                        
                    </div>

                </div>
            </div>

        </div>

        <!-- tasks tabs -->
        <div class="card card-style">
            <div class="content mb-0">
                <div class="tabs tabs-pill" id="tab-group-2">
                    <div class="tab-controls rounded-m p-1 overflow-visible">
                        <a class="font-13 rounded-s py-1 shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">Current</a>
                        <a class="font-13 rounded-s py-1 shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-5" aria-expanded="false">Upcoming</a>
                    </div>
                    <div class="mt-3"></div>
                    <!-- Tab Current -->
                    <div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-bill" class="d-flex py-1 mb-2">
                            <div class="align-self-center">
                                <h5 class="pt-1 mb-n1">Water Bill</h5>
                                <p class="mb-0 font-11 opacity-70">Overdue by 3 Days</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1">$15.35</h4>
                                <p class="mb-0 font-11 color-red-light">Bill Unpaid</p>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Tab Upcoming -->
                    <div class="collapse" id="tab-5" data-bs-parent="#tab-group-2">
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-bill" class="d-flex py-1 mb-2">
                            <div class="align-self-center">
                                <h5 class="pt-1 mb-n1">Water Bill</h5>
                                <p class="mb-0 font-11 opacity-70">Overdue by 3 Days</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1">$15.35</h4>
                                <p class="mb-0 font-11 color-red-light">Bill Unpaid</p>
                            </div>
                        </a>
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

	<div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-ios">
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
</body>
</html>