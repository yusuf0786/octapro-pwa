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
    .indecators-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .indecators-box {
        font-size: 0.75rem;
        color: #0f0f0f;
        display: inline-block;
        margin-right: 0.75rem;
    }
    .indecators-box:last-child {
        margin-right: 0;
    }
    .indecators-box .indecator {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 1px solid #000;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
    }
    .indecators-box .indecator.indecator-present {
        border-color: var(--attendence-present-color);
    }
    .indecators-box .indecator.indecator-leave {
        border-color: var(--attendence-leave-color);
    }
    .indecators-box .indecator.indecator-absent {
        border-color: var(--attendence-absent-color);
    }
    .indecators-box .indecator.indecator-holiday {
        border-color: var(--attendence-holiday-color);
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
        
        <div class="card card-style">
            <div class="content mb-0">

                <div class="row">
                    <div class="col-12">

                        <div class="d-flex align-items-center mb-3">

                            <div class="form-custom form-search form-label form-icon mb-0 w-100">
                                <i class="bi bi-search font-14"></i>
                                <input type="text" class="form-control rounded-5" id="search" placeholder="Type to Search..." required/>
                                <!-- <label for="search" class="color-highlight form-label-always-">Search</label> -->
                            </div>
    
                            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#addExpense" class="btn btn-xxs bg-primary-custom py-1 px-2 d-inline-flex align-items-center font-13 rounded-5 ms-2">
                                <i class="bi bi-plus-circle-fill me-1"></i>
                                ADD
                            </a>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#viewExpense" class="d-flex py-1 mb-3 rounded-3 px-2 mx-n1 shadow-li-custom">
                            <div class="align-self-center">
                                <h5 class="pt-1 mb-n1 font-14">Water Bill</h5>
                                <p class="mb-0 font-12 fw-light text-dark">00-00-0000</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 text-primary">RS 500</h4>
                                <p class="mb-0 font-12 text-primary">Pending</p>
                            </div>
                        </a>                

                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#viewExpense" class="d-flex py-1 mb-3 rounded-3 px-2 mx-n1 shadow-li-custom">
                            <div class="align-self-center">
                                <h5 class="pt-1 mb-n1 font-14">Water Bill</h5>
                                <p class="mb-0 font-12 fw-light text-dark">00-00-0000</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 text-success">RS 300</h4>
                                <p class="mb-0 font-12 text-success">Approve</p>
                            </div>
                        </a>
                        
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#viewExpense" class="d-flex py-1 mb-3 rounded-3 px-2 mx-n1 shadow-li-custom">
                            <div class="align-self-center">
                                <h5 class="pt-1 mb-n1 font-14">Water Bill</h5>
                                <p class="mb-0 font-12 fw-light text-dark">00-00-0000</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1 text-danger">RS 500</h4>
                                <p class="mb-0 font-12 text-danger">Cancel</p>
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

    <!-- Add Expense Off Canvas -->
    <div id="addExpense" class="offcanvas offcanvas-bottom offcanvas-detached-undefined rounded-m-undefined">
        <!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
        <form class="menu-size" style="height:350px;" enctype="multipart/form-data" action="javascript:void(0)" method="POST" class="needs-validation octapro-form expense-add-form d-flex flex-column flex-nowrap overflow-hidden" novalidate>
            <div class="d-flex mx-3 mt-2">
                <div class="align-self-center">
                    <h1 class="mb-0 font-18">ADD Expense</h1>
                </div>
                <div class="align-self-center ms-auto">
                    <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                        <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                    </a>
                </div>
            </div>
            <div class="divider divider-margins mt-2 mb-1"></div>
            <div class="content mt-0">
                <div class="pt-3"></div>
                <div class="form-custom form-label form-icon">
                    <i class="bi bi-calendar font-12"></i>
                    <input type="date" class="form-control rounded-xs" id="trnsDate" name="trn_date" required/>
                    <label for="trnsDate" class="color-theme">Select a Date</label>
                    <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                </div>
                <div class="pb-2"></div>
                <div class="form-custom form-label form-icon">
                    <i class="bi bi-cash-stack font-13"></i>
                    <select class="form-select rounded-xs" id="expenseTypeDD" name="expense_type" required>
                        <option value="0" disabled selected>Select Expense Type</option>
                    </select>
                    <label for="expenseTypeDD" class="color-highlight form-label-always-">Expense Type</label>
                </div>
                <div class="pb-2"></div>
                <div class="form-custom form-label form-icon">
                    <i class="bi bi-currency-rupee font-14"></i>
                    <input type="text" class="form-control rounded-xs" id="amount" name="amount" placeholder="Enter Amount" required/>
                    <label for="amount" class="color-highlight form-label-always-">Enter Amount</label>
                    <span>(required)</span>
                </div>
                <div class="pb-2"></div>
                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-pencil-fill font-12"></i>
                    <textarea class="form-control rounded-xs" placeholder="Remark" id="remark" name="remark"></textarea>
                    <label for="remark" class="color-theme">Remark</label>
                    <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                </div>
                <div class="file-data">
					<img id="image-data" src="images/empty.png" class="img-fluid rounded-s" alt="img">
					<span class="upload-file-name d-block text-center" data-text-before="&lt;i class='bi bi-check-circle-fill color-green-dark pe-2'&gt;&lt;/i&gt; Image:" data-text-after=" is ready.">
					</span>
					<div>
						<input type="file" class="upload-file" accept="image/*" name="expense_photo">
						<p class="btn btn-full btn-m text-uppercase font-700 upload-file-text bg-highlight rounded-5 py-2">Upload Image</p>
					</div>
				</div>
                <div class="divider my-2"></div>
            </div>
            <div class="px-3">
                <button type="submit" href="#" class="btn btn-full gradient-green rounded-5 shadow-bg shadow-bg-s mb-4 w-100 py-2">Add Now</button>
            </div>
        </form>
    </div>
    
    <!-- View Expense Off Canvas -->
    <div id="viewExpense" class="offcanvas offcanvas-bottom offcanvas-detached-undefined rounded-m-undefined">
        <!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
        <form class="menu-size" style="height:350px;" enctype="multipart/form-data" action="javascript:void(0)" method="POST" class="needs-validation octapro-form expense-add-form d-flex flex-column flex-nowrap overflow-hidden" novalidate>
            <div class="d-flex mx-3 mt-2">
                <div class="align-self-center">
                    <h1 class="mb-0 font-18">View Expense</h1>
                </div>
                <div class="align-self-center ms-auto">
                    <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                        <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                    </a>
                </div>
            </div>
            <div class="divider divider-margins mt-2 mb-1"></div>
            <div class="content mt-0">
                <div class="pt-3"></div>
                <div class="form-custom form-label form-icon">
                    <i class="bi bi-calendar font-12"></i>
                    <input type="date" class="form-control rounded-xs" id="trnsDate" name="trn_date" required/>
                    <label for="trnsDate" class="color-theme">Select a Date</label>
                    <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                </div>
                <div class="pb-2"></div>
                <div class="form-custom form-label form-icon">
                    <i class="bi bi-cash-stack font-13"></i>
                    <select class="form-select rounded-xs" id="expenseTypeDD" name="expense_type" required>
                        <option value="0" disabled selected>Select Expense Type</option>
                    </select>
                    <label for="expenseTypeDD" class="color-highlight form-label-always-">Expense Type</label>
                </div>
                <div class="pb-2"></div>
                <div class="form-custom form-label form-icon">
                    <i class="bi bi-currency-rupee font-14"></i>
                    <input type="text" class="form-control rounded-xs" id="amount" name="amount" placeholder="Enter Amount" required/>
                    <label for="amount" class="color-highlight form-label-always-">Enter Amount</label>
                    <span>(required)</span>
                </div>
                <div class="pb-2"></div>
                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-pencil-fill font-12"></i>
                    <textarea class="form-control rounded-xs" placeholder="Remark" id="remark" name="remark"></textarea>
                    <label for="remark" class="color-theme">Remark</label>
                    <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                </div>
                <div class="file-data">
					<img id="image-data" src="images/empty.png" class="img-fluid rounded-s" alt="img">
					<span class="upload-file-name d-block text-center" data-text-before="&lt;i class='bi bi-check-circle-fill color-green-dark pe-2'&gt;&lt;/i&gt; Image:" data-text-after=" is ready.">
					</span>
					<div>
						<input type="file" class="upload-file" accept="image/*" name="expense_photo">
						<p class="btn btn-full btn-m text-uppercase font-700 upload-file-text bg-highlight rounded-5 py-2">Upload Image</p>
					</div>
				</div>
                <div class="divider my-2"></div>
            </div>
            <div class="px-3">
                <button type="button" data-bs-dismiss="offcanvas" href="#" class="btn btn-full gradient-red rounded-5 shadow-bg shadow-bg-s mb-4 w-100 py-1">
                    <i class="bi bi-x color-white font-16 line-height-xl align-middle"></i>
                    Close
                </button>
            </div>
        </form>
    </div>

</div>
<!-- End of Page ID-->

<script src="scripts/bootstrap.min.js"></script>

<!-- Datepicker Core JS -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/bootstrap-datetimepicker.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="scripts/custom.js"></script>
<script src="scripts/pages/expense-list.js" class="added-script expense-list.js"></script>
</body>
</html>