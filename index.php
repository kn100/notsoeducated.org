<!doctype html>
<html class="no-js" lang="en">
	<head>
	<title>Not So Educated - E-cigarette vaping educational resource - What are we vaping?</title>
	<meta name="description" content="Not So Educated - E-cigarette information and facts. Find out more about vaping, e-juice, the chemicals used, and more." />
	<meta property="og:title" content="Not So Educated - A Truthful and Educational Resource for Information about E-Cigarettes" />
	<meta property="og:description" content="A website dedicated to sharing knowledge about e-cigarettes and vaping for the everyday person. Are you concerned about someone starting to use e-cigarettes check out our website first!" />
	<?php include("includes/header.php"); ?>
	</head>
	<body>
		<script>
			window.onload = function() {
  				goToCorrectFact();
			};
		</script>
		<div class="row bgcontainer">
			
			<?php include("includes/menu.php"); ?>
			
			<div class="textcon" id="bgimageholder">
				<div class="homemagic">
					<div class="introtext" id="intro">
						<h4>E-cigarettes are about as safe as other smoking cessation<br/>products approved by the FDA. Compared to cigarettes, they are</h4>
					</div>
					<div class="mobileimage" id="mobim">
						<img src="img/1.png" width="40%" height="40%">
					</div>
					<div class="bigtext" id="fact">
						<h1>MUCH LESS TOXIC</h1>
					</div>
					<div class="small-12 columns smallertext" id="factjustifier">
						<h3> "Cadmium, lead and nickel have also been detected but in trace levels only, comparable with levels in Nicorette inhalers"</h3>
					</div>
					<div class="citation" id="citation">
						Citation: <a href="http://www.ncbi.nlm.nih.gov/pmc/articles/PMC3850892/">A fresh look at tobacco harm reduction - US National Library of Medicine</a>
					</div>
				</div>
				<div class="buttons">
					<a class="button" onclick="getmore('add')">What else should I know?</a>
				</div>
				<?php include("includes/credits.php"); ?>				
			</div>
		</div>
		<div class="hidden">
			<script type="text/javascript">
				<!--//--><![CDATA[//><!--
					var images = new Array()
					function preload() {
						for (i = 0; i < preload.arguments.length; i++) {
							images[i] = new Image()
							images[i].src = preload.arguments[i]
						}
					}
					preload(
						"http://notsoeducated.org/img/1.png",
						"http://notsoeducated.org/img/2.png",
						"http://notsoeducated.org/img/3.png",
						"http://notsoeducated.org/img/4.png",
						"http://notsoeducated.org/img/5.png",
						"http://notsoeducated.org/img/6.png",
						"http://notsoeducated.org/img/7.png",
						"http://notsoeducated.org/img/8.png",
						"http://notsoeducated.org/img/9.png",
						"http://notsoeducated.org/img/10.png",
						"http://notsoeducated.org/img/11.png"
					)
				//--><!]]>
			</script>
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
