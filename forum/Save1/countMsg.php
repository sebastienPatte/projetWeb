
<?php
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
	print($nbMsgHello);
	print("|");
	print($nbMsgWeb);
?>

