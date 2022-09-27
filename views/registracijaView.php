<?php
    logPage("read");
?>
<!-- Main -->

<header class="align-center major special">
	<h2>Registracija</h2>
	<p>Registrujte se da biste mogli da rezervišete posetu</p>
</header>
<form>
	<div class="row uniform 50% align-center" style="margin-left:30%;">
		<div class="6u$">
		<label for="tbIme">Ime</label>
			<input type="text" name="tbIme" id="tbIme" value="" placeholder="Unesite ime"/>
			<p class="greska" id="imeGreska"></p>
		</div>
		<div class="6u$">
		<label for="tbPrezime">Prezime</label>
			<input type="text" name="tbPrezime" id="tbPrezime" value="" placeholder="Unesite prezime"/>
			<p class="greska" id="prezimeGreska"></p>
		</div>
		<div class="6u$">
		<label for="tbEmail">Email</label>
			<input type="email" name="tbEmail" id="tbEmail" value="" placeholder="Unesite email"/>
			<p class="greska" id="emailGreska"></p>
		</div>
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
				<li><input type="button" name="btnReg" id="btnReg" value="Registracija" class="special" /></li>
				<li><input type="reset" id="btnPonisti" value="Poništi" /></li>
			</ul>
		</div>
		<div class="6u$">
			<p id="odgovor"></p>
		</div>
	</div>
</form>