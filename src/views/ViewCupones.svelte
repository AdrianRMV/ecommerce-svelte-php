//verificado
<script>
   export let id;

   import { Jumper } from "svelte-loading-spinners";

   import Sidebar from "../components/Sidebar.svelte";
   import HeaderApp from "../components/HeaderApp.svelte";

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

   var myHeaders = new Headers();
   myHeaders.append("Authorization", `${process.env.BEARER_KEY}`);

   var requestOptions = {
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

   async function getDataSingleCoupon() {
      const resp = await fetch(
         `https://crud.jonathansoto.mx/api/coupons/${id}`,
         requestOptions
      );
      const data = await resp.json();
      return data.data;
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
         <header id="page-topbar">
            <div class="layout-width">
               <HeaderApp {data} />
            </div>
         </header>

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

         {#await getDataSingleCoupon()}
            <!-- promise is pending -->
         {:then data}
            <div class="main-content">
               <div class="page-content">
                  <div class="container-fluid">
                     <!-- start page title -->
                     <div class="row">
                        <div class="col-12">
                           <div
                              class="page-title-box d-sm-flex align-items-center justify-content-between">
                              <h4 class="mb-sm-0">Vista de Detalle Cupón</h4>

                              <div class="page-title-right">
                                 <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">
                                       <a href="/cupones">Cupones</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                       Vista de Detalle Cupón
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
                                             Informacion del cupon
                                          </h5>

                                          <div
                                             class="content-page"
                                             style="display: flex;
                                       gap: 30%;
                                       align-items: center;">
                                             <div
                                                class="table-responsive"
                                                style="width: 32%;">
                                                <table
                                                   class="table table-borderless mb-0">
                                                   <tbody>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Nombre del cupón:</th>
                                                         <td class="text-muted"
                                                            >{data.name}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Código:</th>
                                                         <td class="text-muted"
                                                            >{data.code}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Tipo de Cupón:</th>
                                                         <td class="text-muted"
                                                            >{data.couponable_type}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Porcentaje de
                                                            descuento del cupón:</th>
                                                         <td class="text-muted"
                                                            >{data.percentage_discount}%</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Usos:</th>
                                                         <td class="text-muted"
                                                            >{data.count_uses}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Máximo de usos:</th>
                                                         <td class="text-muted"
                                                            >{data.max_uses}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Mínimo de monto
                                                            solicitado:</th>
                                                         <td class="text-muted"
                                                            >{data.min_amount_required}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Mínimo de producto
                                                            solicitado:</th>
                                                         <td class="text-muted"
                                                            >{data.min_product_required}</td>
                                                      </tr>

                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Fecha de inicio del
                                                            cupón:</th>
                                                         <td class="text-muted"
                                                            >{data.start_date}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Fecha de caducidad
                                                            del cupón:</th>
                                                         <td class="text-muted"
                                                            >{data.end_date}</td>
                                                      </tr>
                                                      <tr>
                                                         <th
                                                            class="ps-0"
                                                            scope="row"
                                                            >Estado del cupón:</th>
                                                         <td class="text-muted"
                                                            >{data.status}</td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>

                                             <!--  -->
                                          </div>
                                       </div>
                                       <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-lg-12">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="card-title mb-0">
                                       Información de la Orden
                                    </h5>
                                 </div>
                                 <div class="card-body">
                                    <table
                                       id="buttons-datatables"
                                       class="display table table-bordered"
                                       style="width:100%">
                                       <thead>
                                          <tr>
                                             <th>ID de la orden</th>
                                             <th>Cliente</th>
                                             <th>Estado de la orden</th>
                                             <th>Monto</th>
                                             <th>Metodo de pago</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          {#each data.orders as couponsOrder}
                                             <tr>
                                                <td>{couponsOrder.id}</td>
                                                <td>{couponsOrder.client_id}</td>
                                                <td>{couponsOrder.order_status_id}</td>
                                                <td>{couponsOrder.total}</td>
                                                <td>{couponsOrder.payment_type_id}</td>
                                             </tr>
                                          {/each}
                                       </tbody>
                                    </table>
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
         <script src="http://localhost:8080/js/pages/profile.init.js"></script>

         <!-- App js -->
         <script src="http://localhost:8080/js/app.js"></script>
      </div>
   </main>
{:catch error}
   {error}
{/await}
