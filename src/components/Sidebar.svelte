<!-- LOGO -->
<div class="navbar-brand-box">
    <!-- Dark Logo-->
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
    <!-- Light Logo-->
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
    <button
        type="button"
        class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
        id="vertical-hover"
    >
        <i class="ri-record-circle-line" />
    </button>
</div>

<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu" />
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title">
                <span data-key="t-menu">Menu</span>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="/users">
                    <i class="mdi mdi-speedometer" />
                    <span data-key="t-dashboards">Usuarios</span>
                </a>
            </li>
            <!-- end Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="/clientes">
                    <i class="mdi mdi-view-grid-plus-outline" />
                    <span data-key="t-apps">Clientes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="/home">
                    <i class="mdi mdi-view-carousel-outline" />
                    <span data-key="t-layouts">Productos</span>
                </a>
            </li>
            <!-- end Dashboard Menu -->

            <li class="nav-item">
                <a class="nav-link menu-link" href="/catalogos">
                    <i class="mdi mdi-account-circle-outline" />
                    <span data-key="t-authentication">Catálogos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="/cupones">
                    <i class="mdi mdi-sticker-text-outline" />
                    <span data-key="t-pages">Cupones</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="/ordenes">
                    <i class="ri-rocket-line" />
                    <span data-key="t-landing">Ordenes</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background" />
