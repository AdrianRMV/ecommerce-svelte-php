<script>
    export let data;
</script>r

<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="/home" class="logo logo-dark">
                        <span class="logo-sm">
                            <img
                                src="http://localhost:8080/images/logo-sm.png"
                                alt=""
                                height="22"
                            />
                        </span>
                        <span class="logo-lg">
                            <img
                                src="http://localhost:8080/images/logo-dark.png"
                                alt=""
                                height="17"
                            />
                        </span>
                    </a>

                    <a href="/home" class="logo logo-light">
                        <span class="logo-sm">
                            <img
                                src="http://localhost:8080/images/logo-sm.png"
                                alt=""
                                height="22"
                            />
                        </span>
                        <span class="logo-lg">
                            <img
                                src="http://localhost:8080/images/logo-light.png"
                                alt=""
                                height="17"
                            />
                        </span>
                    </a>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button
                        type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                        dataUser-toggle="fullscreen"
                    >
                        <i class="bx bx-fullscreen fs-22" />
                    </button>
                </div>

                <!-- <div class="ms-1 header-item d-none d-sm-flex">
                    <button
                        type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none"
                    >
                        <i class="bx bx-moon fs-22" />
                    </button>
                </div> -->

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button
                        type="button"
                        class="btn shadow-none"
                        id="page-header-user-dropdown"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <span class="d-flex align-items-center">
                            <img
                                class="rounded-circle header-profile-user"
                                src={data.avatar}
                                alt="Header Avatar"
                            />
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"
                                    >{data.name} {data.lastname}</span
                                >
                                <span
                                    class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"
                                    >{data.role}</span
                                >
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Bienvenido {data.name}!</h6>
                        <a class="dropdown-item" href="/profile"
                            ><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"
                            />
                            <span class="align-middle">Perfil</span></a
                        >

                        <div class="dropdown-divider" />

                        <a class="dropdown-item" href="/"
                            ><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"
                            />
                            <span class="align-middle" dataUser-key="t-logout"
                                >Salir</span
                            ></a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
