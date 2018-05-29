<?php
	
	$p1 = $_GET["parametro1"];

	for ($i = 0; $i <  10 ; $i++) { 
		print("Hola PHP " . $i)."<br>";
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Wea</title>
</head>
<body>
	<?php
		print($p1);
	?>
</body>
</html>

