<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
		
		<script> 
			$.ajax({
                        type:'post',
                        url:"getDessin.php",
                        success:function(data){
                                console.log(data)
                                var c = document.getElementById("dessin");
                                var ctx = c.getContext("2d");
								
								
								ctx.moveTo(data.forme.x[0]*c.width , data.forme.y[0]*c.height);
								var i;
								for (i=1; i<(data.forme.x.length);i++){
								
	                                ctx.lineTo(data.forme.x[i]*c.width , data.forme.y[i]*c.height);
	                                ctx.stroke();
	                                ctx.moveTo(data.forme.x[i]*c.width , data.forme.y[i]*c.height);
	                            
	                            }
                                
			}
            })
            
		</script>
		<canvas id="dessin" width="500" height="500">
	
  </body>
</html>

