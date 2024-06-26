

<?php $__env->startSection('content'); ?>

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-0">
                  <div class="col-sm-6 mb-0">
                      <h1>Provedores</h1>  
                  </div>
                  
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">

                          <!-- /.card-header -->
                          <div class="card-body">
                              <div class="mb-3">
                                <label for="">Tipo Provedor</label>
                                <br>
                                <input type="radio" id="opcion" name="opcion" value="1"  onchange="mostrar(this.value);">Persona
                                <br>
                                <input type="radio"  id="opcion" name="opcion" value="2" checked onchange="mostrar(this.value);">Empresa
                              </div>
                              <div class="d-flex justify-content-end">
                                  <div class="form-group">
                                      <a class="btn btn-info btn-sm" href="<?php echo e(asset('provedor/create')); ?>"><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar</a>
                                      <a class="btn btn-danger btn-sm" href="<?php echo e(asset('provedor/eliminados')); ?>"><i class="far fa-trash-alt"></i>&nbsp;Eliminados</a>
                                  </div>
                              </div>
                              <div id="rama_provedorA" style="display:block">
                                <table id="provedor_empresa"   class="table table-bordered table-sm table-hover table-striped ">
                                    <thead>
                                        <tr>
                                          <th width="5%"> id </th>
                                          <th> direccion </th>
                                          <th> telefono </th>
                                          <th> correo </th>
                                          <th> razon social </th>
                                          <th width="7%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $__currentLoopData = $pempresa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php ($id_provedor1=$empresa->id); ?>
                                          <?php $__currentLoopData = $provedor1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($provedor->id==$id_provedor1): ?>
                                            <tr>
                                              <td><?php echo e($provedor->id); ?></td>
                                              <td><?php echo e($provedor->direccion); ?></td>
                                              <td><?php echo e($provedor->telefono); ?></td>
                                              <td><?php echo e($provedor->correo); ?></td>
                                              <td><?php echo e($empresa->razonsocial); ?></td>
                                              <td class="py-1 align-middle text-center">
                                                <div class="btn-group btn-group-sm">
                                                  <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="<?php echo e(url('provedor/edit/'.$empresa->id.'/0')); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                  <a href="#" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" data-href="<?php echo e(url('provedor/destroy/'.$empresa->id)); ?>" data-toggle="modal" data-target="#modal-confirma"><i class="fas fa-trash"></i></a>
                                                </div>
                                              </td>
                                            </tr>
                                            <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                              </div>
                              <div id="rama_provedorB" style="display:none" >
                                
                                  <table id="example2"  class="table table-bordered table-sm table-hover table-striped ">
                                  <thead>
                                      <tr>
                                        <th width="5%"> id </th>
                                        <th> direccion </th>
                                        <th> telefono </th>
                                        <th> correo </th>
                                        <th> nombre </th>
                                        <th> apellidos </th>
                                        <th width="7%">Acción</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    
                                    <?php $__currentLoopData = $ppersona; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php ($id_provedor=$persona->id); ?>
                                        <?php $__currentLoopData = $provedor2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($provedor->id==$id_provedor): ?>
                                            <tr>
                                              <td><?php echo e($provedor->id); ?></td>
                                              <td><?php echo e($provedor->direccion); ?></td>
                                              <td><?php echo e($provedor->telefono); ?></td>
                                              <td><?php echo e($provedor->correo); ?></td>
                                              <td><?php echo e($persona->nombre); ?></td>
                                              <td><?php echo e($persona->apellidos); ?></td>
                                              <td class="py-1 align-middle text-center">
                                                <div class="btn-group btn-group-sm">
                                                  <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="<?php echo e(url('provedor/edit/'.$persona->id.'/1')); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                  <a href="#" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" data-href="<?php echo e(url('provedor/destroy/'.$persona->id)); ?>" data-toggle="modal" data-target="#modal-confirma"><i class="fas fa-trash"></i></a>
                                                </div>
                                              </td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                               </table>
                             </div>
                          </div>
                          <!-- /.card-body -->

                      </div>
                      <!-- /.card -->

                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" data-backdrop="static">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Eliminar Registro</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>¿Desea Eliminar este registro?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok btn-sm">Confirmar</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->
  
  
    <script>
      function mostrar(dato){
          if(dato=="1"){
         //   document.getElementById("provedor_persona").style.display = "table";
            document.getElementById("rama_provedorA").style.display = "none";
            document.getElementById("rama_provedorB").style.display = "block";
         //   document.getElementById("provedor_empresa").style.display = "none";
              
          }
          if(dato=="2"){
         //   document.getElementById("provedor_persona").style.display = "none";
            document.getElementById("rama_provedorA").style.display = "block";
            document.getElementById("rama_provedorB").style.display = "none";
         //   document.getElementById("provedor_empresa").style.display = "table";  
          }
      }

      $(function () {
        $('#provedor_empresa').DataTable({
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

      </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/provedores/index.blade.php ENDPATH**/ ?>