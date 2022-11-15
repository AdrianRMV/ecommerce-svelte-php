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

    async function getDataSingleClient() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/clients/${id}`,
            requestOptions
        );
        const dataSingleClient = await response.json();
        console.log(dataSingleClient.data);
        return dataSingleClient.data;
    }

    async function getDataUserLoggin() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/users/${number}`,
            requestOptions
        );
        const dataUser = await response.json();
        return dataUser.data;
    }

    function reloadPage() {
        Swal.fire({
            title: 'Recargara ventana',
            text: 'Se recargara la pagina para ver los cambios realizados :)',
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
    <title>DevEcommerce | Vista Detalle Usuarios</title>
    <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="http://localhost:8080/images/favicon.ico" />

    <!-- Sweet Alert css-->
    <link
        href="http://localhost:8080/libs/sweetalert2/sweetalert2.min.css"
        rel="stylesheet"
        type="text/css"
    />

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

{#await getDataUserLoggin()}
    Loading...
{:then data}
    <main>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <HeaderApp {data} />
            </header>

            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <!-- Sidebar component -->
                <Sidebar />
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay" />

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            {#await getDataSingleClient()}
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
                                        <h4 class="mb-sm-0">
                                            Vista de Detalle Cliente
                                        </h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item">
                                                    <a href="#!">Cliente</a>
                                                </li>
                                                <li
                                                    class="breadcrumb-item active"
                                                >
                                                    Vista de Detalle Cliente
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="container-fluid">
                                <div
                                    class="profile-foreground position-relative mx-n4 mt-n4"
                                >
                                    <div class="profile-wid-bg">
                                        <img
                                            src="http://localhost:8080/images/profile-bg.jpg"
                                            alt=""
                                            class="profile-wid-img"
                                        />
                                    </div>
                                </div>
                                <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                                    <div class="row g-4">
                                        <!--end col-->
                                        <div class="col">
                                            <div class="p-2">
                                                <h3 class="text-white mb-1">
                                                    {data.name}
                                                </h3>
                                                <p class="text-white-75">
                                                    Cliente Nivel: {data.level_id}
                                                    ({data.level.name})
                                                </p>
                                                <div
                                                    class="hstack text-white-50 gap-1"
                                                />
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>

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
                                                    >Vista de Detalle</span
                                                >
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div
                                        class="tab-pane active"
                                        id="overview-tab"
                                        role="tabpanel"
                                    >
                                        <div class="row">
                                            <div class="col-xxl-12">
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
                                                                            >{data.name}</td
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
                                                                            >{data.phone_number}</td
                                                                        >
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            class="ps-0"
                                                                            scope="row"
                                                                            >Ordenes:</th
                                                                        >
                                                                        <div
                                                                            class="col-sm-auto"
                                                                        />

                                                                        <div
                                                                            class="table-responsive table-card mt-3 mb-1"
                                                                        >
                                                                            <table
                                                                                class="table align-middle table-nowrap"
                                                                                id="customerTable"
                                                                            >
                                                                                <thead
                                                                                    class="table-light"
                                                                                >
                                                                                    <tr
                                                                                    >
                                                                                        <th
                                                                                            data-sort="folio"
                                                                                            >Folio</th
                                                                                        >
                                                                                        <th
                                                                                            data-sort="total"
                                                                                            >Total</th
                                                                                        >
                                                                                        <th
                                                                                            data-sort="estado de pago"
                                                                                            >Estado
                                                                                            de
                                                                                            Pago</th
                                                                                        >

                                                                                        <th
                                                                                            data-sort="action"
                                                                                            >Acción</th
                                                                                        >
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody
                                                                                    class="list form-check-all"
                                                                                >
                                                                                    {#each data.orders as dataOrders}
                                                                                        <tr
                                                                                        >
                                                                                            <td
                                                                                                class="folio"
                                                                                                >{dataOrders.folio}</td
                                                                                            >
                                                                                            <td
                                                                                                class="total"
                                                                                                >{dataOrders.total}</td
                                                                                            >
                                                                                            <td
                                                                                                class="status"
                                                                                                ><span
                                                                                                    class="badge badge-soft-warning text-uppercase"
                                                                                                    >{dataOrders.order_status_id}</span
                                                                                                >
                                                                                            </td><td
                                                                                            >
                                                                                                <div
                                                                                                    class="d-flex gap-2"
                                                                                                >
                                                                                                    <div
                                                                                                        class="edit"
                                                                                                    >
                                                                                                        <button
                                                                                                            class="btn btn-sm btn-success edit-item-btn"
                                                                                                            data-bs-toggle="modal"
                                                                                                            data-bs-target="#showModalVer"
                                                                                                            >Ver
                                                                                                            Detalles</button
                                                                                                        >
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    {/each}
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </tr>

                                                                    <tr>
                                                                        <th
                                                                            class="ps-0"
                                                                            scope="row"
                                                                            >Direcciones:</th
                                                                        >
                                                                        <div
                                                                            class="col-sm-auto"
                                                                        >
                                                                            <div
                                                                            >
                                                                                <button
                                                                                    type="button"
                                                                                    class="btn btn-success add-btn"
                                                                                    data-bs-toggle="modal"
                                                                                    id="create-btn"
                                                                                    data-bs-target="#showModalAñadirCliente"
                                                                                    ><i
                                                                                        class="ri-add-line align-bottom me-1"
                                                                                    />
                                                                                    Añadir
                                                                                    Dirección</button
                                                                                >
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="table-responsive table-card mt-3 mb-1"
                                                                        >
                                                                            <table
                                                                                class="table align-middle table-nowrap"
                                                                                id="customerTable"
                                                                            >
                                                                                <thead
                                                                                    class="table-light"
                                                                                >
                                                                                    <tr
                                                                                    >
                                                                                        <th
                                                                                            data-sort="street"
                                                                                            >Calle
                                                                                            y
                                                                                            número</th
                                                                                        >
                                                                                        <th
                                                                                            data-sort="code"
                                                                                            >Código
                                                                                            postal</th
                                                                                        >
                                                                                        <th
                                                                                            data-sort="city"
                                                                                            >Ciudad</th
                                                                                        >
                                                                                        <th
                                                                                            data-sort="province"
                                                                                            >Providencia</th
                                                                                        >

                                                                                        <th
                                                                                            data-sort="action"
                                                                                            >Acción</th
                                                                                        >
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody
                                                                                    class="list form-check-all"
                                                                                >
                                                                                    {#each data.addresses as dataAddress}
                                                                                        <tr
                                                                                        >
                                                                                            <td
                                                                                                class="street"
                                                                                            >
                                                                                                {dataAddress.street_and_use_number}
                                                                                            </td>
                                                                                            <td
                                                                                                class="code"
                                                                                                >{dataAddress.postal_code}</td
                                                                                            >
                                                                                            <td
                                                                                                class="city"
                                                                                                >{dataAddress.city}</td
                                                                                            >
                                                                                            <td
                                                                                                class="province"
                                                                                                >{dataAddress.province}</td
                                                                                            >

                                                                                            <td
                                                                                            >
                                                                                                <div
                                                                                                    class="d-flex gap-2"
                                                                                                >
                                                                                                    <div
                                                                                                        class="edit"
                                                                                                    >
                                                                                                        <button
                                                                                                            class="btn btn-sm btn-success edit-item-btn"
                                                                                                            data-bs-toggle="modal"
                                                                                                            data-bs-target="#showModalVer"
                                                                                                            >Ver
                                                                                                            Detalles</button
                                                                                                        >
                                                                                                    </div>

                                                                                                    <div
                                                                                                        class="edit"
                                                                                                    >
                                                                                                        <button
                                                                                                            class="btn btn-sm btn-success edit-item-btn"
                                                                                                            data-bs-toggle="modal"
                                                                                                            data-bs-target="#showModalEditar"
                                                                                                            >Editar</button
                                                                                                        >
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="remove"
                                                                                                        id="removeItemModal"
                                                                                                    >
                                                                                                        <button
                                                                                                            class="btn btn-sm btn-danger remove-item-btn"
                                                                                                            data-bs-toggle="modal"
                                                                                                            data-bs-target="#deleteRecordModal"
                                                                                                            >Borrar</button
                                                                                                        >
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    {/each}
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->

                                                <!-- Modal añadir dir -->

                                                <div
                                                    class="modal fade"
                                                    id="showModalEditar"
                                                    tabindex="-1"
                                                    aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true"
                                                >
                                                    <div
                                                        class="modal-dialog modal-dialog-centered"
                                                    >
                                                        <div
                                                            class="modal-content"
                                                        >
                                                            <div
                                                                class="modal-header bg-light p-3"
                                                            >
                                                                <h5
                                                                    class="modal-title"
                                                                    id="exampleModalLabel"
                                                                >
                                                                    Editar
                                                                    Dirección
                                                                </h5>
                                                                <button
                                                                    type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"
                                                                    id="close-modal"
                                                                />
                                                            </div>
                                                            <form
                                                                method="POST"
                                                                action="https://newphpecommercejona.herokuapp.com/app/AdressController.php"
                                                            >
                                                                <div
                                                                    class="modal-body"
                                                                >
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="name-field"
                                                                            class="form-label"
                                                                            >Nombre</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="name-field"
                                                                            name="first_name"
                                                                            class="form-control"
                                                                            placeholder="Ingresar Nombre"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="lastname-field"
                                                                            class="form-label"
                                                                            >Apellido</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            name="last_name"
                                                                            id="lastname-field"
                                                                            class="form-control"
                                                                            placeholder="Ingresar Apellido"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="province-field"
                                                                            class="form-label"
                                                                            >Telefono</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="province-field"
                                                                            class="form-control"
                                                                            name="phone_number"
                                                                            placeholder="Ingresar tu numero celular"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="street-field"
                                                                            class="form-label"
                                                                            >Calle
                                                                            y
                                                                            número</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="street-field"
                                                                            class="form-control"
                                                                            name="street_and_use_number"
                                                                            placeholder="Ingresar Calle y número"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="code-field"
                                                                            class="form-label"
                                                                            >Código
                                                                            postal</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="code-field"
                                                                            name="postal_code"
                                                                            class="form-control"
                                                                            placeholder="Ingresar Código Postal"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="city-field"
                                                                            class="form-label"
                                                                            >Ciudad</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="city-field"
                                                                            class="form-control"
                                                                            name="city"
                                                                            placeholder="Ingresar Ciudad"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="province-field"
                                                                            class="form-label"
                                                                            >Providencia</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="province-field"
                                                                            class="form-control"
                                                                            name="province"
                                                                            placeholder="Ingresar Providencia"
                                                                            required
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="modal-footer"
                                                                >
                                                                    <div
                                                                        class="hstack gap-2 justify-content-end"
                                                                    >
                                                                        <button
                                                                            type="button"
                                                                            class="btn btn-light"
                                                                            data-bs-dismiss="modal"
                                                                            >Cerrar</button
                                                                        >
                                                                        <button
                                                                            type="submit"
                                                                            on:click|once={reloadPage}
                                                                            class="btn btn-success"
                                                                            id="add-btn"
                                                                            >Guardar
                                                                            cambios</button
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <input
                                                                    type="text"
                                                                    name="action"
                                                                    value="create"
                                                                    hidden
                                                                />
                                                                <input
                                                                    type="text"
                                                                    name="id"
                                                                    value={data.id}
                                                                    hidden
                                                                />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="modal fade"
                                                    id="showModalAñadirCliente"
                                                    tabindex="-1"
                                                    aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true"
                                                >
                                                    <div
                                                        class="modal-dialog modal-dialog-centered"
                                                    >
                                                        <div
                                                            class="modal-content"
                                                        >
                                                            <div
                                                                class="modal-header bg-light p-3"
                                                            >
                                                                <h5
                                                                    class="modal-title"
                                                                    id="exampleModalLabel"
                                                                >
                                                                    Añadir
                                                                    Dirección
                                                                </h5>
                                                                <button
                                                                    type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"
                                                                    id="close-modal"
                                                                />
                                                            </div>
                                                            <form
                                                                method="POST"
                                                                action="https://newphpecommercejona.herokuapp.com/app/AdressController.php"
                                                            >
                                                                <div
                                                                    class="modal-body"
                                                                >
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="name-field"
                                                                            class="form-label"
                                                                            >Nombre</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="name-field"
                                                                            name="first_name"
                                                                            class="form-control"
                                                                            placeholder="Ingresar Nombre"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="lastname-field"
                                                                            class="form-label"
                                                                            >Apellido</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            name="last_name"
                                                                            id="lastname-field"
                                                                            class="form-control"
                                                                            placeholder="Ingresar Apellido"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="province-field"
                                                                            class="form-label"
                                                                            >Telefono</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="province-field"
                                                                            class="form-control"
                                                                            name="phone_number"
                                                                            placeholder="Ingresar tu numero celular"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="street-field"
                                                                            class="form-label"
                                                                            >Calle
                                                                            y
                                                                            número</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="street-field"
                                                                            class="form-control"
                                                                            name="street_and_use_number"
                                                                            placeholder="Ingresar Calle y número"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="code-field"
                                                                            class="form-label"
                                                                            >Código
                                                                            postal</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="code-field"
                                                                            name="postal_code"
                                                                            class="form-control"
                                                                            placeholder="Ingresar Código Postal"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="city-field"
                                                                            class="form-label"
                                                                            >Ciudad</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="city-field"
                                                                            class="form-control"
                                                                            name="city"
                                                                            placeholder="Ingresar Ciudad"
                                                                            required
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="mb-3"
                                                                    >
                                                                        <label
                                                                            for="province-field"
                                                                            class="form-label"
                                                                            >Providencia</label
                                                                        >
                                                                        <input
                                                                            type="text"
                                                                            id="province-field"
                                                                            class="form-control"
                                                                            name="province"
                                                                            placeholder="Ingresar Providencia"
                                                                            required
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="modal-footer"
                                                                >
                                                                    <div
                                                                        class="hstack gap-2 justify-content-end"
                                                                    >
                                                                        <button
                                                                            type="button"
                                                                            class="btn btn-light"
                                                                            data-bs-dismiss="modal"
                                                                            >Cerrar</button
                                                                        >
                                                                        <button
                                                                            type="submit"
                                                                            on:click|once={reloadPage}
                                                                            class="btn btn-success"
                                                                            id="add-btn"
                                                                            >Guardar
                                                                            cambios</button
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <input
                                                                    type="text"
                                                                    name="action"
                                                                    value="create"
                                                                    hidden
                                                                />
                                                                <input
                                                                    type="text"
                                                                    name="client_id"
                                                                    value={data.id}
                                                                    hidden
                                                                />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div
                                                    class="modal fade zoomIn"
                                                    id="deleteRecordModal"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                >
                                                    <div
                                                        class="modal-dialog modal-dialog-centered"
                                                    >
                                                        <div
                                                            class="modal-content"
                                                        >
                                                            <div
                                                                class="modal-header"
                                                            >
                                                                <button
                                                                    type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"
                                                                    id="btn-close"
                                                                />
                                                            </div>
                                                            <div
                                                                class="modal-body"
                                                            >
                                                                <div
                                                                    class="mt-2 text-center"
                                                                >
                                                                    <lord-icon
                                                                        src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                        trigger="loop"
                                                                        colors="primary:#f7b84b,secondary:#f06548"
                                                                        style="width:100px;height:100px"
                                                                    />
                                                                    <div
                                                                        class="mt-4 pt-2 fs-15 mx-4 mx-sm-5"
                                                                    >
                                                                        <h4>
                                                                            Estás
                                                                            seguro
                                                                            ?
                                                                        </h4>
                                                                        <p
                                                                            class="text-muted mx-4 mb-0"
                                                                        >
                                                                            Estás
                                                                            seguro
                                                                            de
                                                                            eliminar
                                                                            la
                                                                            Dirección?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-flex gap-2 justify-content-center mt-4 mb-2"
                                                                >
                                                                    <button
                                                                        type="button"
                                                                        class="btn w-sm btn-light"
                                                                        data-bs-dismiss="modal"
                                                                        >Cerrar</button
                                                                    >
                                                                    <button
                                                                        type="button"
                                                                        class="btn w-sm btn-danger "
                                                                        id="delete-record"
                                                                        >Sí,
                                                                        borrar
                                                                        Dirección!</button
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end modal -->
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
            {:catch error}
                <!-- promise was rejected -->
            {/await}
            <!-- End Page-content -->
        </div>

        <!-- end main content-->

        <div>
            <!-- ============================================ -->
            <!-- Js tempalte -->
            <!-- ============================================ -->
            <!-- JAVASCRIPT -->
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

            <!-- swiper js -->
            <script
                src="http://localhost:8080/libs/swiper/swiper-bundle.min.js"
            ></script>

            <!-- profile init js -->
            <script
                src="http://localhost:8080/js/pages/profile.init.js"
            ></script>

            <!-- App js -->
            <script src="http://localhost:8080/js/app.js"></script>
        </div>
    </main>
{:catch error}
    {error}
{/await}
