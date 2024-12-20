$(function(){
    const preloader = document.getElementById('preloader')
    if(preloader){
        preloader.classList.remove('loader-hide')
        preloader.classList.add('loader-show')
    }

    setTimeout(() => {
        
        const pageOrigin = window.location.origin;
        // let fetchChartsDataApi = ''
        let fetchChartsDataByParameter = ''
        switch (pageOrigin) {
            case 'http://localhost':
                // fetchChartsDataApi = (date) => `${pageOrigin}:3000/api/app/getrcd/tech-services/dashboard.php?getdashboardrcd=true&filter=${date}`
                fetchChartsDataByParameter = (date, paramServiceType = '', paramTechDetails = '', paramRevenue = '') => `${pageOrigin}:3000/api/app/getrcd/tech-services/dashboard.php?getdashboardrcd=true&filter=${date}&service_status=${paramServiceType}&techdetail_filter=${paramTechDetails}&revenue_filter=${paramRevenue}`
            break;
            case 'https://fielddesk.in':
                // fetchChartsDataApi = (date) => `${pageOrigin}/app/getrcd/tech-services/dashboard.php?getdashboardrcd=true&filter=${date}`
                fetchChartsDataByParameter = (date, paramServiceType = '', paramTechDetails = '', paramRevenue = '') => `${pageOrigin}/app/getrcd/tech-services/dashboard.php?getdashboardrcd=true&filter=${date}&service_status=${paramServiceType}&techdetail_filter=${paramTechDetails}&revenue_filter=${paramRevenue}`
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

        // tasks select options append starts here
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
        // tasks select options append ends here

        // other details select options append starts here
        var options = [
            { value: ` `, text: "Please Select" },
            { value: `${moment().format('MM')} / ${moment().format('MM')}`, text: "Current Month" },
        ];
        
        // Loop through the options array and append each option to the select
        $.each(options, function(index, option) {
            var newOption = $(`<option value="${option.value}">${option.text}</option>`);
            $(".other-details-filter-select").append(newOption);
        });

        $(".other-details-filter-select").on('change', function(){
            fetchOtherDetailsData($(".tasks-date-filter-select").val(), $(this).val())
        })
        // other details select options append ends here

        // revenue select options append starts here
        var options = [
            { value: ` `, text: "Please Select" },
            { value: `${moment().format('MM')} / ${moment().format('MM')}`, text: "This Week" },
        ];
        
        // Loop through the options array and append each option to the select
        $.each(options, function(index, option) {
            var newOption = $(`<option value="${option.value}">${option.text}</option>`);
            $(".revenue-filter-select").append(newOption);
        });

        $(".revenue-filter-select").on('change', function(){
            fetchRevenueData($(".tasks-date-filter-select").val(), $(this).val())
        })
        // revenue select options append ends here

        async function fetchChartsData(dateParam) {
            try {
                const date = dateParam.replace(/\s*\/\s*/, '/')
                
                const response = await fetch(fetchChartsDataByParameter(date));
                const data = await response.json();
                const ServiceCatgegory = data.ServiceCatgegory
                const service_type = data.service_type
                
                const attendance = data.attendance[0]
                const travelDistance = data.travelDistance[0]
                const mycollection = data.mycollection[0]
                const expense = data.expense[0]

                const open_jobs = data.open_jobs[0]
                const revenue = data.revenue[0]
        
                const newSeries = ServiceCatgegory.map(d => parseInt(d.count, 10))
                const newLabels = ServiceCatgegory.map(d => d.status)
                chartUpdateFunc({newSeries, newLabels, service_type})

                openJobsFetchFunc(open_jobs)

                otherDetailsFetchFunc({attendance, travelDistance, mycollection, expense})

                revenueFetchFunc(revenue)

            } catch (error) {
                console.error(error);
            }
        }

        async function fetchOtherDetailsData(dateParam, value) {
            try {
                const date = dateParam.replace(/\s*\/\s*/, '/')
                
                const response = await fetch(fetchChartsDataByParameter(date, '', value));
                const data = await response.json();
                
                const attendance = data.attendance[0]
                const travelDistance = data.travelDistance[0]
                const mycollection = data.mycollection[0]
                const expense = data.expense[0]

                otherDetailsFetchFunc({attendance, travelDistance, mycollection, expense})

            } catch (error) {
                console.error(error);
            }
        }

        async function fetchRevenueData(dateParam, value) {
            try {
                const date = dateParam.replace(/\s*\/\s*/, '/')
                
                const response = await fetch(fetchChartsDataByParameter(date, '', '', value));
                const data = await response.json();
                const ServiceCatgegory = data.ServiceCatgegory

                const revenue = data.revenue[0]
                revenueFetchFunc(revenue)

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

            // Create a fragment to minimize reflows
            const fragment = document.createDocumentFragment();

            let col6Container = null; // Track the current `.col-6` container
            labels.forEach((label, index) => {
                const value = series[index];
                if (value === undefined) return; // Skip undefined values

                // Create the `.col-6` container if none exists or if it already contains 3 items
                if (!col6Container || col6Container.children.length === 3) {
                    col6Container = document.createElement('div');
                    col6Container.className = 'col-6';
                    fragment.appendChild(col6Container);
                }

                // Create the legend item
                const legendItem = document.createElement('div');
                legendItem.className = 'legend-item font-11 d-flex justify-content-between';
                $(legendItem).css({ "color": colors[index] || '#000', "font-weight": "bold" });
                legendItem.innerHTML = `
                    <!-- <span class="legend-color"></span> -->
                    <!-- <span style="color: ${colors[index] || '#000'}; font-weight: bold;">${label}: ${value}</span> -->
                    <span style="color: ${colors[index] || '#000'}; font-weight: bold;">${label}</span> <span>:</span> <span>${value}</span>
                `;
                col6Container.appendChild(legendItem);

                // Add click event to toggle series visibility
                legendItem.addEventListener('click', () => {
                    if (chart.toggleSeries) {
                        chart.toggleSeries(label);
                    }
                });
            });

            // Append the fragment to the legend container
            legendContainer.appendChild(fragment);
        }

        function chartUpdateFunc({newSeries, newLabels, service_type}) {
            window.pieChart.updateSeries(newSeries);
            window.pieChart.updateOptions({ labels: newLabels });

            const chartEvent = {
                events: {
                    dataPointSelection: async (event, chartContext, config) => {
                        try {

                            const currentLabel = config.w.config.labels[config.dataPointIndex]
                            const response = await fetch(fetchChartsDataByParameter($(".tasks-date-filter-select").val().replace(/\s*\/\s*/, '/'), currentLabel))
                            const json = await response.json()
                            const service_type = json.service_type

                            service_type.map((d,i) => {
                                $(`#chartDataItem_${i+1}`).find("h5").text(d.name)
                                $(`#chartDataItem_${i+1}`).find("h4").text(d.service_count)
                            })
                            
                        } catch (error) {
                            console.error(error);
                        }
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
        }

        function openJobsFetchFunc(open_jobs) {
            $(".open-jobs-current-task-value").text(parseFloat(open_jobs['Current Task']))
            $(".open-jobs-overdue-task-value").text(parseFloat(open_jobs['Overdue Task']))
            $(".open-jobs-upcoming-task-value").text(parseFloat(open_jobs['Upcomming Task']))
        }

        function otherDetailsFetchFunc({attendance, travelDistance, mycollection, expense}) {
            $(".attendence-details-present-value").text(`${attendance?.present}`)
            $(".attendence-details-abscent-value").text(`${attendance?.absent}`)
            // $(".attendence-month").text(`${attendance?.month.substring(0, 3)}`)

            $(".travel-details-unit").text(`${travelDistance?.km}`)
            // $(".travel-month").text(`${travelDistance?.month.substring(0, 3)}`)
            
            $(".collection-details-collect").text(`${mycollection?.Callect}`)
            $(".collection-details-transfer").text(`${mycollection?.Transfer}`)

            $(".expense-details-amount").text(`${expense?.Amount}`)
            // $(".expense-month").text(`${expense?.month.substring(0, 3)}`)
        }

        function revenueFetchFunc(revenue) {
            $(".service-amount").text(parseFloat(revenue['Service Amount']))
            $(".parts-amount").text(parseFloat(revenue['Parts Amount']))
        }
        
        setTimeout(() => {
            fetchChartsData($(".tasks-date-filter-select").val().replace(/\s*\/\s*/, '/'));
        }, 1000);

    }, 500);


    if(preloader){
        preloader.classList.remove('loader-show')
        preloader.classList.add('loader-hide')
    }
    
})