<section class="contenido">
  <div class="seccion detalle">
    {DETALLE}
    <hr>
    <p>
      <a class="btn btn-success" href="<?php echo base_url().'webadmin/empleado'; ?>"> Volver</a>
      <a class="btn btn-danger" href="<?php echo base_url().'webadmin/empleado/editar/' . $ID; ?>"> Editar</a>
      <a class="btn btn-info" href="<?php echo base_url().'webadmin/empleado/exportar-evaluacion/' . $ID; ?>"><span class="fa fa-download"></span> Descargar reporte</a>
    </p>
  </div>
</section>
