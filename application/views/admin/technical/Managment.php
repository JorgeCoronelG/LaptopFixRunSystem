<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border text-center">
            <h3 class="box-title">Lista de técnicos</h3>
        </div>
        <div class="box-body">
            <table id="tabla-tecnicos" class="table table-bordered table-hover nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="background-color: #006699; color: white">Nombre del técnico</th>
                        <th style="background-color: #006699; color: white">Teléfono</th>
                        <th style="background-color: #006699; color: white">Correo electrónico</th>
                        <th style="background-color: #006699; color: white">Domicilio</th>
                        <th style="background-color: #006699; color: white">Comp. IFE/INE</th>
                        <th style="background-color: #006699; color: white">Comp. Domicilio</th>
                        <th style="width: 15%; background-color: #006699; color: white">Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Técnico</h4>
            </div>
            <form id="form-update" class="form-horizontal">
                <input type="hidden" id="idTech" name="idTech">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="txtName" class="col-md-3 control-label">Nombre completo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="txtName" name="txtName" 
                                    placeholder="Ej. Alejandro López Hernández" maxlength="150" required
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtAddress" class="col-md-3 control-label">Dirección</label>
                            <div class="col-sm-9"> 
                                <input type="text" class="form-control" id="txtAddress" name="txtAddress" 
                                    placeholder="Ej. Monte Parnaso 451 #56 La Loma" maxlength="256" required
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPhone" class="col-md-3 control-label">Teléfono</label>
                            <div class="col-sm-5"> 
                                <input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="Ej. 4421782389" 
                                    maxlength="10" onkeypress="return validarTelefono(event);" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-credential" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cambiar el comprobante de IFE/INE</h4>
            </div>
            <form id="form-update-credential" class="form-horizontal">
                <input type="hidden" id="idTechINE" name="idTechINE">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">IFE/INE</label>
                            <div class="col-sm-9">
                                <label for="credential"><strong>Subir IFE/INE <i class="fa fa-upload"></i></strong></label>
                                <input class="inputfile custom" type="file" id="credential" name="credential" accept=".pdf"
                                       required>
                                <span id="file_name_credential"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-compAdd" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cambiar el comprobante de domicilio</h4>
            </div>
            <form id="form-update-compAdd" class="form-horizontal">
                <input type="hidden" id="idTechAdd" name="idTechAdd">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Comprobante de domicilio</label>
                            <div class="col-sm-9">
                                <label for="address">Subir comprobante <i class="fa fa-upload"></i></label>
                                <input class="inputfile custom" type="file" id="address" name="address" accept=".pdf" required>
                                <span id="file_name_address"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var path_doc = "uploads/documentos/";
</script>