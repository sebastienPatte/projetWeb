<?php
            // affichage des message de bonjour
            $cont = file_get_contents("msghello.txt");

            // on coupe le contenu du fichier avec le caractere de saut de ligne

            $cc = explode("\n", $cont);

            //on affiche ligne apres ligne telle quelle
        foreach ($cc as $k => $v){

              if ($v!=""){
                $cls = explode(":", $v);

                print("<div><b>".$cls[0]."</b> a dit ".$cls[2]."</div>\n");
              }
	}
?>
