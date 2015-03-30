
<div class="loginscreen">
	
	<form method="post" action="" id="loginForm" autocomplete="off" class="form">
		<fieldset>
			<legend>Login</legend>
			<div class="cols-2">
				<!-- <label for="loginEmail">Email:</label> -->
				<input class="artistenaam" type="text" id="loginEmail" name="loginEmail" value="<?php if(!empty($_POST['loginEmail'])) echo $_POST['loginEmail'];?>" placeholder="Artistenaam"/>
				<span  data-for="loginEmail"><?php
	                if(!empty($errors['loginEmail'])) echo $errors['loginEmail'];
	                ?></span>
			</div>
			<div class="cols-2">
				<!-- <label for="loginPassword">Password:</label> -->
				<input class="wachtwoord" type="password" id="loginPassword" name="loginPassword" placeholder="Wachtwoord"/>
				<span data-for="loginPassword"><?php
	                if(!empty($errors['loginPassword'])) echo $errors['loginPassword'];
	                ?></span>
			</div>
			<div>
				<input class="submit" type="submit" name="action" value="Login" />
			</div>
		</fieldset>
	</form>

</div>
