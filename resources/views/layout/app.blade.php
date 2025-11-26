<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') - Admin</title> <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet"> <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet"> <!-- Bootstrap -->
    <link href="{{ asset('sbadmin2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper"> <!-- ====== SIDEBAR (menu lateral) ====== -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> <!-- Logo --> <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15"> <i class="fas fa-laugh-wink"></i> </div>
                <div class="sidebar-brand-text mx-3">ADMINISTRADOR</div>
            </a>
            <hr class="sidebar-divider my-0"> <!-- Buscador del Sidebar -->
            <div class="px-3 mt-3">
                <div class="input-group"> <input type="text" id="sidebarSearch" class="form-control bg-light border-0 small" placeholder="Buscar en menú..." onkeyup="filterSidebar()">
                    <div class="input-group-append"> <button class="btn btn-primary"> <i class="fas fa-search fa-sm"></i> </button> </div>
                </div>
            </div>
            <hr class="sidebar-divider"> <!-- Dashboard --> <!-- Nav Item - Dashboard -->
            <li class="nav-item active"> <a class="nav-link" href="{{ route('admin.panel') }}"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Panel</span> </a> </li>
            <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDependencias" aria-expanded="true" aria-controls="collapseDependencias">
        <i class="fas fa-building"></i>
        <span>Dependencias</span>
    </a>
    <div id="collapseDependencias" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Selecciona una opción:</h6>
            <a class="collapse-item" href="{{ route('admin.dependencias.index') }}">Ver</a>
            <a class="collapse-item" href="{{ route('admin.dependencias.create') }}">Crear</a>
        </div>
    </div>
</li>
            <li class="nav-item"> <a class="nav-link collapsed" href="{{ route('admin.dependencias.index') }}" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-chart-bar"></i> <span>Indicador</span> </a> </li>
            <li class="nav-item"> <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-chart-line"></i> <span>Indicador</span> </a> </li> <!-- Divider -->
            <hr class="sidebar-divider"> <!-- Heading -->
            <div class="sidebar-heading"> Gestión </div> <!-- Nav Item - Pages Collapse Menu --> <!-- Nav Item - Utilities Collapse Menu -->
           
            <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> <i class="fas fa-boxes"></i> <span>Activos</span> </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes personalizados:</h6> <a class="collapse-item" href="#">Respuestas</a> <a class="collapse-item" href="#">Encuesta</a>
                    </div>
                </div>
            </li>
            <li class="nav-item"> <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapseTwo"> <i class="fas fa-clipboard-check"></i> <span>Evaluación</span> </a> </li> <!-- Divider -->
            <hr class="sidebar-divider"> <!-- Heading -->
            <div class="sidebar-heading"> Administración </div> <!-- Nav Item - Pages Collapse Menu --> <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item"> <a class="nav-link collapsed" href="{{ route('admin.usuarios.index') }}" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-user-friends"></i> <span>Usuarios</span> </a> </li>
            <li class="nav-item"> <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-cog"></i> <span>Configuración</span> </a> </li> <!-- Divider -->
            <hr class="sidebar-divider"> <!-- Heading -->
            <div class="sidebar-heading"> Reportes </div> <!-- Nav Item - Pages Collapse Menu --> <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item"> <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-file-alt"></i> <span>Reportes</span> </a> </li> <!-- Divider -->
            <hr class="sidebar-divider"> <!-- Heading -->
            <div class="sidebar-heading"> Cuenta </div> <!-- Nav Item - Pages Collapse Menu --> <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item"> <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-id-card"></i> <span>Mis Datos</span> </a> </li> <!-- Divider -->
            <hr class="sidebar-divider"> <!-- Heading -->
            <div class="sidebar-heading"> Ayuda y Soporte </div> <!-- Nav Item - Pages Collapse Menu --> <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item"> <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-question-circle"></i> <span>Ayuda </span> </a> </li> <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block"> <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline"> <button class="rounded-circle border-0" id="sidebarToggle"></button> </div>
        </ul> <!-- ====== END SIDEBAR ====== --> <!-- ====== CONTENT WRAPPER ====== -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content"> <!-- ====== TOPBAR (barra superior) ====== -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> <!-- LOGOS IZQUIERDA -->
                    <div class="d-flex align-items-center mr-3"> <img src="{{ asset('sbadmin2/img/sedeco.png') }}" style="height:40px;" class="mr-2"> <img src="{{ asset('sbadmin2/img/seie.png') }}" style="height:40px;"> </div> <!-- Toggle sidebar (mobile) --> <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button> <!-- Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 navbar-search">
                        <div class="input-group"> <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar...">
                            <div class="input-group-append"> <button class="btn btn-primary"> <i class="fas fa-search fa-sm"></i> </button> </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto"> <!-- Notificaciones --> <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1"> <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-bell fa-fw"></i> <!-- Counter - Alerts --> <span class="badge badge-danger badge-counter">3+</span> </a> <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header"> Centro de alertas </h6> <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary"> <i class="fas fa-file-alt text-white"></i> </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">12 de diciembre de 2019</div> <span class="font-weight-bold">¡Ya está disponible para descargar el nuevo informe mensual!</span>
                                    </div>
                                </a> <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success"> <i class="fas fa-donate text-white"></i> </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">7 de diciembre de 2019</div> ¡Se han depositado $290.29 en su cuenta!
                                    </div>
                                </a> <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning"> <i class="fas fa-exclamation-triangle text-white"></i> </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">2 de diciembre de 2019</div> Alerta de gasto: Hemos detectado gastos inusualmente altos en su cuenta.
                                    </div>
                                </a> <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
                            </div>
                        </li> <!-- Mensajes -->
                        <li class="nav-item dropdown no-arrow mx-1"> <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-envelope fa-fw"></i> <!-- Counter - Messages --> <span class="badge badge-danger badge-counter">7</span> </a> <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header"> Centro de mensajes </h6> <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3"> <img class="rounded-circle" src="{{ asset('sbadmin2/img/undraw_profile_1.svg') }}" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">¡Hola! Me preguntaba si podrías ayudarme con un problema que he estado teniendo.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a> <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3"> <img class="rounded-circle" src="{{ asset('sbadmin2/img/undraw_profile_2.svg') }}" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Tengo las fotos que pediste el mes pasado, ¿cómo prefieres que te las envíe?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a> <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3"> <img class="rounded-circle" src="{{ asset('sbadmin2/img/undraw_profile_3.svg') }}" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">El informe del mes pasado se ve genial, estoy muy contento con el progreso hasta ahora, ¡sigan con el buen trabajo!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a> <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3"> <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a> <a class="dropdown-item text-center small text-gray-500" href="#">Leer más mensajes</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div> <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow"> <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small">Yesenia Jimenez</span> <img class="img-profile rounded-circle" src="{{ asset('sbadmin2/img/undraw_profile.svg') }}"> </a> <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"> <a class="dropdown-item" href="#"> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Perfil </a> <a class="dropdown-item" href="#"> <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Configuración </a> <a class="dropdown-item" href="#"> <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Registro de Actividad </a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="{{ url('/') }}"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar Sesión </a>
                            </div>
                        </li> <!-- LOGO DERECHO -->
                        <li class="nav-item d-flex align-items-center ml-3"> <img src="{{ asset('sbadmin2/img/ito.png') }}" style="height:40px;"> </li>
                    </ul>
                </nav> <!-- ====== END TOPBAR ====== --> <!-- CONTENIDO PRINCIPAL -->
                <div class="container-fluid">


                <!-- MIGA DE PAN -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb shadow-sm">

                            @php
                            $segments = request()->segments();
                            $path = '';
                            @endphp

                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>

                            @foreach($segments as $index => $segment)
                            @php
                            $path .= '/' . $segment;
                            $is_last = $index === array_key_last($segments);
                            $name = ucfirst(str_replace('-', ' ', $segment));
                            @endphp

                            @if($is_last)
                            <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
                            @else
                            <li class="breadcrumb-item">
                                <a href="{{ url($path) }}">{{ $name }}</a>
                            </li>
                            @endif
                            @endforeach

                        </ol>
                    </nav>
 <div id="content-wrapper" class="d-flex flex-column"> <!-- Main Content -->
                <div id="content">
                    <div class="container-fluid"> @yield('content') </div>
                </div> <!-- End of Main Content --> <!-- Footer integrado -->


                    @yield('contenido')
                </div>
            </div> <!-- Content Wrapper -->
           
            </div> <!-- End of Content Wrapper -->
        </div> <!-- ====== END CONTENT WRAPPER ====== -->
    </div> <!-- Scripts -->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    <script>
        function filterSidebar() {
            let input = document.getElementById("sidebarSearch").value.toLowerCase();
            let items = document.querySelectorAll("#accordionSidebar .nav-item");
            items.forEach(item => {
                let text = item.innerText.toLowerCase();
                if (text.includes(input)) {
                    item.style.display = "";
                } else {
                    item.style.display = "none";
                }
            });
        }
    </script>
    
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto d-flex justify-content-between" style="font-size: 14px; padding: 8px 15px;">
                            <div class="text-secondary"> <a href="#" class="text-secondary mx-2">Aviso de Privacidad</a> | <a href="#" class="text-secondary mx-2">Contacto</a> | <a href="#" class="text-secondary mx-2">Documentación</a> </div>
                            <div class="text-secondary"> Versión <strong>1.0.0</strong> </div>
                        </div>
                    </div> 
                </footer> <!-- End Footer -->
</body>

</html>