<input type="hidden" value="{DIR}assets/img/<?=$BANNER[0]['source']?>" id="hdn_banner">

<section class="contenido">
	<div class="titulo">
		<h1>Panel de <strong>Control</strong></h1>
	</div>
	<div class="seccion">
		<div class="subtitulo">
			<h3>Accesos rapidos</h3>
		</div>
		<div class="add-post-adm">
			<div class="row">
				<div class="col-md-4">
					<div  id="add" data-action="add" data-toggle="modal" data-target="#addModal" class="add-button text-center action-buttons">
						<i class="fas fa-plus"></i>
					</div>
				</div>
				<div class="col-md-4">
					<div id="edit" data-action="edit" data-toggle="modal" data-target="#editModal" class="update-button text-center action-buttons">
						<i class="fas fa-edit"></i>
					</div>
				</div>
				<div class="col-md-4">
					<div id="delete" data-action="delete" data-toggle="modal" data-target="#deleteModal" class="delete-button text-center action-buttons">
						<i class="fas fa-times"></i>
					</div>
				</div>

			</div>

		</div>
	</div>
	<div class="seccion">
		<div class="subtitulo">
			<h3>Información de contacto</h3>
			<div class="row">
				<div class="col-md-12">
					<form id="frm-info-contacto">
						<div class="form-group">
							<label for="tipo">Dirección</label>
							<input type="text" name="direccion" class="form-control" value="<?=$CONTACTO[0]['direccion']?>">
						</div>
						<div class="form-group">
							<label for="tipo">Estado</label>
							<input type="text" name="estado" class="form-control" value="<?=$CONTACTO[0]['estado']?>">
						</div>
						<div class="form-group">
							<label for="tipo">Ciudad</label>
							<input type="text" name="ciudad" class="form-control" value="<?=$CONTACTO[0]['ciudad']?>">
						</div>
						<div class="form-group">
							<label for="tipo">Teléfono</label>
							<input type="text" name="telefono" class="form-control" value="<?=$CONTACTO[0]['telefono']?>">
						</div>
						<div class="form-group">
							<label for="tipo">Email</label>
							<input type="email" name="email" class="form-control" value="<?=$CONTACTO[0]['email']?>">
						</div>
						<div class="form-group">
							<label for="tipo">Facebook</label>
							<input type="text" name="facebook" class="form-control" value="<?=$CONTACTO[0]['facebook']?>">
						</div>
						<div class="form-group">
							<label for="tipo">Linkedin</label>
							<input type="text" name="linkedin" class="form-control" value="<?=$CONTACTO[0]['linkedin']?>">
						</div>
						<div class="form-group">
							<label for="tipo">Instagram</label>
							<input type="text" name="instagram" class="form-control" value="<?=$CONTACTO[0]['instagram']?>">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success" >Guardar</button>

						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<div class="seccion">
		<div class="subtitulo">
			<h3>Subir Recursos</h3>
			<div class="row">
				<div class="col-md-12">
					<form id="frm-recursos" enctype="multipart/form-data">
						<div class="form-group">
							<label for="tipo">Titulo</label>
							<input type="text" name="titulo-recurso" id="titulo-recurso" class="form-control">
						</div>
						<div class="form-group">
							<label for="tipo">Archivo (sólo se permiten pdf y mp4)</label>
							<input type="file" name="recurso" id="recurso" class="form-control" accept="application/pdf , video/mp4">
						</div>
						<div class="form-group">
							<label for="tipo">Descripción</label>
							<textarea name="descripcion-recurso" id="descripcion-recurso" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success" >Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<div class="seccion">
		<div class="subtitulo">
			<h3>Banner home</h3>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="banner-wrapper">
					<div id="home-banner-admin" class="home-banner-admin">
						<div class="home-banner-mask"><i class="fas fa-file-upload"></i></div>
						<img id="home-thumbnail" src="{DIR}assets/img/<?=$BANNER[0]['source']?>" alt="<?=$BANNER[0]['source']?>">
					</div>
				</div>
				<form id="frm-banner-home">
					<div class="form-group">
						<input type="file" name="imagen-banner" onchange="readURL3(this)" id="imagen-banner" class="form-control dn" accept="image/jpeg image/x-png">
						<small id="emailHelp" class="form-text text-muted">Selecciona un archivo para tu home (sólo se permiten archivos png y jpg 1920x700).</small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" >Guardar</button>
						<button id="cancel-banner" type="button" class="btn btn-danger" >Cancelar</button>
					</div>
				</form>
			</div>
		</div>

	</div>
	<div class="seccion">
		<div class="subtitulo">
			<h3>Categorías y secciones: Agregar Nueva</h3>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form id="frm-info-categoria">
					<div class="form-group">
						<label for="tipo">Nombre</label>
						<input type="text" name="nombreCategoria" class="form-control" value="">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" >Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar nueva entrada</h5>
			</div>
			<div class="modal-body">
				<form id="add-form" enctype="multipart/form-data">
					<div class="form-group">
						<label for="tipo">Tipo</label>
						<select class="form-control" name="tipo" id="tipo-add">
							<option value="img">Imágen</option>
							<option value="video">Video</option>
						</select>
					</div>
					<div class="form-group">
						<div class="img-button text-center" id="img-button">
							<img id="folder-open" src="{DIR}assets/img/lq_quero_open.png" alt="open">
						</div>
						<small id="emailHelp" class="form-text text-muted">Selecciona un archivo para tu entrada (solo se permiten archivos png y jpg).</small>
						<!-- <button class="btn btn-success" id="img-button" class="img-button" for="imagen">Imágen</button> -->
						<input type="file" name="imagen" onchange="readURL(this)" id="imagen" class="form-control dn" accept="image/jpeg image/x-png">
					</div>
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" name="titulo" id="titulo-add" class="form-control">
					</div>
					<div class="form-group">
						<label for="titulo">Contenido</label>
						<textarea name="contenido" id="contenido-add" rows="8" cols="80" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="tipo">Categorías</label>
						<select class="form-control" name="categoria" id="categoria-add">
							<?php for ($i=0; $i < count($CATEGORIAS); $i++) { ?>
								<option value="<?=$CATEGORIAS[$i]['id']?>"><?=$CATEGORIAS[$i]['nombre']?></option>
								<?php } ?>
							</select>
						</div>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</form>
				</div>

				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar entrada</h5>
				</div>
				<div class="modal-body">
					<form id="edit-form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="post">Entrada</label>
							<select id="selectPostdEdit" class="form-control" name="post">
								<option value="default">SELECCIONA ENTRADA A MODIFICAR</option>

								<?php  for ($y=0; $y < count($POST); $y++) {?>
									<option value="<?=$POST[$y]['id']?>"><?=$POST[$y]['titulo']?></option>
									<?php 	}  ?>
								</select>
							</div>
							<div class="post-ajax">

							</div>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Eliminar entrada</h5>
					</div>
					<div class="modal-body">
						<form id="delete-form">
							<div class="form-group">
								<label for="post">Entrada</label>
								<select id="selectPostdDelete" class="form-control" name="post">
									<option value="default">SELECCIONA ENTRADA A MODIFICAR</option>

									<?php  for ($y=0; $y < count($POST); $y++) {?>
										<option value="<?=$POST[$y]['id']?>"><?=$POST[$y]['titulo']?></option>
										<?php 	}  ?>
									</select>
								</div>
								<div class="post-ajax-delete">

								</div>
								<button type="submit" class="btn btn-danger">Eliminar</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
