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
    .form-custom .tasks-date-filter-select {
        height: auto !important;
        padding-top: 10px !important;
        padding-bottom: 10px !important;
    }

    .legend-color {
        padding: 0px 8px;
        border-radius: 100%;
        margin-right: 5px;
    }
</style>

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

        <div class="contianer-fluid px-2 bg-white">
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

        <!-- chart -->
        <div class="card card-style px-0 mx-0 rounded-0 shadow-0">
            <div class="row g-0">
                <div class="col-6">
                    
                    <h3 class="text-center pt-3 px-2 mb-2">My Tasks</h3>
                    <div class="pie-chart mx-auto no-clicks w-100s" id="pieChart" style="width: 100%;"></div>
                    <div id="pieChartLegendsContainer" class="px-3"></div>

                </div>
                <div class="col-6">

                    <div class="content mt-0 mb-0">

                    <div class="form-custom d-flex align-items-center ">
                        <label for="c6" class="color-theme form-label-active ps-0 pe-2">Show: </label>
                        <select class="form-select rounded-xs tasks-date-filter-select" id="c6" aria-label="Floating label select example"></select>
                    </div>
        
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3" id="chartDataItem_1">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-red shadow-bg shadow-bg-xs"><i class="bi bi-droplet font-18 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1">
                                <h5 class="mb-n1 text-break">Utilities</h5>
                                <h4 class="mb-n1 color-red-dark">$1530.41</h4>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3" id="chartDataItem_2">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-green shadow-bg shadow-bg-xs"><i class="bi bi-wallet font-18 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1">
                                <h5 class="mb-n1 text-break">Income</h5>
                                <h4 class="mb-n1 color-green-dark">$4530.55</h4>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3" id="chartDataItem_3">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-blue shadow-bg shadow-bg-xs"><i class="bi bi-arrow-repeat font-20 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1">
                                <h5 class="mb-n1 text-break">Subscriptions</h5>
                                <h4 class="mb-n1 color-red-dark">$340.31</h4>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3" id="chartDataItem_4">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-mint shadow-bg shadow-bg-xs"><i class="bi bi-plus font-24 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1">
                                <h5 class="mb-n1 text-break">Medical</h5>
                                <h4 class="mb-n1 color-red-dark">$270.31</h4>
                            </div>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-activity" href="#" class="d-flex pb-3" id="chartDataItem_5">
                            <div class="align-self-start">
                                <span class="icon icon-very-small rounded-xs me-2 gradient-magenta shadow-bg shadow-bg-xs"><i class="bi bi-heart font-16 color-white"></i></span>
                            </div>
                            <div class="align-self-start ps-1">
                                <h5 class="mb-n1 text-break">Random</h5>
                                <h4 class="mb-n1 color-red-dark">$480.31</h4>
                            </div>
                        </a>
                        
                    </div>

                </div>
            </div>

        </div>

        <!-- <div class="divider"></div> -->

        <div class="contianer-fluid px-2 bg-white">
            <div class="row pb-2 g-2">

                <div class="col-6">
                    <div class="card card-style border shadow-0 rounded-0 m-0 h-100 ambouse">
                        <div class="card-body p-2 pb-0">
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <!-- <i class="bi bi-calendar-week font-16 color-green-dark me-2"></i> -->
                                    <h3 class="font-14">Attendence (<span class="attendence-month">Nov</span>)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 p-2">
                            <div class="row attendence-details fw-bold">
                                <div class="col-6 d-flex flex-column color-green-dark">
                                    <span>Present -</span><span class="attendence-details-present-value font-18">10</span> 
                                </div>
                                <div class="col-6 d-flex flex-column color-red-dark">
                                    <span>Abscent - </span><span class="attendence-details-abscent-value font-18">2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-style border shadow-0 rounded-0 m-0 h-100 ambouse">
                        <div class="card-body p-2 pb-0">
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <!-- <i class="bi bi-calendar-week font-16 color-green-dark me-2"></i> -->
                                    <h3 class="font-14">Travelled Distance (<span class="travel-month">Nov</span>)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 p-2">
                            <p class="d-flex mb-0 travel-details fw-bold">
                                <span class="travel-details-unit ms-1 font-18"> 250</span><span class="font-12" style="margin-top: 2px;">Kms</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-style border shadow-0 rounded-0 m-0 h-100 ambouse">
                        <div class="card-body pb-0 p-2">
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <!-- <i class="bi bi-calendar-week font-16 color-green-dark me-2"></i> -->
                                    <h3 class="font-13">Collection</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 p-2">
                            <div class="row collection-details fw-bold">
                                <div class="col-6 d-flex flex-column">
                                    <span>Collect -</span><span class="collection-details-collect font-18">10</span> 
                                </div>
                                <div class="col-6 d-flex flex-column">
                                    <span>Transfer - </span><span class="collection-details-transfer font-18">2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-style border shadow-0 rounded-0 m-0 h-100 ambouse">
                        <div class="card-body p-2 pb-0">
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <!-- <i class="bi bi-calendar-week font-16 color-green-dark me-2"></i> -->
                                    <h3 class="font-13">Expense (<span class="expense-month">Nov</span>)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 p-2">
                            <div class="row expense-details fw-bold">
                                <div class="col-6 d-flex flex-column">
                                    <span>Amount - </span><span class="expense-details-amount font-18">10</span> 
                                </div>
                            </div>
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

<!-- Datepicker Core JS -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/bootstrap-datetimepicker.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="scripts/custom.js"></script>
<script>
    $(function(){
        const pageOrigin = window.location.origin;
        let fetchChartsDataApi = ''
        switch (pageOrigin) {
            case 'http://localhost':
                fetchChartsDataApi = (date) => `${pageOrigin}:3000/api/app/getrcd/tech-services/dashboard.php?getdashboardrcd=true&filter=${date}`
            break;
            case 'https://fielddesk.in':
                fetchChartsDataApi = (date) => `${pageOrigin}/app/getrcd//tech-services/dashboard.php?getdashboardrcd=true&filter=${date}`
            break;
        }

        // localStorage.removeItem('lastPunchInDate')
        // localStorage.removeItem('lastPunchInTime')
        const lastPunchInDate = localStorage.getItem('lastPunchInDate');
        const currentDate = moment().format('YYYY-MM-DD');  // Format the current date (year-month-day)
        const lastPunchInTime = localStorage.getItem('lastPunchInTime');
        const lastPunchOutTime = localStorage.getItem('lastPunchOutTime');
        if (lastPunchInTime && lastPunchInDate === currentDate) {
            $("#punchInButton > span:eq(1)").text(lastPunchInTime).parent().addClass("punched")
            $('#punchInButton').prop('disabled', true);
            $('#punchOutButton').prop('disabled', false);
        }

        if (lastPunchOutTime && lastPunchInDate === currentDate) $("#punchOutButton > span:eq(1)").text(lastPunchOutTime).parent().addClass("punched")

        $('#punchInButton').click(function() {
            // Check if the user has already punched in today
            if (lastPunchInDate === currentDate) {
                console.log("You have already punched in today.");
            } else {
                const time = () => moment().format('h:mm A');
                localStorage.setItem('lastPunchInDate', currentDate);
                localStorage.setItem('lastPunchInTime', time());
                $("#punchInButton > span:eq(1)").text(time()).parent().addClass("punched")
                $('#punchInButton').prop('disabled', true);
                $('#punchOutButton').prop('disabled', false);
            }
        });

        $('#punchOutButton').click(function() {
            const time = () => moment().format('h:mm A');
            localStorage.setItem('lastPunchOutTime', time());
            $("#punchOutButton > span:eq(1)").text(time()).parent().addClass("punched")
        });

        // Define an array of options
        var options = [
            { value: `${moment().format('DD-MM-YYYY')} / ${moment().format('DD-MM-YYYY')}`, text: "Today" },
            { value: `${moment().startOf('week').format('DD-MM-YYYY')} / ${moment().endOf('week').format('DD-MM-YYYY')}`, text: "This Week" },
            { value: `${moment().startOf('month').format('DD-MM-YYYY')} / ${moment().endOf('month').format('DD-MM-YYYY')}`, text: "This Month" },
            { value: `${moment().startOf('year').format('DD-MM-YYYY')} / ${moment().endOf('year').format('DD-MM-YYYY')}`, text: "This Year" }
        ];
        
        // Loop through the options array and append each option to the select
        $.each(options, function(index, option) {
            var newOption = $(`<option value="${option.value}">${option.text}</option>`);
            $(".tasks-date-filter-select").append(newOption);
        });

        $(".tasks-date-filter-select").on('change', function(){
            fetchChartsData($(this).val().replace(/\s*\/\s*/, '/'));
        })
    
        async function fetchChartsData(dateParam) {
            try {
                const date = dateParam.replace(/\s*\/\s*/, '/')
                
                const response = await fetch(fetchChartsDataApi(date));
                const data = await response.json();
                const ServiceCatgegory = data.ServiceCatgegory
                const service_type = data.service_type
                
                const attendance = data.attendance[0]
                const travelDistance = data.travelDistance[0]
                const mycollection = data.mycollection[0]
                const expense = data.expense[0]
        
                const newSeries = ServiceCatgegory.map(d => parseInt(d.count, 10))
                const newLabels = ServiceCatgegory.map(d => d.status)
                window.pieChart.updateSeries(newSeries);
                window.pieChart.updateOptions({ labels: newLabels });

                const chartEvent = {
                    events: {
                        dataPointSelection: (event, chartContext, config) => {
                            console.log("Updated Click:", config.w.config.labels[config.dataPointIndex]);
                        }
                    }
                }
                window.pieChart.updateOptions({ chart: chartEvent });

                // Update custom legends
                createCustomLegends(window.pieChart);

                service_type.map((d,i) => {
                    $(`#chartDataItem_${i+1}`).find("h5").text(d.name)
                    $(`#chartDataItem_${i+1}`).find("h4").text(d.service_count)
                })

                $(".attendence-details-present-value").text(`${attendance?.present}`)
                $(".attendence-details-abscent-value").text(`${attendance?.absent}`)
                $(".attendence-month").text(`${attendance?.month.substring(0, 3)}`)

                $(".travel-details-unit").text(`${travelDistance?.km}`)
                $(".travel-month").text(`${travelDistance?.month.substring(0, 3)}`)
                
                $(".collection-details-collect").text(`${mycollection?.Callect}`)
                $(".collection-details-transfer").text(`${mycollection?.Transfer}`)

                $(".expense-details-amount").text(`${expense?.Amount}`)
                $(".expense-month").text(`${expense?.month.substring(0, 3)}`)

            } catch (error) {
                console.error(error);
            }
        }

        function createCustomLegends(chart) {
            const labels = chart.w.globals.labels || [];
            const series = chart.w.globals.series || [];
            const colors = chart.w.globals.colors || [];
            const legendContainer = document.getElementById("pieChartLegendsContainer");

            // Clear existing legends
            legendContainer.innerHTML = '';

            // Check if labels and series exist
            if (labels.length === 0 || series.length === 0) {
                console.warn("No labels or series data available for legends.");
                return;
            }

            labels.forEach((label, index) => {
                const value = series[index];
                if (value === undefined) return; // Skip undefined values

                const legendItem = document.createElement('div');
                legendItem.className = 'legend-item';
                legendItem.innerHTML = `
                    <!-- <span class="legend-color"></span> -->
                    <span style="color: ${colors[index] || '#000'}; font-weight: bold;">${label}: ${value}</span>
                `;
                legendContainer.appendChild(legendItem);

                // Add click event to toggle series visibility
                legendItem.addEventListener('click', () => {
                    if (chart.toggleSeries) {
                        chart.toggleSeries(label);
                    }
                });
            });
        }
        
        setTimeout(() => {
            fetchChartsData($(".tasks-date-filter-select").val().replace(/\s*\/\s*/, '/'));
        }, 500);
    })
</script>
</body>
</html>