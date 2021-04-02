<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Prestachope</title>		
	</head>
	<body>
<?php
	session_start();
    $page = "connexion";

  	if(!empty($_GET['page'])) 
  	{
		$page = $_GET['page'];
	}
	SuperController::callPage($page);	
?>		
</body>
</html>