<script>
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

   async function getAllOrders() {
      const response = await fetch(
         `https://crud.jonathansoto.mx/api/orders`,
         requestOptions
      );
      const dataOrders = await response.json();
      return dataOrders.data;
   }

   let dataClientsArray = [];

   async function getAllClients() {
      const response = await fetch(
         `https://crud.jonathansoto.mx/api/clients`,
         requestOptions
      );
      const dataClients = await response.json();
      return dataClients.data;
   }

   async function deleteOrder(idOrder) {
      const swalWithBootstrapButtons = Swal.mixin({
         customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
         },
         buttonsStyling: false,
      });
      let requestOptionsDelete = {
         method: "DELETE",
         headers: myHeaders,
         redirect: "follow",
      };

      swalWithBootstrapButtons
         .fire({
            title: "Seguro que quieres eliminar el usuario?",
            text: "No podras revertir los cambios",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, eliminalo!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true,
         })
         .then(async (result) => {
            if (result.isConfirmed) {
               const res = await fetch(
                  `https://crud.jonathansoto.mx/api/orders/${idOrder}`,
                  requestOptionsDelete
               );
               const data = await res.json();
               if (data.code > 0) {
                  location.reload();
                  swalWithBootstrapButtons.fire(
                     "Eliminado!",
                     "El usuario ha sido eliminado.",
                     "success"
                  );
               }
            } else if (result.dismiss === Swal.DismissReason.cancel) {
               swalWithBootstrapButtons.fire(
                  "Cancelado",
                  "Tu usuario esta a salvo :)",
                  "error"
               );
            }
         });
   }
</script>

<!-- verificado -->
<svelte:head>
   <title>DevEcommerce | Ordenes</title>
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
         {#await getAllClients()}
            Loading...
         {:then client}
            <div class="main-content">
               <div class="page-content">
                  <div class="container-fluid">
                     <!-- start page title -->
                     <div class="row">
                        <div class="col-12">
                           <div
                              class="page-title-box d-sm-flex align-items-center justify-content-between">
                              <h4 class="mb-sm-0">Ordenes</h4>

                              <div class="page-title-right">
                                 <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">
                                       <a href="/home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                       Ordenes
                                    </li>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end page title -->

                     <div class="row" id="contactList">
                        <div class="col-lg-12">
                           <div class="card">
                              <div
                                 class="card-header d-flex align-items-center border-0">
                                 <h5 class="card-title mb-0 flex-grow-1">
                                    Lista de Ordenes
                                 </h5>
                                 <div class="flex-shrink-0">
                                    <div class="flax-shrink-0 hstack gap-2">
                                       <button
                                          class="btn btn-primary"
                                          data-bs-toggle="modal"
                                          data-bs-target="#showModalAñadirO"
                                          >Crear una Orden</button>
                                    </div>
                                 </div>
                              </div>

                              {#await getAllOrders()}
                                 Loading...
                              {:then dataOrders}
                                 <div class="card-body">
                                    <div class="table-responsive table-card">
                                       <table
                                          class="table align-middle table-nowrap"
                                          id="customerTable">
                                          <thead class="table-light text-muted">
                                             <tr>
                                                <th scope="col"
                                                   >Número de Folio</th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col"
                                                   >Tipo de pago</th>

                                                <th scope="col">Monto</th>
                                                <th scope="col"
                                                   >Estado de la Orden</th>
                                                <th scope="col">Acción</th>
                                             </tr>
                                          </thead>
                                          <!--end thead-->
                                          <tbody class="list form-check-all">
                                             {#each dataOrders as order, i}
                                                {@const arr = client.find(
                                                   (c) => c.id == order.id
                                                )}
                                                <tr>
                                                   <td class="folio_date"
                                                      >{order.folio}</td>
                                                   <td>
                                                      {arr?.name ?? "No client"}
                                                   </td>

                                                   {#if order.payment_type_id == 1}
                                                      <td
                                                         class="typeBuy text-success"
                                                         >Efectivo</td>
                                                   {:else if order.payment_type_id == 2}
                                                      <td
                                                         class="typeBuy text-success"
                                                         >Tarjeta</td>
                                                   {:else if order.payment_type_id == 3}
                                                      <td
                                                         class="typeBuy text-success"
                                                         >Transferencia</td>
                                                   {:else}
                                                      <td
                                                         class="typeBuy text-success"
                                                         >Sin metodo de pago</td>
                                                   {/if}

                                                   <td class="monto"
                                                      >${order.total}</td>
                                                   <td class="status"
                                                      ><span
                                                         class="badge badge-soft-success text-uppercase"
                                                         >Efectuado
                                                         Correctamente</span
                                                      ></td>
                                                   <td class="action">
                                                      <div class="d-flex gap-2">
                                                         <div class="edit">
                                                            <a
                                                               class="btn btn-sm btn-success edit-item-btn"
                                                               href="/viewOrder/{order.id}"
                                                               >Ver Detalles</a>
                                                         </div>
                                                         <div class="edit">
                                                            <a
                                                               class="btn btn-sm btn-success edit-item-btn"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#showModalEditarO"
                                                               >Editar</a>
                                                         </div>
                                                         <div
                                                            class="remove"
                                                            id="removeItemModal">
                                                            <button
                                                               class="btn btn-sm btn-danger remove-item-btn"
                                                               on:click={() => deleteOrder(order.id)} 
                                                               >Borrar</button>
                                                         </div>
                                                      </div>
                                                   </td>
                                                </tr>
                                             {/each}
                                          </tbody>
                                       </table>
                                       <!--end table-->

                                       <!--end row-->
                                       <div
                                          class="noresult"
                                          style="display: none">
                                          <div class="text-center">
                                             <lord-icon
                                                src="https://cdn.lordicon.com/msoeawqm.json"
                                                trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a"
                                                style="width:75px;height:75px" />
                                             <h5 class="mt-2">
                                                Lo sentimos! No se encontraron
                                                resultados
                                             </h5>
                                             <p class="text-muted mb-0">
                                                Hemos buscado en todas las
                                                etiquetas. No encontramos
                                                ningúna etiqueta para su
                                                búsqueda.
                                             </p>
                                          </div>
                                       </div>

                                       <div
                                          class="modal fade"
                                          id="showModalEditarO"
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
                                                      Editar Orden
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
                                                            for="estatus-field"
                                                            class="form-label"
                                                            >Estado de la Orden</label>
                                                         <input
                                                            type="text"
                                                            id="estatus-field"
                                                            class="form-control"
                                                            placeholder="Estado de la Orden"
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

                                       <div
                                          class="modal fade"
                                          id="showModalAñadirO"
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
                                                      Crear Orden
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
                                                            for="folio-field"
                                                            class="form-label"
                                                            >Folio</label>
                                                         <input
                                                            type="text"
                                                            id="folio-field"
                                                            class="form-control"
                                                            placeholder="Ingresar Folio"
                                                            required />
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="ForminputState1"
                                                            class="form-label"
                                                            >Cliente</label>
                                                         <select
                                                            id="ForminputState1"
                                                            class="form-select"
                                                            data-choices
                                                            data-choices-sorting="true">
                                                            <option selected
                                                               >Mary Cousar</option>
                                                            <option>...</option>
                                                         </select>
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="ForminputState2"
                                                            class="form-label"
                                                            >Producto</label>
                                                         <select
                                                            id="ForminputState2"
                                                            class="form-select"
                                                            data-choices
                                                            data-choices-sorting="true">
                                                            <option selected
                                                               >Escurridor</option>
                                                            <option>...</option>
                                                         </select>
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="monto-field"
                                                            class="form-label"
                                                            >Cantidad</label>
                                                         <input
                                                            type="text"
                                                            id="monto-field"
                                                            class="form-control"
                                                            placeholder="Ingresar Cantidad"
                                                            required />
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="ForminputState3"
                                                            class="form-label"
                                                            >Tipo de Pago</label>
                                                         <select
                                                            id="ForminputState3"
                                                            class="form-select"
                                                            data-choices
                                                            data-choices-sorting="true">
                                                            <option selected
                                                               >Efectivo</option>
                                                            <option>...</option>
                                                         </select>
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="status-field"
                                                            class="form-label"
                                                            >Estado de la Orden</label>
                                                         <input
                                                            type="text"
                                                            id="status-field"
                                                            class="form-control "
                                                            placeholder="Ingresar Pendiente/Pagada/Enviada/Cancelada"
                                                            required />
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="ForminputState4"
                                                            class="form-label"
                                                            >Dirección</label>
                                                         <select
                                                            id="ForminputState4"
                                                            class="form-select"
                                                            data-choices
                                                            data-choices-sorting="true">
                                                            <option selected
                                                               >Street 4</option>
                                                            <option>...</option>
                                                         </select>
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="ForminputState5"
                                                            class="form-label"
                                                            >Cupón</label>
                                                         <select
                                                            id="ForminputState5"
                                                            class="form-select"
                                                            data-choices
                                                            data-choices-sorting="true">
                                                            <option selected
                                                               >Descuento 50%</option>
                                                            <option>...</option>
                                                         </select>
                                                      </div>
                                                      <div class="mb-3">
                                                         <label
                                                            for="ForminputState6"
                                                            class="form-label"
                                                            >Pago de la Orden</label>
                                                         <select
                                                            id="ForminputState6"
                                                            class="form-select"
                                                            data-choices
                                                            data-choices-sorting="true">
                                                            <option selected
                                                               >Sí/No</option>
                                                            <option>...</option>
                                                         </select>
                                                      </div>

                                                      <div class="mb-3">
                                                         <label
                                                            for="total-field"
                                                            class="form-label"
                                                            >Total</label>
                                                         <input
                                                            type="text"
                                                            id="total-field"
                                                            class="form-control "
                                                            placeholder="Ingresar Total"
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
                                                            >Añadir Orden</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                       </div>

                                       <!-- Modal -->
                                       <div
                                          class="modal fade zoomIn"
                                          id="deleteRecordModalO"
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
                                                   <div
                                                      class="mt-2 text-center">
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
                                                            ¿Estás seguro de
                                                            eliminar esta orden?
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
                                                         >Sí, borrar orden!</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!--end modal -->
                                    </div>
                                    <!-- end row -->
                                 </div>
                              {:catch error}
                                 {error}
                              {/await}

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
                              <script
                                 src="http://localhost:8080/js/plugins.js"></script>
                              <!-- prismjs plugin -->
                              <script
                                 src="http://localhost:8080/libs/prismjs/prism.js"></script>
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

                              <!--crypto-orders init-->
                              <script
                                 src="http://localhost:8080/js/pages/crypto-orders.init.js"></script>

                              <!-- App js -->
                              <script
                                 src="http://localhost:8080/js/app.js"></script>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         {:catch error}
            {error}
         {/await}
      </div>
   </main>
{:catch error}
   {error}
{/await}
