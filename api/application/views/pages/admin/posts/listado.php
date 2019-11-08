<section class="contenido">
  <div class="seccion">
    <div class="titulo">
      <h1>Listado de <strong>posts</strong></h1>
    </div>
    <hr>
    <div class="botones">
      <div class="btn-group" role="group" aria-label="...">
        <a href="{DIR}webadmin/empleado/agregar" class="btn btn-default {CLASE}"><i class="fa fa-plus"></i> Agregar Entrada</a>
      </div>
    </div>
    <div class="tabla">
      <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Imágen</th>
            <th>Fecha</th>
            <th>Categoría</th>
            <th>Vistas</th>
            <th>Tipo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          {LISTADO}
        </tbody>
      </table>
    </div>
  </div>
</section>
