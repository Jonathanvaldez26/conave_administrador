<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\RegistroAsistencia AS RegistroAsistenciaDao;

class RegistroAsistencia{
   

    private $_contenedor;


    public function codigo($id) {
        $extraHeader =<<<html
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
        <link rel="icon" type="image/vnd.microsoft.icon" href="/assets/img/angel.png">
        <title>
            Asistencia CONAVE Convención 2022 ASOFARMA
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        
        

html;
        $extraFooter =<<<html
        <script src="/js/jquery.min.js"></script>
        <script src="/js/validate/jquery.validate.js"></script>
        <script src="/js/alertify/alertify.min.js"></script>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <!--   Core JS Files   -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <!-- Kanban scripts -->
        <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
        <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>

html;

        $codigo = RegistroAsistenciaDao::getById($id);
        foreach($codigo as $key => $value)
        {
            if($value['id_asistencia'] != '')
            {
                $flag = true;
                $nombre = $value['nombre'];
                $descripcion = $value['descripcion'];
                $fecha_asistencia = $value['fecha_asistencia'];
                $hora_asistencia_inicio = $value['hora_asistencia_inicio'];
                $hora_asistencia_fin = $value['hora_asistencia_fin'];
            }
        }

        $info_asist = RegistroAsistenciaDao::getAsistentes();
        $card_asist = '';

        foreach ($info_asist as $key => $value) {
            $card_asist .=<<<html
            <div class="col-5">
html;
            if ($value['imagen'] != '') {
                $card_asist .=<<<html
                
                <img class="avatar avatar-xxl me-3" src="/img/{$value['imagen']}">
            </div>
html;
            } else {
            $card_asist .=<<<html
                <img class="avatar avatar-xxl me-3" src="/img/user.png">
            </div>
html;
            }

            $card_asist .=<<<html
            <div class="col-7">
                <div class="card-body text-center">
                    <span style="font-size: xxx-large;">{$value['clave']}</span>
                </div>
                <br>
                <div class="text-center">
                    <button class="btn btn-info">Registrar Asistente</button>
                </div>
            </div>
html;
        }

        View::set('card_asist',$card_asist);

        if($flag == true)
        {
            View::set('nombre',$nombre);
            View::set('descripcion',$descripcion);
            View::set('nombre',$nombre);
            View::set('fecha_asistencia',$fecha_asistencia);
            View::set('hora_asistencia_inicio',$hora_asistencia_inicio);
            View::set('hora_asistencia_fin',$hora_asistencia_fin);
            
            View::set('header',$extraHeader);
            View::set('footer',$extraFooter);
            View::render("registro_asistencias_codigo");

            // View::render("asistencias_all");
        }
        else
        {
            View::render("asistencias_panel_registro");
        }






    }

}