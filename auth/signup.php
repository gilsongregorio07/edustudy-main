<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SignUp Cover | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>
    <link href="../layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/horizontal-light-menu/loader.js"></script>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="../layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    
    <link href="../layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <style>
        .header_section {
            width: 100%;
            background-image: url(../landing/images/banner-bg.png);
            height: auto;
            background-size: cover;
            padding-bottom: 90px;
        }
    </style>

</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex header_section">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto ">
                    <div class="card mt-3 mb-3 bg-light">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    
                                    <h2>Register</h2>
                                    <p>Enter your details to register</p>
                                    
                                </div>
                                <form action="inc/signup.inc.php" method="post">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password" required>
                                        </div>
                                    </div>
                                
                                    
                                    <div class="col-12">
                                        <div class="mb-4">
                                           
                                            <input type="submit" name="submit" value="REGISTER" class="btn btn-secondary w-100">
                                        </div>
                                    </div>
                                </form>
                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="mb-0">Already have an account ? <a href="signin.php" class="text-warning">Sign in</a></p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        

         // Check for the query parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const registrationSuccess = urlParams.get('registration_success');
        const errorMessage = String(urlParams.get('error'));
        console.log(registrationSuccess)
        console.log(errorMessage)
        // If registration is successful, show an alert
        if (registrationSuccess === 'true') {
            Swal.fire({
            icon:'success',
            title: "Info",
            text: "Registration succesfull",
            timer: 2000,
            timerProgressBar: true,
            }).then((result) => {
            /* Read more about handling dismissals below */
                window.location.href = 'signin.php'
            });
        }
        if(errorMessage == 'email_exist'){
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Email already exist",
            });
        }
        if(errorMessage == 'password_error'){
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Password not matched",
            });
        }
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>