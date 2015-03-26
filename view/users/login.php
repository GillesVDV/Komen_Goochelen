<form method="post" action="" id="loginForm" autocomplete="off" class="form">
	<fieldset>
		<legend>login</legend>
		<div class="cols-2">
			<label for="loginEmail">Email:</label>
			<input class="textinput<?php if(!empty($errors['loginEmail'])) echo ' has-error'; ?>" type="text" id="loginEmail" name="loginEmail" value="<?php if(!empty($_POST['loginEmail'])) echo $_POST['loginEmail'];?>" />
			<span class="error-message<?php if(empty($errors['loginEmail'])) echo ' hidden';?>" data-for="loginEmail"><?php
                if(!empty($errors['loginEmail'])) echo $errors['loginEmail'];
                ?></span>
		</div>
		<div class="cols-2">
			<label for="loginPassword">Password:</label>
			<input class="textinput<?php if(!empty($errors['loginPassword'])) echo ' has-error'; ?>" type="password" id="loginPassword" name="loginPassword"/>
			<span class="error-message<?php if(empty($errors['loginPassword'])) echo ' hidden';?>" data-for="loginPassword"><?php
                if(!empty($errors['loginPassword'])) echo $errors['loginPassword'];
                ?></span>
		</div>
		<div>
			<input class="submit" type="submit" name="action" value="Login" />
		</div>
	</fieldset>
</form>