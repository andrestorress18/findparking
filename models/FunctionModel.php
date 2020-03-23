<?php
class FunctionModel {
    public function ventana_modal($id, $data = array(), $size, $title, $form) {
        $num_tit = empty($data) ? 0 : count($data);
        $modal = "<div class='modal fade ";
        if ($size != "") {
            $modal .= "bd-example-modal-" . $size;
        }
        $modal .= "' id='Modal-" . $id . "' tabindex='-1' role='dialog' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered ";
        if ($size != "") {
            $modal .= "modal-" . $size;
        }
        $modal .= "' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='modaltitle'>" . $title . "</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'>";
        echo $modal;
        $form_dir = "./views/forms/" . $form . ".php";
        include "$form_dir";
        echo "</div>
            </div>
          </div>
        </div>";
        if ($id <> 'add') {
            echo "<script type='text/javascript'>
                      $('#Modal-".$id."').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                      var modal = $(this)
                      var name = button.data('name')
                      modal.find('.modal-title').text('" . $title . " ' + name)\n";
                      for ($i=0; $i < $num_tit; $i++) {
                        echo "var ".$data[$i]." = button.data('".$data[$i]."')
                            modal.find('.modal-body input#".$id."_".$data[$i]."').val(".$data[$i].")\n";
                        if(strpos($data[$i], "_esta_fk") || strpos($data[$i], "_banc_fk") || strpos($data[$i], "_tipo_fk") || strpos($data[$i], "_espe_fk")){
                            echo "document.getElementById('".$id."_".$data[$i]."').options.item(".$data[$i].").selected = 'selected';\n";
                        }else if(strpos($data[$i], "_des") || strpos($data[$i], "_con")){
                            echo "document.getElementById('".$id."_".$data[$i]."').value = ".$data[$i].";\n";
                        }else{
                            echo "modal.find('.modal-body input#".$id."_".$data[$i]."').val(".$data[$i].")\n";
                        }
                      }
                      if ($id == "edi" && strpos($title, 'usuario')) {
                        echo "cargar_listas();";
                      } 
                    echo"})
                </script>
            ";            
        }else if (isset($data)) {
            echo "<script type='text/javascript'>
                      $('#Modal-".$id."').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                      var modal = $(this)
                      modal.find('.modal-title').text('" . $title . " ')\n";
                      for ($i=0; $i < $num_tit; $i++) { 
                      echo "modal.find('.modal-body input#".$id.'_'.$data[$i]."').val('')\n";
                      }
                      echo "})
                </script>
            ";
        }
    }
    public function dateText($date = '', $day = '', $day_month = '', $year = '', $hour = '') {
        $week_days = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
        $months    = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        if ($date != '') {
            $year_now   = date("Y", strtotime($date));
            $month_now  = date("n", strtotime($date));
            $day_now    = date("j", strtotime($date));
            $hour_now   = date("h");
            $minute_now = date("i");
            $indi_now   = date("a");
        } else {
            $year_now   = date("Y");
            $month_now  = date("n");
            $day_now    = date("j");
            $hour_now   = date("h");
            $minute_now = date("i");
            $indi_now   = date("a");
        }
        $week_day_now = date("w");
        $dateText     = '';
        if ($day != 'no') {
            $dateText .= $week_days[$week_day_now];
        }
        if ($day_month != 'no') {
            $dateText .= $day_now . " de " . $months[$month_now];
        }
        if ($year != 'no') {
            $dateText .= " del " . $year_now;
        }
        if ($hour != 'no') {
            $dateText .= ", hora: " . $hour_now . ":" . $minute_now . " " . $indi_now;
        }

        return $dateText;
    }

    public function validateImg($file = array(), $id, $folder ){
      $typePermitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");
      $tamanoLimite  = 2000;
      if (in_array($file['type'], $typePermitido) && $file['size'] <= $tamanoLimite * 1024) {
          $carpeta = "./public/img/".$folder."/" . $id . "/";
          $destino = $carpeta . $file['name'];
          $url_file = "public/img/".$folder."/" . $id . "/" . $file['name'];
          if (!file_exists($carpeta)) {
              mkdir($carpeta);
          }
          if (!file_exists($destino)) {
              copy($file['tmp_name'], $destino);
              return $url_file;
          } else {
              return "existe";
          }
      } else {
          return "nopermitido";
      }
    }

    public function alertas($text, $type){
        if ($type == "pos") {
            echo "<div class='alert alert-pos'><div class='alert-conten'><span class='fa fa-check-circle'></span><p>" . $text . "</p></div></div>";
        } else if ($type == "neg") {
            echo "<div class='alert alert-neg'><div class='alert-conten'><span class='fa fa-exclamation-triangle'></span><p>" . $text . "</p></div></div>";
        }
    }
    public function color_rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        $rgb = $r.",".$g.",".$b;
        return $rgb;
    }
}