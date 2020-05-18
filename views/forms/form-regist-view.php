<form enctype="multipart/form-data" method="POST" autocomplete="off">
  <div class="form-row align-items-center container-flex">
    <div class="container-flex cont-just-cen img-emp">
      <img src="public/img/system/findParking-ico.png" class="rounded mx-auto d-block" width="75" height="75" alt="">
    </div>
    <div class="info-emp">
      <div class="form-row align-items-center">
          <div class="col-sm-7 my-1">
              <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><b>Parqueadero</b></div>
            </div>
            <input type="text" disabled class="form-control" value="FindParking">
              </div>
          </div>
          <div class="col-sm-5 my-1">
              <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><b>Tarifa</b></div>
            </div>
            <input type="text" disabled class="form-control" value="<?php echo $_SESSION['parq_tar'] ?>">
              </div>
          </div>
          <div class="col-sm-12 my-1">
              <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><b>Descripción</b></div>
            </div>
            <input type="text" disabled class="form-control" value="<?php echo $_SESSION['parq_des'] ?>">
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="form-row align-items-center">
      <div class="col-sm-6 my-1">
        <div class="form-group">
          <label for="vehi_con">Nombre del conductor:</label>
          <input type="text" name="vehi_con" readonly class="form-control" id="view_vehi_con"  required autocomplete="off"> 
        </div>
      </div>
      <div class="col-sm-3 my-1">
        <div class="form-group">
          <label for="vehi_pla">Placa:</label>
          <input type="text" name="vehi_pla" readonly class="form-control" id="view_vehi_pla"  required autocomplete="off"> 
        </div>
      </div>
      <div class="col-sm-3 my-1">
        <div class="form-group">
          <label for="vehi_col">Color:</label>
          <input type="text" name="vehi_col" readonly class="form-control" id="view_vehi_col"  required autocomplete="off"> 
        </div>
      </div>
  </div>
  <div class="form-row align-items-center">
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="cupo_ref">Cupo</label>
          <input type="text"  name="cupo_ref" readonly class="form-control" id="view_cupo_ref"  required autocomplete="off">
        </div>
      </div>
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_fin">Fecha ingreso</label>
          <input type="date"  name="comp_fin" readonly class="form-control" id="view_comp_fin"  required autocomplete="off">
        </div>
      </div>
    <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_hin">Hora ingreso</label>
        <input type="time" id="view_comp_hin" class="form-control" readonly name="comp_hin"> 
        </div>
      </div>
  </div>
  <div class="form-row align-items-center">
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_fsa">Fecha salida</label>
          <input type="date"  name="comp_fsa" readonly class="form-control" id="view_comp_fsa" required autocomplete="off">
        </div>
      </div>
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_hsa">Hora salida</label>
        <input type="time" class="form-control" readonly name="comp_hsa" id="view_comp_hsa" value="" placeholder=""> 
        </div>
      </div>
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_val">Valor a pagar</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input type="text" id="view_comp_val" readonly class="form-control">
          </div>
        </div>
      </div>
  </div>
</form>