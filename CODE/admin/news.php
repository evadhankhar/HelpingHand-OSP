<?php
	include("./includes/session_check.php");
	include("./includes/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="../images/logo_icon.png" />
	<title>Admin Panel - Helping Hand</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/style_form.css">
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" id="logo"><img src="./images/mylogo.png" alt="logo"></a>
			<ul>
				<li><a href="home.php">Donations</a></li>
				<li><a href="upload_media.php">Upload Media</a></li>
				<li class="current"><a>News</a></li>
				<li><a href="events.php">Events</a></li>
				<li><a href="ngo_activities.php">NGO Activities</a></li>
				<li class="log_btn"><a href="./logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="admin_manages">
			<h3>News Updates</h3><hr>
			<form action="insert_news.php" method="post" enctype="multipart/form-data" class="user">
			<label>Date</label>
			<input type="date" name="news_date">
			<label>Time</label>
			<input type="time" name="news_time">
			<label>Heading</label>
			<input type="text" name="news_heading">
			<label>Description</label>
			<textarea rows="5" name="news_description"></textarea>
			<input type='submit' value='post'>
			</form>
			<div class="stored">
				<h4>Posted News</h4><hr>
				<?php
					$sql = "SELECT * FROM news ORDER BY date DESC";
					$result = mysqli_query($con,$sql);
					$count=1;
					while($rs = mysqli_fetch_array($result)){
						if($count<=4){
						?>
						<a>
							<div>
								<span><?php echo $rs['heading']; ?></span>
								<span style="color: white;background-color: black;"><?php echo $rs['description']; ?></span>
							</div>
						</a>
						<?php
						}
						$count++;
					}
				?>
			</div>
		</div>
	</div>
	<?php	include("./includes/footer.html");	?>
</body>
</html>