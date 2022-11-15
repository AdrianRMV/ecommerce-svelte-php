//verificado
<script>
    export let id;
    import Sidebar from '../components/Sidebar.svelte';
    import HeaderApp from '../components/HeaderApp.svelte';

    
    // Traer la id del usuario loggeado
    import { get } from 'svelte/store';
    import { preferences } from '../store/session';
    get(preferences);
    
    // Se guarda en una variable para poder usar la variable global
    const number = $preferences;
    
    // Si el numero es igual a 0 significa que no existe ninguna session activa y lo regresa al login
    if (number == 0) {
        location.href = '/';
    }

    var myHeaders = new Headers();
    myHeaders.append('Authorization', `${process.env.BEARER_KEY}`);
    
    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow',
    };

    async function getDataUserSelected() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/users/${id}`,
            requestOptions
        );
        const dataUser = await response.json();
        return dataUser.data;
    }

    async function getDataUserLoggin() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/users/${number}`,
            requestOptions
        );
        const dataUser = await response.json();
        return dataUser.data;
    }
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

{#await getDataUserLoggin()}
    Loading...
{:then data}
    <main>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="layout-width">
                    <HeaderApp {data} />
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
            {#await getDataUserSelected()}
                <!-- promise is pending -->
            {:then data}
                <div class="main-content">
                    <div class="page-content">
                        <div class="container-fluid">
                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div
                                        class="page-title-box d-sm-flex align-items-center justify-content-between"
                                    >
                                        <h4 class="mb-sm-0">Detalle de usuario</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item">
                                                    <a href="#!">Ecommerce</a>
                                                </li>
                                                <li
                                                    class="breadcrumb-item active"
                                                >
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
                                        src={data.avatar}
                                        alt={data.name & data.lastname}
                                        class="profile-wid-img"
                                    />
                                </div>
                            </div>
                            <div class="pt-5 mb-4 mb-lg-3 pb-lg-4">
                                <div class="row g-4">
                                    <div class="col">
                                        <div
                                            class="avatar-lg"
                                            style="margin: 0 auto;"
                                        >
                                            <img
                                                src={data.avatar}
                                                alt={data.name & data.lastname}
                                                class="img-thumbnail rounded-circle"
                                                style="width: 112px;
                                                height: 100%;"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-4">
                                    <!--end col-->
                                    <div class="col">
                                        <div class="p-2">
                                            <h3
                                                class="text-white mb-1"
                                                style="text-align: center;"
                                            >
                                                {data.name}
                                                {data.lastname}
                                            </h3>

                                            <div
                                                class="hstack text-white-50 gap-1"
                                            />
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
                                                        href="/users"
                                                    >
                                                        <i
                                                            class="ri-airplay-fill d-inline-block d-md-none"
                                                        />
                                                        <span
                                                            class="d-none d-md-inline-block"
                                                            >Regresar</span
                                                        >
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Tab panes -->
                                        <div
                                            class="tab-content pt-4 text-muted"
                                        >
                                            <div
                                                class="tab-pane active"
                                                id="overview-tab"
                                                role="tabpanel"
                                            >
                                                <div class="row">
                                                    <div class="col-xxl-12">
                                                        <div class="card">
                                                            <div
                                                                class="card-body"
                                                            >
                                                                <h5
                                                                    class="card-title mb-3"
                                                                >
                                                                    Info Usuario
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
                                                                                    >{data.name}</td
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
                                                                                    >{data.lastname}</td
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
                                                                                    >{data.email}</td
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
                                                                                    >{data?.phone_number ??
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
                                                                                    >{data.role}</td
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
            {:catch error}
                Error en datos
            {/await}
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
{:catch error}
    <!-- promise was rejected -->
{/await}
