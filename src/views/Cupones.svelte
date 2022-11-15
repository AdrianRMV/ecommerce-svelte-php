//verificado
<script>
   import HeaderApp from "../components/HeaderApp.svelte";
   import Sidebar from "../components/Sidebar.svelte";

   import Swal from "sweetalert2";
   import axios from "axios";

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

   async function getAllCupons() {
      const response = await fetch(
         `https://crud.jonathansoto.mx/api/coupons`,
         requestOptions
      );
      const dataCoupons = await response.json();
      return dataCoupons.data;
   }

   // Agregar cupon

   const datosCupon = {
      name: '',
      code: '',
      percentage_discount: '',
      min_amount_required: '',
      min_product_required: '',
      start_date: '',
      end_date: '',
      max_uses: '',
      count_uses: '',
      valid_only_first_purchase: "1",
      status: "1",
   }

   async function sendDataCreateCoupon() {
      const bodyForm = new FormData();
      bodyForm.append("action", "create");
      bodyForm.append("name", datosCupon.name);
      bodyForm.append("code", datosCupon.code);
      bodyForm.append("percentage_discount", datosCupon.percentage_discount);
      bodyForm.append("min_amount_required", datosCupon.min_amount_required);
      bodyForm.append("min_product_required", datosCupon.min_amount_required);
      bodyForm.append("start_date", datosCupon.start_date);
      bodyForm.append("end_date", datosCupon.end_date);
      bodyForm.append("max_uses", datosCupon.max_uses);
      bodyForm.append("count_uses", datosCupon.count_uses);
      bodyForm.append("valid_only_first_purchase", datosCupon.valid_only_first_purchase);
      bodyForm.append("status", datosCupon.status);

      axios
         .post("https://newphpecommercejona.herokuapp.com/app/CouponsController.php", bodyForm)
         .then(function (response) {
            if (response) {
               console.log(response);
               Swal.fire({
                  title: "Se añadio correctamente",
                  text: "Se recargara la pagina para reflejar los cambios",
                  icon: "info",
                  showCancelButton: false,
                  confirmButtonText: "Aceptar",
               }).then((result) => {
                  if (result.value) {
                     location.href = "/cupones";
                  }
               });
            } else {
               console.log("Nel");
            }
         })
         .catch((resp) => console.log(resp));
   }


   // Eliminar cupon
   async function deleteCupon(id) {
      const bodyForm = new FormData();
      bodyForm.append("action", "delete");
      bodyForm.append("id", id);

      axios
         .post("https://newphpecommercejona.herokuapp.com/app/CouponsController.php", bodyForm)
         .then(function (response) {
            if (response) {
               console.log(response);
               Swal.fire({
                  title: "Se elimino la categoria",
                  text: "Se recargara la pagina para reflejar los cambios",
                  icon: "error",
                  showCancelButton: false,
                  confirmButtonText: "Aceptar",
               }).then((result) => {
                  if (result.value) {
                     location.href = "/catalogos";
                  }
               });
            } else {
               console.log("Nel");
            }
         })
         .catch((resp) => console.log(resp));
   }
</script>

<svelte:head>
   <title>DevEcommerce | Cupones</title>
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
   <!-- One of the following themes -->
   <link
      rel="stylesheet"
      href="http://localhost:8080/libs/%40simonwep/pickr/themes/classic.min.css" />
   <!-- 'classic' theme -->
   <link
      rel="stylesheet"
      href="http://localhost:8080/libs/%40simonwep/pickr/themes/monolith.min.css" />
   <!-- 'monolith' theme -->
   <link
      rel="stylesheet"
      href="http://localhost:8080/libs/%40simonwep/pickr/themes/nano.min.css" />
   <!-- 'nano' theme -->

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
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-12">
                        <div
                           class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0">Cupones</h4>

                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                 </li>
                                 <li class="breadcrumb-item active">Cupones</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->

                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title mb-0">Lista Cupones</h4>
                           </div>
                           <!-- end card header -->

                           <div class="card-body">
                              <div id="customerList">
                                 <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                       <div>
                                          <button
                                             type="button"
                                             class="btn btn-info add-btn"
                                             data-bs-toggle="modal"
                                             id="create-btn"
                                             data-bs-target="#showModalAñadir"
                                             ><i
                                                class="ri-add-line align-bottom me-1" />
                                             Añadir Cupón</button>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    {#await getAllCupons()}
                                       <!-- promise is pending -->
                                    {:then data}
                                       {#each data as coupon}
                                          <div class="col-xxl-4 col-lg-6">
                                             <div
                                                class="card bg-info card-height-100">
                                                <div class="card-body">
                                                   <div
                                                      class="d-flex align-items-center">
                                                      <div
                                                         class="avatar-sm flex-shrink-0">
                                                         <div
                                                            class="avatar-title bg-soft-sucess text-success fs-17 rounded">
                                                            <i
                                                               class="ri-gift-fill" />
                                                         </div>
                                                      </div>
                                                      <div
                                                         class="flex-grow-1 ms-3">
                                                         <h4
                                                            class="fs-4 mb-3 text-white">
                                                            {coupon.name}
                                                         </h4>
                                                         <p
                                                            class="text-white-50 mb-0">
                                                            {coupon.code}
                                                         </p>
                                                         <p
                                                            class="text-white-50 mb-0">
                                                            {coupon.start_date}
                                                         </p>
                                                         <p
                                                            class="text-white-50 mb-0">
                                                            {coupon.end_date}
                                                         </p>
                                                      </div>
                                                      <div
                                                         class="flex-shrink-0 align-self-center">
                                                         <span
                                                            class="badge badge-soft-primary fs-20"
                                                            ><i
                                                               class="ri-arrow-down-s-line fs-20 align-middle me-1" />{coupon.percentage_discount ??
                                                               ""}%<span /></span>
                                                      </div>
                                                   </div>
                                                   <div
                                                      class="d-flex gap-2 pt-3">
                                                      <div class="edit">
                                                         <a
                                                            class="btn btn-sm btn-success edit-item-btn"
                                                            href="/cupones/{coupon.id}"
                                                            >Ver Detalles</a>
                                                      </div>
                                                      <div class="edit">
                                                         <button
                                                            class="btn btn-sm btn-warning edit-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#showModalEditar"
                                                            >Editar</button>
                                                      </div>
                                                      <div class="remove">
                                                         <button
                                                            class="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal"
                                                            on:click={() => deleteCupon(coupon.id)}
                                                            >Borrar</button>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- end card body -->
                                             </div>
                                          </div>
                                       {/each}
                                    {:catch error}
                                       {error}
                                    {/await}

                                    <!-- end col-->
                                 </div>


                                 <!-- Editar modal -->
                                 <div
                                    class="modal fade"
                                    id="showModalEditar"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div
                                       class="modal-dialog modal-dialog-centered">
                                       <div class="modal-content">
                                          <div
                                             class="modal-header bg-light p-3">
                                             <h5
                                                class="modal-title"
                                                id="exampleModalLabel">
                                                Editar Cupón
                                             </h5>
                                             <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                                id="close-modal" />
                                          </div>
                                          <form>
                                             <div class="modal-body">
                                                <div class="mb-3">
                                                   <label
                                                      for="name-field"
                                                      class="form-label"
                                                      >Nombre</label>
                                                   <input
                                                      type="text"
                                                      id="name-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Nombre cupón"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="code-field"
                                                      class="form-label"
                                                      >Código del cupón</label>
                                                   <input
                                                      type="text"
                                                      id="code-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Código del cupón"
                                                      required />
                                                </div>

                                                <div class="mb-3">
                                                   <label
                                                      for="desc-field"
                                                      class="form-label"
                                                      >Porcentaje de descuento</label>
                                                   <input
                                                      type="email"
                                                      id="desc-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Porcentaje de descuento"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="monto-field"
                                                      class="form-label"
                                                      >Monto mínimo solicitado</label>
                                                   <input
                                                      type="text"
                                                      id="monto-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Monto mínimo solicitado"
                                                      required />
                                                </div>

                                                <div class="mb-3">
                                                   <label
                                                      for="montoP-field"
                                                      class="form-label"
                                                      >Monto mínimo de producto
                                                      solicitado</label>
                                                   <input
                                                      type="text"
                                                      id="montoP-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Monto mínimo de producto"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="fecha-field"
                                                      class="form-label"
                                                      >Fecha de inicio del cupón</label>
                                                   <input
                                                      type="text"
                                                      id="fecha-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Fecha inicio del cupón"
                                                      required />
                                                </div>

                                                <div class="mb-3">
                                                   <label
                                                      for="fechaC-field"
                                                      class="form-label"
                                                      >Fecha caducidad del cupón</label>
                                                   <input
                                                      type="text"
                                                      class="form-control"
                                                      data-provider="flatpickr"
                                                      data-date-format="d M, Y"
                                                      data-disable-date="15 12,2021" />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="fechaC-field"
                                                      class="form-label"
                                                      >Fecha caducidad del cupón</label>
                                                   <input
                                                      type="text"
                                                      class="form-control"
                                                      data-provider="flatpickr"
                                                      data-date-format="d M, Y"
                                                      data-disable-date="15 12,2021" />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="fecha-field"
                                                      class="form-label"
                                                      >Cantidad de usos</label>
                                                   <input
                                                      type="text"
                                                      id="fecha-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Cantidad de usos"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="fecha-field"
                                                      class="form-label"
                                                      >Disponible para usar en
                                                      una sola compra?</label>
                                                   <input
                                                      type="text"
                                                      id="fecha-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Número de disponibilidad para usar en compras"
                                                      required />
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <div
                                                   class="hstack gap-2 justify-content-end">
                                                   <button
                                                      type="button"
                                                      class="btn btn-light"
                                                      data-bs-dismiss="modal"
                                                      >Cerrar</button>
                                                   <button
                                                      type="submit"
                                                      class="btn btn-success"
                                                      id="add-btn"
                                                      >Guardar cambios</button>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>

                                 <!-- Añadir modal -->

                                 <div
                                    class="modal fade"
                                    id="showModalAñadir"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div
                                       class="modal-dialog modal-dialog-centered">
                                       <div class="modal-content">
                                          <div
                                             class="modal-header bg-light p-3">
                                             <h5
                                                class="modal-title"
                                                id="exampleModalLabel">
                                                Añadir Cupón
                                             </h5>
                                             <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                                id="close-modal" />
                                          </div>
                                          <form>
                                             <div class="modal-body">
                                                <div class="mb-3">
                                                   <label
                                                      for="name-field"
                                                      class="form-label"
                                                      >Nombre</label>
                                                   <input
                                                      type="text"
                                                      id="name-field"
                                                      class="form-control"
                                                      bind:value={datosCupon.name}
                                                      placeholder="Ingresar Nombre cupón"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="code-field"
                                                      class="form-label"
                                                      >Código del cupón</label>
                                                   <input
                                                      type="text"
                                                      id="code-field"
                                                      class="form-control"
                                                      bind:value={datosCupon.code}
                                                      placeholder="Ingresar Código del cupón"
                                                      required />
                                                </div>

                                                <div class="mb-3">
                                                   <label
                                                      for="desc-field"
                                                      class="form-label"
                                                      >Porcentaje de descuento</label>
                                                   <input
                                                      type="text"
                                                      id="desc-field"
                                                      pattern="[0-9]{2}"
                                                      bind:value={datosCupon.percentage_discount}
                                                      class="form-control"
                                                      placeholder="Ingresar Porcentaje de descuento"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="monto-field"
                                                      class="form-label"
                                                      >Monto mínimo solicitado</label>
                                                   <input
                                                      type="text"
                                                      id="monto-field"
                                                      class="form-control"
                                                      pattern="[0-9]+"
                                                      bind:value={datosCupon.min_amount_required}
                                                      placeholder="Ingresar Monto mínimo solicitado"
                                                      required />
                                                </div>

                                                <div class="mb-3">
                                                   <label
                                                      for="montoP-field"
                                                      class="form-label"
                                                      >Monto mínimo de producto
                                                      solicitado</label>
                                                   <input
                                                      type="text"
                                                      id="montoP-field"
                                                      pattern="[0-9]+"
                                                      bind:value={datosCupon.min_product_required}
                                                      class="form-control"
                                                      placeholder="Ingresar Monto mínimo de producto"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="fecha-field"
                                                      class="form-label"
                                                      >Fecha de inicio del cupón</label>
                                                   <input
                                                      type="text"
                                                      pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"
                                                      bind:value={datosCupon.start_date}
                                                      id="fecha-field"
                                                      class="form-control"
                                                      placeholder="Ingresar Fecha inicio del cupón (DD/MM/YYYY)"
                                                      required />
                                                </div>

                                                <div class="mb-3">
                                                   <label
                                                      for="fechaC-field"
                                                      class="form-label"
                                                      >Fecha caducidad del cupón</label>
                                                   <input
                                                      type="text"
                                                      class="form-control"
                                                      pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"
                                                      placeholder="DD/MM/YYYY"
                                                      bind:value={datosCupon.end_date}
                                                      data-provider="flatpickr"
                                                      data-date-format="d M, Y"
                                                      data-disable-date="15 12,2021" />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="fecha-field"
                                                      class="form-label"
                                                      >Cantidad de usos</label>
                                                   <input
                                                      type="text"
                                                      id="fecha-field"
                                                      class="form-control"
                                                      pattern="[0-9]+"
                                                      bind:value={datosCupon.count_uses}
                                                      placeholder="Ingresar Cantidad de usos"
                                                      required />
                                                </div>
                                                <div class="mb-3">
                                                   <label
                                                      for="fecha-field"
                                                      class="form-label"
                                                      >Disponible para usar en
                                                      una sola compra?</label>
                                                   <input
                                                      type="text"
                                                      id="fecha-field"
                                                      class="form-control"
                                                      bind:value={datosCupon.valid_only_first_purchase}
                                                      placeholder="1 (si) , 2 (no) "
                                                      required />
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <div
                                                   class="hstack gap-2 justify-content-end">
                                                   <button
                                                      type="button"
                                                      class="btn btn-light"
                                                      data-bs-dismiss="modal"
                                                      >Cerrar</button>
                                                   <button
                                                      type="button"
                                                      class="btn btn-success"
                                                      id="edit-btn"
                                                      on:click={sendDataCreateCoupon}
                                                      >Añadir Cupón</button>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>

                                 <!-- Modal -->
                                 <div
                                    class="modal fade zoomIn"
                                    id="deleteRecordModal"
                                    tabindex="-1"
                                    aria-hidden="true">
                                    <div
                                       class="modal-dialog modal-dialog-centered">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                                id="btn-close" />
                                          </div>
                                          <div class="modal-body">
                                             <div class="mt-2 text-center">
                                                <lord-icon
                                                   src="https://cdn.lordicon.com/gsqxdxog.json"
                                                   trigger="loop"
                                                   colors="primary:#f7b84b,secondary:#f06548"
                                                   style="width:100px;height:100px" />
                                                <div
                                                   class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                   <h4>Estás seguro ?</h4>
                                                   <p
                                                      class="text-muted mx-4 mb-0">
                                                      ¿Estás seguro de eliminar
                                                      este cupón?
                                                   </p>
                                                </div>
                                             </div>
                                             <div
                                                class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                <button
                                                   type="button"
                                                   class="btn w-sm btn-light"
                                                   data-bs-dismiss="modal"
                                                   >Cerrar</button>
                                                <button
                                                   type="button"
                                                   class="btn w-sm btn-danger "
                                                   id="delete-record"
                                                   >Sí, borrar cupón!</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!--end modal -->
                              </div>
                           </div>
                           <!-- end card -->
                        </div>
                        <!-- end col -->
                     </div>
                     <!-- end col -->
                  </div>
                  <!-- end row -->
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
            <!-- prismjs plugin -->
            <script src="http://localhost:8080/libs/prismjs/prism.js"></script>
            <script
               src="http://localhost:8080/libs/list.js/list.min.js"></script>
            <script
               src="http://localhost:8080/libs/list.pagination.js/list.pagination.min.js"></script>

            <!-- listjs init -->
            <script
               src="http://localhost:8080/js/pages/listjs.init.js"></script>

            <!-- Sweet Alerts js -->
            <script
               src="http://localhost:8080/libs/sweetalert2/sweetalert2.min.js"></script>

            <!-- Modern colorpicker bundle -->
            <script
               src="http://localhost:8080/libs/%40simonwep/pickr/pickr.min.js"></script>

            <!-- init js -->
            <script
               src="http://localhost:8080/js/pages/form-pickers.init.js"></script>

            <!-- App js -->
            <script src="http://localhost:8080/js/app.js"></script>
         </div>
      </div>
   </main>
{:catch error}
   {error}
{/await}
