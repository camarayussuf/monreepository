<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>

<body>
			<form class="form-inline" method="POST" action="index.php">

				<div class="col-md-3"></div>
				<div class="col-md-6 well">
				<div class="col-md-1"></div>

			
					<div style="position:middle; margin:50px;">
						<a href="index.php"><img src="images/logo1.png" alt="image"></a>
					</div>

				<div class="input-group col-md-12">
					<input type="text" class="form-control" placeholder="Chercher un sujet..." name="keyword" required="required" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
					<span class="input-group-btn">
						<button class="btn btn-success" name="search"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>

				<?php include 'search.php'?>

					
					<hr style="border-top:0px dotted #ccc;"/>
						<h4 style="color:#fff; border:solide; border-color:#4cae4c; border-radius:4px; background-color:#5cb85c; font-family:inherit; font-size:16px; display:inline-block; padding:6px 12px; vertical-align:middle; width:100%; ">Articles récents </h4>

				<div>

					<?php
						require 'conn.php';
						$query = mysqli_query($conn, "SELECT * FROM `blog` ORDER BY `blog_id` DESC LIMIT 0,20") or die(mysqli_error());
						while($fetch = mysqli_fetch_array($query)){
					?>
					<div style="word-wrap:break-word;">
						<a href="get_blog.php?id=<?php echo $fetch['blog_id']?>"><h4><?php echo $fetch['title']?></h4></a>
						<p><?php echo substr($fetch['content'], 0, 100)?>...</p>
						Publié par : <?php echo $fetch['Auteur']?></h4></a> Contact : <?php echo $fetch['Téléphone']?></h4></a>
						
					</div>
						<hr style="border-bottom:1px solid #ccc;"/>
					<?php
						}
					?>
				</div>


				</p>


	<div class="col-md-10">
		<center><p>
			<h5>Avez-vous un article ?</h5>  <h5>Ecrivez-le vite et publiez-le sur notre blog</h5><br>
		</p></center>
		<center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal">Ajouter un article</button></center><br>

	</div><br>



<div>
	
<center><h6 style="color:red; border:solide; border-color:#4cae4c; border-radius:4px; background-color:#5cb85c; font-family:inherit; font-size:16px; display:inline-block; padding:6px 12px; vertical-align:middle; width:100%; "> 
	Made by Yussuf Bubu CAMARA for  
	<a href="index.php" class="font-weight-bold" target="_blank">blogrim.mr</a> 2022
</h6></center>
</div>
			</form>



	</div>
	<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<form action="save_content.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Sujet</label>
								<input type="text" class="form-control" name="subject" required="required"/>
							</div>
							<div class="form-group">
								<label>Titre</label>
								<input type="text" class="form-control" name="title" required="required"/>
							</div>
							<div class="form-group">
								<label>Auteur</label>
								<input type="text" class="form-control" name="Auteur" required="required"/>
							</div>


							<div class="form-group">
								<label>Téléphone</label>
								<input type="text" class="form-control" name="Téléphone" required="required"/>
							</div>

							<div class="form-group">
								<label>Contenu</label>
								<textarea class="form-control" style="resize:none; height:250px;" name="content" required="required"></textarea>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Fermer</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>


</body>
</html>