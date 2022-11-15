<script>
    // transitions
    import { fade } from 'svelte/transition';
    import { fly } from 'svelte/transition';

    import { get } from 'svelte/store';
    import { preferences } from '../store/session';
    import { dataActiveUser } from '../store/session';

    // Components
    import HeaderApp from '../components/HeaderApp.svelte';
    import Sidebar from '../components/Sidebar.svelte';

    // Trae los datos globales ( preference = sessionId -> store/session.js)
    get(preferences);
    get(dataActiveUser);

    // Se guarda en una variable para poder condicionar
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

    async function getDataUserLoggin() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/users/${number}`,
            requestOptions
        );
        const dataUser = await response.json();
        // Se guarda la info del usuario en la variable global correspondiente
        dataActiveUser.set(dataUser.data);
        return dataUser.data;
    }

    async function getAllProducts() {
        const response = await fetch(
            `https://crud.jonathansoto.mx/api/products`,
            requestOptions
        );
        const allProducts = await response.json();
        console.log(allProducts.data);
        // Se guarda la info del usuario en la variable global correspondiente
        return allProducts.data;
    }
</script>

<svelte:head>
    <title>DevEcommerce | Home</title>
    <!-- ============================================ -->
    <!-- Css template -->
    <!-- ============================================ -->

    <link rel="shortcut icon" href="http://localhost:8080/images/favicon.ico" />

    <!-- nouisliderribute css -->
    <link
        rel="stylesheet"
        href="http://localhost:8080/libs/nouislider/nouislider.min.css"
    />

    <!-- gridjs css -->
    <link
        rel="stylesheet"
        href="http://localhost:8080/libs/gridjs/theme/mermaid.min.css"
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
    Loading..
{:then data}
    <main transition:fade>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- Header -->
            <HeaderApp {data} />

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
                                    <h4 class="mb-sm-0">Productos</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="#!">Ecommerce</a>
                                            </li>
                                            <li class="breadcrumb-item active">
                                                Productos
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Tabla de productos -->
                        {#await getAllProducts()}
                            Loading Table...
                        {:then data}
                            <div
                                class="table-container"
                                transition:fly={{ y: 200, duration: 2000 }}
                            >
                                <table
                                    class="table table-striped table-products"
                                    style="background-color: #fff !important;"
                                >
                                    <thead>
                                        <tr>
                                            <th
                                                scope="col"
                                                style="display: none;"
                                                >id
                                            </th>
                                            <th scope="col" />
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {#each data as datas}
                                            <tr>
                                                <td class="img-container">
                                                    <!-- Pregunta si el producto tiene imagen, si no solo le pone una imagen predeterminada -->
                                                    {#if datas.cover != 'https://crud.jonathansoto.mx/storage/products/'}
                                                        <img
                                                            class="img-cover"
                                                            src={datas.cover}
                                                            alt={datas.name}
                                                        />
                                                    {:else}
                                                        <img
                                                            class="img-cover"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                                                            alt=""
                                                        />
                                                    {/if}
                                                </td>
                                                <td>{datas.name}</td>
                                                <td>{datas.slug}</td>
                                                <td>{datas.description}</td>
                                                <td>
                                                    <div
                                                        class="btn-table"
                                                        style="display: flex;"
                                                    >
                                                        <a
                                                            href="/viewProduct/{datas.id}"
                                                            type="button"
                                                            class="btn btn-primary"
                                                            >Ver detalles</a
                                                        >
                                                        <a
                                                            href="/"
                                                            type="button"
                                                            class="btn btn-warning"
                                                            >Editar</a
                                                        >
                                                        <a
                                                            href="/"
                                                            type="button"
                                                            class="btn btn-danger"
                                                            >Borrar</a
                                                        >
                                                    </div>
                                                </td>
                                            </tr>
                                        {/each}
                                    </tbody>
                                </table>
                            </div>
                        {:catch error}
                            Error al cargar la tabla
                        {/await}
                        <!-- Termina la tabla de productos -->

                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
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

                <!-- nouisliderribute js -->
                <script
                    src="http://localhost:8080/libs/nouislider/nouislider.min.js"
                ></script>
                <script
                    src="http://localhost:8080/libs/wnumb/wNumb.min.js"
                ></script>

                <!-- App js -->
                <script src="http://localhost:8080/js/app.js"></script>
            </div>
        </div>
    </main>
{:catch error}
    <!-- data was rejected -->
{/await}
