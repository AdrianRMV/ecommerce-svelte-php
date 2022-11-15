//verificado
<script>
    import Sidebar from '../components/Sidebar.svelte';
    import { get } from 'svelte/store';
    import { dataActiveUser } from '../store/session';
    import HeaderApp from '../components/HeaderApp.svelte';

    get(dataActiveUser);

    const infoUserLogged = $dataActiveUser;
</script>

<svelte>
    <title>DevEcommerce | Perfil</title>
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
</svelte>

<main>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <HeaderApp data={infoUserLogged} />
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- Sidebar component -->
            <Sidebar />
        </div>
        <!-- Vertical Overlay-->
        <div class="vertical-overlay" />

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between"
                            >
                                <h4 class="mb-sm-0">Perfil</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="#!">Ecommerce</a>
                                        </li>
                                        <li class="breadcrumb-item active">
                                            Perfil
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div
                        class="profile-foreground position-relative mx-n4 mt-n4"
                    >
                        <div class="profile-wid-bg">
                            <img
                                src={infoUserLogged.avatar}
                                alt={infoUserLogged.name &
                                    infoUserLogged.lastname}
                                class="profile-wid-img"
                            />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img
                                        src={infoUserLogged.avatar}
                                        class="img-thumbnail rounded-circle"
                                    />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1">
                                        {infoUserLogged.name}
                                        {infoUserLogged.lastname}
                                    </h3>

                                    <div class="hstack text-white-50 gap-1" />
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul
                                        class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                        role="tablist"
                                    >
                                        <li class="nav-item">
                                            <a
                                                class="nav-link fs-14 active"
                                                data-bs-toggle="tab"
                                                href="#overview-tab"
                                                role="tab"
                                            >
                                                <i
                                                    class="ri-airplay-fill d-inline-block d-md-none"
                                                />
                                                <span
                                                    class="d-none d-md-inline-block"
                                                    >Vista Perfil</span
                                                >
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="flex-shrink-0">
                                        <a
                                            href="/profileSettings"
                                            class="btn btn-success"
                                            ><i
                                                class="ri-edit-box-line align-bottom"
                                            /> Editar Perfil</a
                                        >
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div
                                        class="tab-pane active"
                                        id="overview-tab"
                                        role="tabpanel"
                                    >
                                        <div class="row">
                                            <div class="col-xxl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5
                                                            class="card-title mb-3"
                                                        >
                                                            Info
                                                        </h5>
                                                        <div
                                                            class="table-responsive"
                                                        >
                                                            <table
                                                                class="table table-borderless mb-0"
                                                            >
                                                                <tbody>
                                                                    <tr>
                                                                        <th
                                                                            class="ps-0"
                                                                            scope="row"
                                                                            >Nombre
                                                                            :</th
                                                                        >
                                                                        <td
                                                                            class="text-muted"
                                                                            >{infoUserLogged.name}</td
                                                                        >
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            class="ps-0"
                                                                            scope="row"
                                                                            >Apellido
                                                                            :</th
                                                                        >
                                                                        <td
                                                                            class="text-muted"
                                                                            >{infoUserLogged.lastname}</td
                                                                        >
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            class="ps-0"
                                                                            scope="row"
                                                                            >Correo:</th
                                                                        >
                                                                        <td
                                                                            class="text-muted"
                                                                            >{infoUserLogged.email}</td
                                                                        >
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            class="ps-0"
                                                                            scope="row"
                                                                            >Teléfono
                                                                            :</th
                                                                        >
                                                                        <td
                                                                            class="text-muted"
                                                                            >{infoUserLogged?.phone_number ??
                                                                                ''}</td
                                                                        >
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            class="ps-0"
                                                                            scope="row"
                                                                            >Rol:</th
                                                                        >
                                                                        <td
                                                                            class="text-muted"
                                                                            >{infoUserLogged.role}</td
                                                                        >
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- end main content-->
        <div>
            <!-- ============================================ -->
            <!-- Js tempalte -->
            <!-- ============================================ -->

            <script
                src="http://localhost:8080/libs/bootstrap/js/bootstrap.bundle.min.js"
            ></script>
            <script
                src="http://localhost:8080/libs/simplebar/simplebar.min.js"
            ></script>
            <script
                src="http://localhost:8080/libs/node-waves/waves.min.js"
            ></script>
            <script
                src="http://localhost:8080/libs/feather-icons/feather.min.js"
            ></script>
            <script
                src="http://localhost:8080/js/pages/plugins/lord-icon-2.1.0.js"
            ></script>
            <script src="http://localhost:8080/js/plugins.js"></script>
            <script
                src="http://localhost:8080/libs/particles.js/particles.js"
            ></script>
            <script
                src="http://localhost:8080/js/pages/particles.app.js"
            ></script>
            <script
                src="http://localhost:8080/js/pages/password-addon.init.js"
            ></script>
        </div>
    </div>
</main>
