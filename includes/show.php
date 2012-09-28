<?php
// FIX 
$date = isset($_GET['date']) ? date($_GET['date']) : date('Y-m-d');
$city = isset($_GET['city']) ? intval($_GET['city']) : '154';
$api = 'http://api.filmaster.pl';
$url = $api . '/1.1/town/'. $city . '/showtimes/'. $date . '/?limit=10&include=film,channels.channel';
$moviesJson = file_get_contents($url);
$movies = json_decode($moviesJson, true);
$movies = $movies['objects'];
echo "<pre>";
// var_dump($moviesJson);
echo "</pre>";
?>

    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
	<h1>Select your movie</h1>
      </div>
	<div class="row-fluid">
	<?php foreach($movies as $movie): ?>
            <ul class="thumbnails">
              <li class="span4">
                <div class="thumbnail">
                  <img src="<?php echo $api . $movie['film']['image']; ?>" alt=""/>
                  <div class="caption">
                    <h3><?php echo $movie['film']['title']; ?></h3>
                    <p><?php echo $movie['film']['description']; ?></p>
		    <form method="post">
			<input type="hidden" name="resource_uri" value="<?php echo $api . $movie['film']['resource_uri']; ?>" />
			<input type="submit" value="Select" name="submit" />
		    </form>
                  </div>
                </div>
              </li>
            </ul>
	<?php endforeach; ?>	
</div>
      <footer>
        <p>&copy; Let's Movie! 2012</p>
      </footer>

   </div> <!-- /container -->
