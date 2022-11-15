//verificado
<script>
   export let id;

   import Sidebar from "../components/Sidebar.svelte";
   import HeaderApp from "../components/HeaderApp.svelte";
   import Carousel from "svelte-carousel";

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

   async function getProductById() {
      const fetch_query = await fetch(
         `https://crud.jonathansoto.mx/api/products/${id}`,
         requestOptions
      );

      const resp = await fetch_query.json();
      return resp.data;
   }

   function reloadPage(e) {
      e.preventDefault();
      Swal.fire({
         title: "Recargara ventana",
         text: "Se recargara la pagina para ver los cambios realizados :)",
         icon: "info",
         showCancelButton: false,
         confirmButtonText: "Aceptar",
      }).then((result) => {
         if (result.value) {
            location.reload();
         }
      });
   }

   // Traer todas las categorias
   async function getCategories() {
      const fetch_query = await fetch(
         "https://crud.jonathansoto.mx/api/categories",
         requestOptions
      );

      const resp = await fetch_query.json();
      return resp.data;
   }

   // Traer todas las marcas
   async function getBrands() {
      const fetch_query = await fetch(
         "https://crud.jonathansoto.mx/api/brands",
         requestOptions
      );

      const resp = await fetch_query.json();
      return resp.data;
   }

   // Traer todas las etiquetas
   async function getTags() {
      const fetch_query = await fetch(
         "https://crud.jonathansoto.mx/api/tags",
         requestOptions
      );

      const resp = await fetch_query.json();
      return resp.data;
   }
</script>

<svelte:head>
   <title>DevEcommerce | Vista Detalle Productos</title>
   <!-- ============================================ -->
   <!-- Css template -->
   <!-- ============================================ -->

   <!-- App favicon -->
   <link rel="shortcut icon" href="http://localhost:8080/images/favicon.ico" />

   <!--Swiper slider css-->
   <link
      href="http://localhost:8080/libs/swiper/swiper-bundle.min.css"
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
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-12">
                        <div
                           class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0">Vista de Detalle Producto</h4>

                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item">
                                    <a href="#!">Productos</a>
                                 </li>
                                 <li class="breadcrumb-item active">
                                    Vista de Detalle Producto
                                 </li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->

                  <div class="row">
                     {#await getProductById()}
                        <!-- promise is pending -->
                     {:then data}
                        <div class="col-lg-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="row gx-lg-5">
                                    <div class="col-xl-4 col-md-8 mx-auto">
                                       <div class="product-img">
                                          <img
                                             src={data.cover}
                                             alt={data.name}
                                             class="img-fluid d-block" />
                                          <!-- end swiper thumbnail slide -->
                                       </div>
                                       <div class="row mt-5">
                                          <div class="col overflow-auto">
                                             <!-- Carousel de presentaciones -->
                                             <h3 class="pt-4 text-center">
                                                Presentaciones
                                             </h3>
                                             <Carousel>
                                                {#each data.presentations as presentation}
                                                   <a href="">
                                                      <img
                                                         class="d-block w-100"
                                                         src="https://crud.jonathansoto.mx/storage/products/{presentation.cover}"
                                                         alt="First slide" />
                                                   </a>
                                                {/each}
                                             </Carousel>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-xl-8">
                                       <div class="mt-xl-0 mt-5">
                                          <div class="d-flex">
                                             <div class="flex-grow-1">
                                                <h4>
                                                   {data.name}
                                                </h4>
                                             </div>
                                          </div>

                                          <div class="row mt-4">
                                             <div class="col-lg-3 col-sm-6">
                                                <div
                                                   class="p-2 border border-dashed rounded">
                                                   <div
                                                      class="d-flex align-items-center">
                                                      <div
                                                         class="avatar-sm me-2">
                                                         <div
                                                            class="avatar-title rounded bg-transparent text-success fs-24">
                                                            <i
                                                               class="ri-money-dollar-circle-fill" />
                                                         </div>
                                                      </div>
                                                      <div class="flex-grow-1">
                                                         <p
                                                            class="text-muted mb-1">
                                                            Precio:
                                                         </p>
                                                         <h5 class="mb-0">
                                                            {data
                                                               .presentations[0]
                                                               .price[0].amount}
                                                         </h5>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- end col -->
                                          </div>
                                          <div class="mt-4 text-muted">
                                             <h5 class="fs-14">Slug:</h5>
                                             <p>
                                                {data.slug}
                                             </p>
                                          </div>

                                          <div class="mt-4 text-muted">
                                             <h5 class="fs-14">
                                                Descripción :
                                             </h5>
                                             <p>
                                                {data.description}
                                             </p>
                                          </div>
                                          <div class="mt-4 text-muted">
                                             <div class="col-sm-6">
                                                <div class="mt-3">
                                                   <h5 class="fs-14">
                                                      Características :
                                                   </h5>
                                                   <p>
                                                      {data.features}
                                                   </p>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="product-content mt-5">
                                             <h5 class="fs-14 mb-3">
                                                Descripción del Producto:
                                             </h5>
                                             <nav>
                                                <ul
                                                   class="nav nav-tabs nav-tabs-custom nav-success"
                                                   id="nav-tab"
                                                   role="tablist">
                                                   <li class="nav-item">
                                                      <a
                                                         class="nav-link active"
                                                         id="nav-speci-tab"
                                                         data-bs-toggle="tab"
                                                         href="#nav-speci"
                                                         role="tab"
                                                         aria-controls="nav-speci"
                                                         aria-selected="true"
                                                         >Especificaciones</a>
                                                   </li>
                                                </ul>
                                             </nav>
                                             <div
                                                class="tab-content border border-top-0 p-4"
                                                id="nav-tabContent">
                                                <div
                                                   class="tab-pane fade show active"
                                                   id="nav-speci"
                                                   role="tabpanel"
                                                   aria-labelledby="nav-speci-tab">
                                                   <div
                                                      class="table-responsive">
                                                      <table class="table mb-0">
                                                         <tbody>
                                                            <tr
                                                               style="display: flex;">
                                                               <th
                                                                  scope="row"
                                                                  style="width: 200px;"
                                                                  >Categoría</th>
                                                               {#each data.categories as categorie}
                                                                  <td>
                                                                     {categorie.name}
                                                                  </td>
                                                               {/each}
                                                            </tr>
                                                            <tr
                                                               style="display: flex;">
                                                               <th
                                                                  scope="row"
                                                                  style="width: 200px"
                                                                  >Marca</th>
                                                               <td
                                                                  >{data.brand
                                                                     .name} ( {data
                                                                     .brand
                                                                     .description}
                                                                  )</td>
                                                            </tr>
                                                            <tr
                                                               style="display: flex;">
                                                               <th
                                                                  scope="row"
                                                                  style="width: 200px"
                                                                  >Etiquetas</th>
                                                               {#each data.tags as tags}
                                                                  <td>{tags.name}</td>
                                                               {/each}
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- product-content -->

                                          <!-- end card body -->
                                       </div>
                                    </div>

                                    <div class="col-xl-12">
                                       <div class="row">
                                          <div class="col-lg-12">
                                             <div class="card">
                                                <div class="card-header" />
                                                <!-- end card header -->

                                                <div class="card-body">
                                                   <div id="customerList">
                                                      <div class="row g-4 mb-3">
                                                         <div
                                                            class="col-sm-auto">
                                                            <div>
                                                               <h5
                                                                  class="fs-14 mb-3">
                                                                  Presentaciones
                                                               </h5>
                                                               <button
                                                                  type="button"
                                                                  class="btn btn-success add-btn"
                                                                  data-bs-toggle="modal"
                                                                  id="create-btn"
                                                                  data-bs-target="#showModalAñadir"
                                                                  ><i
                                                                     class="ri-add-line align-bottom me-1" />
                                                                  Añadir Presentación</button>
                                                            </div>
                                                         </div>
                                                      </div>

                                                      <!-- <div
                                                         class="table-responsive table-card mt-3 mb-1">
                                                         <table
                                                            class="table align-middle table-nowrap"
                                                            id="customerTable">
                                                            <thead
                                                               class="table-light">
                                                               <tr>
                                                                  <th
                                                                     class="sort"
                                                                     data-sort="photo"
                                                                     >Foto</th>

                                                                  <th
                                                                     class="sort"
                                                                     data-sort="name"
                                                                     >Nombre</th>
                                                                  <th
                                                                     class="sort"
                                                                     data-sort="lastname"
                                                                     >Status</th>
                                                                  <th
                                                                     class="sort"
                                                                     data-sort="monto"
                                                                     >Monto</th>

                                                                  <th
                                                                     class="sort"
                                                                     data-sort="action"
                                                                     >Acción</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody
                                                               class="list form-check-all">
                                                               <tr>
                                                                  <td
                                                                     class="photo">
                                                                     <img
                                                                        class="image avatar-xs rounded-circle shadow"
                                                                        alt=""
                                                                        src="http://localhost:8080/images/users/avatar-1.jpg" />
                                                                  </td>

                                                                  <td
                                                                     class="name"
                                                                     >Escurridor</td>
                                                                  <td
                                                                     class="lastname"
                                                                     >Active</td>
                                                                  <td
                                                                     class="monto"
                                                                     >$5</td>

                                                                  <td>
                                                                     <div
                                                                        class="d-flex gap-2">
                                                                        <div
                                                                           class="edit">
                                                                           <button
                                                                              class="btn btn-sm btn-success edit-item-btn"
                                                                              href=""
                                                                              >Ver
                                                                              Detalles</button>
                                                                        </div>
                                                                        <div
                                                                           class="edit">
                                                                           <button
                                                                              class="btn btn-sm btn-success edit-item-btn"
                                                                              data-bs-toggle="modal"
                                                                              data-bs-target="#showModalEditar"
                                                                              >Editar</button>
                                                                        </div>
                                                                        <div
                                                                           class="remove"
                                                                           id="removeItemModal">
                                                                           <button
                                                                              class="btn btn-sm btn-danger remove-item-btn"
                                                                              data-bs-toggle="modal"
                                                                              data-bs-target="#deleteRecordModal"
                                                                              >Eliminar</button>
                                                                        </div>
                                                                     </div>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div> -->
                                                      <div
                                                         class="noresult"
                                                         style="display: none">
                                                         <div
                                                            class="text-center">
                                                            <lord-icon
                                                               src="https://cdn.lordicon.com/msoeawqm.json"
                                                               trigger="loop"
                                                               colors="primary:#121331,secondary:#08a88a"
                                                               style="width:75px;height:75px" />
                                                            <h5 class="mt-2">
                                                               Lo sentimos! No
                                                               se encontraron
                                                               resultados
                                                            </h5>
                                                            <p
                                                               class="text-muted mb-0">
                                                               Hemos buscado en
                                                               todos los
                                                               Usuarios. No
                                                               encontramos
                                                               ningún usuario
                                                               para su búsqueda.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div
                                                      class="modal fade"
                                                      id="showModalEditar"
                                                      tabindex="-1"
                                                      aria-labelledby="exampleModalLabel"
                                                      aria-hidden="true">
                                                      <div
                                                         class="modal-dialog modal-dialog-centered">
                                                         <div
                                                            class="modal-content">
                                                            <div
                                                               class="modal-header bg-light p-3">
                                                               <h5
                                                                  class="modal-title"
                                                                  id="exampleModalLabel">
                                                                  Editar
                                                                  Presentación
                                                               </h5>
                                                               <button
                                                                  type="button"
                                                                  class="btn-close"
                                                                  data-bs-dismiss="modal"
                                                                  aria-label="Close"
                                                                  id="close-modal" />
                                                            </div>
                                                            <form>
                                                               <div
                                                                  class="modal-body">
                                                                  <div
                                                                     class="mb-3">
                                                                     <div
                                                                        class="card-body p-4">
                                                                        <div
                                                                           class="text-center">
                                                                           <div
                                                                              class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                                                              <img
                                                                                 src="http://localhost:8080/images/users/avatar-1.jpg"
                                                                                 class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                                                                                 alt="user-profile-image" />
                                                                              <div
                                                                                 class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                                                 <input
                                                                                    id="profile-img-file-input"
                                                                                    type="file"
                                                                                    class="profile-img-file-input" />
                                                                                 <label
                                                                                    for="profile-img-file-input"
                                                                                    class="profile-photo-edit avatar-xs">
                                                                                    <span
                                                                                       class="avatar-title rounded-circle bg-light text-body shadow">
                                                                                       <i
                                                                                          class="ri-camera-fill" />
                                                                                    </span>
                                                                                 </label>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>

                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="name-field"
                                                                        class="form-label"
                                                                        >Nombre</label>
                                                                     <input
                                                                        type="text"
                                                                        id="name-field"
                                                                        class="form-control"
                                                                        placeholder="Enter Name"
                                                                        required />
                                                                  </div>
                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="status-field"
                                                                        class="form-label"
                                                                        >Status</label>
                                                                     <input
                                                                        type="text"
                                                                        id="status-field"
                                                                        class="form-control"
                                                                        placeholder="Enter Status"
                                                                        required />
                                                                  </div>

                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="monto-field"
                                                                        class="form-label"
                                                                        >Monto</label>
                                                                     <input
                                                                        type="text"
                                                                        id="monto-field"
                                                                        class="form-control"
                                                                        placeholder="Enter Monto"
                                                                        required />
                                                                  </div>
                                                               </div>
                                                               <div
                                                                  class="modal-footer">
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
                                                                        >Guardar
                                                                        cambios</button>
                                                                  </div>
                                                               </div>
                                                            </form>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div
                                                      class="modal fade"
                                                      id="showModalAñadir"
                                                      tabindex="-1"
                                                      aria-labelledby="exampleModalLabel"
                                                      aria-hidden="true">
                                                      <div
                                                         class="modal-dialog modal-dialog-centered">
                                                         <div
                                                            class="modal-content">
                                                            <div
                                                               class="modal-header bg-light p-3">
                                                               <h5
                                                                  class="modal-title"
                                                                  id="exampleModalLabel">
                                                                  Añadir Nueva
                                                                  Presentación
                                                               </h5>
                                                               <button
                                                                  type="button"
                                                                  class="btn-close"
                                                                  data-bs-dismiss="modal"
                                                                  aria-label="Close"
                                                                  id="close-modal" />
                                                            </div>
                                                            <form
                                                               method="post"
                                                               action="http://localhost/app/PresentationsController.php"
                                                               enctype="multipart/form-data">
                                                               <div
                                                                  class="modal-body">
                                                                  <div
                                                                     class="mb-3">
                                                                     <div
                                                                        class="card-body p-4">
                                                                        <div
                                                                           class="text-center">
                                                                           <div
                                                                              class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                                                              <img
                                                                                 src="http://localhost:8080/images/users/user-dummy-img.jpg"
                                                                                 class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                                                                                 alt="user-profile" />
                                                                              <div
                                                                                 class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                                                 <input
                                                                                    id="profile-img-file-input"
                                                                                    type="file"
                                                                                    name="cover"
                                                                                    class="profile-img-file-input" />
                                                                                 <label
                                                                                    for="profile-img-file-input"
                                                                                    class="profile-photo-edit avatar-xs">
                                                                                    <span
                                                                                       class="avatar-title rounded-circle bg-light text-body shadow">
                                                                                       <i
                                                                                          class="ri-camera-fill" />
                                                                                    </span>
                                                                                 </label>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>

                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="name-field"
                                                                        class="form-label"
                                                                        >Descripcion</label>
                                                                     <input
                                                                        type="text"
                                                                        name="description"
                                                                        id="name-field"
                                                                        class="form-control"
                                                                        placeholder="Enter Name"
                                                                        required />
                                                                  </div>
                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="Code-field"
                                                                        class="form-label"
                                                                        >Code</label>
                                                                     <input
                                                                        type="text"
                                                                        id="Code-field"
                                                                        name="code"
                                                                        class="form-control"
                                                                        placeholder="Ponga el Code aqui"
                                                                        required />
                                                                  </div>
                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="weight-field"
                                                                        class="form-label"
                                                                        >Peso en
                                                                        gramos</label>
                                                                     <input
                                                                        type="text"
                                                                        id="weight-field"
                                                                        name="weight_in_grams"
                                                                        class="form-control"
                                                                        placeholder="Ponga el peso aqui"
                                                                        required />
                                                                  </div>
                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="status-field"
                                                                        class="form-label"
                                                                        >Status</label>
                                                                     <input
                                                                        type="text"
                                                                        id="status-field"
                                                                        name="status"
                                                                        class="form-control"
                                                                        placeholder="Ponga el Status aqui"
                                                                        required />
                                                                  </div>

                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="stock-field"
                                                                        class="form-label"
                                                                        >Stock</label>
                                                                     <input
                                                                        type="text"
                                                                        id="stock-field"
                                                                        name="stock"
                                                                        class="form-control"
                                                                        placeholder="Ponga el stock aqui"
                                                                        required />
                                                                  </div>

                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="stock-field"
                                                                        class="form-label"
                                                                        >Stock
                                                                        min</label>
                                                                     <input
                                                                        type="text"
                                                                        id="stock-field"
                                                                        name="stock_min"
                                                                        class="form-control"
                                                                        placeholder="Ponga el stock minimo aqui"
                                                                        required />
                                                                  </div>

                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="stock-field"
                                                                        class="form-label"
                                                                        >Stock
                                                                        max</label>
                                                                     <input
                                                                        type="text"
                                                                        id="stock-field"
                                                                        name="stock_max"
                                                                        class="form-control"
                                                                        placeholder="Ponga el stock maximo aqui"
                                                                        required />
                                                                  </div>

                                                                  <div
                                                                     class="mb-3">
                                                                     <label
                                                                        for="amount-field"
                                                                        class="form-label"
                                                                        >Cantidad</label>
                                                                     <input
                                                                        type="text"
                                                                        id="amount-field"
                                                                        name="amount"
                                                                        class="form-control"
                                                                        placeholder="Ponga la cantidad aqui"
                                                                        required />
                                                                  </div>

                                                                  <div
                                                                     class="modal-footer">
                                                                     <div
                                                                        class="hstack gap-2 justify-content-end">
                                                                        <button
                                                                           type="button"
                                                                           class="btn btn-danger"
                                                                           data-bs-dismiss="modal"
                                                                           >Cerrar</button>
                                                                        <button
                                                                           type="submit"
                                                                           class="btn btn-success"
                                                                           id="edit-btn"
                                                                           on:click={reloadPage}
                                                                           >Añadir
                                                                           Presentación</button>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <input
                                                                  value="create"
                                                                  name="action"
                                                                  hidden />
                                                               <input
                                                                  value={id}
                                                                  name="product_id"
                                                                  hidden />
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
                                                         <div
                                                            class="modal-content">
                                                            <div
                                                               class="modal-header">
                                                               <button
                                                                  type="button"
                                                                  class="btn-close"
                                                                  data-bs-dismiss="modal"
                                                                  aria-label="Close"
                                                                  id="btn-close" />
                                                            </div>
                                                            <div
                                                               class="modal-body">
                                                               <div
                                                                  class="mt-2 text-center">
                                                                  <lord-icon
                                                                     src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                     trigger="loop"
                                                                     colors="primary:#f7b84b,secondary:#f06548"
                                                                     style="width:100px;height:100px" />
                                                                  <div
                                                                     class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                     <h4>
                                                                        Estás
                                                                        seguro ?
                                                                     </h4>
                                                                     <p
                                                                        class="text-muted mx-4 mb-0">
                                                                        ¿Estás
                                                                        seguro
                                                                        de
                                                                        eliminar
                                                                        la
                                                                        presentación?
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
                                                                     >Sí, borrar
                                                                     presentación!</button>
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
                                          <!-- end card body -->
                                       </div>
                                       <!-- end card -->
                                    </div>
                                    <!-- end col -->
                                 </div>
                                 <!-- end row -->
                              </div>
                              <!-- container-fluid -->
                           </div>

                           <!-- End Page-content -->
                        </div>
                     {:catch error}
                        {error}
                     {/await}

                     <!-- end main content-->

                     <div>
                        <!-- ============================================ -->
                        <!-- JavaScript -->
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

                        <!--Swiper slider js-->
                        <script
                           src="http://localhost:8080/libs/swiper/swiper-bundle.min.js"></script>

                        <!-- ecommerce product details init -->
                        <script
                           src="http://localhost:8080/js/pages/ecommerce-product-details.init.js"></script>

                        <!-- App js -->
                        <script src="http://localhost:8080/js/app.js"></script>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
{:catch error}
   {error}
{/await}
