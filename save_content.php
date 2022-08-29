<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$subject = addslashes($_POST['subject']);
		$title = addslashes($_POST['title']);
		$content = addslashes($_POST['content']);
		$Auteur = addslashes($_POST['Auteur']);
		$Téléphone = addslashes($_POST['Téléphone']);

		
		
		mysqli_query($conn, "INSERT INTO `blog` VALUES('','$subject', '$title', '$Auteur', '$Téléphone', '$content')") or die(mysqli_error());
		
		header('location: index.php');
		
	}
?>