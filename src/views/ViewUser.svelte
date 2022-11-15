//verificado
<script>

</script>

<svelte:head>
    <title>DevEcommerce | Vista Detalle Usuarios</title>
    <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->
   <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="http://localhost:8080/images/favicon.ico">

    <!-- Sweet Alert css-->
    <link href="http://localhost:8080/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="http://localhost:8080/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="http://localhost:8080/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="http://localhost:8080/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="http://localhost:8080/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="http://localhost:8080/css/custom.min.css" rel="stylesheet" type="text/css" />

</svelte:head>

<main> 
            <!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="http://localhost:8080/public/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="http://localhost:8080/public/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="http://localhost:8080/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="http://localhost:8080/images/logo-light.png" alt="" height="17">
                            </span>
                        </a>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user" src="http://localhost:8080/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Anna Adame</span>
                                    <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Bienvenida Anna!</h6>
                            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Perfil</span></a>
                        
                            <div class="dropdown-divider"></div>
                            
                            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Salir</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="http://localhost:8080/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="http://localhost:8080/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>
                    <!-- Light Logo-->
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="http://localhost:8080/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="http://localhost:8080/images/logo-light.png" alt="" height="17">
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

                <div id="scrollbar">
                    <div class="container-fluid">

                        <div id="two-column-menu">
                        </div>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="menu-title"><span data-key="t-menu">Menú</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarDashboards">
                                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Usuarios</span>
                                </a>
                                
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarApps" >
                                    <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Clientes</span>
                                </a>
                            
                            </li>            
                                        
                                        

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarLayouts">
                                    <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Productos</span>
                                </a>
                                
                            </li> 

                            

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarAuth">
                                    <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-authentication">Catálogos</span>
                                </a>
                                
                            </li>



                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarPages">
                                    <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">Cupones</span>
                                </a>
                                
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarLanding">
                                    <i class="ri-rocket-line"></i> <span data-key="t-landing">Ordenes</span>
                                </a>
                                
                            </li>


                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>

                <div class="sidebar-background"></div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Vista de Detalle Usuario</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="#!">Usuarios</a></li>
                                            <li class="breadcrumb-item active">Vista de Detalle Usuario</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="container-fluid">
                            <div class="profile-foreground position-relative mx-n4 mt-n4">
                                <div class="profile-wid-bg">
                                    <img src="http://localhost:8080/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                                </div>
                            </div>
                            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                                <div class="row g-4">
                                    <div class="col-auto">
                                        <div class="avatar-lg">
                                            <img src="http://localhost:8080/images/users/avatar-1.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col">
                                        <div class="p-2">
                                            <h3 class="text-white mb-1">Anna Adame</h3>
                                            <p class="text-white-75">Owner & Founder</p>
                                            <div class="hstack text-white-50 gap-1">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                   
                                    <!--end col-->

                                </div>
                                <!--end row-->
                            </div>

                    
                                
                                        <div class="d-flex">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Vista de Detalle</span>
                                                    </a>
                                                </li>
                                               
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content pt-4 text-muted">
                                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-xxl-3">
                                                        

                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title mb-3">Info</h5>
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless mb-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Nombre:</th>
                                                                                <td class="text-muted">Anna</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Apellido:</th>
                                                                                <td class="text-muted">Adame</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Correo:</th>
                                                                                <td class="text-muted">daveadame@velzon.com</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Teléfono:</th>
                                                                                <td class="text-muted">+(1) 987 6543</td>
                                                                                
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Creado por:</th>
                                                                                <td class="text-muted">Team</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Se unió:</th>
                                                                                <td class="text-muted">01/10/12</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                            </div>
                        <!-- end row -->
                    </div>
                </div>
                    <!-- container-fluid -->
            </div>
                <!-- End Page-content -->          
</div>

   <!-- end main content-->
   
<div>
    <!-- ============================================ -->
    <!-- Js tempalte -->
    <!-- ============================================ -->
     <!-- JAVASCRIPT -->
     <script src="http://localhost:8080/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="http://localhost:8080/libs/simplebar/simplebar.min.js"></script>
     <script src="http://localhost:8080/libs/node-waves/waves.min.js"></script>
     <script src="http://localhost:8080/libs/feather-icons/feather.min.js"></script>
     <script src="http://localhost:8080/js/pages/plugins/lord-icon-2.1.0.js"></script>
     <script src="http://localhost:8080/js/plugins.js"></script>
 
     <!-- swiper js -->
     <script src="http://localhost:8080/libs/swiper/swiper-bundle.min.js"></script>
 
     <!-- profile init js -->
     <script src="http://localhost:8080/js/pages/profile.init.js"></script>
 
     <!-- App js -->
     <script src="http://localhost:8080/js/app.js"></script>
    
</div>

</main>
