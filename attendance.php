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
        <div class="contianer-fluid px-2 bg-white rounded-s mx-2">
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
                            Holiday / Week Off
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
<script>
    $(function(){
        if(preloader){preloader.classList.remove('preloader-hide');}

        const pageOrigin = window.location.origin;
        // let fetchChartsDataApi = ''
        let fetchTechnicianDetailsApi = ''
        switch (pageOrigin) {
            case 'http://localhost':
                fetchTechnicianDetailsApi = (technician, month = '', year = '') => `${pageOrigin}:3000/api/app/getrcd/technicianattendancedetail.php?technician=${technician}&month=${month}&year=${year}`
            break;
            case 'https://fielddesk.in':
                fetchTechnicianDetailsApi = (technician, month = '', year = '') => `${pageOrigin}/app/getrcd/technicianattendancedetail.php?technician=${technician}&month=${month}&year=${year}`
            break;
        }

        // get values from url search parameters
        const url = () => new URL(window.location.href);
        const searchParams = () => new URLSearchParams(url().search);
        const urlTechnician = () => searchParams().get('technician');
        const urlMonth = () => searchParams().get('month');
        const urlYear = () => searchParams().get('year');

        const fetchAPIFunc = async (fetchAPI) => {
            try {
                const response = await fetch(fetchAPI)
                const data = await response.json()
                const details = data?.details

                intigrateCalendarData(details)
                inputTechnicianData(data)
            } catch (error) {
                console.log(error);
            }
        }
        fetchAPIFunc(fetchTechnicianDetailsApi('RAJKAMAL', 11, 2024))
        
        function inputTechnicianData(data) {
            console.log(data);
            // set css variables from api 
            $(':root').css({
                '--attendence-present-color': data?.colorIndecators?.colorPresent,
                '--attendence-absent-color': data?.colorIndecators?.colorAbsent,
                '--attendence-leave-color': data?.colorIndecators?.colorLeave,
                '--attendence-holiday-color': data?.colorIndecators?.colorHoliday,
                '--attendence-weekoff-color': data?.colorIndecators?.colorWeekoff,
                '--attendence-text-color': data?.colorIndecators?.colorFont,
            });

            $(".indecator-present > span").text(data?.summary?.total_PRESENT || 0)
            $(".indecator-absent > span").text(data?.summary?.total_ABSENT || 0)
            $(".indecator-leave > span").text(data?.summary?.total_LEAVE || 0)
            $(".indecator-holiday > span").text(data?.summary?.total_HOLIDAY + data?.summary?.total_WEEKOFF || 0)
            // $(".indecator- > span").text(data?.total_WEEKOFF || 0)
        }

        // Calendar JS Starts here
        function intigrateCalendarData(data) {
            let attendanceDataNew = {}
            data.map(d => {
                attendanceDataNew = {...attendanceDataNew, [d.date] : {id: d?.enc_id, date: d?.date, status: d?.type, in: d?.check_in_time, out: d?.check_out_time, inTimeLatitude: d?.check_in_latitude, inTimeLongitude: d?.check_in_longitude, outTimeLatitude: d?.check_out_latitude, outTimeLongitude: d?.check_out_longitude}}
            })
        
            const $calendarGrid = $("#calendar-content");
            const $header = $("#month-year");
            const $days = $("#calendar-content");
            let currentDate = new Date();
            currentDate.setMonth(urlMonth() - 1);
        
            // Generate Days of the Week
            const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            const generateDaysOfWeek = () => {
                $days.empty();
                $.each(daysOfWeek, function (_, day) {
                    $days.append(`<span class="week-name py-1 mb-1">${day}</span>`);
                });
            }
        
            // Generate Calendar Grid
            const generateCalendar = (year, month, attendanceDataParam) => {
                // $calendarGrid.empty();
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                $header.text(
                    new Date(year, month).toLocaleString("default", { month: "long", year: "numeric", })
                );

                // Fill blank spaces before the first day
                for (let i = 0; i < firstDay; i++) {
                    $calendarGrid.append('<div class="day blank-undefined"></div>');
                }

                // Fill days of the month
                for (let day = 1; day <= daysInMonth; day++) {
                    
                    const dateKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
                    const attendance = attendanceDataParam[dateKey] || { status: "" };
                    const status = $(attendance.status).text().toLowerCase().replace(/^\w/, c => c.toUpperCase()) || "";
                    const id = attendance.id;
                    const date = attendance.date || ""
                    const inTime = attendance.in || "";
                    const outTime = attendance.out || "";
                    const inTimeLatitude = attendance.inTimeLatitude || "";
                    const inTimeLongitude = attendance.inTimeLongitude || "";
                    const outTimeLatitude = attendance.outTimeLatitude || "";
                    const outTimeLongitude = attendance.outTimeLongitude || "";
                    
                    const dayClass = status === "Present" ? "attended" : status === "Leave" ? "leave" : status === "Holiday" ? "holiday" : status === "Absent" ? "absent" : "";

                    const dayElement = `
                            <div class="day d-flex">
                                <div data-id="${id}" data-bs-toggle="modal" data-bs-target="#techAttendenceUpdateModal" class="date ${dayClass} d-flex align-items-center justify-content-center">${day}</div>
                            </div>`;
                    $calendarGrid.append(dayElement);
                }

                // Assume `lastDayDate` is the Date object for the last day of the month
                const lastDayOfWeek = new Date(year, month, daysInMonth).getDay();
                // Calculate how many blank days to add (6 = Saturday, the end of the week)
                const blanksAfter = 6 - lastDayOfWeek;
                // Fill blank spaces after the last day
                for (let i = 0; i < blanksAfter; i++) {
                    $calendarGrid.append('<div class="day blank-undefined"></div>');
                }
            }
        
            // Navigation Buttons
            $("#prev-month").click(function () {
                const fetchTechnicianDetails = async () => {
                    try {
                        currentDate.setMonth(currentDate.getMonth() - 1);
                        const monthYearNumeric = new Date(currentDate.getFullYear(), currentDate.getMonth()).toLocaleString("default", { month: "numeric", year: "numeric", })

                        const url = new URL(window.location.href);
                        const searchParams = new URLSearchParams(url.search);
                        searchParams.set('month', monthYearNumeric.split("/")[0]);
                        searchParams.set('year', monthYearNumeric.split("/")[1]);
                        url.search = searchParams.toString();
                        window.history.pushState({}, '', url);
                        
                        const response = await fetch(fetchTechnicianDetailsApi(urlTechnician(), monthYearNumeric.split("/")[0], monthYearNumeric.split("/")[1])) 
                        const data = await response.json();
                        inputTechnicianData(data)
                        // $('.master-table').DataTable().clear().rows.add(data?.details).draw();

                        attendanceDataNew = {}
                        data?.details.map(d => {
                            attendanceDataNew = {...attendanceDataNew, [d.date] : {id: d?.enc_id, date: d?.date, status: d?.type, in: d?.check_in_time, out: d?.check_out_time, inTimeLatitude: d?.check_in_latitude, inTimeLongitude: d?.check_in_longitude, outTimeLatitude: d?.check_out_latitude, outTimeLongitude: d?.check_out_longitude}}
                        })
                        $days.empty();
                        generateDaysOfWeek();
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth(), attendanceDataNew);
                    } catch (error) {
                        console.error(error);   
                    }
                }
                fetchTechnicianDetails()
            });
        
            $("#next-month").click(function () {
                const fetchTechnicianDetails = async () => {
                    try {
                        currentDate.setMonth(currentDate.getMonth() + 1);
                        const monthYearNumeric = new Date(currentDate.getFullYear(), currentDate.getMonth()).toLocaleString("default", { month: "numeric", year: "numeric", })

                        const url = new URL(window.location.href);
                        const searchParams = new URLSearchParams(url.search);
                        searchParams.set('month', monthYearNumeric.split("/")[0]);
                        searchParams.set('year', monthYearNumeric.split("/")[1]);
                        url.search = searchParams.toString();
                        window.history.pushState({}, '', url);

                        const response = await fetch(fetchTechnicianDetailsApi(urlTechnician(), monthYearNumeric.split("/")[0], monthYearNumeric.split("/")[1])) 
                        const data = await response.json();
                        inputTechnicianData(data)
                        // $('.master-table').DataTable().clear().rows.add(data?.details).draw();

                        attendanceDataNew = {}
                        data?.details.map(d => {
                            attendanceDataNew = {...attendanceDataNew, [d.date] : {id: d?.enc_id, date: d?.date, status: d?.type, in: d?.check_in_time, out: d?.check_out_time, inTimeLatitude: d?.check_in_latitude, inTimeLongitude: d?.check_in_longitude, outTimeLatitude: d?.check_out_latitude, outTimeLongitude: d?.check_out_longitude}}
                        })
                        $days.empty();
                        generateDaysOfWeek();
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth(), attendanceDataNew);
                    } catch (error) {
                        console.error(error);   
                    }
                }
                fetchTechnicianDetails()
            });
        
            // Initial Setup
            generateDaysOfWeek();
            generateCalendar(urlYear(), urlMonth() - 1, attendanceDataNew);
            // generateCalendar(currentDate.getFullYear(), currentDate.getMonth(), attendanceDataNew);
        }

        if(preloader){preloader.classList.add('preloader-hide');}
    })
</script>
</body>
</html>