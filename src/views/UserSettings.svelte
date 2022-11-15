//verificado
<script>
    export let id;

    import axios from 'axios';
    import Swal from 'sweetalert2';
    import Sidebar from '../components/Sidebar.svelte';
    import HeaderApp from '../components/HeaderApp.svelte';
    import { fade } from 'svelte/transition';
    import { get } from 'svelte/store';
    import { preferences } from '../store/session';

    get(preferences);

    // Se guarda en una variable para poder usar la variable global
    const number = $preferences;

    // Si el numero es igual a 0 significa que no existe ninguna session activa y lo regresa al login
    if (number == 0) {
        location.href = '/';
    }

    let datosUsuarioToEdit = {
        action: 'updateUser',
        id: 0,
        name: '',
        lastname: '',
        email: '',
        phone: '',
        password: '',
    };

    var myHeaders = new Headers();
    myHeaders.append('Authorization', `${process.env.BEARER_KEY}`);

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow',
    };

    async function getDataUserLoggin() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/users/${number}`,
            requestOptions
        );
        const dataUser = await response.json();
        return dataUser.data;
    }

    async function getDataUserSelected() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/users/${id}`,
            requestOptions
        );
        const dataUser = await response.json();

        // Se guarda la informacion del usuario a editar dentro de la clase temporal
        datosUsuarioToEdit.id = dataUser.data.id;
        datosUsuarioToEdit.name = dataUser.data.name;
        datosUsuarioToEdit.lastname = dataUser.data.lastname;
        datosUsuarioToEdit.email = dataUser.data.email;
        datosUsuarioToEdit.phone = dataUser.data.phone_number;
        datosUsuarioToEdit.password = dataUser.data.password;
        console.log(dataUser.data);
        return dataUser.data;
    }

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
        bodyForm.append('name', datosUsuarioToEdit.name);
        bodyForm.append('lastname', datosUsuarioToEdit.lastname);
        bodyForm.append('email', datosUsuarioToEdit.email);
        bodyForm.append('phone_number', datosUsuarioToEdit.phone_number);
        bodyForm.append('password', datosUsuarioToEdit.password);
        bodyForm.append('id', datosUsuarioToEdit.id);
        console.log(bodyForm);

        axios
            .post('http://localhost/app/UserController.php', bodyForm)
            .then(function (response) {
                if (response) {
                    Swal.fire({
                        title: 'Recargara ventana',
                        text: 'Se recargara la pagina para ver tu nuevos cambios :)',
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                } else {
                    console.log('Nel');
                }
            })
            .catch((resp) => console.log(resp));
    }

    async function sendToLogin(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Recargara ventana',
            text: 'Se recargara la pagina para ver tu nueva foto de perfil :)',
            icon: 'info',
            showCancelButton: false,
            confirmButtonText: 'Aceptar',
        }).then((result) => {
            if (result.value) {
                location.reload();
            }
        });
    }
</script>

<svelte:head>
    <title>DevEcommerce | Editar Usuario</title>
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
</svelte:head>

{#await getDataUserSelected()}
    Loading...
{:then data}
    <main>
        <!-- Begin page -->
        <div id="layout-wrapper">
            {#await getDataUserLoggin()}
                Loading...
            {:then data}
                <header id="page-topbar">
                    <div class="layout-width">
                        <HeaderApp {data} />
                    </div>
                </header>
            {:catch error}
                {error}
            {/await}

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
                                            method="post"
                                            action="http://localhost/app/UserController.php"
                                            enctype="multipart/form-data"
                                        >
                                            <div class="text-center">
                                                <div
                                                    class="profile-user position-relative d-inline-block mx-auto  mb-4"
                                                >
                                                    <img
                                                        src={data.avatar}
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
                                                            on:click|once={btnSendImage}
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
                                                                on:click|once={sendToLogin}
                                                                >Aceptar</button
                                                            >
                                                        </div>
                                                    </div>
                                                {/if}
                                                <!--end col-->
                                                <h5 class="fs-16 mb-1">
                                                    {datosUsuarioToEdit.name}
                                                    {datosUsuarioToEdit.lastname}
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
                                                                bind:value={datosUsuarioToEdit.name}
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
                                                            <div
                                                                class="form-check"
                                                            >
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
            <script
                src="http://localhost:8080/js/pages/particles.app.js"
            ></script>
            <script
                src="http://localhost:8080/js/pages/password-addon.init.js"
            ></script>
        </div>
    </main>
{:catch error}
    Error al cargar datos: {error}
{/await}
