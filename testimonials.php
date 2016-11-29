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
            <div class="large-6 columns story"><h5>Story posted by: Jonathan P.</h5><p>I was a heavy smoker for the past 10 years. I smoked 1.5 packs per day or more and in the past 3 years have tried to quit over and over again. Patches, gum, <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Kris</h5><p>I've been smoking for 20 years.
The only reason I started vaping was so I wouldn't have to go outside for a smoke.
Just realized a few days ago that I haven't<a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Steve</h5><p>After smoking for 52 years, 2-3 packs a day, switching to the ecig was the best thing to happen to me.  I started 6 weeks ago, and already feel better.  Sense <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: CollegeVaper</h5><p>Although I only smoked cigarettes for a year and a few months I knew it was already taking a tole on my health. I would wake up with my sinuses in pain and I <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Rockin Rhonda</h5><p>I tried and tried to quit smoking for several years. My daughter turned me on to vaping and I quit smoking in two days. Now I am so happy, I feel better, I <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Garrigas</h5><p>Hi, I'm 40 years old and from Germany. So please excuse my english.
I'm vaping for 2 month now. Not so long you say, long enough to know that it is my best <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Grish</h5><p>I wonder why there are no negative stories here?
Probably because there are NONE!
Yet every one of us has negative stories from smoking.
Wheezing at night <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Sean</h5><p>I was a 1/2-1 pack a day smoker for several years. I found vaping by chance one evening when a gentleman in the bar was puffing on a device and it had a <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Clark</h5><p>ive been smoking since 2008, almost getting to 2 packs a day, it was mid 2013 when i was jumping to my 3rd pack in one day when i realized i was smoking too <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Nathan Brugmann</h5><p>I was a 2&amp;1/2 pack a day smoker for 22+ years.  I switched to vapor products on July 25th, 2013.  I have not had 1 traditional cigarette since.  I had chronic <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: geIsangDaan</h5><p>It's not me that was smoking, it was my boyfriend. Now that he's quit smoking and started vaping, I feel closer to him. He no longer has to leave the building <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Kyle</h5><p>I quit smoking disgusting cigarettes in November 2013 and never looked back. It's been one of the best things I've ever done for myself, and vaping has opened <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Annemarie</h5><p>I am a x-smoker for a year now. Thanks to e-cigs. I've tried quitting smoking about 7 or 9 times, twice for more than a year. But just could not succeed. E-cigs<a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Cyborg</h5><p>I am an adult of some 50+ years who was a smoker since my school days.
I now use electronic cigarettes and haven’t smoked tobacco for over three years.
When<a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Aaron</h5><p>4 Months on from replacing cigarettes with vaping and I've not had a single desire to smoke another one. If I ever want the taste then some tobacco flavoured <a class="readmorelink" href="#" onClick="alert('This site has been archived, and this information is not available. Sorry!')"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Omar</h5><p>After I lied to everyone and myself that I quit smoking cigarettes, I turned to closet smoking. Big tobacco had such a grip on my life I could not shake until I<a class="readmorelink" href="testimonial-9"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Twistrock</h5><p>I began vaping over 2 years ago after I had lost my job. Since then I have found employment in the growing Vaping Industry, moved down to a Zero Milligram <a class="readmorelink" href="testimonial-8"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Chris</h5><p>Quit smoking 8 months ago. Vaping helped me quit smoking and dipping as well.I am almost completely off of nicotine and this also has become a great hobby.<a class="readmorelink" href="testimonial-7"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Tony</h5><p>I replaced smoking with vaping in December 2013, and have not had a cigarette since. I feel much healthier, and with my rejuvenated senses really enjoy the <a class="readmorelink" href="testimonial-6"> [READ THE REST]</a></p></div><div class="large-6 columns story"><h5>Story posted by: Ian</h5><p>An awesome way to quit smoking and I feel way heathier!<a class="readmorelink" href="testimonial-5"> [READ THE REST]</a></p></div>					</div>
        <div class="large-3 columns">
          <h5>POST YOUR OWN</h5>
          <form name="testimonialform" onClick="alert('This site has been archived, and is no longer accepting new submissions, sorry!')" method="post">
            <div class="row">
              <div class="large-12 columns">
                <label>Nickname
                  <input name="nick" id="nick" placeholder="Leave blank to be anonymous" type="text">
                </label>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <label>E-Mail
                  <input name="youremail" id="youremail" placeholder="Your personal e-mail" type="text">
                </label>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <label>Your testimonial
                  <textarea name="testimonial" id="testimonial" class="testimonialbox" disabled placeholder="This site has been archived, and is no longer accepting new submissions, sorry!"></textarea>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <a class="button tiny success" onclick="verifyform()">Submit testimonial</a>
              </div>
            </div>
          </form>
        </div>
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
