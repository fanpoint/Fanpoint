<?php include('header.php'); ?>
    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
	<h1>Select friends</h1>
        <p><a class="btn btn-primary btn-large">Login with facebook</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span12">
	   <form action="invite.php" method="post">
	   <ul class="thumbanils">
		<?php
		$users = array(
			'test' => array (
				'img' => '123',
			)
	         	
		); ?>
		<?php foreach($users as $user): ?>
		<li>
		<img src="http://lorempixel.com/50/50/people/" />
                <p>Name Surname</p>
		<input type="checkbox" name="" /> 
                </li>
		<?php endforeach; ?>	
	   </ul>
	   </div>
	   </form>
      </div>

      <hr>

      <footer>
        <p>&copy; Let's Movie! 2012</p>
      </footer>

    </div> <!-- /container -->
<?php include('footer.php'); ?>
