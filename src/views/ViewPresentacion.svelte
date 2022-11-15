//verificado
<script>
    
</script>

<svelte:head>
    <title>DevEcommerce | Vista Detalle Presentaciones</title>
    <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->

     <!-- App favicon -->
     <link rel="shortcut icon" href="http://localhost:8080/images/favicon.ico">

     <!--Swiper slider css-->
     <link href="http://localhost:8080/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
 
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
                            <h4 class="mb-sm-0">Vista de Detalle Presentaciones</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#!">Productos</a></li>
                                    <li class="breadcrumb-item active">Vista de Detalle Presentaciones</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row gx-lg-5">
                                    <div class="col-xl-4 col-md-8 mx-auto">
                                        <div class="product-img-slider sticky-side-div">
                                            <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img src="http://localhost:8080/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="http://localhost:8080/images/products/img-6.png" alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="http://localhost:8080/images/products/img-1.png" alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img src="http://localhost:8080/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next bg-white shadow"></div>
                                                <div class="swiper-button-prev bg-white shadow"></div>
                                            </div>
                                            <!-- end swiper thumbnail slide -->
                                            <div class="swiper product-nav-slider mt-2">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="nav-slide-item">
                                                            <img src="http://localhost:8080/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="nav-slide-item">
                                                            <img src="http://localhost:8080/images/products/img-6.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="nav-slide-item">
                                                            <img src="http://localhost:8080/images/products/img-1.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="nav-slide-item">
                                                            <img src="http://localhost:8080/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end swiper nav slide -->
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-xl-8">
                                        <div class="mt-xl-0 mt-5">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <h4>Sudadera de Manga Completa para Hombre (Rosa)</h4>
                                                    
                                                </div>
                                                
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="p-2 border border-dashed rounded">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm me-2">
                                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted mb-1">Precio:</p>
                                                                <h5 class="mb-0">$120.40</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="p-2 border border-dashed rounded">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm me-2">
                                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                    <i class="ri-file-copy-2-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted mb-1">No. de Ordenes :</p>
                                                                <h5 class="mb-0">2,234</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="p-2 border border-dashed rounded">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm me-2">
                                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                    <i class="ri-stack-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted mb-1">Stock Disponible :</p>
                                                                <h5 class="mb-0">1,230</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <!-- end col -->
                                            </div>

                                        
                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Descripción :</h5>
                                                <p>Sudadera rosa de rayas de hombre Tommy Hilfiger. Confeccionado con algodón. La composición del material es 100%
                                                algodón orgánico. Esta es una de las marcas de estilo de vida de diseñadores líderes en el mundo y es reconocida
                                                internacionalmente por celebrar la esencia del estilo cool estadounidense clásico, presentando diseños preppy con un giro.</p>
                                            </div>

                                           


                                            <div class="product-content mt-5">
                                                <h5 class="fs-14 mb-3">Descripción del Producto en su Presentación</h5>
                                                <nav>
                                                    <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Especificaciones</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </nav>
                                                <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row" style="width: 200px;">Código de la presentación</th>
                                                                        <td>2101</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="width: 200px;">Peso en gramos</th>
                                                                        <td>T-Shirt</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="width: 200px;">Estatus</th>
                                                                        <td>Active</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="width: 200px;">Stock</th>
                                                                        <td>750</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="width: 200px;">Stock mínimo</th>
                                                                        <td>5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="width: 200px;">Stock máximo</th>
                                                                        <td>100</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!-- product-content -->

                                            











                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

               


<div>
    <!-- ============================================ -->
    <!-- JavaScript -->
    <!-- ============================================ -->
    <!-- JAVASCRIPT -->
    <script src="http://localhost:8080/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost:8080/libs/simplebar/simplebar.min.js"></script>
    <script src="http://localhost:8080/libs/node-waves/waves.min.js"></script>
    <script src="http://localhost:8080/libs/feather-icons/feather.min.js"></script>
    <script src="http://localhost:8080/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="http://localhost:8080/js/plugins.js"></script>

    <!--Swiper slider js-->
    <script src="http://localhost:8080/libs/swiper/swiper-bundle.min.js"></script>

    <!-- ecommerce product details init -->
    <script src="http://localhost:8080/js/pages/ecommerce-product-details.init.js"></script>

    <!-- App js -->
    <script src="http://localhost:8080/js/app.js"></script>
    
</div>

</main>
