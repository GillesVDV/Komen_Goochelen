<div class="menu folded">

	<div class="menucont">

		<a href="#profiel/<?php  echo $session['id'] ?>">
				<div class="fotomaskgroot">
					<img class="imggroot" src="uploads/images/<?php  echo $session['photo'] ?>.<?php  echo $session['extension'] ?>" alt="<?php  echo $session['photo'] ?>" />
				</div>
		</a>

		<div class="center">
			<a class="profielbtn" href="#profiel/<?php  echo $session['id'] ?>"><?php  echo $session['email'] ?></a>
		</div>


		<div class="centermenu">
			<a class="menulink overzichticon" href="#overzicht">overzicht</a>
			<a class="menulink infoicon" href="#info">info</a>
			<a class="menulink profielicon" href="#profiel/<?php  echo $session['id'] ?>">profiel</a>
			<a class="menulink galerijicon" href="#galerij">galerij</a>
		</div>

		<a href="index.php?page=logout">logout</a>
	</div>
	
</div>

<div class="container">
	
</div>

<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/underscore.min.js"></script>
<script src="js/vendor/moment.min.js"></script>
<script src="js/vendor/backbone.min.js"></script>
<script src="js/app.js"></script>