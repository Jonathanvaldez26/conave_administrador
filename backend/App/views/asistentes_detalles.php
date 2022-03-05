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
                    <a href="/Principal/" role="button" class="nav-link" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-home" style="color: #344767"></span>
                        </div>
                        <span class="nav-link-text ms-1">Principal</span>
                    </a>

                </li>

                <li class="nav-item">
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
                                    <span class="sidenav-normal"> Posiciones Asofarma  </span>
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
                    <a href="/Asistentes/" class="nav-link active" aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-users" style="color: white"></span>
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
                    <a href="/Habitaciones/" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <span class="fa fa-shield-virus" style="color: #344767"></span>
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
                    <a href="/ComprobanteVacunacion/" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
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
                                    <span class="sidenav-normal"> Perfiles  </span>
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
                        <li class="breadcrumb-item text-sm opacity-5 text-dark">Principal</li>
                        <li class="breadcrumb-item text-sm opacity-5"><a class="text-dark" href="/Asistentes/">Asistentes</a></li>
                        <li class="breadcrumb-item text-sm opacity-10 text-dark">Detalles</li>
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
                <div class="col-lg-10 mx-auto">
                <div class="card mb-4">
                    <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                        <h6>Asistente - Detalles</h6>
                        <p class="text-sm mb-0">
                            No. Asistente <b>241342</b> 
                        </p>
                        <p class="text-sm mb-0">
                            Fecha de Alta: <b>23.02.2021</b>
                        </p>
                        <p class="text-sm">
                            Code: <b>KF332</b>
                        </p>
                        </div>
                        <!-- <a href="javascript:;" class="btn bg-gradient-secondary ms-auto mb-0">Invoice</a> -->
                    </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-0 mb-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                        <div class="d-flex">
                            <div>
                            <img src="https://lamenteesmaravillosa.com/wp-content/uploads/2018/09/hombre-creido-pensando-que-sabe-260x260.jpg" class="avatar avatar-xxl me-3" alt="John Smith">
                            </div>
                            <div>
                            <h6 class="text-lg mb-0 mt-2">John Smith</h6>
                            <p class="text-sm mb-3">Línea ASOFARMA: ADIUM</p>
                            <span class="badge badge-sm bg-gradient-success">Activo</span>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                        <a href="javascript:;" class="btn bg-gradient-primary mb-0" title="Editar Asistente"><i class="fa fa-edit"></i></a>
                        <!-- <p class="text-sm mt-2 mb-0">Do you like the product? Leave us a review <a href="javascript:;">here</a>.</p> -->
                        </div>
                    </div>
                    <hr class="horizontal dark mt-4 mb-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                        <h6 class="mb-3">Log</h6>
                        <div class="timeline timeline-one-side">
                            <div class="timeline-block mb-3">
                                <input class="chk" type="checkbox" id="chk-0">
                                <label for="chk-0" class="timeline-step">
                                    <i class="fa fa-bell text-warning text-gradient text-secondary"></i>
                                </label>
                            <div id="divss" class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Asistente received</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <input class="chk" type="checkbox" id="chk-1">
                            <label for="chk-1" class="timeline-step">
                                <i class="fa fa-pills text-danger text-gradient text-secondary"></i>
                            </label>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Generate Asistente id #1832412</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:21 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <input class="chk" type="checkbox" id="chk-2">
                            <label for="chk-2" class="timeline-step">
                                <i class="fa fa-check text-info text-gradient text-secondary"></i>
                            </label>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Asistente transmited to courier</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 8:10 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <input class="chk" type="checkbox" id="chk-3">
                            <label for="chk-3" class="timeline-step">
                                <i class="fa fa-virus text-success text-gradient"></i>
                            </label>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Asistente delivered</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 4:54 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-lg-5 col-md-6 col-12">
                        <h6 class="mb-3">Payment details</h6>
                        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                            <!-- <img class="w-10 me-3 mb-0" src="/img/users_conave/8mVMLa56xh.png" alt="logo"> -->
                            <img class="w-10 me-3 mb-0" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Mastercard_2019_logo.svg/1200px-Mastercard_2019_logo.svg.png" alt="logo">
                            <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="We do not store card details">
                            <i class="fas fa-info" aria-hidden="true"></i>
                            </button>
                        </div>
                        <h6 class="mb-3 mt-4">Billing Information</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">Oliver Liam</h6>
                                <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-2">Viking Burrito</span></span>
                                <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold">oliver@burrito.com</span></span>
                                <span class="text-xs">VAT Number: <span class="text-dark ms-2 font-weight-bold">FRB1235476</span></span>
                            </div>
                            </li>
                        </ul>
                        </div>
                        <div class="col-lg-3 col-12 ms-auto">
                        <h6 class="mb-3">Order Summary</h6>
                        <div class="d-flex justify-content-between">
                            <span class="mb-2 text-sm">
                            Product Price:
                            </span>
                            <span class="text-dark font-weight-bold ms-2">$90</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="mb-2 text-sm">
                            Delivery:
                            </span>
                            <span class="text-dark ms-2 font-weight-bold">$14</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-sm">
                            Taxes:
                            </span>
                            <span class="text-dark ms-2 font-weight-bold">$1.95</span>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <span class="mb-2 text-lg">
                            Total:
                            </span>
                            <span class="text-dark text-lg ms-2 font-weight-bold">$105.95</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </main>
</body>

<?php echo $footer; ?>