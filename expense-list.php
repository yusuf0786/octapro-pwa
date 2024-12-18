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
                <div class="tabs tabs-pill" id="tab-group-2">
                    <div class="tab-controls rounded-m p-1 overflow-visible">
                        <a class="font-13 rounded-s py-1 shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">Expense List</a>
                        <a class="font-13 rounded-s py-1 shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-5" aria-expanded="false">Add New Expense</a>
                    </div>
                    <div class="mt-3"></div>
                    <!-- Tab Bills List -->
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
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-bill" class="d-flex py-1 mb-2">
                            <div class="align-self-center">
                                <h5 class="pt-1 mb-n1">Telephone Bill</h5>
                                <p class="mb-0 font-11 opacity-70">Due in 14 Days</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1">$31.41</h4>
                                <p class="mb-0 font-11 color-red-light">Bill Unpaid</p>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-bill" class="d-flex py-1 mb-2">
                            <div class="align-self-center">
                                <h5 class="pt-1 mb-n1">Cloud Storage</h5>
                                <p class="mb-0 font-11 opacity-70">Due in 16 Days</p>
                            </div>
                            <div class="align-self-center ms-auto text-end">
                                <h4 class="pt-1 mb-n1">$43.21</h4>
                                <p class="mb-0 font-11 color-yellow-dark">Pending</p>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Tab Custom Payments-->
                    <form class="collapse" id="tab-5" data-bs-parent="#tab-group-2" enctype="multipart/form-data" action="javascript:void(0)" method="POST" class="needs-validation octapro-form expense-add-form d-flex flex-column flex-nowrap overflow-hidden" novalidate>
                        <div class="pt-3"></div>
                        <div class="form-custom form-label form-icon">
                            <i class="bi bi-calendar font-12"></i>
                            <input type="date" class="form-control rounded-xs" id="c5" required/>
                            <label for="c5" class="color-theme">Select a Date</label>
                            <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                        </div>
                        <div class="pb-2"></div>
                        <div class="form-custom form-label form-icon">
                            <i class="bi bi-cash-stack font-13"></i>
                            <select class="form-select rounded-xs" id="expenseTypeDD" required>
                                <option value="0" disabled selected>Select Expense Type</option>
                            </select>
                            <label for="c61" class="color-highlight form-label-always-">Expense Type</label>
                        </div>
                        <div class="pb-2"></div>
                        <div class="form-custom form-label form-icon">
                            <i class="bi bi-currency-rupee font-14"></i>
                            <input type="text" class="form-control rounded-xs" id="c31" placeholder="Enter Amount" required/>
                            <label for="c31" class="color-highlight form-label-always-">Enter Amount</label>
                            <span>(required)</span>
                        </div>
                        <div class="pb-2"></div>
                        <div class="form-custom form-label form-icon mb-3">
                            <i class="bi bi-pencil-fill font-12"></i>
                            <textarea class="form-control rounded-xs" placeholder="Remark" id="c7"></textarea>
                            <label for="c7" class="color-theme">Remark</label>
                            <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                        </div>
                        <div class="pb-3"></div>
                        <a href="#" class="btn btn-full gradient-green rounded-s shadow-bg shadow-bg-s mb-4">Add Now</a>
                    </form>
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

	<!-- Bill Button Menu -->
    <div id="menu-bill" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        <!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
        <div class="menu-size" style="height:350px;">
            <div class="d-flex mx-3 mt-3 py-1">
                <div class="align-self-center">
                    <h1 class="mb-0">Edit Expense</h1>
                </div>
                <div class="align-self-center ms-auto">
                    <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                        <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
                    </a>
                </div>
            </div>
            <div class="divider divider-margins mt-3 mb-2"></div>
            <div class="content mt-0">

                <form enctype="multipart/form-data" action="javascript:void(0)" method="POST" class="needs-validation octapro-form expense-edit-form d-flex flex-column flex-nowrap overflow-hidden" novalidate>

                    <div class="form-custom form-label form-icon">
                        <i class="bi bi-calendar font-12"></i>
                        <input type="date" class="form-control rounded-xs" id="c5" required/>
                        <label for="c5" class="color-theme">Select a Date</label>
                        <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                    </div>
                    <div class="pb-2"></div>
                    <div class="form-custom form-label form-icon">
                        <i class="bi bi-cash-stack font-13"></i>
                        <select class="form-select rounded-xs" id="expenseTypeEditDD" required>
                        </select>
                        <label for="c61" class="color-highlight form-label-always-">Expense Type</label>
                    </div>
                    <div class="pb-2"></div>
                    <div class="form-custom form-label form-icon">
                        <i class="bi bi-currency-rupee font-14"></i>
                        <input type="text" class="form-control rounded-xs" id="c31" placeholder="Enter Amount" required/>
                        <label for="c31" class="color-highlight form-label-always-">Enter Amount</label>
                        <span>(required)</span>
                    </div>
                    <div class="pb-2"></div>
                    <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-pencil-fill font-12"></i>
                        <textarea class="form-control rounded-xs" placeholder="Remark" id="c7"></textarea>
                        <label for="c7" class="color-theme">Remark</label>
                        <div class="valid-feedback">HTML5 does not offer Dates Field Validation!<!-- text for field valid--></div>
                    </div>

                </form>
                
            </div>
            <a href="#" data-bs-dismiss="offcanvas" class="mx-3 btn btn-full gradient-blue shadow-bg shadow-bg-s">Tap to Pay -  145 USD</a>
        </div>
    </div>

</div>
<!-- End of Page ID-->

<script src="scripts/bootstrap.min.js"></script>

<!-- Datepicker Core JS -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/bootstrap-datetimepicker.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="scripts/custom.js"></script>
<script>
    $(async function(){
        if(preloader){preloader.classList.remove('preloader-hide');}

        // API Data Fectch JS Starts Here
        let fetchTechnicianExpenseList = ''
        let postTechnicianExpenseList = ''
        let getItemById = ''
        let fetchExpenseTypeList = ''

        const pageOrigin = window.location.origin;
        const pagePathName = window.location.pathname;
        switch (pageOrigin) {
            case 'http://localhost':
                fetchTechnicianExpenseList = `${pageOrigin}:3000/api/app/getrcd/technician_expenselist.php`
                postTechnicianExpenseList = `${pageOrigin}:3000/api/app/getrcd/technician_expense.php`
                getItemById = `${pageOrigin}:3000/api/app/getrcd/technician_expense.php?getexpenseid=`
                fetchExpenseTypeList = `${pageOrigin}:3000/api/app/getrcd/expense.php?expensetypelist=true`
            break;
            case 'https://fielddesk.in':
                fetchTechnicianExpenseList = `${pageOrigin}/app/getrcd/technician_expenselist.php`
                postTechnicianExpenseList = `${pageOrigin}/app/getrcd/technician_expense.php`
                getItemById = `${pageOrigin}/app/getrcd/technician_expense.php?getexpenseid=`
                fetchExpenseTypeList = `${pageOrigin}/app/getrcd/expense.php?expensetypelist=true`
            break;
        }

        // Disable Modal Buttons Function
        function disableModalBtns(element, cancelBtn, closeBtn, saveBtn) {
            $(element).find(cancelBtn).prop('disabled', true);
            $(element).find(closeBtn).prop('disabled', true);
            $(element).find(saveBtn).prop('disabled', true);
        }
        // Enable Modal Buttons Function
        function enableModalBtns(element, cancelBtn, closeBtn, saveBtn) {
            $(element).find(cancelBtn).prop('disabled', false);
            $(element).find(closeBtn).prop('disabled', false);
            $(element).find(saveBtn).prop('disabled', false);
        }

        const fetchAPIFunc = async (fetchAPI) => {
            try {
                const response = await fetch(fetchAPI)
                const data = await response.json()

                console.log(data);
            } catch (error) { console.log(error); }
        }
        fetchAPIFunc(fetchTechnicianExpenseList)
        
        // fetch select options manually
        function manualFetchSelectOptions(element, optionsData) {
            optionsData.forEach(optionData => {
                const option = document.createElement('option');
                option.text = optionData.text;
                option.value = optionData.id;
                $(element).append(option);
            });
        }

        const expenseTypeData = []

        const fetchExpenseTypeListFunc = async (fetchAPI) => {
            try {
                const response = await fetch(fetchAPI)
                const data = await response.json()
                data.map(d => expenseTypeData.push({id: d.id, text: d.name}) )
                manualFetchSelectOptions("#expenseTypeDD", expenseTypeData)
                manualFetchSelectOptions("#expenseTypeEditDD", expenseTypeData)
            } catch (error) {
                console.error(error);
            }
        }
        await fetchExpenseTypeListFunc(fetchExpenseTypeList)

        // add customer form submit
        const addFormSubmit = ({api, formParentModal, itemNameAlert}) => {
            const form = $(formParentModal).find("#itemForm")
            const cancelBtn = $(formParentModal).find(".itemFormCancelBtn")
            const closeBtn = $(formParentModal).find(".itemFormCloseBtn")
            const saveBtn = $(formParentModal).find(".itemFormSubmtBtn")

            $(form).submit(function(e) {
                e.preventDefault()

                // validating form
                if (this.checkValidity() === false) {
                    e.preventDefault();
                    e.stopPropagation();
                } else { // exicuting form if validated
                    disableModalBtns(this, cancelBtn, closeBtn, saveBtn)
                    $(saveBtn).prepend(`<span class="spinner-border spinner-border-sm me-2" id="modalBtnLoader" role="status"></span>`)

                    $.ajax( {
                        url: api,
                        type: 'POST',
                        data: new FormData(this),
                        dataType: 'text',
                        contentType: false,
                        cache: false,
                        processData:false,
                    
                        success: function(data, textStatus, jqXHR) {
                            if (jqXHR.status === 204 || jqXHR.status === 200) {
                                enableModalBtns(form, cancelBtn, closeBtn, saveBtn)
                                $(saveBtn).find("#modalBtnLoader").remove()
                                $(form).removeClass('was-validated')
                                const msg = JSON.parse(data)
                                if (msg.status) {
                                    if (formParentModal) $(formParentModal).modal('hide');
                                    
                                    // fetchMasterTable(fetchTechnicianDetailsApi(urlTechnician(), urlMonth(), urlYear()), 'details')
                                    setTimeout(() => {
                                        $(form)[0].reset() 
                                        // $(form).find("select").trigger('change')
                                        // $(form).find(".summernote").summernote("code", "")
                                    }, 500);
                                    showToast('success', msg.message)
                                } else {
                                    showToast('error', msg.message)
                                }   
                            } else {
                                console.error(data === "" ? "Empty Response" : data);
                                enableModalBtns(form, cancelBtn, closeBtn, saveBtn)
                                $(saveBtn).find("#modalBtnLoader").remove()
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            enableModalBtns(form, cancelBtn, closeBtn, saveBtn)
                            $(saveBtn).find("#modalBtnLoader").remove()
                        }
                    });
                }
                this.classList.add('was-validated');
            });
        }

        const addFormSubmitFuncParam = {
            api: postTechnicianExpenseList,
            // formParentModal: '#techAttendenceUpdateModal',
            formParentModal: '',
            // itsTable: '.product-list-table', 
            // itsTableFetchFunction: fetchDataTable,
            // itsTableFetchFunctionApi: customerApiURL,
            itemNameAlert: "",
        };
        addFormSubmit(addFormSubmitFuncParam)
        
        if(preloader){preloader.classList.add('preloader-hide');}
    })
</script>
</body>
</html>