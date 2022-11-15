<script>
   export let id;
   import HeaderApp from "../components/HeaderApp.svelte";
   import Sidebar from "../components/Sidebar.svelte";

   import Swal from "sweetalert2";

   // Transiciones
   import { fly } from "svelte/transition";
   import { fade } from "svelte/transition";

   // Traer la id del usuario loggeado
   import { get } from "svelte/store";
   import { preferences } from "../store/session";
   get(preferences);

   // Se guarda en una variable para poder usar la variable global
   const number = $preferences;

   // Si el numero es igual a 0 significa que no existe ninguna session activa y lo regresa al login
   if (number == 0) {
      location.href = "/";
   }

   let myHeaders = new Headers();
   myHeaders.append("Authorization", `${process.env.BEARER_KEY}`);

   let requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
   };

   async function getDataUserLoggin() {
      const response = await fetch(
         `https://crud.jonathansoto.mx/api/users/${number}`,
         requestOptions
      );
      const dataUser = await response.json();
      return dataUser.data;
   }

   async function getOrderById() {
      const response = await fetch(
         `https://crud.jonathansoto.mx/api/orders/details/${id}`,
         requestOptions
      );
      const dataOrder = await response.json();
      return dataOrder.data;
   }

   async function getDataClientOrder(idCliente) {
      const response = await fetch(
         `https://crud.jonathansoto.mx/api/orders/clients/${idCliente}`,
         requestOptions
      );
      const dataCliente = await response.json();
      console.log(dataCliente.data);
      return dataCliente.data;
   }
</script>

<!-- verificado -->
<svelte:head>
   <title>DevEcommerce | Vista Detalle Ordenes</title>
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
      type="text/css" />

   <!-- Layout config Js -->
   <script src="http://localhost:8080/js/layout.js"></script>
   <!-- Bootstrap Css -->
   <link
      href="http://localhost:8080/css/bootstrap.min.css"
      rel="stylesheet"
      type="text/css" />
   <!-- Icons Css -->
   <link
      href="http://localhost:8080/css/icons.min.css"
      rel="stylesheet"
      type="text/css" />
   <!-- App Css-->
   <link
      href="http://localhost:8080/css/app.min.css"
      rel="stylesheet"
      type="text/css" />
   <!-- custom Css-->
   <link
      href="http://localhost:8080/css/custom.min.css"
      rel="stylesheet"
      type="text/css" />
</svelte:head>

{#await getDataUserLoggin()}
   Loading...
{:then data}
   <main>
      <!-- Begin page -->
      <div id="layout-wrapper">
         <HeaderApp {data} />

         <!-- ========== App Menu ========== -->
         <div class="app-menu navbar-menu">
            <!-- LOGO -->
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
                           class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0">Vista de Detalle Ordenes</h4>

                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item">
                                    <a href="#!">Clientes</a>
                                 </li>
                                 <li class="breadcrumb-item active">
                                    Vista de Detalle Ordenes
                                 </li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->

                  <div class="container-fluid">
                     <div
                        class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                           <img
                              src="http://localhost:8080/images/profile-bg.jpg"
                              alt=""
                              class="profile-wid-img" />
                        </div>
                     </div>

                     <div class="d-flex pt-3">
                        <!-- Nav tabs -->
                        <ul
                           class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                           role="tablist">
                           <li class="nav-item">
                              <a
                                 class="nav-link fs-14 active"
                                 data-bs-toggle="tab"
                                 href="#overview-tab"
                                 role="tab">
                                 <i
                                    class="ri-airplay-fill d-inline-block d-md-none" />
                                 <span class="d-none d-md-inline-block"
                                    >Vista de Detalle</span>
                              </a>
                           </li>
                        </ul>
                     </div>

                     {#await getOrderById()}
                        Loading...
                     {:then order}
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                           <div
                              class="tab-pane active"
                              id="overview-tab"
                              role="tabpanel">
                              <div class="row">
                                 <div class="col-xxl-12">
                                    <div class="card">
                                       <div class="card-body">
                                          <h5 class="card-title mb-3">
                                             Detalles Orden
                                          </h5>
                                          <div class="table-responsive">
                                             <table
                                                class="table table-borderless mb-0">
                                                <tbody>
                                                   <tr>
                                                      <th
                                                         class="ps-0"
                                                         scope="row">Orden:</th>
                                                      <div class="col-sm-auto">
                                                         <div
                                                            class="table-responsive table-card mt-3 mb-1">
                                                            <table
                                                               class="table align-middle table-nowrap"
                                                               id="customerTable">
                                                               <thead
                                                                  class="table-light">
                                                                  <tr>
                                                                     <th
                                                                        data-sort="folio"
                                                                        >Foto</th>
                                                                     <th
                                                                        data-sort="descripcion"
                                                                        >Descripción</th>
                                                                     <th
                                                                        data-sort="codigo"
                                                                        >Código</th>

                                                                     <th
                                                                        data-sort="peso en gramos"
                                                                        >Peso en
                                                                        gramos</th>
                                                                     <th
                                                                        data-sort="estatus"
                                                                        >Estatus</th>

                                                                     <th
                                                                        data-sort="action"
                                                                        >Acción</th>
                                                                  </tr>
                                                               </thead>
                                                               <tbody
                                                                  class="list form-check-all">
                                                                  {#each order.presentations as singleOrder}
                                                                     <tr>
                                                                        <td
                                                                           class="foto">
                                                                           <div
                                                                              class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                                              <img
                                                                                 src={singleOrder.cover}
                                                                                 alt=""
                                                                                 class="img-fluid d-block" />
                                                                           </div>
                                                                        </td>
                                                                        <td
                                                                           class="descripcion"
                                                                           >{singleOrder.description}</td>
                                                                        <td
                                                                           class="codigo"
                                                                           >{singleOrder.code}</td>
                                                                        <td
                                                                           class="peso"
                                                                           >{singleOrder.weight_in_grams}</td>
                                                                        <td
                                                                           class="status"
                                                                           ><span
                                                                              class="badge badge-soft-warning text-uppercase"
                                                                              >{singleOrder.status}</span>
                                                                        </td><td>
                                                                           <div
                                                                              class="d-flex gap-2">
                                                                              <div
                                                                                 class="ver">
                                                                                 <a
                                                                                    class="btn btn-sm btn-success edit-item-btn"
                                                                                    href="/viewProduct/{singleOrder.product_id}"
                                                                                    >Ver
                                                                                    Detalles</a>
                                                                              </div>
                                                                           </div>
                                                                        </td>
                                                                     </tr>
                                                                  {/each}
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                      </div>
                                                      <!-- tabla para direccion de envio -->
                                                      <div
                                                         class="table-responsive table-card mt-3 mb-1">
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Dirección de envío:</th>

                                                         <table
                                                            class="table align-middle table-nowrap"
                                                            id="customerTable">
                                                            <thead
                                                               class="table-light">
                                                               <tr>
                                                                  <th
                                                                     data-sort="street"
                                                                     >Calle y
                                                                     número</th>
                                                                  <th
                                                                     data-sort="code"
                                                                     >Código
                                                                     Postal</th>
                                                                  <th
                                                                     data-sort="city"
                                                                     >Ciudad</th>

                                                                  <th
                                                                     data-sort="province"
                                                                     >Provincia</th>
                                                                  <th
                                                                     data-sort="telefono"
                                                                     >Teléfono</th>

                                                                  <!-- <th
                                                                     data-sort="action"
                                                                     >Acción</th> -->
                                                               </tr>
                                                            </thead>
                                                            <tbody
                                                               class="list form-check-all">
                                                               <tr>
                                                                  <td
                                                                     class="street"
                                                                     >{order
                                                                        .address
                                                                        .street_and_use_number}</td>
                                                                  <td
                                                                     class="code"
                                                                     >{order
                                                                        .address
                                                                        .postal_code}</td>
                                                                  <td
                                                                     class="city"
                                                                     >{order
                                                                        .address
                                                                        .city}</td>
                                                                  <td
                                                                     class="province"
                                                                     >{order
                                                                        .address
                                                                        .province}</td>
                                                                  <td
                                                                     class="telefono"
                                                                     >{order
                                                                        .address
                                                                        .phone_number}</td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-xxl-12">
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title mb-3">
                                          Detalles Cliente
                                       </h5>
                                       <div class="table-responsive">
                                          {#await getDataClientOrder(order.client_id)}
                                             Loading...
                                          {:then data}
                                             <table
                                                class="table table-borderless mb-0">
                                                <div class="col-sm-auto">
                                                   <div class="card cliente">
                                                      <div class="card-body">
                                                         <div class="row gy-3">
                                                            <div
                                                               class="col-sm-auto">
                                                               <div
                                                                  class="avatar-lg bg-light rounded p-1">
                                                                  <img
                                                                     src="http://localhost:8080/images/users/user_no_photo.png"
                                                                     alt=""
                                                                     class="img-fluid d-block" />
                                                               </div>
                                                            </div>
                                                            <div class="col-sm">
                                                               <h5
                                                                  class="fs-14 text-truncate">
                                                                  Nombre del
                                                                  cliente
                                                               </h5>
                                                               <ul
                                                                  class="list-inline text-muted">
                                                                  <p
                                                                     class="text-muted mb-1">
                                                                     {data?.name ??
                                                                        "No client name"}
                                                                  </p>
                                                               </ul>

                                                               <h5
                                                                  class="fs-14 text-truncate">
                                                                  Número del
                                                                  teléfono
                                                               </h5>
                                                               <ul
                                                                  class="list-inline text-muted">
                                                                  <p
                                                                     class="text-muted mb-1">
                                                                     {data?.phone_number ??
                                                                        "No client phone number"}
                                                                  </p>
                                                               </ul>

                                                               <h5
                                                                  class="fs-14 text-truncate">
                                                                  Correo del
                                                                  cliente
                                                               </h5>
                                                               <ul
                                                                  class="list-inline text-muted">
                                                                  <p
                                                                     class="text-muted mb-1">
                                                                     {data?.email ??
                                                                        "No client email"}
                                                                  </p>
                                                               </ul>
                                                               <div
                                                                  class="text-end mb-4">
                                                                  <a
                                                                     href="/client_info/{order.client_id}"
                                                                     class="btn btn-success btn-label right ms-auto"
                                                                     ><i
                                                                        class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2" />Ver
                                                                     perfil de
                                                                     cliente</a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </table>
                                          {:catch error}
                                             {error}
                                          {/await}
                                       </div>
                                    </div>
                                 </div>
                                 <!-- end row -->
                              </div>
                           </div>
                           <!-- container-fluid -->
                        </div>
                     {:catch error}
                        {error}
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
                        src="http://localhost:8080/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                     <script
                        src="http://localhost:8080/libs/simplebar/simplebar.min.js"></script>
                     <script
                        src="http://localhost:8080/libs/node-waves/waves.min.js"></script>
                     <script
                        src="http://localhost:8080/libs/feather-icons/feather.min.js"></script>
                     <script
                        src="http://localhost:8080/js/pages/plugins/lord-icon-2.1.0.js"></script>
                     <script src="http://localhost:8080/js/plugins.js"></script>

                     <!-- swiper js -->
                     <script
                        src="http://localhost:8080/libs/swiper/swiper-bundle.min.js"></script>

                     <!-- profile init js -->
                     <script
                        src="http://localhost:8080/js/pages/profile.init.js"></script>

                     <!-- App js -->
                     <script src="http://localhost:8080/js/app.js"></script>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
{:catch error}
   {error}
{/await}
