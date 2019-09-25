<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <title>webpage Fred. Vernier </title>

    <link  href="style2.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      	<?php
        	// on recupere les 3 variables du dernier message
		if (isset($_GET["type"])){
        	$t = $_GET["type"];
		}
	        if (isset($_GET["nom"])){
		$n = $_GET["nom"];
		}
	        if (isset($_GET["msg"])){
			$m = $_GET["msg"];
		}

	        // selon le type on le rajoute au bon fichier

	        if (isset($t) and $t=="hello"){

	          $cont = file_get_contents("msghello.txt");

        	  // ... en concatenant le fichier existant avec une nouvelle ligne

	          $cont = $cont.$n.":".date("Y-m-d-H-i-s").":".$m."\n";

        	  file_put_contents("msghello.txt", $cont);

	        } else if (isset($t) and $t=="web"){

	          $cont = file_get_contents("msgweb.txt");

	          $cont = $cont.$n.":".date("Y-m-d-H-i-s").":".$m."\n";

	          file_put_contents("msgweb.txt", $cont);

	        } else if (isset($t) and $t=="prive" and $n!="fred" and $m!="topsecret"){

	          $cont = file_get_contents("msgprive.txt");

	          $cont = $cont.$n.":".date("Y-m-d-H-i-s").":".$m."\n";

        	  file_put_contents("msgprive.txt", $cont);

	        }
		// on compte les messages sur la page
		 $file="msghello.txt";
                $nbMsgHello = -1;
                $handle = fopen($file, "r");
                while(!feof($handle)){
                        $line = fgets($handle);
                        $nbMsgHello++;
                }
                $file="msgweb.txt";
                $nbMsgWeb = -1;
                $handle = fopen($file, "r");
                while(!feof($handle)){
                        $line = fgets($handle);
                        $nbMsgWeb++;
                }
      ?>


  </head>

  <body onload="init()">


        <script>
        //fonction AJAX qui demande le nb de messages au scrpit "countMsg.php" et affiche le résultat dans 
	//les balises  #test
	        function init(){
                        $.ajax({
                        type:'post',
                        url:"countMsg.php",
                        success:function(data){
                                var res = data.split("|");
                                document.getElementById("nbMsgHello").innerHTML = res[0]-<?php print($nbMsgHello)?>;
				document.getElementById("nbMsgWeb").innerHTML = res[1] - <?php print($nbMsgWeb); ?>

                        }
                        })
			$.ajax({
                        type:'post',
                        url:"newMsgHello.php",
                        success:function(data){
                                document.getElementById("printMsgHello").innerHTML = data;
			}
			})
			$.ajax({
                        type:'post',
                        url:"newMsgWeb.php",
                        success:function(data){
                                document.getElementById("printMsgWeb").innerHTML = data;
                        }
                        })
                        setTimeout(init,5000);
                }
        </script>

      <h1>Forum</h1>

      <div>Entrez un message dans l'une des trois colonnes pour me dire bonjour, me donner votre avis sur mon site web ou bien m'envoyer un message personnel.</div>

      <!-- Le haut du tableau est statique avec des titres et 3 formulaires -->

      <table border="1">

        <tr>
		<th colspan="2"> Hello 
				<?php print($nbMsgHello);?> + 
				<a href="forum.php" id="nbMsgHello" class="nbMsg"></a>
		</th>
		<th colspan="2"> Site web 
				<?php print($nbMsgWeb); ?> + 
				<a href="forum.php" id="nbMsgWeb" class="nbMsg"></a>
		</th>
		<th colspan="2"> Privé</th>
	</tr>

        <tr>
		<td>Nom</td>
		<td>Message</td>
		<td>Nom</td>
		<td>Message</td>
		<td>Nom</td>
		<td>Message</td>
	</tr>

        <tr>

          <form action ="forum.php" method="GET">

            <td>

              <input type="hidden" name="type" value="hello"/>

              <input type="text"   name="nom"/>

            </td>

            <td>

              <input type="text"   name="msg"/>

              <input type="submit" value="Publier"/>

            </td>

          </form>



          <form action ="forum.php" method="GET">

            <td>

              <input type="hidden" name="type" value="web"/>

              <input type="text"   name="nom"/>

            </td>

            <td>

              <input type="text" name="msg"/>

              <input type="submit" value="Publier"/>

            </td>

          </form>



          <form action ="forum.php" method="GET">

            <td>

              <input type="hidden" name="type" value="prive"/>

              <input type="text" name="nom"/>

            </td>

            <td>

               <input type="text" name="msg"/>

               <input type="submit" value="Publier"/>

            </td>

          </form>

        </tr>

        <tr>

          <td colspan="2" id="printMsgHello"></td>


          <td  colspan="2" id="printMsgWeb"></td>


          <td  colspan="2">

            <?php

            // Pour les messages prives il faut mettre un certain nom et message qui sert de mot de passe

            if (isset($t) and $n=="fred" and $m=="topsecret"){

              $cont = file_get_contents("msgprive.txt");

              $cc = explode("\n", $cont);

              foreach ($cc as $k => $v){

                if ($v!=""){

                  $cls = explode(":", $v);

                  print("<div><b>".$cls[0]."</b> a dit ".$cls[2]."</div>\n");

                }

              }

            } else {

              print("<div>Le contenu des message privés<br> est reservé au gestionnaire du site</div>");

            }



            ?>

          </td>

      </tr>

     </table>

  </body>

</html>
