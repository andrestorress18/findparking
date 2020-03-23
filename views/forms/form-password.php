<form method="post">
  <div class="form-group">
    <label for="pass_act">Contraseña actual</label>
    <input type="password" name="pass_act" class="form-control" id="pass_act">
  </div>
  <div class="form-group">
    <label for="pass_new">Nueva contraseña</label>
    <input type="password" disabled="true" name="pass_new" class="form-control" id="pass_new">
  </div>
  <div class="form-group">
    <label for="pass_new2">Confirmar nueva contraseña</label>
    <input type="password" disabled="true" name="pass_new2" class="form-control" id="pass_new2">
  </div>
  <center>
    <div id="alert-div" class="" role="alert"><strong><div id="alert"></div></strong> 
    </div>
    <button type="submit" id="btn_cambiar" disabled="true" class="btn btn-primary mb-2">Cambiar</button>
  </center>
  <input type="hidden" name="user_id" value="<?php echo($_SESSION['usua_cod']); ?>">
  <input type="hidden" name="crud" value="edit-pass">
</form>
<script type="text/javascript">
	document.getElementById('pass_act').addEventListener('input', function(evt) {
    const pass_act = evt.target,
          alert = document.getElementById('alert'),
          alert_div = document.getElementById('alert-div'),
          inp = document.getElementById('pass_new'),
          inp2 = document.getElementById('pass_new2'),
          btn = document.getElementById('btn_cambiar');
    inp.value = "";
    inp2.value = "";
    inp.disabled = true;
    inp2.disabled = true;
    if (('<?php echo ($_SESSION['usua_pas']); ?>')==(MD5(pass_act.value))) {
      alert_div.className = ' alert alert-success';
      alert.innerText = "Contraseña actual correcta";
      inp.disabled = false;
    } else {
      alert_div.className = ' alert alert-danger';
      alert.innerText = "Contraseña actual incorrecta";
      btn.disabled = true;
    }
  });
	document.getElementById('pass_new').addEventListener('input', function(evt) {
    	const pass_new = evt.target,
    	alert = document.getElementById('alert'),
      alert_div = document.getElementById('alert-div'),
      btn = document.getElementById('btn_cambiar'),
      inp = document.getElementById('pass_new2'),
      regex = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
    inp.value = "";
    inp.disabled = true;
    btn.disabled = true;
    if (regex.test(pass_new.value)) {
      alert_div.className = "";
      alert.innerText = "";
      inp.disabled = false;
    } else {
      alert_div.className = ' alert alert-danger';
      alert.innerText = 'Verifique que su nueva contraseña tenga minimo una letra mayuscula, una minuscula y un numero';
      inp.disabled = true;
      btn.disabled = true;
    }
  });
  document.getElementById('pass_new2').addEventListener('input', function(evt) {
    const pass_new2 = evt.target,
          alert = document.getElementById('alert'),
          alert_div = document.getElementById('alert-div'),
          btn = document.getElementById('btn_cambiar'),
          pass = document.getElementById('pass_new');
    if ((pass.value)==(pass_new2.value)) {
      alert_div.className = ' alert alert-success';
      alert.innerText = "Las contraseñas coinciden";
      btn.disabled = false;
    } else {
      alert_div.className = ' alert alert-danger';
      alert.innerText = "Las contraseñas no coinciden";
      btn.disabled = true;
    }
  });
</script>