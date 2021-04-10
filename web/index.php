<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Prestachope</title>		
	</head>
	<body>
<?php
	session_start();
    $page = "presentation";

  	if(!empty($_GET['page'])) 
  	{
		$page = $_GET['page'];
	}
        include_once 'tools/SuperController.php';
	SuperController::callPage($page);	
?>		
</body>
</html>