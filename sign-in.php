<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Octapro - Sign In</title>
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
    .octaprop-swal-title {
        font-size: 1rem !important;
        margin-left: 1rem !important;
    }
</style>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>


<!-- Page Wrapper-->
<div id="page">

    <!-- Page Content - Only Page Elements Here-->
    <div class="page-content footer-clear-xyz">

        <div class="card bg-5 card-fixed">
            <form id="loginForm" class="card-center mx-3 px-4 py-4 bg-white rounded-m" action="javascript:void(0);" method="POST" enctype="multipart/form-data" novalidate>
                <h1 class="font-30 font-800 mb-0">Octapro</h1>
                <p>Login to your Account.</p>
                <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                    <i class="bi bi-person-circle font-13"></i>
                    <input type="text" class="form-control rounded-xs" id="regEmail" name="reg_email" placeholder="Enter Email" value="<?php echo isset($_COOKIE['reg_email']) ? $_COOKIE['reg_email'] : ''; ?>" />
                    <label for="username" class="color-theme">Registered Email</label>
                    <span>(required)</span>
                </div>
                <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                    <i class="bi bi-phone font-13"></i>
                    <input type="text" class="form-control rounded-xs" id="userContact" name="user_contact" placeholder="Contact" value="<?php echo isset($_COOKIE['user_contact']) ? $_COOKIE['user_contact'] : ''; ?>" />
                    <label for="username" class="color-theme">Technician Mobile No.</label>
                    <span>(required)</span>
                </div>
                <div class="form-custom form-label form-border form-icon mb-4 bg-transparent">
                    <i class="bi bi-asterisk font-13"></i>
                    <input type="password" class="form-control rounded-xs" id="password" name="user_password" placeholder="Password" value="<?php echo isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : ''; ?>" />
                    <label for="password" class="color-theme">Password</label>
                    <span>(required)</span>
                </div>
                <div class="form-check form-check-custom">
                    <input class="form-check-input" type="checkbox" name="remember_me" value="" id="rememberCheck" <?php if (isset($_COOKIE['reg_email'])) { ?> checked <?php } ?>>
                    <label class="form-check-label font-12" for="rememberCheck">Remember this account</label>
                    <i class="is-checked color-highlight font-13 bi bi-check-circle-fill"></i>
                    <i class="is-unchecked color-highlight font-13 bi bi-circle"></i>
                </div>
                <button type="submit" class="btn btn-full w-100 gradient-highlight shadow-bg shadow-bg-s mt-4 login-form-submit-btn">SIGN IN</button>
                <div class="row">
                    <div class="col-6 text-start">
                        <a href="page-forgot-1.html" class="font-11 color-theme opacity-40 pt-4 d-block">Forgot Password?</a>
                    </div>
                    <div class="col-6 text-end">
                        <a href="page-signup-1.html" class="font-11 color-theme opacity-40 pt-4 d-block">Create Account</a>
                    </div>
                </div>
            </form>
            <div class="card-overlay rounded-0 m-0 bg-black opacity-70"></div>
        </div>

    </div>
    <!-- End of Page Content-->

    <!-- Off Canvas and Menu Elements-->
    <!-- Always outside the Page Content-->


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

        let loginFormSubmitApi = ''
        const pageOrigin = window.location.origin;
        switch (pageOrigin) {
            case 'http://localhost':
                loginFormSubmitApi = `${pageOrigin}:3000/api/app/getrcd/tech-services/authtechLogin.php`;
                break;
            case 'https://fielddesk.in':
                loginFormSubmitApi = `${pageOrigin}/app/getrcd/tech-services/authtechLogin.php`
                break;
            default:
                break;
        }

        $("#loginForm").on('submit', function(e){
            const form = $(this)
            const loginBtn = $(this).find(".login-form-submit-btn")
            e.preventDefault();

            // validating form
            if (this.checkValidity() === false) {
                e.preventDefault();
                e.stopPropagation();
            } else { // exicuting form if validated
                $(loginBtn).prop('disabled', true);
                $(loginBtn).prepend(`<span class="spinner-border spinner-border-sm me-2" id="modalBtnLoader" role="status"></span>`)
                $(":root").css("pointer-events", "none")
                // $(form).find(".login-card").find(".form-error-item").remove()

                $.ajax( {
                    url: loginFormSubmitApi,
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'text',
                    contentType: false,
                    cache: false,
                    processData:false,
                
                    success: function(response, textStatus, jqXHR) {
                        $(loginBtn).prop('disabled', false);
                        $(loginBtn).find("#modalBtnLoader").remove()
                        $(form).removeClass('was-validated')
                        $(":root").css("pointer-events", "")
                        
                        if (jqXHR.status === 204 || jqXHR.status === 200) { // checking if response status is true
                            const msg = JSON.parse(response)
                            if (msg.status) {
                                setTimeout(() => {
                                    $(form)[0].reset() 
                                    $(form).find("select").trigger('change')
                                    // window.location.href = 'index.html';
                                }, 1000);
                                showToast('success', msg.message)
                            } else {
                                console.error(msg.message);
                                alert(msg.message)
                                $(form).find(".login-card").append(`<p class="text-danger pt-2 form-error-item">* ${msg.message}</p>`)
                            }
                        } else {
                            console.error('error', response === "" ? "Empty Response" : response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        $(loginBtn).prop('disabled', false);
                        $(loginBtn).find("#modalBtnLoader").remove()
                        $(":root").css("pointer-events", "")
                    }
                });
            }
            this.classList.add('was-validated');
        })

        if(preloader){preloader.classList.add('preloader-hide');}
    })
</script>
</body>
</html>