
<?php echo $header; ?>

<body class="g-sidenav-show  bg-gray-100">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <div class="mt-7">
        <div class="card card-body mt-n6 overflow-hidden m-5">
            <div class="row mb-3" >
                <div class="col-auto">
                    <div class="bg-gradient-red avatar avatar-xl position-relative">
                        <!-- <img src="../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
                        <span class="fa fa-bell" style="font-size: xx-large;"></span>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Listas de Asistencias
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" href="#cam1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <span class="fa fa-clock-o"></span>
                                    <span class="ms-1">Registro</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" href="#cam2" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <span class="fa fa-check-circle-o"></span>
                                    <span class="ms-1">Lista</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="mt-7">
            <div class="card card-body mt-n6 overflow-hidden m-5">
                <div class="row" >
                    <div class="col-auto">
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0">Asistente</h6>
                                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="See traffic channels">
                                                <i class="fas fa-info" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body pb-0 p-3 mt-4">
                                        <div class="row">
                                            <div class="col-7 text-start">
                                                <div class="chart">
                                                    <canvas id="chart-pie" class="chart-canvas" height="400" style="display: block; box-sizing: border-box; height: 200px; width: 244.5px;" width="489"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-5 my-auto">
                  <span class="badge badge-md badge-dot me-4 d-block text-start">
                    <i class="bg-info"></i>
                    <span class="text-dark text-xs">Facebook</span>
                  </span>
                                                <span class="badge badge-md badge-dot me-4 d-block text-start">
                    <i class="bg-primary"></i>
                    <span class="text-dark text-xs">Direct</span>
                  </span>
                                                <span class="badge badge-md badge-dot me-4 d-block text-start">
                    <i class="bg-dark"></i>
                    <span class="text-dark text-xs">Organic</span>
                  </span>
                                                <span class="badge badge-md badge-dot me-4 d-block text-start">
                    <i class="bg-secondary"></i>
                    <span class="text-dark text-xs">Referral</span>
                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 pb-0 p-3 d-flex align-items-center">
                                        <div class="w-60">
                                            <p class="text-sm">
                                                More than <b>1,200,000</b> sales are made using referral marketing, and <b>700,000</b> are from social media.
                                            </p>
                                        </div>
                                        <div class="w-40 text-end">
                                            <a class="btn bg-light mb-0 text-end" href="javascript:;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-6 mt-sm-0 mt-4">
                                <div class="card">
                                    <div class="card-header pb-0 p-3">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0"><span class="fa fa-list-alt"></span> <?php echo $nombre;?></h6>
                                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Aqui va la descripcion de la asistencia">
                                                <i class="fas fa-info" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <hr>
                                        <h7 class="mb-0"><span class="fa fa-calendar-alt"></span> <?php echo $fecha_asistencia; ?> | Asistencia abierta de <span class="fa fa-clock-o"></span> <?php echo $hora_asistencia_inicio; ?> a <span class="fa fa-clock-o"></span> <?php echo $hora_asistencia_fin; ?> <strong> Hora Local Cancún</strong></h7>
                                        <hr>
                                        <br>
                                        <div class="row gx-2 gx-sm-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input style="font-size: 35px" type="text" id="uno" name="uno" class="form-control form-control-lg text-center" minlength="6" maxlength="6" autocomplete="off" autocapitalize="off" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn bg-gradient-danger w-100 my-0 mb-5 ms-auto" type="submit" id="btn_registro_email">Verifica tu Código</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    
</main>
<!--   Core JS Files   -->
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
<!-- Kanban scripts -->
<script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
<script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
<script src="../../assets/js/plugins/chartjs.min.js"></script>
<script src="../../assets/js/plugins/threejs.js"></script>
<script src="../../assets/js/plugins/orbit-controls.js"></script>
</body>

<?php echo $footer; ?>

</html>