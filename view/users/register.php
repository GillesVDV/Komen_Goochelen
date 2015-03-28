<form method="post" action="" id="registerForm" autocomplete="off" class="form" enctype="multipart/form-data">
	<fieldset>
		<legend>Register</legend>
		<div class="cols-2">
			<label for="registerEmail">Email:</label>
			<input class="textinput<?php if(!empty($errors['registerEmail'])) echo ' has-error'; ?>" type="text" id="registerEmail" name="registerEmail" value="<?php if(!empty($_POST['registerEmail'])) echo $_POST['registerEmail'];?>" />
			<span class="error-message<?php if(empty($errors['registerEmail'])) echo ' hidden';?>" data-for="registerEmail"><?php
                if(!empty($errors['registerEmail'])) echo $errors['registerEmail'];
                ?></span>
		</div>
		<div class="cols-2">
			<label for="registerPassword">Password:</label>
			<input class="textinput<?php if(!empty($errors['registerPassword'])) echo ' has-error'; ?>" type="password" id="registerPassword" name="registerPassword" />
			<span class="error-message<?php if(empty($errors['registerPassword'])) echo ' hidden';?>" data-for="registerPassword"><?php
                if(!empty($errors['registerPassword'])) echo $errors['registerPassword'];
                ?></span>
		</div>
		<div class="cols-2">
			<label for="registerPassword2">Nog eens je passwoord:</label>
			<input class="textinput<?php if(!empty($errors['registerPassword2'])) echo ' has-error'; ?>" type="password" id="registerPassword2" name="registerPassword2" />
			<span class="error-message<?php if(empty($errors['registerPassword2'])) echo ' hidden';?>" data-for="registerPassword2"><?php
                if(!empty($errors['registerPassword2'])) echo $errors['registerPassword2'];
                ?></span>
		</div>

		<fieldset>

				<label for="image" class="label">Image</label><br/>
				<input type="file" name="image" class="imgupload" value="" required class="addvideo">

			</fieldset>

		<div>
			<input class="submit-btn" type="submit" name="action" value="Register" />
		</div>
	</fieldset>
</form>