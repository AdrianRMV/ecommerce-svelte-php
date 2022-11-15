//verificado
<script> 

</script>

<svelte>
    <title>DevEcommerce | Salir </title>
   <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->

    <!-- Layout config Js -->
    <script defer src="http://localhost:8080/js/layout.js"></script>
    <!-- Bootstrap Css -->
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
   <script src="http://localhost:8080/libs/particles.js/particles.js"></script>

   <!-- particles app js -->
   <script src="http://localhost:8080/js/pages/particles.app.js"></script>
</svelte>

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
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="http://localhost:8080/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">DevStore</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4 text-center">
                                <lord-icon src="https://cdn.lordicon.com/hzomhqxz.json" trigger="loop" colors="primary:#4b38b3,secondary:#08a88a" style="width:180px;height:180px">
                                </lord-icon>

                                <div class="mt-4 pt-2">
                                    <h5>Has salido de DevStore</h5>
                                    <p class="text-muted">Gracias por usar <span class="fw-semibold">DevStore</span></p>
                                    <div class="mt-4">
                                        <a href="#!" class="btn btn-success w-100">Iniciar Sesión</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->
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
    <!-- end auth-page-wrapper -->
</main>