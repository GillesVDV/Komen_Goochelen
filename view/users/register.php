<div class="registerscreen">

	<div class="registercontent">

		<form method="post" action="" id="registerForm" autocomplete="off" class="form" enctype="multipart/form-data">
			<fieldset>
				<legend>Register</legend>
				<div class="cols-2">
					<!-- <label for="registerEmail">Email:</label> -->
					<input class="artistenaam textinput<?php if(!empty($errors['registerEmail'])) echo ' has-error'; ?>" type="text" id="registerEmail" name="registerEmail" value="<?php if(!empty($_POST['registerEmail'])) echo $_POST['registerEmail'];?>" placeholder="Artistenaam"/>
					<span class="error-message<?php if(empty($errors['registerEmail'])) echo ' hidden';?>" data-for="registerEmail"><?php
		                if(!empty($errors['registerEmail'])) echo $errors['registerEmail'];
		                ?></span>
				</div>
				<div class="cols-2">
					<!-- <label for="registerPassword">Password:</label> -->
					<input class="wachtwoord <?php if(!empty($errors['registerPassword'])) echo ' has-error'; ?>" type="password" id="registerPassword" name="registerPassword" placeholder="Wachtwoord"/>
					<span class="error-message<?php if(empty($errors['registerPassword'])) echo ' hidden';?>" data-for="registerPassword"><?php
		                if(!empty($errors['registerPassword'])) echo $errors['registerPassword'];
		                ?></span>
				</div>
				<div class="cols-2">
					<!-- <label for="registerPassword2">Nog eens je passwoord:</label> -->
					<input class="wachtwoord textinput<?php if(!empty($errors['registerPassword2'])) echo ' has-error'; ?>" type="password" id="registerPassword2" name="registerPassword2" placeholder="Wachtwoord herhalen"/>
					<span class="error-message<?php if(empty($errors['registerPassword2'])) echo ' hidden';?>" data-for="registerPassword2"><?php
		                if(!empty($errors['registerPassword2'])) echo $errors['registerPassword2'];
		                ?></span>
				</div>


					<div class="fotoupload">
						<div id="foto-icon"></div>
						<input type="file" name="image" class="imgupload" value="" required class="addvideo">
					</div>
					

					<h2 class="sub-gegevens">Persoonlijke gegevens</h2>

				<div class="cols-2">
					<input class="gemeente" type="text" id="registerPlaats" name="registerPlaats" value="" placeholder="Gemeente"/>
					<span  data-for="registerPlaats"><?php
		                if(!empty($errors['registerPlaats'])) echo $errors['registerPlaats'];
		                ?></span>
				</div>

				<div class="cols-2">
					<input class="straat" type="text" id="registerStraat" name="registerStraat" value="" placeholder="Straat"/>
					<span  data-for="registerStraat"><?php
		                if(!empty($errors['registerStraat'])) echo $errors['registerStraat'];
		                ?></span>
				</div>

				<div class="cols-2">
					<input class="nummer" type="text" id="registerHuisnr" name="registerHuisnr" value="" placeholder="Nr."/>
					<span  data-for="registerHuisnr"><?php
		                if(!empty($errors['registerHuisnr'])) echo $errors['registerHuisnr'];
		                ?></span>
				</div>

				<div class="cols-2">
					<input class="postcode" type="text" id="registerPostcode" name="registerPostcode" value="" placeholder="postcode"/>
					<span  data-for="registerPostcode"><?php
		                if(!empty($errors['registerPostcode'])) echo $errors['registerPostcode'];
		                ?></span>
				</div>

					<h2 class="sub-programma">Programma</h2>

				<div class="programma">
					<label class="intro">Intro Goocheltruc</label>
					<textarea  type="text" id="registerIntro" name="registerIntro" value="" ></textarea>
					<span  data-for="registerIntro"><?php
		                if(!empty($errors['registerIntro'])) echo $errors['registerIntro'];
		                ?></span>
				</div>

				<div class="programma">
					<label class="main">Main Goocheltruc</label>
					<textarea  type="text" id="registerMain" name="registerMain" value=""></textarea>
					<span  data-for="registerMain"><?php
		                if(!empty($errors['registerMain'])) echo $errors['registerMain'];
		                ?></span>
				</div>

				<div class="programma">
					<label class="finale">Finale Goocheltruc</label>
					<textarea  type="text" id="registerFinale" name="registerFinale" value=""></textarea>
					<span  data-for="registerFinale"><?php
		                if(!empty($errors['registerFinale'])) echo $errors['registerFinale'];
		                ?></span>
				</div>

				<div>
					<input class="submit" type="submit" name="action" value="Register" />
				</div>
			</fieldset>
		</form>

	</div>
</div>