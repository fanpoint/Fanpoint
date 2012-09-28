    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
	<h1>Select your city</h1>
	   <form action="" method="post">
		<?php
		$cities = array(
			0 => array(
				'id' => '154',
				'title' => 'Warsaw',
			),
	         	
		); ?>
		<select>
		<?php foreach($cities as $city): ?>
		<option value="<?php echo $city['id']; ?>"><?php echo $city['title']; ?></option>
		<?php endforeach; ?>	
	   </ul>
	   </div>
	   </form>
      </div>

      <footer>
        <p>&copy; Let's Movie! 2012</p>
      </footer>

    </div> <!-- /container -->

