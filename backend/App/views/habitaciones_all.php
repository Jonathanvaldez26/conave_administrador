<?php echo $header; ?>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>

            <a class="navbar-brand m-0" href="/Principal/" target="_blank">
                <img src="/assets/img/favicon.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">ADMIN CONVENCIÓN</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">


        <div class="collapse navbar-collapse  w-auto h-auto h-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/Principal/" class="nav-link" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-home" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Principal</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" onclick="catalogos()" href="#catalogos" class="nav-link" aria-controls="catalogos" role="button" aria-expanded="true">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-sitemap" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Catálogos</span>
                    </a>
                    <div class="collapse" id="catalogos" hidden>
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/Bu/">
                                    <span class="sidenav-mini-icon"> B </span>
                                    <span class="sidenav-normal">Bu Asofarma</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Lineas/" class="nav-link" role="button" aria-expanded="false">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="nav-link-text ms-1">Lineas Asofarma</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/Posiciones/">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Posiciones Asofarma </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/Restaurantes/">
                                    <span class="sidenav-mini-icon"> R </span>
                                    <span class="sidenav-normal"> Restaurates </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <hr class="horizontal dark" />
                            </li>
                            <!-- <li class="nav-item ">
                            <a class="nav-link " href="/Restaurantes/">
                                <span class="sidenav-mini-icon"> E </span>
                                <span class="sidenav-normal"> Restaurates </span>
                            </a>
                        </li> -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/Asistentes/" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-users" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Asistentes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Vuelos/" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-plane" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Vuelos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/PickUp/" class="nav-link " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-bus" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">PickUp</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#authExamples" class="nav-link active" aria-controls="authExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-hotel" style="color: #fff"></span>
                        </div>
                        <span class="nav-link-text ms-1">Habitaciones</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Cenas/" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-coffee" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Cenas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <hr class="horizontal dark" />
                    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">SALUD</h6>
                </li>
                <li class="nav-item">
                    <a href="/ComprobantesVacunacion/" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-shield-virus" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Comprobante Vacunación</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/PruebasCovidUsuarios/" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-virus-slash" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Pruebas Covid Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/PruebasCovidSitio/" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-viruses" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Pruebas Covid en Sitio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <hr class="horizontal dark" />
                    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">OTROS</h6>
                </li>
                <li class="nav-item">
                    <a href="/Configuracion/" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-tools" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Configuración</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" onclick="utilerias()" href="#utilerias" class="nav-link " aria-controls="utilerias" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-user-circle-o" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Utilerias</span>
                    </a>
                    <div class="collapse " id="utilerias" hidden>
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/Administradores/">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal">Administradores</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/Perfiles/">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Perfiles </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/Log/">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal"> Log </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                                    <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/Principal/">Principal</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Habitaciones</li>
                    </ol>
                </nav>
                <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="/Login/cerrarSession" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-power-off me-sm-1"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav  justify-content-end">
                        <!-- <li class="nav-item d-flex align-items-center">
                        <a href="/Login/" class="nav-link text-body font-weight-bold px-0" >
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li> -->

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-2 d-flex align-items-center">

                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 " alt="user image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 " alt="logo spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-7 text-start">
                                    <p class="text-sm mb-1 text-capitalize font-weight-bold">Disponibles Sin Asignar</p>
                                    <h5 class="font-weight-bolder mb-0" style="color:#8a0062;">
                                        452 de 700
                                    </h5>
                                </div>
                                <div class="col-5">
                                    <div class="dropdown text-end">
                                        <a href="" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-clock" style="color:#8a0062;"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-sm-0 mt-4">
                    <div class="card">
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-7 text-start">
                                    <p class="text-sm mb-1 text-capitalize font-weight-bold">Asignadas Exitosamente</p>
                                    <h5 class="font-weight-bolder mb-0" style="color:green;">
                                        152 de 700
                                    </h5>
                                </div>
                                <div class="col-5">
                                    <div class="dropdown text-end">
                                        <a href="" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-check-circle" style="color:green;"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-sm-0 mt-4">
                    <div class="card">
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-8 text-start">
                                    <p class="text-sm mb-1 text-capitalize font-weight-bold">No. Habitaciones - Contrato</p>
                                    <h5 class="font-weight-bolder mb-0" style="color:#02b7b7;">
                                        452 Habitaciones
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <div class="dropdown text-end">
                                        <a href="" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-hotel" style="color:#02b7b7;"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inicio barrita -->

            <div class=" mt-7">
                <div class="card card-body mt-n6 overflow-hidden">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="bg-gradient-red avatar avatar-xl position-relative">
                                <!-- <img src="../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
                                <span class="fa fa-hotel" style="font-size: xx-large;"></span>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    Habitaciones (Rooming List)
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active" href="#asistentes" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                            <span class="fa fa-users"></span>
                                            <span class="ms-1">ASISTENTES</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" href="#staff" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                            <span class="fa fa-handshake-o"></span>
                                            <span class="ms-1">STAFF</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" href="#vip" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                            <span class="fa fa-diamond"></span>
                                            <span class="ms-1">VIP</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" href="#habitaciones" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                            <span class="fa fa-hotel"></span>
                                            <span class="ms-1">HABITACIONES</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" href="#hotel" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                            <span class="fa fa-h-square"></span>
                                            <span class="ms-1">DATOS HOTEL</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-1 mt-1">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show position-relative active height-350 border-radius-lg" id="asistentes" role="tabpanel" aria-labelledby="cam1" style="background-image: url('../../assets/img/miercoles.jpeg'); background-size:cover;">
                        <div class="d-flex m-1">
                            <div class="ms-auto d-flex">
                                <div class="pe-4 mt-1 position-relative">
                                    <hr class="vertical dark mt-0">
                                </div>
                                <div class="ps-4">
                                    <div class="panel-body" <?php echo $visible; ?>></div>
                                    <button type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#asignar_habitacion"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <a style="background: #1C6C42; color: #ffffff;" href="/Vuelos/Add/" type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                    <a style="background: #9A1622; color: #ffffff;" href="/Vuelos/Add/" type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                    <button type="button" class="btn bg-gradient-secondary btn-icon-only mb-0 mt-3" data-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Todo cambio que usted realice en el sistema será guardado con fecha, usuario y transacción.">
                                        <span class="fa fa-info"></span>
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Habitaciones Asignadas para los Asistentes Asofarma</h6>
                                        
                                    </div>
                                    
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Asistente</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">¿Quien lo cargo LAHE?</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo $tabla_asistentes; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade position-relative height-350 border-radius-lg" id="staff" role="tabpanel" aria-labelledby="cam2" style="background-image: url('../../assets/img/jueves.jpeg'); background-size:cover;">
                        B
                    </div>
                    <div class="tab-pane fade position-relative height-350 border-radius-lg" id="vip" role="tabpanel" aria-labelledby="cam2" style="background-image: url('../../assets/img/jueves.jpeg'); background-size:cover;">
                        B
                    </div>
                    <div class="tab-pane fade position-relative height-350 border-radius-lg" id="habitaciones" role="tabpanel" aria-labelledby="cam1" style="background-image: url('../../assets/img/miercoles.jpeg'); background-size:cover;">
                        <div class="d-flex m-1">
                            <div class="ms-auto d-flex">
                                <div class="pe-4 mt-1 position-relative">
                                    <hr class="vertical dark mt-0">
                                </div>
                                <div class="ps-4">
                                    <div class="panel-body" <?php echo $visible; ?>></div>
                                    <button type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#addHabitacion"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <a style="background: #1C6C42; color: #ffffff;" href="/Vuelos/Add/" type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                    <a style="background: #9A1622; color: #ffffff;" href="/Vuelos/Add/" type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                    <button type="button" class="btn bg-gradient-secondary btn-icon-only mb-0 mt-3" data-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Todo cambio que usted realice en el sistema será guardado con fecha, usuario y transacción.">
                                        <span class="fa fa-info"></span>
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Habitaciones Asignadas para los Asistentes Asofarma</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade position-relative height-350 border-radius-lg" id="hotel" role="tabpanel" aria-labelledby="cam2" style="background-image: url('../../assets/img/jueves.jpeg'); background-size:cover;">
                        <div class="row">
                            <div class="col-lg-12 mx-auto">
                                <div class="card mb-4">
                                    <div class="card-header p-3 pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6>Datos y Detalles Generales del Rooming List <span class="badge badge-sm bg-gradient-success">Completo</span></h6>
                                                <p class="text-sm mb-0">
                                                    <i class="fa fa-user-md"></i>Cliente. <b><?= $hotel['cliente']; ?></b><br>
                                                    <i class="fa fa-flag"></i> Evento: <b><?= $hotel['evento']; ?></b><br>
                                                    <i class="fa fa-calendar"></i> Fechas: <b>Del <?= $fecha_de; ?> al <?= $fecha_al; ?></b><br>
                                                    <i class="fa fa-map-marker"></i> Lugar: <b><?= $hotel['evento']; ?></b><br>
                                                    <i class="fa fa-h-square"></i> Hotel: <b><?= $hotel['nombre_hotel']; ?></b><br>
                                                    <i class="fa fa-h-square"></i> Total Habitaciones: <b><?= $hotel['total_habitaciones']; ?></b>
                                                </p>

                                            </div>
                                            <button href="javascript:;" class="btn bg-gradient-secondary ms-auto mb-0" data-toggle="modal" data-target="#editar-hotel">Editar</button>

                                        </div>
                                    </div>
                                    <div class="card-body p-3 pt-0">
                                        <div class="card-body p-3 pt-0">
                                            <hr class="horizontal dark mt-0 mb-4">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-12">
                                                    <h6 class="mb-3">Puntos A Validar</h6>
                                                    <div class="timeline timeline-one-side">
                                                        <div class="timeline-block mb-3">
                                                            <span class="timeline-step">
                                                                <i class="fa fa-check text-success"></i>
                                                            </span>
                                                            <div class="timeline-content">
                                                                <h6 class="text-dark text-sm font-weight-bold mb-0">Datos Generales</h6>
                                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Completó el 05/03/2022</p>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-block mb-3">
                                                            <span class="timeline-step">
                                                                <i class="fa fa-check text-success"></i>
                                                            </span>
                                                            <div class="timeline-content">
                                                                <h6 class="text-dark text-sm font-weight-bold mb-0">Datos de Contacto Hotel</h6>
                                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Completó el 05/03/2022</p>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-block mb-3">
                                                            <span class="timeline-step">
                                                                <i class="fa fa-close text-danger"></i>
                                                            </span>
                                                            <div class="timeline-content">
                                                                <h6 class="text-dark text-sm font-weight-bold mb-0">Asignación de X Habitaciones Marcadas en Contrato</h6>
                                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Aún Hay habitaciones Pendientes de Asignación</p>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-block mb-3">
                                                            <span class="timeline-step">
                                                                <i class="fa fa-clock-o text-warning text-gradient"></i>
                                                            </span>
                                                            <div class="timeline-content">
                                                                <h6 class="text-dark text-sm font-weight-bold mb-0">Cierre Habitaciones, Bloqueo, Sobrantes</h6>
                                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Disponible Para Aplicar</p>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-block mb-3">
                                                            <span class="timeline-step">
                                                                <i class="fa fa-clock-o text-warning text-gradient"></i>
                                                            </span>
                                                            <div class="timeline-content">
                                                                <h6 class="text-dark text-sm font-weight-bold mb-0">Enviar Rooming List Hotel</h6>
                                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Disponible Para Aplicar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-md-6 col-12">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="table-responsive">
                                                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                                                    <div class="dataTable-container">


                                                                        <table class="table table-flush dataTable-table" id="datatable-search">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th data-sortable="" style="width: 10.7306%;"><a href="#" class="dataTable-sorter">Categoria</a></th>
                                                                                    <!-- <th data-sortable="" style="width: 10.0774%;"><a href="#" class="dataTable-sorter">Total de huespedes</a></th> -->
                                                                                    <?php echo $th_table_fechas; ?>
                                                                                    <th data-sortable="" style="width: 10.4141%;"><a href="#" class="dataTable-sorter">NTS</a></th>
                                                                                    <th data-sortable="" style="width: 10.4141%;"><a href="#" class="dataTable-sorter">PAX</a></th>
                                                                                    <th data-sortable="" style="width: 10.4141%;"><a href="#" class="dataTable-sorter">STAY</a></th>
                                                                                    <th data-sortable="" style="width: 10.0774%;"><a href="#" class="dataTable-sorter">Editar</a></th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                <?php echo $tabla_categorias ?>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark mt-0 mb-1">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="">
                                                    <h6 class="mb-z mt-4">Información de Contacto <span class="badge badge-sm bg-gradient-success">Completo</span></h6>

                                                    <ul class="list-group">
                                                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-3 text-sm">HOTEL BARCELO - RIVERA MAYA</h6>
                                                                <span class="mb-2 text-xs">Atención a: <span class="text-dark font-weight-bold ms-2">Roberto González Marcos</span></span>
                                                                <span class="mb-2 text-xs">Email: <span class="text-dark ms-2 font-weight-bold">reservaciones@barcelo.com</span></span>
                                                                <span class="text-xs">Número telefónico: <span class="text-dark ms-2 font-weight-bold">+52 7412365474</span></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                                                <a href="javascript:;" class="btn bg-gradient-info mb-0">Editar</a>
                                            </div>
                                            <p class="text-sm mt-2 mb-0">Si usted desea reenviar el Rooming List a un contacto distinto presione <a href="javascript:;">aquí</a>.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin barrita -->


        </div>
    </main>
</body>




<!-- Modal crear habitacion-->
<div class="modal fade" id="addHabitacion" tabindex="-1" role="dialog" aria-labelledby="addHabitacionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="crear_habitacion_form" action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHabitacionLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body pt-0">

                        <div class="row">

                            <div class="col-12">
                                <label class="form-label mt-4">Hotel </label>
                                <select class="form-control" style="cursor: pointer;" name="hotel" id="hotel" tabindex="-1" required>
                                    <?php echo $optionsHotel; ?>
                                </select>
                            </div>

                            <div class="col-12 align-self-center">
                                <label class="form-label mt-4">Categoria Habitación *</label>
                                <select class="form-control" style="cursor: pointer;" name="cat_habitacion" id="cat_habitacion" tabindex="-1" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <?php echo $optionsCategoriaHotel; ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Numero Habitacion</label>
                                <div class="input-group">
                                    <input id="no_habitacion" name="no_habitacion" maxlength="29" class="form-control" type="number" placeholder="No de habitación" required="">
                                </div>
                                <span id="msg_encontrado" style="font-size: 12px;color:#EC2F1E;"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save_habitacion">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Modal-->

<!-- Modal asignar habitacion-->
<div class="modal fade" id="asignar_habitacion" role="dialog" aria-labelledby="asignar_habitacionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="form_asignar_habitacion" action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="asignar_habitacionLabel">Asignar Habitacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body pt-0">

                        <div class="row">



                            <div class="col-12 align-self-center">
                                <label class="form-label mt-4">Habitacion *</label>
                                <select class="form-control" style="cursor: pointer;" name="asigna_cat_habitacion" id="asigna_cat_habitacion" tabindex="-1" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <?php echo $optionsCategoriaHotel; ?>
                                </select>
                            </div>
                           
                            <div id="cont_asigna_huespedes">

                             

                            </div>

<!-- 
                            <div class="col-12">
                                <label class="form-label">Numero Habitacion</label>
                                <div class="input-group">
                                    <input id="no_habitacion" name="no_habitacion" maxlength="29" class="form-control" type="number" placeholder="No de habitación" required="">
                                </div>
                                <span id="msg_encontrado" style="font-size: 12px;color:#EC2F1E;"></span>
                            </div> -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save_habitacion">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Modal-->



<!-- Modal edit hotel-->
<div class="modal fade " id="editar-hotel" tabindex="-1" role="dialog" aria-labelledby="editar-hotelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content " id="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar-hotelLabel">Editar Hotel</h5>
                <button type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="update_form" action="" method="POST">
                    <div class="card-body pt-0">

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <input type="hidden" id="id_hotel" name="id_hotel" value="<?= $hotel['id_hotel'] ?> ">
                                <label class="form-label">Cliente *</label>
                                <div class="input-group">
                                    <input id="cliente" name="cliente" maxlength="29" class="form-control" type="text" placeholder="Cliente" required="" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $hotel['cliente']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <label class="form-label">Evento *</label>
                                <div class="input-group">
                                    <input id="evento" name="evento" maxlength="49" class="form-control" type="text" placeholder="event" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $hotel['evento']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 col-lg-6">
                                <label class="form-label">Lugar *</label>
                                <div class="input-group">
                                    <input id="lugar" name="lugar" maxlength="29" class="form-control" type="text" placeholder="Cancún" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $hotel['lugar']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <label class="form-label">Hotel *</label>
                                <div class="input-group">
                                    <input id="nombre_hotel" name="nombre_hotel" maxlength="29" class="form-control" type="text" placeholder="Hotel Casablanca" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $hotel['nombre_hotel']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label class="form-label">Total Habitaciones *</label>
                                <div class="input-group">
                                    <input id="total_habitaciones" name="total_habitaciones" maxlength="11" class="form-control" type="number" placeholder="285" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $hotel['total_habitaciones']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                        </div>

                        <div class="row" id="cont_fechas" style="width: 567px; overflow:hidden;">
                            <?php echo $dates ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" id="remove_date">quitar fecha</button>
                            <button type="button" class="btn btn-info" id="add_date">agregar fecha</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->

<?php echo $modal_asigna_habitacion; ?>

<?php echo $modal_habitaciones; ?>

<?php echo $footer; ?>

<script>

    
    $(document).ready(function() {

        $("#form_asig_habitacion").on("submit",function(event){
            event.preventDefault();
            var id_asistente = $("#asis_name").val();
           // alert(id_asistente);
            var clave_ah = $("#asis_name").attr('data-value');

            swal({
                title: "Quieres agregar este usuario a la habitacion?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    
                    $.ajax({
                        url: "/Habitaciones/agregarUsusarioHabitacion",
                        type: "POST",
                        data: {clave_ah,id_asistente},
                        beforeSend: function() {
                            console.log("Procesando....");

                        },
                        success: function(respuesta) {

                            console.log(respuesta);

                            if(respuesta == 'success'){
                                swal("Se agrego el usuario correctamente!!", "", "success").
                                then((value) => {
                                    window.location.replace("/Habitaciones/");
                                });
                            }else{
                                swal("Hubo un error!!", "", "warning")
                            }
                        },
                        error: function(respuesta) {
                            console.log(respuesta);
                        }

                    });

                    // swal("Se quito al usuario de la habitación correctamente!!", {
                    // icon: "success",
                    // });


                } else {
                    swal("Se cancelo la acción");
                }
            });
            

            
        });

        $(".asis_name").on("change",function(){
            // var id_asistente = $(this).val();
            // var id_clave_ah = $(this).attr('data-value');
           
            
        });

        $("#add_date").click(function() {
            $("#cont_fechas").append("<div class='col-12 col-lg-6 date'><label class='form-label mt-4'>Fechas * </label><input type='date' class='form-control' id='fecha' name='fecha[]' required='' value=''></div>");
        });

        $("#remove_date").click(function() {

            $('#cont_fechas .date').last().remove();
            console.log($("#cont_fechas last"));
        });

        $("#crear_habitacion_form").on("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById("crear_habitacion_form"));

            $.ajax({
                url: "/Habitaciones/CrearHabitacion",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");


                },
                success: function(respuesta) {

                    console.log(respuesta);
                    if (respuesta == "success") {
                        window.location.replace("/Habitaciones/");
                    }


                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

        $("#no_habitacion").on("keyup", function() {
            // console.log($(this).val());
            var no_habitacion = $(this).val();
            $.ajax({
                url: "/Habitaciones/BuscarHabitacion",
                type: "POST",
                data: {
                    no_habitacion
                },
                dataType: 'json',
                beforeSend: function() {
                    console.log("Procesando....");

                },
                success: function(respuesta) {

                    //console.log(respuesta);
                    if (respuesta.status == 'encontrado') {
                        $("#msg_encontrado").html(respuesta.msg);
                        $("#save_habitacion").attr("disabled", "disabled");
                    } else {
                        $("#msg_encontrado").html('');
                        $("#save_habitacion").removeAttr("disabled");
                    }


                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });



        $("#update_form").on("submit", function(event) {
            event.preventDefault();

            // alert("funciona");

            var formData = new FormData(document.getElementById("update_form"));
            // for (var value of formData.values()) {
            //     console.log(value);
            // }

            $.ajax({
                url: "/Habitaciones/Actualizar",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");


                },
                success: function(respuesta) {

                    console.log(respuesta);

                    if (respuesta == 'success') {
                        window.location.replace("/Habitaciones/");
                        // swal("Se actualizaron tus datos correctamente!", "", "success").
                        // then((value) => {
                        //     window.location.replace("/Habitaciones/");
                        // });


                    } else {
                        // swal("Usted No Actualizo Nada!", "", "warning").
                        // then((value) => {
                        //     window.location.replace("/Habitaciones/")
                        // });
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });


        $("#update_form_cat").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById("update_form_cat"));

            $.ajax({
                url: "/Habitaciones/ActualizarCategoria",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");

                },
                success: function(respuesta) {

                    console.log(respuesta);

                    if (respuesta == 'success') {
                        window.location.replace("/Habitaciones/");


                    } else {
                        // swal("Usted No Actualizo Nada!", "", "warning").
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

        $("#asistente_name").on('change', function() {

            console.log($(this).data("value"))

            // var value_input = document.getElementById("asistente_name").value;
            // var value2send = document.querySelector("#list_asistente_name option[value='"+value_input+"']").dataset.value;

            // $("#asistente_name_aux").val(value2send);

            // alert(value2send);
        });

        $("#asigna_cat_habitacion").on("change", function() {
            var cat_habitacion = $(this).val();
            $.ajax({
                url: "/Habitaciones/categoriaHabitacion",
                type: "POST",
                data: {
                    cat_habitacion
                },
                dataType: "json",
                beforeSend: function() {
                    console.log("Procesando....");

                    $('#cont_asigna_huespedes .asign_huesped').remove();
                    

                },
                success: function(respuesta) {
                    console.log(respuesta);
                    console.log(respuesta.asistentes.length);

                    for (var i = 1; i <= respuesta.categoria_habitacion.huespedes; i++) {

                        $("#cont_asigna_huespedes").append('<div class="col-12 align-self-center asign_huesped">'+
                                    '<label class="form-label mt-4">Asistentes *</label><br>'+
                                    '<select class="form-control select_2" style="cursor: pointer;" name="asistente_name[]" id="asistente_name'+i+'" tabindex="-1" required>'+
                                    '<option value="" disabled selected>Selecciona una opción</option>'+
                                    '</select>'+
                                '</div>');

                                for (var j = 0; j < respuesta.asistentes.length; j++) {
                                    console.log(respuesta.asistentes[j].id_registro_acceso);
                                    console.log(respuesta.asistentes[j].nombre_usuario);
                                    console.log(respuesta.asistentes[j].apellido_paterno);
                                    console.log(respuesta.asistentes[j].apellido_materno);
                                    $("#asistente_name"+i).append('<option value="'+respuesta.asistentes[j].id_registro_acceso+'">'+respuesta.asistentes[j].nombre+'</option>');
                                }
                        
                    }

                    $(".select_2").select2();
                    

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

        //$(".select_2").select2();
     

        $("#form_asignar_habitacion").on('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById("form_asignar_habitacion"));


            $.ajax({
                url: "/Habitaciones/AsignarHabitacion",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");

                },
                success: function(respuesta) {

                    if(respuesta == 'success'){
                         swal("Se asigno la habitación correctamente!", "", "success").
                        then((value) => {
                            window.location.replace("/Habitaciones/");
                        });
                    }
                    console.log(respuesta);


                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });

        });

        $(".btn_quitar_huesped").on("click",function(){
            var id_ah = $(this).attr("data-value");
            
            //console.log(id_ah);
            swal({
                title: "Estas seguro quitar al usuario de la habitación?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    
                    $.ajax({
                        url: "/Habitaciones/quitarUsuarioHabitacion",
                        type: "POST",
                        data: {id_ah},
                        beforeSend: function() {
                            console.log("Procesando....");

                        },
                        success: function(respuesta) {

                            console.log(respuesta);

                            if(respuesta == 'success'){
                                swal("Se quito al usuario de la habitación correctamente!!", "", "success").
                                then((value) => {
                                    window.location.replace("/Habitaciones/");
                                });
                            }
                        },
                        error: function(respuesta) {
                            console.log(respuesta);
                        }

                    });

                    // swal("Se quito al usuario de la habitación correctamente!!", {
                    // icon: "success",
                    // });


                } else {
                    swal("Se cancelo la acción");
                }
            });
        });


    });
</script>