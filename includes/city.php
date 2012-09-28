    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
	<h1>Select your city</h1>
	   <form action="?action=place" method="post">
		<?php
		$sql = "SELECT * FROM city;";
		$results = $db->query($sql);
		?>
		<select>
		<?php foreach($results as $city): ?>
		<option value="<?php echo $city['cit_filmaster_id']; ?>"><?php echo $city['cit_name']; ?></option>
		<?php endforeach; ?>	
		<input type="submit" class="primary" value="Ok" />
	   </ul>
	   </div>
	   </form>
      </div>

      <footer>
        <p>&copy; Let's Movie! 2012</p>
      </footer>

    </div> <!-- /container -->

