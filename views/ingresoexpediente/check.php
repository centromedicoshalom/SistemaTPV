<?php
sleep(1);
include '../../include/dbconnect.php';
if($_REQUEST)
{
	$username 	= $_REQUEST['username'];
	$query = "select * from persona where Dui = '".strtolower($username)."'";
	$results = $mysqli->query( $query) or die('ok');
	
	if($results->fetch_assoc() > 0) // not available
	{
		echo '<div id="Error">Dui Existente</div>';
	}
	else
	{
		echo '<div id="Success">Dui Disponible</div>';
	}
	
}?>