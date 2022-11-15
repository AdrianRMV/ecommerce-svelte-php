//vefirificado
<script>
    import { Jumper } from 'svelte-loading-spinners';
    import axios from 'axios';

    import Sidebar from '../components/Sidebar.svelte';
    import { get } from 'svelte/store';

    import { dataActiveUser } from '../store/session';
    import HeaderApp from '../components/HeaderApp.svelte';
    import { fade } from 'svelte/transition';

    import Swal from 'sweetalert2';

    get(dataActiveUser);

    // Datos del usuario loggeado
    const infoUserLogged = $dataActiveUser;

    const datosUsuarioToEdit = {
        action: 'updateUser',
        id: infoUserLogged.id,
        nombre: infoUserLogged.name,
        lastname: infoUserLogged.lastname,
        email: infoUserLogged.email,
        phone: infoUserLogged.phone_number,
        password: '',
    };

    // Password hidden options
    let visible = false;

    function toggleVissible() {
        visible = !visible;
    }
    // ==========================

    // Edit picture
    let btnEditPicture = false;

    function btnSendImage() {
        btnEditPicture = true;
    }

    async function editUser(e) {
        e.preventDefault();
        let bodyForm = new FormData();
        bodyForm.append('action', datosUsuarioToEdit.action);
        bodyForm.append('name', datosUsuarioToEdit.nombre);
        bodyForm.append('lastname', datosUsuarioToEdit.lastname);
        bodyForm.append('email', datosUsuarioToEdit.email);
        bodyForm.append('phone_number', datosUsuarioToEdit.phone_number);
        bodyForm.append('password', datosUsuarioToEdit.password);
        bodyForm.append('id', datosUsuarioToEdit.id);

        axios
            .post('https://newphpecommercejona.herokuapp.com/app/UserController.php', bodyForm)
            .then(function (response) {
                if (response) {
                    console.log(response);
                    Swal.fire({
                        title: 'Regresaras al login',
                        text: 'Inicia Sesion de nuevo para ver los cambios realizados en tu perfil',
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        if (result.value) {
                            location.href = '/';
                        }
                    });
                } else {
                    console.log('Nel');
                }
            })
            .catch((resp) => console.log(resp));
    }

    async function sendToLogin() {
        // e.preventDefault();
        Swal.fire({
            title: 'Regresaras al login',
            text: 'Inicia Sesion de nuevo para ver los cambios realizados en tu perfil',
            icon: 'info',
            showCancelButton: false,
            confirmButtonText: 'Aceptar',
        }).then((result) => {
            if (result.value) {
                location.href = '#';
            }
        });
    }
</script>

<svelte>
    <title>DevEcommerce | Editar Perfil</title>
    <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->

    <!-- Layout config Js -->
    <script src="http://localhost:8080/js/layout.js"></script>
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
            <Sidebar />
        </div>
        <!-- Left Sidebar End -->
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
                                <h4 class="mb-sm-0">Editar Perfil</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="/home">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active">
                                            Editar Perfil
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- <Jumper
                        size="300"
                        color="#5c4cbc"
                        unit="px"
                        duration="1s"
                    /> -->
                    <div class="position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg profile-setting-img">
                            <img
                                src="http://localhost:8080/images/profile-bg.jpg"
                                class="profile-wid-img"
                                alt=""
                            />
                            <div class="overlay-content">
                                <div class="text-end p-3">
                                    <div
                                        class="p-0 ms-auto rounded-circle profile-photo-edit"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card mt-n5">
                                <div class="card-body p-4">
                                    <form
                                        method="POST"
                                        action="https://newphpecommercejona.herokuapp.com/app/UserController.php"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="text-center">
                                            <div
                                                class="profile-user position-relative d-inline-block mx-auto  mb-4"
                                            >
                                                <img
                                                    src={infoUserLogged.avatar}
                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                                                    alt="user-profile"
                                                />
                                                <div
                                                    class="avatar-xs p-0 rounded-circle profile-photo-edit"
                                                >
                                                    <input
                                                        id="profile-img-file-input"
                                                        type="file"
                                                        class="profile-img-file-input"
                                                        name="cover"
                                                        on:click={btnSendImage}
                                                    />
                                                    <label
                                                        for="profile-img-file-input"
                                                        class="profile-photo-edit avatar-xs"
                                                    >
                                                        <span
                                                            class="avatar-title rounded-circle bg-light text-body shadow"
                                                        >
                                                            <i
                                                                class="ri-camera-fill"
                                                            />
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            {#if btnEditPicture}
                                                <div
                                                    class="col-lg-12"
                                                    transition:fade
                                                >
                                                    <div
                                                        class="hstack gap-2 justify-content-center mb-4"
                                                    >
                                                        <button
                                                            type="submit"
                                                            class="btn btn-success btn-profile"
                                                            on:click={sendToLogin}
                                                            >Aceptar</button
                                                        >
                                                    </div>
                                                </div>
                                            {/if}
                                            <!--end col-->
                                            <h5 class="fs-16 mb-1">
                                                {infoUserLogged.name}
                                                {infoUserLogged.lastname}
                                            </h5>
                                        </div>
                                        <input
                                            type="hidden"
                                            name="id"
                                            value={datosUsuarioToEdit.id}
                                        />
                                        <input
                                            type="hidden"
                                            name="action"
                                            value="updateAvatar"
                                        />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <ul
                                        class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                        role="tablist"
                                    >
                                        <li class="nav-item">
                                            <a
                                                class="nav-link active"
                                                data-bs-toggle="tab"
                                                href="#personalDetails"
                                                role="tab"
                                            >
                                                <i
                                                    class="fas fa-home"
                                                />Detalles Personales
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div
                                            class="tab-pane active"
                                            id="personalDetails"
                                            role="tabpanel"
                                        >
                                            <!-- Edicion usuario -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label
                                                            for="nameInput"
                                                            class="form-label"
                                                            >Nombre</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="nameInput"
                                                            name="name"
                                                            placeholder="Enter your firstname"
                                                            bind:value={datosUsuarioToEdit.nombre}
                                                        />
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label
                                                            for="lastnameInput"
                                                            class="form-label"
                                                            >Apellido</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="lastnameInput"
                                                            name="lastname"
                                                            placeholder="Enter your lastname"
                                                            bind:value={datosUsuarioToEdit.lastname}
                                                        />
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label
                                                            for="emailInput"
                                                            class="form-label"
                                                            >Correo</label
                                                        >
                                                        <input
                                                            type="email"
                                                            class="form-control"
                                                            id="emailInput"
                                                            name="email"
                                                            placeholder="Enter your email"
                                                            bind:value={datosUsuarioToEdit.email}
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label
                                                            for="phonenumberInput"
                                                            class="form-label"
                                                            >Teléfono</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="phonenumberInput"
                                                            name="phone_number"
                                                            placeholder="Enter your phone number"
                                                            bind:value={datosUsuarioToEdit.phone}
                                                        />
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                value=""
                                                                id="flexCheckDefault"
                                                                on:click={toggleVissible}
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="flexCheckDefault"
                                                            >
                                                                Cambiar
                                                                contraseña
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                {#if visible}
                                                    <div
                                                        class="col-lg-12"
                                                        transition:fade
                                                    >
                                                        <div class="mb-3">
                                                            <label
                                                                for="passwordInput"
                                                                class="form-label"
                                                                >Contraseña</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                data-provider="flatpickr"
                                                                id="passwordInput"
                                                                name="password"
                                                                placeholder="Contraseña"
                                                                bind:value={datosUsuarioToEdit.password}
                                                            />
                                                        </div>
                                                    </div>
                                                {/if}
                                                <!--end col-->

                                                <div class="col-lg-12">
                                                    <div
                                                        class="hstack gap-2 justify-content-end"
                                                    >
                                                        <button
                                                            type="submit"
                                                            class="btn btn-primary"
                                                            on:click={editUser}
                                                            >Editar</button
                                                        >
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- container-fluid -->
                            </div>
                            <!-- End Page-content -->
                            <!-- end main content-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <script src="http://localhost:8080/js/pages/particles.app.js"></script>
        <script
            src="http://localhost:8080/js/pages/password-addon.init.js"
        ></script>
    </div>
</main>
