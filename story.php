<?php

if(isset($_POST['nick']) ==true) {
  $con=mysqli_connect("localhost","username","password","databasename");
  if($_POST['testimonial'] != "") {
    // Check connection
    if (mysqli_connect_errno()) {
      /* DEBUG echo "Failed to connect to MySQL: " . mysqli_connect_error();*/
      echo("We're sorry, but something's gone wrong. Rest assured we're running around with our hair on fire trying to sort it out. In the meantime, feel free to email us at backupa76@gmail.com instead!");
    } else {
      /*successful connection*/
      $timestamp = date('Y-m-d G:i:s');
      $nick = mysqli_real_escape_string($con, $_POST['nick']);
      $youremail = mysqli_real_escape_string($con, $_POST['youremail']);
      $testimonial = mysqli_real_escape_string($con, $_POST["testimonial"]);
      echo($timestamp.$nick.$youremail);
      mysqli_query($con,"INSERT INTO testimonials (ID, DATEPOSTED, NAME, EMAIL, TESTIMONIAL) VALUES ('', Now(), '$nick', '$youremail','$testimonial')");
      header("Location: http://notsoeducated.org/thankyou.php");
      die();
    }
  } else {
  }
} else {
}
$con=mysqli_connect("localhost","username","password","databasename");
if (mysqli_connect_errno()) {
  /* DEBUG echo "Failed to connect to MySQL: " . mysqli_connect_error();*/
  echo("We're sorry, but something's gone wrong. Rest assured we're running around with our hair on fire trying to sort it out. In the meantime, feel free to email us at backupa76@gmail.com instead!");
} else {
  $storyid = $_GET["storyid"];
  $result = mysqli_query($con,"SELECT * FROM testimonials WHERE Published=1 AND ID=$storyid");
  while($row = mysqli_fetch_array($result)) {
  	$arrayOfRows[] = $row;
  }
  $numberOfResults = count($arrayOfRows);
  if($numberOfResults==0) {
  	header('Location: http://notsoeducated.org/testimonials.php');
  	die();
  }
}

mysqli_close($con);

?>
<!doctype html>
<html class="no-js" lang="en">

	<head>
	<title> <?php echo $arrayOfRows[0]["NAME"]?>'s Story - Not So Educated</title>
	<meta name="description" content="<?php echo $arrayOfRows[0]["TESTIMONIAL"]?>" />
	<meta property="og:title" content="<?php echo $arrayOfRows[0]["NAME"]?>s Story - Not So Educated" />
	<meta property="og:description" content="<?php echo $arrayOfRows[0]["TESTIMONIAL"]?>" />
	<?php include("includes/header.php"); ?>
	</head>

	<body>
		<div class="row bgcontainer">

			<?php include("includes/menu.php"); ?>

			<div class="textcon">
			<h1>TESTIMONIALS</h1>
			<h5>Here you can find stories posted by vapers about how vaping has affected them.</h5>
				<div class="row">
					<div class="large-9 columns">
							<?php
							$itera = 0;
								echo("<div class='story'><h5>Story posted by: ".$arrayOfRows[$itera]["NAME"]."</h5><p>".$arrayOfRows[$itera]["TESTIMONIAL"]."<a class='readmorelink' href='testimonials'> [GO BACK]</a></p></div>");

							?>
					</div>
					<div class="large-3 columns">
						<h5>POST YOUR OWN</h5>
						<form name="testimonialform" action="testimonials.php" method="post">
							<div class="row">
								<div class="large-12 columns">
									<label>Nickname
										<input name="nick" id="nick" type="text" placeholder="Leave blank to be anonymous" />
									</label>
								</div>
							</div>
							<div class="row">
								<div class="large-12 columns">
									<label>E-Mail
										<input name="youremail" id="youremail" type="text" placeholder="Your personal e-mail"/>
									</label>
								</div>
							</div>
							<div class="row">
								<div class="large-12 columns">
									<label>Your testimonial
										<textarea name="testimonial" id="testimonial" class="testimonialbox" placeholder="Tell us about your vaping experiences."></textarea>
									</label>
								</div>
							</div>
							<div class="row">
								<div class="large-12 columns">
									<a class="button tiny success" onClick="verifyform()">Submit testimonial</a>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php include("includes/credits.php"); ?>
			</div>
		</div>
		<?php include("includes/mymodal.php"); ?>
		<script src="js/vendor/jquery.js"></script>
		<script src="js/facts.js"></script>
		<script src="js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>
