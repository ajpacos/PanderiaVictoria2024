
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>PANADERIA VICTORIA</title>
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet"  href="<?php echo e(asset('/vendor/plugins/fontawesome-free/css/all.min.css')); ?>">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="<?php echo e(asset('/vendor/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('/vendor/dist/css/adminlte.css')); ?>">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo e(asset('/vendor/plugins/toastr/toastr.min.css')); ?>">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo e(asset('/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('/vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('/vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">

  <?php ( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') ); ?>

  <?php if(config('adminlte.use_route_url', false)): ?>
      <?php ( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' ); ?>
  <?php else: ?>
      <?php ( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' ); ?>
  <?php endif; ?>

</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
    <div class="container">
      <a href="<?php echo e(url('/')); ?>" class="navbar-brand">
        <img src="<?php echo e(asset('/vendor/adminlte/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">PANADERIA VICTORIA</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo e(url('/')); ?>" class="nav-link">Panes</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('contactanos.index')); ?>" class="nav-link">Enviar SMS</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Categorias</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            
              <?php if(isset($categorias)): ?>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(route('cargar.categoria',$categoria->id)); ?>" class="dropdown-item"><?php echo e($categoria->nombre); ?> </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                <li><a href="#" class="dropdown-item">No hay categoria </a></li>
                
              <?php endif; ?>
            

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
             
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <?php if(auth()->guard()->guest()): ?>
        <?php else: ?>
          <li class="nav-item dropdown">
            <?php if(Auth::user()->hasRole('Cliente') or Auth::user()->hasRole('Administrador') or Auth::user()->hasRole('Repartidor')): ?>
              <?php if(Auth::user()->hasRole('Cliente')): ?>
              <li class="nav-item">
                <a class="nav-link"  href="<?php echo e(route('pedido.ordenes')); ?>">
                  <i class="fas fa-hard-hat"> Pedidos</i>
                </a>
              </li>
              <?php endif; ?>
              <?php if(Auth::user()->hasRole('Administrador')): ?>
                <li class="nav-item"> 
                  <a class="nav-link"  href="<?php echo e(asset('administracion')); ?>">
                    <i class="fas fa-chart-bar"> Administración</i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if(Auth::user()->hasRole('Repartidor')): ?>
              <li class="nav-item">
                <a class="nav-link"  href="<?php echo e(route('pedidos.solicitudes')); ?>">
                  <i class="fas fa-motorcycle"> Delivery</i>
                </a>
              </li>
              <?php endif; ?> 
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link"  href="<?php echo e(asset('administracion')); ?>">
                  <i class="fas fa-cash-register"> Recepcion</i>
                </a>
              </li>
            <?php endif; ?>
          </li>            
          <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
         
        <?php else: ?>
          <?php if(Auth::user()->hasRole('Cliente')): ?>
            <li class="nav-item dropdown">
              <a class="nav-link" href="<?php echo e(route('cart.checkout')); ?>">
                <i class="fa fa-shopping-cart"></i>
                 <?php if(count(Cart::getContent())): ?>
                  
                   <span class="badge badge-success navbar-badge font-weight-bold"id="ContadorCart"><b><?php echo e(count(Cart::getContent())); ?></b></span>
                <?php else: ?> 
                  <span class="badge badge-white navbar-badge font-weight-bold" id="ContadorCart"><b>0</b></span>
                <?php endif; ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
           <!-- Iniciar Sesion -->
              <li  class="nav-item dropdown">
                <a  class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fas fa-user-cog"></i>
                </a> 
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <?php if(Route::has('login')): ?>
                  <div class="dropdown-divider"></div>
                  <a href="<?php echo e(route('login')); ?>" class="dropdown-item">
                      <i class="fas fa-sign-in-alt mr-2"></i><?php echo e(__('Login')); ?>

                  </a>
                <?php endif; ?>
                <?php if(Route::has('register')): ?>
                  <div class="dropdown-divider"></div>
                  <a href="<?php echo e(route('register')); ?>" class="dropdown-item ">
                      <i class="fas fa-address-card mr-2"></i><?php echo e(__('Register')); ?>

                  </a>
                <?php endif; ?>
              </div>
            </li>
        <?php else: ?>  
   
       <!-- NAV PERFIL -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link" data-toggle="dropdown">
            <i class="fas fa-user-cog"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-lx dropdown-menu-right">
            <!-- User image -->
            <li class="user-header" style="background: url(<?php echo e(asset('/vendor/images/photo1.png')); ?>) center center;">
              <img src="<?php echo e(asset('/vendor/images/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
              <p class="text-white">
                <?php echo e(Auth::user()->roles[0]->name); ?>

                <small clasS="text-muted text-white"><?php echo e(Auth::user()->name); ?></small>
                <small clasS="text-muted text-white">Montero - <?php echo e(date('d-m-Y')); ?> </small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?php echo e(asset('perfil')); ?>/<?php echo e(Auth::user()->id); ?>" class="btn btn-default btn-flat text-dark"><i class="fas fa-user mr-2"></i>Perfil</a>
              <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right text-dark"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
              </form> 
            </li>
          </ul>
        </li>
         <!-- FIN DE NAV PERFIL -->
      <?php endif; ?>
  
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
    <?php echo csrf_field(); ?>
</form>


    <?php echo $__env->yieldContent('content'); ?>


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery --><!-- autocomplete de venta -->
 <script src="<?php echo e(asset('/vendor/plugins/jquery/jquery.min.js')); ?>"></script>


<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo e(asset('/vendor/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/vendor/dist/js/adminlte.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('/vendor/plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('/vendor/plugins/toastr/toastr.min.js')); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('/vendor/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script>

  $(document).ready(function(){
  $.ajax({
        url:'<?php echo e(url('')); ?>/carrito-leer',
        method:"GET",
        success: function(resultado){
            if (resultado == 0) {
            }
            else{
                var resultado= JSON.parse(resultado);
                if (resultado.datos) {
                  $("#ContadorCart").html(resultado.datos);
                }
            }
        }
    });
});

  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,//view nro
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "deferRender": true,//
      "retrieve": true,
      "processing": true,//
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        }
      }
    });
  });

    var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
    });
    toastr.options = {
      "closeButton": true,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-left",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }


    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.swalDefaultSuccess').click(function() {
    Toast.fire({
      icon: 'success',
      title: 'Loasassascing elitr.'
    })
  });
  $('.swalDefaultInfo').click(function() {
    Toast.fire({
      icon: 'info',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });
  $('.swalDefaultError').click(function() {
    Toast.fire({
      icon: 'error',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });
  $('.swalDefaultWarning').click(function() {
    Toast.fire({
      icon: 'warning',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });
  $('.swalDefaultQuestion').click(function() {
    Toast.fire({
      icon: 'question',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });
//tooltips
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function(){
    $("table").tooltip({
        selector: '[rel="tooltip"]'
    });

 
});


</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\panaderia\resources\views/layouts/basehome.blade.php ENDPATH**/ ?>