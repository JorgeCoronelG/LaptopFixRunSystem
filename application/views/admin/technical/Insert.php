<div class="row" id="div-loader">
    <div class="col-xl-12 text-center">
        <h1>Cargando</h1>
        <div class="loader" id="loader">Loading...</div>
    </div>
</div>

<div class="col-md-10 col-md-offset-1" id="div-form">
    <div class="box box-primary">
        <div class="box-header with-border text-center">
            <h3 class="box-title">Agregar técnico</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" id="form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtName" class="col-md-2 control-label">Nombre completo</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="txtName" name="txtName" 
                               placeholder="Ej. Alejandro López Hernández" maxlength="150" required
                               autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtAddress" class="col-md-2 control-label">Dirección</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="txtAddress" name="txtAddress" 
                               placeholder="Ej. Monte Parnaso 451 #56 La Loma" maxlength="256" required
                               autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPhone" class="col-md-2 control-label">Teléfono</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="Ej. 4421782389" 
                               maxlength="10" onkeypress="return validarTelefono(event);" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">IFE/INE</label>
                    <div class="col-md-10">
                        <label for="credential"><strong>Subir IFE/INE <i class="fa fa-upload"></i></strong></label>
                        <input class="inputfile custom" type="file" id="credential" name="credential" accept=".pdf" 
                               required>
                        <span id="file_name_credential"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Comprobante de domicilio</label>
                    <div class="col-md-10">
                        <label for="address">Subir comprobante de domicilio <i class="fa fa-upload"></i></label>
                        <input class="inputfile custom" type="file" id="address" name="address" accept=".pdf" required>
                        <span id="file_name_address"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtEmail" class="col-md-2 control-label">Correo electrónico</label>
                    <div class="col-md-5">
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" 
                           placeholder="Ej. correo@gmail.com" maxlength="120" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPassword" class="col-md-2 control-label">Contraseña</label>
                    <div class="col-md-5">
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" 
                           placeholder="Mínimo 6 dígitos" maxlength="32" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Success modal-->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">¡Proceso exitoso!</h5>
        </div>
        <div class="modal-body">Se ha agregado el técnico <strong><span id="nombre-tecnico-modal"></span></strong></div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" id="btn-success">Aceptar</button>
        </div>
      </div>
    </div>
</div>