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
                <a href="/Principal/" class="nav-link active" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-home" style="color: white"></span>
                    </div>
                    <span class="nav-link-text ms-1">Principal</span>
                </a>

            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link " aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-sitemap" style="color: #344767"></span>
                    </div>
                    <span class="nav-link-text ms-1">Catálogos</span>
                </a>
                <div class="collapse " id="pagesExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link " href="/Bu/">
                                <span class="sidenav-mini-icon"> E </span>
                                <span class="sidenav-normal">Bu Asofarma</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/Lineas/">
                                <span class="sidenav-mini-icon"></span>
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
                                <span class="sidenav-mini-icon"> E </span>
                                <span class="sidenav-normal"> Restaurates </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <hr class="horizontal dark" />
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/Restaurantes/">
                                <span class="sidenav-mini-icon"> E </span>
                                <span class="sidenav-normal"> Restaurates </span>
                            </a>
                        </li>
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
                <a href="#ecommerceExamples" class="nav-link " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-bus" style="color: #344767"></span>
                    </div>
                    <span class="nav-link-text ms-1">PickUp</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#authExamples" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-hotel" style="color: #344767"></span>
                    </div>
                    <span class="nav-link-text ms-1">Habitaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#authExamples" class="nav-link " aria-controls="authExamples" role="button" aria-expanded="false">
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
                <a href="#basicExamples" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-shield-virus" style="color: #344767"></span>
                    </div>
                    <span class="nav-link-text ms-1">Comprobante Vacunación</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#basicExamples" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-virus-slash" style="color: #344767"></span>
                    </div>
                    <span class="nav-link-text ms-1">Pruebas Covid Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#basicExamples" class="nav-link " aria-controls="basicExamples" role="button" aria-expanded="false">
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
                <a href="#applicationsExamples" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-tools" style="color: #344767"></span>
                    </div>
                    <span class="nav-link-text ms-1">Configuración</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link " aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <span class="fa fa-user-circle-o" style="color: #344767"></span>
                    </div>
                    <span class="nav-link-text ms-1">Utilerias</span>
                </a>
                <div class="collapse " id="pagesExamples">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link " href="/Administradores/">
                                <span class="sidenav-mini-icon"> E </span>
                                <span class="sidenav-normal">Administradores</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/Posiciones/">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> Perfiles  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/Restaurantes/">
                                <span class="sidenav-mini-icon"> E </span>
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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bu</li>
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid py-3 col-md-12">
        <div class="card card-body" id="profile">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-auto col-4">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/assets/img/Empresa.png" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-sm-auto col-8">
                    <div class="h-100">
                        <h5 class="mb-1 font-weight-bolder col-sm-auto col-8">
                            BU
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm col-sm-auto col-8">
                            Registros Existentes
                        </p>
                    </div>
                </div>
                <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex"></div>
            </div>
        </div>
        <br>
        <a href="/Bu/Add" type="button" class="btn btn-primary btn-sm">Nuevo</a>
        <button type="button" class="btn btn-secondary btn-sm">Eliminar</button>
        <br>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Clave</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RFC</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Razon Social</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha Alta</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $tabla; ?>
                        <?php

                        echo $rfc;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main></body>



<?php echo $footer; ?>