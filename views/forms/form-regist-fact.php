<form enctype="multipart/form-data" method="POST" autocomplete="off">
  <div class="form-row align-items-center">
      <div class="col-sm-6 my-1">
        <div class="form-group">
          <label for="vehi_con">Nombre del conductor:</label>
          <input type="text" name="vehi_con" readonly class="form-control" id="comp_vehi_con"  required autocomplete="off"> 
        </div>
      </div>
      <div class="col-sm-3 my-1">
        <div class="form-group">
          <label for="vehi_pla">Placa:</label>
          <input type="text" name="vehi_pla" readonly class="form-control" id="comp_vehi_pla"  required autocomplete="off"> 
        </div>
      </div>
      <div class="col-sm-3 my-1">
        <div class="form-group">
          <label for="vehi_col">Color:</label>
          <input type="text" name="vehi_col" readonly class="form-control" id="comp_vehi_col"  required autocomplete="off"> 
        </div>
      </div>
  </div>
  <div class="form-row align-items-center">
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="cupo_ref">Cupo</label>
          <input type="text"  name="cupo_ref" readonly class="form-control" id="comp_cupo_ref"  required autocomplete="off">
        </div>
      </div>
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_fin">Fecha ingreso</label>
          <input type="date"  name="comp_fin" readonly class="form-control" id="comp_comp_fin"  required autocomplete="off">
        </div>
      </div>
    <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_hin">Hora ingreso</label>
        <input type="time" id="comp_comp_hin" class="form-control" readonly name="comp_hin"> 
        </div>
      </div>
  </div>
  <div class="form-row align-items-center">
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_fsa">Fecha salida</label>
          <input type="date"  name="comp_fsa" readonly class="form-control"  value="<?php echo date("Y-m-d"); ?>" required autocomplete="off">
        </div>
      </div>
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_hsa">Hora salida</label>
        <input type="time" id="relojSalida" max="23:59:00" min="00:00:00" class="form-control" readonly name="comp_hsa" value="" placeholder=""> 
        </div>
      </div>
  </div>
  <div class="row ">
    <input type="hidden" name="comp_cod" value="" id="comp_comp_cod">
    <input type="hidden" name="comp_cupo_fk" value="" id="comp_comp_cupo_fk">
    <button type="submit" class="btn btn-primary">Facturar</button>
    <input type="hidden" name="crud" value="fac">
  </div>
</form>