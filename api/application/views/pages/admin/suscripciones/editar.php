
<section class="contenido">
  <div class="seccion">
    <div class="titulo">
      <h1>Editar información de <strong>empleado</strong></h1>
    </div>
    <hr>
    <form action="#" method="post" name="frm_edit_emp" id="frm_edit_emp">
      <div class="row">
        <div class="col-lg-3">
          <div class="input-group ">
            <div class="form-group">
              <input type="hidden" name="no_empleado" value="{ID}">
              <label for="nombre">Número empleado:</label>
              <input type="text" name="no_empleado" class="form-control" value="{NO_EMPLEADO}" >
            </div>
            <div class="form-group">
              <input type="hidden" name="id_empleado" value="{ID}">
              <label for="nombre">Nombre:</label>
              <input type="text" name="nombre" class="form-control" value="{NOMBRE}" >
            </div>
            <div class="form-group">
              <label for="a_paterno">Apellido Paterno:</label>
              <input type="text" name="a_paterno" class="form-control" value="{A_PATERNO}">
            </div>
            <div class="form-group">
              <label for="a_materno">Apellido Materno:</label>
              <input type="text" name="a_materno" class="form-control" value="{A_MATERNO}" >
            </div>
            <div class="form-group">
              <label for="f_nacimiento">Fecha nacimiento:</label>
              <input id="fecha_nacimiento" class="form-control" type="text" name="fecha_nacimiento" value="{F_NACIMIENTO}">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-group">
            <div class="form-group">
              <label for="direccion">Dirección:</label>
              <input class="form-control" type="text" name="direccion" value="{DIRECCION}">
            </div>
            <div class="form-group">
              <label for="f_ingreso">Fecha ingreso:</label>
              <input id="fecha_ingreso" class="form-control" type="text" name="fecha_ingreso" value="{F_INGRESO}">
            </div>
            <div class="form-group">
              <label for="puesto">Puesto:</label>
              <input class="form-control" type="text" name="puesto" value="{PUESTO}">
            </div>
            <div class="form-group">
              <label for="nivel_jerarquico">Nivel jerarquico:</label>
              <input class="form-control" type="text" name="nivel_jerarquico" value="{N_JERARQUICO}">
            </div>
            <div class="form-group">
              <label for="direccion">Jefe directo:</label>
              <input class="form-control" type="text" name="j_directo" value="{J_DIRECTO}">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-group">

            <div class="form-group">
              <label for="area">Área:</label>
              <input class="form-control" type="text" name="area" value="{AREA}">
            </div>
            <div class="form-group">
              <label for="departamento">Departamento:</label>
              <select class="form-control" name="departamento">
                <option value="{DEPARTAMENTO}">{DEPARTAMENTONOMBRE}</option>
                <?php
                    foreach ($areas as $key => $value) {
                  echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                    }
                 ?>
              </select>
            </div>
            <div class="form-group">
              <label for="area">Tipo empleado:</label>
              <select class="form-control" name="t_empleado">
                <option value="<? echo $T_EMPLEADO; ?>"><? echo (($T_EMPLEADO) == 1 ? "Sindicalizado" : "No sindicalizado"); ?></option>
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
              <input class="form-control" type="text" name="t_capacitacion" value="{T_CAPACITACION}">
            </div>
            <div class="form-group">
              <label for="estatus">Estatus:</label>
              <select class="form-control" name="estatus">
                <option value="<? echo $ESTATUS; ?>"><? echo (($ESTATUS) == 1 ? "Activo" : "Baja"); ?></option>
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
            <a href="<? echo base_url() . 'webadmin/empleado/'?>" class="btn btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
