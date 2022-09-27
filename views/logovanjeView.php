<?php
    logPage("read");
?>
<!-- Main -->

<?php
	if(!isset($_SESSION['korisnik'])):
		echo '
			<header class="align-center major special">
				<h2>Logovanje</h2>
				<p>Popunite formu da biste se ulogovali</p>
			</header>
			<form>
				<div class="row uniform 50% align-center" style="margin-left:30%;">
					<div class="6u$">
					<label for="tbUsername">Username</label>
						<input type="text" name="tbUsername" id="tbUsername" value="" placeholder="Unesite username"/>
						<p class="greska" id="userGreska"></p>
					</div>
					<div class="6u$">
					<label for="tbPassword">Password</label>
						<input type="password" name="tbPassword" id="tbPassword" value="" placeholder="Unesite password"/>
						<p class="greska" id="passGreska"></p>
					</div>
					<div class="6u$">
						<ul class="actions">
							<li><input type="button" name="btnLog" id="btnLog" value="Logovanje" class="special" /></li>
							<li><input type="reset" id="btnPonisti" value="Poništi" /></li>
						</ul>
					</div>
					<div class="6u$">
						<p id="odgovor"></p>
					</div>
				</div>
			</form>';
	endif;
	if(isset($_SESSION['korisnik'])):
		echo '
				<header class="align-center major special">
					<h2>Pozdrav '.$_SESSION['korisnik']->ime.'</h2>
					<p>Ulogovani ste</p>
				</header>
				<div class="align-center">
					<ul class="actions">
						<li><a href="index.php?page=index"><input type="button" value="Početna" class="special align-center" /></a></li>
						<li><a href="models/odjava.php"><input type="button" value="Odjava" /></a></li>
					</ul>
				</div>';
	endif;
?>