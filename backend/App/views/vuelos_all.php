<?php echo $header; ?>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="bg-white-aside sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
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

                <li class="nav-item" <?= $permisoGlobalHidden; ?>>
                    <a data-bs-toggle="collapse" onclick="catalogos()" href="#catalogos" class="nav-link " aria-controls="catalogos" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-sitemap" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Catálogos</span>
                    </a>
                    <div class="collapse " id="catalogos" hidden>
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/Bu/">
                                    <span class="sidenav-mini-icon"> B </span>
                                    <span class="sidenav-normal">Bu Asofarma</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/Lineas/">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal">Lineas Asofarma</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/Posiciones/">
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
                <li class="nav-item" <?= $asistentesHidden; ?>>
                    <a href="/Asistentes/" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-users" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Asistentes</span>
                    </a>
                </li>
                <li class="nav-item" <?= $vuelosHidden; ?>>
                    <a href="" class="nav-link active" aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-plane" style="color: white"></span>
                        </div>
                        <span class="nav-link-text ms-1">Vuelos</span>
                    </a>
                </li>
                <li class="nav-item" <?= $pickUpHidden; ?>>
                    <a href="/PickUp/" class="nav-link " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-bus" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">PickUp</span>
                    </a>
                </li>
                <li class="nav-item" <?= $habitacionesHidden; ?>>
                    <a href="/Habitaciones/" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-hotel" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Habitaciones</span>
                    </a>
                </li>
                <li class="nav-item" <?= $cenasHidden; ?>>
                    <a href="/Cenas/" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-coffee" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Cenas</span>
                    </a>
                </li>
                <li class="nav-item" <?= $aistenciasHidden; ?>>
                    <a href="/Asistencias/" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-bell" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Asistencias</span>
                    </a>
                </li>
                <li class="nav-item" <?= $vacunacionHidden; ?>>
                    <hr class="horizontal dark" />
                    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">SALUD</h6>
                </li>
                <li class="nav-item" <?= $vacunacionHidden; ?>>
                    <a href="/ComprobantesVacunacion/" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-shield-virus" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Comprobante Vacunación</span>
                    </a>
                </li>
                <li class="nav-item" <?= $pruebasHidden; ?>>
                    <a href="/PruebasCovidUsuarios/" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-virus-slash" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Pruebas Covid Usuarios</span>
                    </a>
                </li>

                <li class="nav-item" <?= $configuracionHidden; ?>>
                    <hr class="horizontal dark" />
                    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">OTROS</h6>
                </li>
                <li class="nav-item" <?= $configuracionHidden; ?>>
                    <a href="/Configuracion/" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-tools" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Configuración</span>
                    </a>
                </li>
                <li class="nav-item" <?= $utileriasHidden; ?>>
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Principal</a></li>
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
                                    <p class="text-sm mb-1 text-capitalize font-weight-bold">Pases de Abordar Cargados - Llegada</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo $totalvueloscargadosllegada; ?> de <?php echo $totalvuelos; ?> vuelos
                                    </h5>
                                </div>
                                <div class="col-5">
                                    <div class="dropdown text-end">
                                        <a href="" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-plane"></span>
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
                                    <p class="text-sm mb-1 text-capitalize font-weight-bold">Pases de Abordar Cargados - Salida</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo $totalvueloscargadossalida; ?> de <?php echo $totalvuelos; ?> vuelos
                                    </h5>
                                </div>
                                <div class="col-5">
                                    <div class="dropdown text-end">
                                        <a href="" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-plane"></span>
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
                                    <p class="text-sm mb-1 text-capitalize font-weight-bold">Total Usuarios - Carga Pases de Abordar Llegada - Salida</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo $totalvuelos; ?> vuelos
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <div class="dropdown text-end">
                                        <a href="" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-users"></span>
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
                                <span class="fa fa-plane" style="font-size: xx-large;"></span>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    Vuelos
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active" href="#cam3" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                            <span class="fa fa-plane-arrival"></span>
                                            <span class="ms-1">Itinerario</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" href="#cam1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                            <span class="fa fa-plane-arrival"></span>
                                            <span class="ms-1">Vuelos Llegada</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" href="#cam2" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                            <span class="fa fa-plane-departure"></span>
                                            <span class="ms-1">Vuelos Salida</span>
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
                    <div class="tab-pane fade position-relative height-350 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1" style="background-image: url('../../assets/img/miercoles.jpeg'); background-size:cover;">
                        <div class="d-flex m-1">
                            <div class="ms-auto d-flex">
                                <div class="pe-4 mt-1 position-relative">
                                    <hr class="vertical dark mt-0">
                                </div>
                                <div class="ps-4">
                                    <div class="panel-body" <?php echo $visible; ?>></div>
                                    <button type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
                                        <h6>Pases de Abordar para Vuelos de Llegada - Cargados con Éxito</h6>
                                        <p style="font-size: 12px">
                                            <span class="fa fa-plane" style="color: #125a16"> </span> Aeropuerto de Salida a la Convención
                                            <span class="fa fa-flag" style="color: #353535"> </span> Aeropuerto de Llegada (Sede Convención)
                                            <span class="fa fa-ticket" style="color: #1a8fdd"> </span> No. de Vuelo
                                        </p>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Asistente</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATOS DE CONTACTO</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">¿Quien lo cargo LAHE?</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo $tabla; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade position-relative height-350 border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2" style="background-image: url('../../assets/img/jueves.jpeg'); background-size:cover;">
                        <div class="d-flex m-1">
                            <div class="ms-auto d-flex">
                                <div class="pe-4 mt-1 position-relative">
                                    <hr class="vertical dark mt-0">
                                </div>
                                <div class="ps-4">
                                    <div class="panel-body" <?php echo $visible; ?>></div>
                                    <button type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
                                        <h6>Pases de Abordar para Vuelos de Salida Evento - Cargados con Éxito</h6>
                                        <p style="font-size: 12px">
                                            <span class="fa fa-plane" style="color: #125a16"> </span> Aeropuerto de Salida de la Convención
                                            <span class="fa fa-flag" style="color: #353535"> </span> Aeropuerto de Llegada
                                            <span class="fa fa-ticket" style="color: #1a8fdd"> </span> No. de Vuelo
                                        </p>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Asistente</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATOS DE CONTACTO</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">¿Quien lo cargo LAHE?</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo $tabla1; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show position-relative active height-350 border-radius-lg" id="cam3" role="tabpanel" aria-labelledby="cam2" style="background-image: url('../../assets/img/jueves.jpeg'); background-size:cover;">
                        <div class="d-flex m-1">
                            <div class="ms-auto d-flex">
                                <div class="pe-4 mt-1 position-relative">
                                    <hr class="vertical dark mt-0">
                                </div>
                                <div class="ps-4">
                                    <div class="panel-body" <?php echo $visible; ?>></div>
                                    <button type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#Modal_Add_Itinerario"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <!-- <a style="background: #1C6C42; color: #ffffff;" href="/Vuelos/Add/" type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3"><i class="fa fa-file-excel" aria-hidden="true"></i></a>
                                    <a style="background: #9A1622; color: #ffffff;" href="/Vuelos/Add/" type="button" class="btn bg-gradient-info btn-icon-only mb-0 mt-3"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                    <button type="button" class="btn bg-gradient-secondary btn-icon-only mb-0 mt-3" data-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Todo cambio que usted realice en el sistema será guardado con fecha, usuario y transacción.">
                                        <span class="fa fa-info"></span>
                                    </button> -->

                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <h6>Itinerario</h6>
                                        <!-- <p style="font-size: 12px">
                                            <span class="fa fa-plane" style="color: #125a16"> </span> Aeropuerto de Salida de la Convención
                                            <span class="fa fa-flag" style="color: #353535"> </span> Aeropuerto de Llegada
                                            <span class="fa fa-ticket" style="color: #1a8fdd"> </span> No. de Vuelo
                                        </p> -->
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0 table table-striped table-bordered" id="itinerario-tabla">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Asistente</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Itinerario Rumbo a CONAVE</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Itinerario Regreso a Casa</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha Alta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo $tabla_itinerarios; ?>
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
            <!-- Fin barrita -->


        </div>

        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Asistente Para Cargar Pases de Abordar (Vuelos) - 1er Vuelo
                        </h5>

                        <span type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                            X
                        </span>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 12px">A continuación seleccione el nombre del Asistente y cargue unicamente un archivo PDF que contenga los datos de Vuelo del Asistente para llegar a la convención Asofarma 2022.</p>
                        <hr>
                        <form method="POST" enctype="multipart/form-data" id="form_vuelo_uno">
                            <div class="form-group row">

                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_asistente">Nombre del Invitado al que Cargaran el Pase de Abordar <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="nombre_asistente" id="nombre_asistente" class="form-control col-md-7 col-xs-12" value="">
                                        <select class="form-control" name="id_asistente" id="id_asistente" required>
                                            <option selected disabled>Seleccione una Opción</option>
                                            <?php echo $idAsistente; ?>
                                        </select>
                                    </div>
                                    <span id="availability_"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_origen">Seleccione el Origen de la Ciudad (¿De Donde Sale?) <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                        <select class="form-control" name="id_origen" id="id_origen" required>
                                            <option selected disabled>Seleccione una Opción</option>
                                            <?php echo $idAeropuertoOrigen; ?>
                                        </select>
                                    </div>
                                    <span id="availability_"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_destino">Seleccione el Destino de la Ciudad (¿A Donde Llega?) <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                        <select class="form-control" name="id_destino" id="id_destino" required>
                                            <?php echo $idAeropuertoDestino; ?>
                                        </select>
                                    </div>
                                    <span id="availability_"></span>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Número de Vuelo *</label>
                                    <div class="input-group">
                                        <input id="numero_vuelo" name="numero_vuelo" minlength="6" maxlength="8" class="form-control" type="text" placeholder="OKL018" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Hora de Llegada (Local) *</label>
                                    <div class="input-group">
                                        <input id="hora_llegada" name="hora_llegada" maxlength="29" class="form-control" type="time" placeholder="hora llegada" required="" style="text-transform:uppercase;" >
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="file_">Ticket en Formato .PDF: <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="file" accept="application/pdf" class="form-control" id="file_" name="file_" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <label class="form-label">Notas (Opcional)</label>
                                    <div class="input-group">
                                        <textarea id="notas" name="notas" maxlength="1000" class="form-control" placeholder="Añade Alguna Nota de Importancia"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="user_" name="user_" value="<?= $_SESSION["utilerias_administradores_id"] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn bg-gradient-success" id="btn_upload" name="btn_upload">Aceptar</button>
                                <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal_Add_Salidas" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Asistente Para Cargar Pases de Abordar (Vuelos) - 2do Vuelo
                        </h5>

                        <span type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                            X
                        </span>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 12px">A continuación seleccione el nombre del Asistente y cargue unicamente un archivo PDF que contenga los datos de Vuelo del Asistente para llegar a la convención Asofarma 2022.</p>
                        <hr>
                        <form method="POST" enctype="multipart/form-data" id="form_vuelo_uno">
                            <div class="form-group row">

                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_asistente">Nombre del Invitado al que Cargaran el Pase de Abordar <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                        <select class="form-control" name="id_asistente" id="id_asistente" required>
                                            <option selected disabled>Seleccione una Opción</option>
                                            <?php echo $idAsistente; ?>
                                        </select>
                                    </div>
                                    <span id="availability_"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_origen">Seleccione el Origen de la Ciudad (¿De Donde Sale?) <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                        <select class="form-control" name="id_origen" id="id_origen" required>
                                            <option selected disabled>Seleccione una Opción</option>
                                            <?php echo $idAeropuertoOrigen; ?>
                                        </select>
                                    </div>
                                    <span id="availability_"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_destino">Seleccione el Destino de la Ciudad (¿A Donde Llega?) <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                        <select class="form-control" name="id_destino" id="id_destino" required>
                                            <?php echo $idAeropuertoDestino; ?>
                                        </select>
                                    </div>
                                    <span id="availability_"></span>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Número de Vuelo *</label>
                                    <div class="input-group">
                                        <input id="numero_vuelo" name="numero_vuelo" minlength="6" maxlength="8" class="form-control" type="text" placeholder="OKL018" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Hora de Llegada (Local) *</label>
                                    <div class="input-group">
                                        <input id="hora_llegada" name="hora_llegada" maxlength="29" class="form-control" type="time" placeholder="Cliente" required="" style=" text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="file_">Ticket en Formato .PDF: <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="file" accept="application/pdf" class="form-control" id="file_" name="file_" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <label class="form-label">Notas (Opcional)</label>
                                    <div class="input-group">
                                        <textarea id="notas" name="notas" maxlength="1000" class="form-control" placeholder="Añade Alguna Nota de Importancia"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="user_" name="user_" value="<?= $_SESSION["utilerias_administradores_id"] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn bg-gradient-success" id="btn_upload" name="btn_upload">Aceptar</button>
                                <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="Modal_Add_Itinerario" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Asistente para cargar Itinerario
                        </h5>

                        <span type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                            X
                        </span>
                    </div>
                    <div class="modal-body">
                        <!-- <p style="font-size: 12px">A continuación seleccione el nombre del Asistente y cargue unicamente un archivo PDF que contenga los datos de Vuelo del Asistente para llegar a la convención Asofarma 2022.</p> 
                        <hr>-->
                        <form method="POST" enctype="multipart/form-data" id="form_itinerario" >

                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="row form-group">
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_asistente">Seleccione el nombre del invitado al que cargaran el itinerario <span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                <select class="form-control select_2" name="id_asistente" id="id_asistente_itinerario" required>
                                                    <option selected disabled>Seleccione una Opción</option>
                                                    <?php echo $asistentesItinerartio; ?>
                                                </select>
                                            </div>
                                            <span id="availability_"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="card mt-3">
                                <div class="card-body">
                                    
                                    <div class="row form-group">
                                        <h6 class="text-center">Itinerario Vuelo Rumbo a la Convención 2022</h6>
                                        <hr>
                                        <div class="form-group col-md-6">
                                            <label class="control-label col-md-12 col-sm-1 col-xs-12" for="aerolinea_origen">Seleccione el nombre de la aerolínea (Ida)<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                <select class="form-control select_2" name="aerolinea_origen" id="aerolinea_origen" required>
                                                    <option selected disabled>Seleccione una Opción</option>
                                                    <?php echo $aerolineas; ?>
                                                </select>
                                            </div>
                                            <span id="availability_"></span>
                                        </div>
                                        <!-- <div class="col-12 col-lg-6">
                                            <label class="form-label" style="color: green">Si el vuelo tiene escalas, seleccione una opción *</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                <select class="form-control" name="aeropuerto_salida" id="aeropuerto_salida" required>
                                                    
                                                    
                                                    <?php //echo $aeropuertos; ?>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Fecha de salida del vuelo *</label>
                                            <div class="input-group">
                                                <input id="fecha_salida" name="fecha_salida" minlength="6" maxlength="8" class="form-control" type="date" placeholder="00/00/0000" style="text-transform:uppercase;"  min="2022-04-05" max="2022-04-17">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Hora de salida del vuelo *</label>
                                            <div class="input-group">
                                                <input id="hora_salida" name="hora_salida" maxlength="29" class="form-control" type="time" placeholder="hora llegada" required="" style="text-transform:uppercase;" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <label class="form-label">Aeropuerto de Salida *</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                <select class="form-control select_2" name="aeropuerto_salida" id="aeropuerto_salida" required>
                                                    <option selected disabled>Seleccione una Opción</option>
                                                    <?php echo $aeropuertos; ?>
                                                </select>
                                            </div>
                                        </div>

                                      
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label mt-4">¿Tiene escala ida?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="confirm_escala_ida" id="confirm_escala_ida_si" value="si" style="padding: 6px;">
                                                <label class="form-check-label" for="confirm_escala_ida_si">Si</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="confirm_escala_ida" id="confirm_escala_ida_no" value="no" style="padding: 6px;" checked>
                                                <label class="form-check-label" for="confirm_escala_ida_no">No</label>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Escala ida -->
                            <div class="card mt-3" id="cont-escala-ida">
                                <div class="card-body">
                                    
                                    <div class="row form-group">
                                        <div class="button-hide" style="display: flex; justify-content: end; ">
                                            <button id="btn_acordion_escala_down1" style="border:none; background-color:white;"><i class="fa fa-solid fa-arrow-down"></i></button>
                                            <button id="btn_acordion_escala_up1" style="border:none; background-color:white; display:none;"><i class="fa fa-solid fa-arrow-up" ></i></button>
                                        </div>
                                        <h6 class="text-center">Itinerario Vuelo Rumbo a la Convención 2022 (Escala 1)</h6>
                                        <hr>
                                        <div id="content-itinerario-escala-ida" class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="aerolinea_escala_origen">Seleccione el nombre de la aerolínea (Ida)<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                    <select class="form-control select_2" name="aerolinea_escala_origen" id="aerolinea_escala_origen" required>
                                                        <option selected disabled>Seleccione una Opción</option>
                                                        <?php echo $aerolineas; ?>
                                                    </select>
                                                </div>
                                                <span id="availability_"></span>
                                            </div>
                                        
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Fecha de salida del vuelo *</label>
                                                <div class="input-group">
                                                    <input id="fecha_escala_salida" name="fecha_escala_salida" minlength="6" maxlength="8" class="form-control" type="date" placeholder="00/00/0000" style="text-transform:uppercase;" min="2022-04-05" max="2022-04-17">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Hora de salida del vuelo *</label>
                                                <div class="input-group">
                                                    <input id="hora_escala_salida" name="hora_escala_salida" maxlength="29" class="form-control" type="time" placeholder="hora llegada" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label class="form-label">Aeropuerto de Salida *</label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                    <select class="form-control select_2" name="aeropuerto_escala_salida" id="aeropuerto_escala_salida" required>
                                                        <option selected disabled>Seleccione una Opción</option>
                                                        <?php echo $aeropuertos; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                            

                                    </div>
                                </div>
                            </div>


                            <div class="card mt-3">
                                <div class="card-body">
                                    <!-- <div class="form-group row"> -->
                                    <div class="row form-group">
                                        <h6 class="text-center">Itinerario Vuelo Rumbo a Casa</h6>
                                        <hr>

                                        <div class="form-group col-md-6">
                                            <label class="control-label col-md-12 col-sm-1 col-xs-12" for="aerolinea_destino">Seleccione el origen de la aerolínea (Regreso) <span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                <select class="form-control select_2" name="aerolinea_destino" id="aerolinea_destino">
                                                    <option selected disabled>Seleccione una Opción</option>
                                                    <?php echo $aerolineas; ?>
                                                </select>
                                            </div>
                                            <span id="availability_"></span>
                                        </div>

                                        <!-- <div class="col-12 col-lg-6">
                                            <label class="form-label" style="color: green">Si el vuelo tiene escalas, seleccione una opción *</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                <select class="form-control" name="aeropuerto_regreso" id="aeropuerto_regreso" required>
                                                    <option selected disabled>Seleccione una Opción</option>
                                                    
                                                    <?php //echo $aeropuertos; ?>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Fecha de regreso del vuelo*</label>
                                            <div class="input-group">
                                                <input id="fecha_regreso" name="fecha_regreso" minlength="6" maxlength="8" class="form-control" type="date" placeholder="00/00/0000" style="text-transform:uppercase;" min="2022-04-05" max="2022-04-17">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Hora de regreso del vuelo*</label>
                                            <div class="input-group">
                                                <input id="hora_regreso" name="hora_regreso" maxlength="29" class="form-control" type="time" placeholder="hora regreso" style="text-transform:uppercase;" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <label class="form-label">Aeropuerto de Regreso *</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                <select class="form-control select_2" name="aeropuerto_regreso" id="aeropuerto_regreso">
                                                <option selected disabled>Seleccione una Opción</option>
                                                    <?php echo $aeropuertos; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label mt-4">¿Tiene escala regreso?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="confirm_escala_regreso" id="confirm_escala_regreso_si" value="si" style="padding: 6px;">
                                                <label class="form-check-label" for="confirm_escala_regreso_si">Si</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="confirm_escala_regreso" id="confirm_escala_regreso_no" value="no" style="padding: 6px;"checked>
                                                <label class="form-check-label" for="confirm_escala_regreso_no">No</label>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Escala regreso -->
                            <div class="card mt-3" id="cont-escala-regreso">
                                <div class="card-body">
                                    <!-- <div class="form-group row"> -->
                                    <div class="row form-group">
                                        <div class="button-hide" style="display: flex; justify-content: end; ">
                                            <button id="btn_acordion_escala_down2" style="border:none; background-color:white;"><i class="fa fa-solid fa-arrow-down"></i></button>
                                            <button id="btn_acordion_escala_up2" style="border:none; background-color:white; display:none;"><i class="fa fa-solid fa-arrow-up" ></i></button>
                                        </div>
                                        <h6 class="text-center">Itinerario Rumbo casa (Escala 2)</h6>
                                        <hr>
                                        <div id="content-itinerario-escala-regreso" class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-12 col-sm-1 col-xs-12" for="aerolinea_escala_destino">Seleccione el nombre de la aerolínea (Ida)<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                    <select class="form-control select_2" name="aerolinea_escala_destino" id="aerolinea_escala_destino" required>
                                                        <option selected disabled>Seleccione una Opción</option>
                                                        <?php echo $aerolineas; ?>
                                                    </select>
                                                </div>
                                                <span id="availability_"></span>
                                            </div>
                                            <!-- <div class="col-12 col-lg-6">
                                                <label class="form-label" style="color: green">Si el vuelo tiene escalas, seleccione una opción *</label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                    <select class="form-control" name="aeropuerto_escala_salida" id="aeropuerto_escala_salida" required>
                                                        <option selected disabled>Seleccione una Opción</option>
                                                        
                                                        <?php //echo $aeropuertos; ?>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Fecha de salida del vuelo *</label>
                                                <div class="input-group">
                                                    <input id="fecha_escala_regreso" name="fecha_escala_regreso" minlength="6" maxlength="8" class="form-control" type="date" placeholder="00/00/0000" style="text-transform:uppercase;" min="2022-04-05" max="2022-04-17">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">Hora de salida del vuelo *</label>
                                                <div class="input-group">
                                                    <input id="hora_escala_regreso" name="hora_escala_regreso" maxlength="29" class="form-control" type="time" placeholder="hora llegada" style="text-transform:uppercase;" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label class="form-label">Aeropuerto de Salida *</label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <!-- <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12"> -->
                                                    <select class="form-control select_2" name="aeropuerto_escala_regreso" id="aeropuerto_escala_regreso" required>
                                                        <option selected disabled>Seleccione una Opción</option>
                                                        <?php echo $aeropuertos; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

      
                            <div class="card mt-3">
                                <div class="card-body">
                                    <!-- <div class="form-group row"> -->
                                    <div class="row form-group">


                                        <div class="col-12 col-lg-12">
                                            <label class="form-label">Notas (Opcional)</label>
                                            <div class="input-group">
                                                <textarea id="nota_itinerario" name="nota_itinerario" maxlength="1000" class="form-control" placeholder="Añade Alguna Nota de Importancia"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="user_" name="user_" value="<?= $_SESSION["utilerias_administradores_id"] ?>">

                                    </div>
                                </div>
                            </div>

                            <!-- </div> -->
                            <div class="modal-footer">
                                <button type="submit" class="btn bg-gradient-success" id="btn_upload" name="btn_upload">Aceptar</button>
                                <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </main>
</body>

<?php echo $footer; ?>

<script>
    $(document).ready(function() {

       $('.select_2').select2();

       $('#itinerario-tabla').DataTable({
        "drawCallback": function( settings ) {
                $('.current').addClass("btn bg-gradient-danger btn-rounded").removeClass("paginate_button");
                $('.paginate_button').addClass("btn").removeClass("paginate_button");
                $('.dataTables_length').addClass("m-4");
                $('.dataTables_info').addClass("mx-4");
                $('.dataTables_filter').addClass("m-4");
                $('input').addClass("form-control");
                $('select').addClass("form-control");
                $('.previous.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
                $('.next.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
                $('.previous').addClass("btn-outline-danger btn-rounded mx-2");
                $('.next').addClass("btn-outline-danger btn-rounded mx-2");
                $('a.btn').addClass("btn-rounded");
                $('.odd').addClass("bg-gray-conave");
                $('.even').addClass("bg-white").removeClass("bg-gray-conave-100");
            },
            "language": {
            
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            
            }
       });
        

        $("#cont-escala-ida").css("display", "none");
        $("#cont-escala-regreso").css("display", "none");

        

        $("#btn_acordion_escala_down1").on("click",function(event){
            event.preventDefault();
            $(this).hide();
            $("#btn_acordion_escala_up1").css("display","block");
            $("#hora_escala_salida").removeAttr('required');
            $("#content-itinerario-escala-ida").hide('slow');
           
        });

        $("#btn_acordion_escala_up1").on("click",function(event){
            event.preventDefault();
            $(this).hide();
            $("#btn_acordion_escala_down1").css("display","block");
            $("#hora_escala_salida").attr('required','required');
            $("#content-itinerario-escala-ida").show('slow');
           
        });


        $("#btn_acordion_escala_down2").on("click",function(event){
            event.preventDefault();
            $(this).hide();
            $("#btn_acordion_escala_up2").css("display","block");
            $("#hora_escala_regreso").removeAttr('required');
            $("#content-itinerario-escala-regreso").hide('slow');
            
        });

        $("#btn_acordion_escala_up2").on("click",function(event){
            event.preventDefault();
            $(this).hide();
            $("#btn_acordion_escala_down2").css("display","block");
            $("#hora_escala_regreso").attr('required','required');
            $("#content-itinerario-escala-regreso").show('slow');
            
        });

        

        $("#form_itinerario").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById("form_itinerario"));
            for (var value of formData.values()) {
                //console.log(value);
            }
            $.ajax({
                url: "/Vuelos/itinerario",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {
                    if (respuesta == 'success') {
                        // $('#modal_payment_ticket').modal('toggle');

                        swal("¡El itinerario se Cargo Correctamente!", "", "success").
                        then((value) => {
                            window.location.replace("/Vuelos/");
                        });
                    }
                    console.log(respuesta);
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }
            });
        });

    });

    $('input:radio[name="confirm_escala_ida"]').change(function() {
        if ($("#confirm_escala_ida_no").is(':checked')) {
            $("#cont-escala-ida").css("display", "none");

        }

        if ($("#confirm_escala_ida_si").is(':checked')) {
            $("#cont-escala-ida").css("display", "block");

        }
    });

    $('input:radio[name="confirm_escala_regreso"]').change(function() {
        if ($("#confirm_escala_regreso_no").is(':checked')) {
            $("#cont-escala-regreso").css("display", "none");

        }

        if ($("#confirm_escala_regreso_si").is(':checked')) {
            $("#cont-escala-regreso").css("display", "block");

        }
    });
</script>