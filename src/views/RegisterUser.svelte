//verificado
<script>
import axios from "axios";
import { fade } from 'svelte/transition';

let dataUsuario = {
    name: "",
    lastname: "",
    email: "",
    phone: "",
    password: ""
}
function registerUser (){
    let bodyForm = new FormData();
    bodyForm.append('action', 'create');
    bodyForm.append('name', dataUsuario.name);
    bodyForm.append('lastname', dataUsuario.lastname);
    bodyForm.append('email', dataUsuario.email);
    bodyForm.append('phone_number', dataUsuario.phone);
    bodyForm.append('password', dataUsuario.password);

    axios.post('https://newphpecommercejona.herokuapp.com/app/AuthController.php', bodyForm)
    .then(function (response) {
        if(response.data) { 
            console.log(response.data)
            // location.href = '/' // Redireccion a login
        }else{ 
            console.log(response)
            console.log("Nel")
        }
    })
    .catch(resp => console.log(resp));
	}
</script>

<svelte:head>
    <title>DevEcommerce | Registrar Usuario</title>
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

    <!-- ============================================ -->
    <!-- Js tempalte -->
    <!-- ============================================ -->
    <script defer src="http://localhost:8080/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="http://localhost:8080/libs/simplebar/simplebar.min.js"></script>
    <script defer src="http://localhost:8080/libs/node-waves/waves.min.js"></script>
    <script defer src="http://localhost:8080/libs/feather-icons/feather.min.js"></script>
    <script defer src="http://localhost:8080/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script defer src="http://localhost:8080/js/plugins.js"></script>

    <!-- particles js -->
    <script defer src="http://localhost:8080/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script defer src="http://localhost:8080/js/pages/particles.app.js"></script>
    <!-- validation init -->
    <script defer src="http://localhost:8080/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    <script defer src="http://localhost:8080/js/pages/passowrd-create.init.js"></script>

</svelte:head>

<main transition:fade>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="http://localhost:8080/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">DevStore</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Crear una nueva cuenta</h5>
                                    <p class="text-muted">Obtenga su cuenta gratis ahora</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form enctype="multipart/form-data" method="POST" action="https://newphpecommercejona.herokuapp.com/app/AuthController.php">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Nombre <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="username" placeholder="Ingresa tu nombre" required bind:value={dataUsuario.name}>
                                            <div class="invalid-feedback">
                                                Por favor, ingresa tu nombre
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userlastname" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                            <input type="text" name="lastname" class="form-control" id="userlastname" placeholder="Ingresa tus apellidos" required bind:value={dataUsuario.lastname}>
                                            <div class="invalid-feedback">
                                                Por favor, ingresa tus apellidos
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Correo<span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" id="useremail" placeholder="Ingresa tu email" required bind:value={dataUsuario.email}>
                                            <div class="invalid-feedback">
                                                Por favor, ingresa tu correo
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="userphone" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                            <input type="tel" name="phone_number" class="form-control" id="userphone" placeholder="Ingresa tu telefono" required bind:value={dataUsuario.phone}>
                                            <div class="invalid-feedback">
                                                Por favor, ingresa tu teléfono
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Contraseña</label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Ingresa tu contraseña" id="password-input" aria-describedby="passwordInput" bind:value={dataUsuario.password} required>
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <!-- <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                            <h5 class="fs-13">Password must contain:</h5>
                                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                        </div> -->

                                        <div class="mb-3">
                                            <input name="cover" required type="file" class="form-control" aria-describedby="basic-addon1">
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Registrate</button>
                                        </div>
                                        <input type="hidden" name="action" value="create">
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Ya tienes una cuenta? <a href="/" class="fw-semibold text-primary text-decoration-underline"> Iniciar Sesión</a> </p>
                        </div>
                        

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
            <!-- footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <p class="mb-0 text-muted">&copy;
                                     Creado por <i class="mdi mdi-heart text-danger"></i> DevStore
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

</main>
