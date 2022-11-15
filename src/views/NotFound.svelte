<script>

</script>

<svelte:head>
    <title>DevEcommerce | Página No Encontrada</title>
    <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->

    <!-- Layout config Js -->
    <script defer src="http://localhost:8080/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link rel="shortcut icon" href="http://localhost:8080/images/favicon.ico">
    <link
        href="http://localhost:8080/css/bootstrap.min.css"
        rel="stylesheet"
        type="text/css"
    />
    <!-- Icons Css -->
    <link
        href="http://localhost:8080/css/icons.min.css"
        rel="stylesheet"
        type="text/css"
    />
    <!-- App Css-->
    <link
        href="http://localhost:8080/css/app.min.css"
        rel="stylesheet"
        type="text/css"
    />
    <!-- custom Css-->
    <link
        href="http://localhost:8080/css/custom.min.css"
        rel="stylesheet"
        type="text/css"
    />

    <!-- ============================================ -->
    <!-- Js tempalte -->
    <!-- ============================================ -->
    
    <!-- JAVASCRIPT -->
    <script defer src="http://localhost:8080/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="http://localhost:8080/libs/simplebar/simplebar.min.js"></script>
    <script defer src="http://localhost:8080/libs/node-waves/waves.min.js"></script>
    <script defer src="http://localhost:8080/libs/feather-icons/feather.min.js"></script>
    <script defer src="http://localhost:8080/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script defer src="http://localhost:8080/js/plugins.js"></script>

    <!-- particles js -->
    <script defer src="http://localhost:8080/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script defer src="http://localhost:8080/js/pages/particles.app.js"></script>


</svelte:head>

<main>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center pt-4">
                            <div class="">
                                <img src="http://localhost:8080/images/error.svg" alt="" class="error-basic-img move-animation">
                            </div>
                            <div class="mt-n4">
                                <h1 class="display-1 fw-medium">Error 404</h1>
                                <h3 class="text-uppercase">Lo sentimos, página no encontrada😭</h3>
                                <p class="text-muted mb-4">¡La página que buscas no está disponible!</p>
                                <a href="/home" class="btn btn-success" style="color: #fff !important"><i class="mdi mdi-home me-1"></i>Regresar a Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> Creado por <i class="mdi mdi-heart text-danger"></i> DevStore
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
</main>