<section class="contenido">
  <div class="seccion">
    <div class="titulo">
      <h1>Agregar nuevo <strong>empleado</strong></h1>
    </div>
    <hr>
    <form action="#" method="post" name="frm_add_emp" id="frm_add_emp">
      <div class="row">
        <div class="col-lg-3">
          <div class="input-group ">
            <div class="form-group">
              <input type="hidden" name="no_empleado" value="{ID}">
              <label for="nombre">Número empleado:</label>
              <input type="text" name="no_empleado" class="form-control" value="">
            </div>
            <div class="form-group">
              <input type="hidden" name="id_empleado" value="{ID}">
              <label for="nombre">Nombre:</label>
              <input type="text" name="nombre" class="form-control" value="" >
            </div>
            <div class="form-group">
              <label for="a_paterno">Apellido Paterno:</label>
              <input type="text" name="a_paterno" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="a_materno">Apellido Materno:</label>
              <input type="text" name="a_materno" class="form-control" value="" >
            </div>
            <div class="form-group">
              <label for="f_nacimiento">Fecha nacimiento:</label>
              <input id="fecha_nacimiento" class="form-control" type="text" name="fecha_nacimiento" value="">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-group">
            <div class="form-group">
              <label for="direccion">Dirección:</label>
              <input class="form-control" type="text" name="direccion" value="">
            </div>
            <div class="form-group">
              <label for="f_ingreso">Fecha ingreso:</label>
              <input id="fecha_ingreso" class="form-control" type="text" name="fecha_ingreso" value="">
            </div>
            <div class="form-group">
              <label for="puesto">Puesto:</label>
              <input class="form-control" type="text" name="puesto" value="">
            </div>
            <div class="form-group">
              <label for="nivel_jerarquico">Nivel jerarquico:</label>
              <input class="form-control" type="text" name="nivel_jerarquico" value="">
            </div>
            <div class="form-group">
              <label for="direccion">Jefe directo:</label>
              <input class="form-control" type="text" name="j_directo" value="">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-group">
            <div class="form-group">
              <label for="area">Área:</label>
              <input class="form-control" type="text" name="area" value="">
            </div>
            <div class="form-group">
              <label for="departamento">Departamento:</label>
              <select class="form-control" name="departamento">
                <option value="na">Departamento</option>
                <?php
                $area = $DEPARTAMENTO;
                foreach ($area as $key => $value) {
                  echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="area">Tipo empleado:</label>
              <select class="form-control" name="t_empleado">
                <option value="1">Sindicalizado</option>
                <option value="0">No sindicalizado</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-group">
            <div class="form-group">
              <label for="t_capacitacion">Tipo capacitación:</label>
              <input class="form-control" type="text" name="t_capacitacion" value="">
            </div>
            <div class="form-group">
              <label for="estatus">Estatus:</label>
              <select class="form-control" name="estatus">
                <option value="1">Activo</option>
                <option value="0">Baja</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <input type="submit" name="guardar" class="btn btn-success" value="Guardar">
            <a href="<? echo base_url() . '/webadmin/empleado/'?>" class="btn btn-danger">Cancelar</a>
            <span class="co loading dn"><i class="fa fa-spinner fa-spin"></i>&nbsp;ENVIANDO...</span>
            <div class="msg dn" role="alert"></div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
