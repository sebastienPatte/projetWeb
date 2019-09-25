 <?php
            // pareil pour les message sur la forme du site
            $cont = file_get_contents("msgweb.txt");

            $cc = explode("\n", $cont);
            foreach ($cc as $k => $v){
              if ($v!=""){

                  $cls = explode(":", $v);

                  print("<div><b>".$cls[0]."</b> a dit ".$cls[2]."</div>\n");
              }

            }
?>
