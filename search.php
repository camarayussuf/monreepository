<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
?>
<div>
	
	<hr style="border-top:0px dotted #ccc;"/>
		<h4 style="color:#fff; border:solide; border-color:#4cae4c; border-radius:4px; background-color:#5cb85c; font-family:inherit; font-size:16px; display:inline-block; padding:6px 12px; vertical-align:middle; width:100%; ">Résultats</h4>
	
	<?php
		require 'conn.php';
		$query = mysqli_query($conn, "SELECT * FROM `blog` WHERE `subject`  LIKE '%$keyword%' OR `content`  LIKE '%$keyword%' ORDER BY `blog_id`") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	<div style="word-wrap:break-word;">
		<a href="get_blog.php?id=<?php echo $fetch['blog_id']?>"><h4><?php echo $fetch['title']?></h4></a>
		<p><?php echo substr($fetch['content'], 0, 100)?>...</p>
	</div>
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}
?>