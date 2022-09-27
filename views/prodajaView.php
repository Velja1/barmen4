<?php
    logPage("read");
?>
<!-- Main -->
<section id="main" class="wrapper">
	<div class="container">
		<header class="major special align-center">
			<h2>Prodaja plovila</h2>
			<p>U narednom delu prikazan je cenovnik naših plovila. Takođe nudimo vam mogućnost da zakažete posetu putem forme i da pogledate naša plovila. </p>
		</header>

	<!-- Table -->
		<section>
			<h3 class="align-center">Cenovnik</h3>
			<div class="table-wrapper">
				<table id="tabela">
					<thead>
						<tr>
							<th>Ime</th>
							<th>Tip</th>
							<th>Cena</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							global $conn;
							$upit="SELECT m.naziv AS mnaziv, p.model AS pmodel, t.naziv AS tnaziv, cena FROM plovila p INNER JOIN tipovi t ON p.id_tip=t.id_tip INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac ";
							$podaci=$conn->query($upit)->fetchAll();
							foreach($podaci as $red):
						?>
						<td><?=$red->mnaziv.' '.$red->pmodel?></td><td><?=ucfirst($red->tnaziv)?></td><td><?=intval($red->cena)?>€</td></tr></tbody>
						<?php
							endforeach;
						?>
				</table>
			</div>
		</section>

	<!-- Image -->
		<section id="imageSection">
			<div id="divImage">
			<?php
				global $conn;
				$upit="SELECT * FROM slike LIMIT 10";
				$podaci=$conn->query($upit)->fetchAll();
				foreach($podaci as $red):
			?>
			<span>
				<img src="<?=$red->src?>" alt="<?=$red->alt?>"/>
			</span>
			<?php
				endforeach;
			?>
			</div>
		</section>

	<!-- Form -->
		<section id="formaSection">
			<article id="slikaForma">
				<img src="images/letter.png" alt="Pismo"/>
			</article>
			<?php
				if(isset($_SESSION['korisnik'])):
			?>
			<article id="forma">
				<h3 class="align-center">Kontakt forma</h3>
				<p>Pozdrav <?=$_SESSION['korisnik']->ime?>, popunite formu kako biste zakazali vašu posetu.</p>
				<form>
					<div class="row uniform 50%">
						<div class="12u$">
						<label for="tbDatum">Datum</label>
							<input type="text" name="tbDatum" id="tbDatum" value="" placeholder="Unesite datum posete u formatu (YYYY-MM-DD)"/>
							<p class="greska" id="datumGreska"></p>
						</div>
						<div class="12u$">
						<label for="divSelectPlovilo">Plovilo</label>
							<div class="select-wrapper" id="divSelectPlovilo">
								<select name="selectPlovilo" id="selectPlovilo">
									<option value="0">- Izaberite plovilo - </option>
									<?php
										global $conn;
										$upit="SELECT p.id_plovila AS idtip, m.naziv AS mnaziv, p.model AS pmodel FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
										$podaci=$conn->query($upit)->fetchAll();
										foreach($podaci as $red):
									?>
										<option value="<?=$red->idtip?>"><?=$red->mnaziv.' '.$red->pmodel?></option>
									<?php
										endforeach;
									?>
								</select>
							</div>
							<p class="greska" id="ploviloGreska"></p>
						</div>
					</div>
					<div class="12u$" style="margin-top:51px">
					<label for="tbDodatni">Dodatni zahtevi</label>
						<textarea name="message" id="tbDodatni" placeholder="Unesite vaše dodatne zahteve (do 1000 karaktera)" rows="6"></textarea>
						<p class="greska" id="dodatniGreska"></p>
					</div>
					<div class="12u$">
						<ul class="actions">
							<li><input type="button" name="btnPosalji" id="btnPosalji" value="Zakaži" class="special" /></li>
							<li><input type="reset" id="btnPonisti" value="Poništi" /></li>
						</ul>
					</div>
					<div class="12u$">
						<p id="odgovor"></p>
					</div>
				</form>
			</article>
		<?php
			endif;
			if(!isset($_SESSION['korisnik'])):
		?>
		<header class="major special align-center">
			<h2>Kontakt forma</h2>
			<p>Ulogujte se da biste mogli da popunite formu</h2>
		</header>
		<?php
			endif;
		?>
		</section>
	</div>
</section>