<form enctype="multipart/form-data" method="POST" autocomplete="off">
  <div class="form-row align-items-center">
    <div class="col-sm-8 my-1">
  		<span class="help-block text-muted small-font" > Nombre del conductor</span>
      <input type="text" class="form-control" disabled="true"  placeholder="Propietario"  name="vehi_con" id="comp_vehi_con" />
    </div>
    <div class="col-sm-4 my-1">
      <span class="help-block text-muted small-font" > Placas</span>
      <input type="text" class="form-control" disabled="true" placeholder="Placas" name="vehi_pla" id="comp_vehi_pla" />
    </div>
  </div>
  <div class="form-row align-items-center">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <span class="help-block text-muted small-font" > Fecha de ingreso</span>
        <input type="date" class="form-control" disabled="true" name="comp_fin" id="comp_comp_fin" placeholder="Fecha de ingreso" />
    </div>
     <div class="col-md-4 col-sm-4 col-xs-4">
      <span class="help-block text-muted small-font" > Hora de ingreso</span>
      <input type="time" class="form-control" disabled="true" name="comp_hin" id="comp_comp_hin" placeholder="Hora de ingreso" />
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
      <span class="help-block text-muted small-font" >  Fecha de salida</span>
      <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" disabled="true" placeholder="Fecha de salida" />
    </div>
  </div>
  <div class="row ">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
    <button type="button" class="btn btn-primary">Facturar</button>
  </div>
</form>