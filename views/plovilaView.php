<?php
    logPage("read");
?>
<!-- Main -->
		
<section id="main" class="wrapper container">
	<header class="align-center major special">
		<h2>Jahte</h2>
		<p>Pogledajte naše nove jahte</p>
	</header>
	<div id="jahte">
		<?php
			global $conn;
			$upit="SELECT * FROM plovila p INNER JOIN tipovi t ON p.id_tip=t.id_tip INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac INNER JOIN slike s ON p.id_plovila=s.id_plovila WHERE t.naziv='jahta' AND s.tip='exterior'";
			$podaci=$conn->query($upit)->fetchAll();
			foreach($podaci as $red):
		?>
			<div class="plovilo">
				<h4 class="align-center"><?=$red->naziv.' '.$red->model?></h4>
				<a href="<?=$red->src?>" class="group1" title="<?=$red->naziv.' '.$red->model?>"><img src="<?=$red->src?>" alt="<?=$red->alt?>"/></a>
				<p><?=$red->opis?></p>
			</div>
		<?php
			endforeach;
		?>
	</div>
	<header class="align-center major special">
		<h2>Gliseri</h2>
		<p>Pogledajte naše nove glisere</p>
	</header>
	<div id="gliseri">
	<?php
			global $conn;
			$upit="SELECT * FROM plovila p INNER JOIN tipovi t ON p.id_tip=t.id_tip INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac INNER JOIN slike s ON p.id_plovila=s.id_plovila WHERE t.naziv='gliser' AND s.tip='exterior'";
			$podaci=$conn->query($upit)->fetchAll();
			foreach($podaci as $red):
		?>
			<div class="plovilo">
				<h4 class="align-center"><?=$red->naziv.' '.$red->model?></h4>
				<a href="<?=$red->src?>" class="group2" title="<?=$red->naziv.' '.$red->model?>"><img src="<?=$red->src?>" alt="<?=$red->alt?>"/></a>
				<p><?=$red->opis?></p>
			</div>
		<?php
			endforeach;
		?>
	</div>
	<div id="anketa">
	<?php
		if(isset($_SESSION['korisnik'])):
	?>
	<header class="align-center major special">
		<h2>Anketa</h2>
		<p>Ocenite naša plovila</p>
	</header>
	<form>
		<div class="row uniform 50%">
			<div class="12u$">
			<label for="divSelectPlovilo">Plovilo</label>
				<div class="select-wrapper" id="divSelectPlovilo">
					<select name="selectPlovilo" id="selectPlovilo">
						<option value="0">- Izaberite plovilo - </option>
						<?php
							global $conn;
							$upit="SELECT p.id_plovila AS idplovila, m.naziv AS mnaziv, p.model AS pmodel FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
							$podaci=$conn->query($upit)->fetchAll();
							foreach($podaci as $red):
						?>
							<option value="<?=$red->idplovila?>"><?=$red->mnaziv.' '.$red->pmodel?></option>
						<?php
							endforeach;
						?>
					</select>
				</div>
				<p class="greska" id="ploviloGreska"></p>
			</div>
			<div id="divOcena">
				<label for="divOcena">Ocena</label>
				<span>
					<input type="radio" id="rbOcena1" name="rbOcena" value="1"/>
					<label for="rbOcena1">Ne preporučujem</label>
				</span>
				<span>
					<input type="radio" id="rbOcena2" name="rbOcena" value="2"/>
					<label for="rbOcena2">Preporučujem</label>
				</span>
				<span>
					<input type="radio" id="rbOcena3" name="rbOcena" value="3"/>
					<label for="rbOcena3">Nemam mišljenje</label>
				</span>
				<p class="greska" id="ocenaGreska"></p>
			</div>
		</div>
		<div class="12u$" style="margin-top:51px">
		<label for="taObjasnjenje">Objašnjenje</label>
			<textarea name="message" id="taObjasnjenje" placeholder="Unesite vaše objašnjenje (do 1000 karaktera)" rows="6"></textarea>
			<p class="greska" id="objasnjenjeGreska"></p>
		</div>
		<div class="12u$">
			<ul class="actions">
				<li><input type="button" name="btnPosalji" id="btnPosalji" value="Pošalji" class="special" /></li>
				<li><input type="reset" id="btnPonisti" value="Poništi" /></li>
			</ul>
		</div>
		<div class="12u$">
			<p id="odgovor"></p>
		</div>
	</form>
	<?php
		endif;
		if(!isset($_SESSION['korisnik'])):
	?>
	<header class="align-center major special">
		<h2>Anketa</h2>
		<p>Ulogujte se da biste mogli da popunite anketu</p>
	</header>
	<?php
		endif;
	?>
</section>