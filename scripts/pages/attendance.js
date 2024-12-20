$(function() {
    const preloader = document.getElementById('preloader')
    if(preloader){
        preloader.classList.remove('loader-hide')
        preloader.classList.add('loader-show')
    }
    setTimeout(() => {

        const pageOrigin = window.location.origin;
        // let fetchChartsDataApi = ''
        let fetchTechnicianDetailsApi = ''
        switch (pageOrigin) {
            case 'http://localhost':
                fetchTechnicianDetailsApi = (month = '', year = '') => `${pageOrigin}:3000/api/app/getrcd/tech-services/attendancedetail.php?month=${month}&year=${year}`
            break;
            case 'https://fielddesk.in':
                fetchTechnicianDetailsApi = (month = '', year = '') => `${pageOrigin}/app/getrcd/tech-services/attendancedetail.php?month=${month}&year=${year}`
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
        fetchAPIFunc(fetchTechnicianDetailsApi(11, 2024))
        
        function inputTechnicianData(data) {
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
                    
                    const dayClass = status === "Present" ? "attended-undefined" : status === "Leave" ? "leave" : status === "Holiday" ? "holiday" : status === "Absent" ? "absent" : "";

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

        if(preloader){
            preloader.classList.remove('loader-show')
            preloader.classList.add('loader-hide')
        }

    }, 500);
})