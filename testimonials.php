<?php

function first50words($string) {
  $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
  $parts_count = count($parts);

  $length = 0;
  $last_part = 0;
  for (; $last_part < $parts_count; ++$last_part) {
    $length += strlen($parts[$last_part]);
    if ($length > 160) { break; }
  }

  return implode(array_slice($parts, 0, $last_part));
}

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
  $result = mysqli_query($con,"SELECT * FROM testimonials WHERE Published=1");
  while($row = mysqli_fetch_array($result)) {
  	$arrayOfRows[] = $row;
  }
  $numberOfResults = count($arrayOfRows);
}

mysqli_close($con);

?>
<!doctype html>
<html class="no-js" lang="en">

	<head>
	<title>Your stories - Not So Educated</title>
	<meta name="description" content="Read what people are saying about e-cigarettes right now. Read others stories about them, and the effects they've had on health!" />
	<meta property="og:title" content="Your stories - Not So Educated" />
	<meta property="og:description" content="Read what people are saying about e-cigarettes right now. Read others stories about them, and the effects they've had on health!" />
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
							$itera = $numberOfResults-1;
							while($itera >= 0) {
								echo("<div class='large-6 columns story'><h5>Story posted by: ".$arrayOfRows[$itera]["NAME"]."</h5><p>".first50words($arrayOfRows[$itera]["TESTIMONIAL"])."<a class='readmorelink' href='testimonial-".$arrayOfRows[$itera]["ID"]."'> [READ THE REST]</a></p></div>");
								$itera--;
							}
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
