$(function(){
    const preloader = document.getElementById('preloader')
    if(preloader){
        preloader.classList.remove('loader-hide')
        preloader.classList.add('loader-show')
    }

    setTimeout(async () => {
        
        $("html").css("height","100%")
        $("body").css("height","100%")
        
        // API Data Fectch JS Starts Here
        let fetchTechnicianExpenseList = ''
        let postTechnicianExpenseList = ''
        let getItemById = ''
        let fetchExpenseTypeList = ''

        const pageOrigin = window.location.origin;
        const pagePathName = window.location.pathname;
        switch (pageOrigin) {
            case 'http://localhost':
                fetchTechnicianExpenseList = `${pageOrigin}:3000/api/app/getrcd/tech-services/expense.php?technicianexpenselist=true`
                postTechnicianExpenseList = `${pageOrigin}:3000/api/app/getrcd/tech-services/expense.php`
                getItemById = `${pageOrigin}:3000/api/app/getrcd/tech-services/expense.php?getexpenseid=`
                fetchExpenseTypeList = `${pageOrigin}:3000/api/app/getrcd/expense.php?expensetypelist=true`
            break;
            case 'https://fielddesk.in':
                fetchTechnicianExpenseList = `${pageOrigin}/app/getrcd/tech-services/expense.php?technicianexpenselist=true`
                postTechnicianExpenseList = `${pageOrigin}/app/getrcd/tech-services/expense.php`
                getItemById = `${pageOrigin}/app/getrcd/tech-services/expense.php?getexpenseid=`
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

                const currentDate = new Date();
                const currentDateString = currentDate.toISOString().split('T')[0];
                $("#trnsDate").val(currentDateString);
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

    }, 500);


    if(preloader){
        preloader.classList.remove('loader-show')
        preloader.classList.add('loader-hide')
    }
    
})