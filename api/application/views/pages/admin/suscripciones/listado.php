<section class="contenido">
  <div class="seccion">
    <div class="titulo">
      <h1>Listado de <strong>registros</strong></h1>
    </div>
    <hr>
    <div class="botones">
      <div class="btn-group" role="group" aria-label="...">
        <!-- <a href="{DIR}webadmin/registros/exportar-cuestionarios" class="btn btn-warning"><i class="fa fa-download"></i> Exportar Cuestionarios</a> -->
        <a href="{DIR}webadmin/reporte" class="btn btn-primary"><i class="fa fa-download"></i> Exportar Excel Completo</a>
      </div>
    </div>
    <div class="tabla">
      <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Lada</th>
            <th>Teléfono</th>
            <th>Domicilio</th>
            <th>Email</th>
            <th>Colonia</th>
            <th>Estado</th>
            <th>Ciudad</th>
          </tr>
        </thead>
        <tbody>
          {LISTADO}
        </tbody>
      </table>
    </div>
  </div>
</section>
