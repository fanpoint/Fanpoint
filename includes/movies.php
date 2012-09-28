<?php
// FIX 
$sql = "SELECT * FROM city;";
$results = $db->query($sql);

$date = isset($_GET['date']) ? $_GET['date'] : date('c');
$city = isset($_GET['city']) ? intval($_GET['city']) : '154';

$moviesJson = file_get_contents('http://api.filmaster.pl/1.1/town/'. $city . '/showtimes/'. $date . '?limit=10&include=film');
$movies = json_decode($moviesJson);
$featuredCount = 5;
$i=0;
?>

    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
	<h1>Select your movie</h1>
	   <form action="?action=place" method="post">
		<select>
		<?php foreach($results as $city): ?>
		<option value="<?php echo $city['cit_filmaster_id']; ?>"><?php echo $city['cit_name']; ?></option>
		<?php endforeach; ?>	
		<input type="submit" class="primary" value="Ok" />
	   </ul>
	   </div>
	   </form>
      </div>
	<div class="row-fluid">
	<?php foreach($movies as $movie): ?>
            <ul class="thumbnails">
              <li class="span4">
                <div class="thumbnail">
                  <img src="http://lorempixel.com/200/200/" alt="">
                  <div class="caption">
                    <h3>Film title</h3>
                    <p>Film description</p>
                    <p><a href="#" class="btn btn-primary">Select time</a></p>
                  </div>
                </div>
              </li>
	     <li></li>
            </ul>
	<?php endforeach; ?>	
</div>
      <footer>
        <p>&copy; Let's Movie! 2012</p>
      </footer>

    </div> <!-- /container -->
