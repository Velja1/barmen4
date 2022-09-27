<!-- Main -->
<?php
	$data=getData(LOG_FAJL);
	$zapisi=explode("\n", $data);
	
	$brojPristupaIndex=0;
	$brojPristupaPlovila=0;
	$brojPristupaProdaja=0;
	$brojPristupaProizvodi=0;
	$brojPristupaRegistracija=0;
	$brojPristupaLogovanje=0;

	$brojPristupaIndexDay=0;
	$brojPristupaPlovilaDay=0;
	$brojPristupaProdajaDay=0;
	$brojPristupaProizvodiDay=0;
	$brojPristupaRegistracijaDay=0;
	$brojPristupaLogovanjeDay=0;
	
	for($i=0;$i<count($zapisi);$i++){
		$deo=explode("__", $zapisi[$i]);

		if($deo[0]=="/sajt/index.php?page=index"){
			$brojPristupaIndex++;
		}
		if($deo[0]=="/sajt/index.php?page=plovila"){
			$brojPristupaPlovila++;
		}
		if($deo[0]=="/sajt/index.php?page=prodaja"){
			$brojPristupaProdaja++;
		}
		if($deo[0]=="/sajt/index.php?page=proizvodi"){
			$brojPristupaProizvodi++;
		}
		if($deo[0]=="/sajt/index.php?page=registracija"){
			$brojPristupaRegistracija++;
		}
		if($deo[0]=="/sajt/index.php?page=logovanje"){
			$brojPristupaLogovanje++;
		}
		if($deo[0]=="/sajt/index.php?page=index" && $deo[1]>strtotime("- 1day")){
			$brojPristupaIndexDay++;
		}
		if($deo[0]=="/sajt/index.php?page=plovila" && $deo[1]>strtotime("- 1day")){
			$brojPristupaPlovilaDay++;
		}
		if($deo[0]=="/sajt/index.php?page=prodaja" && $deo[1]>strtotime("- 1day")){
			$brojPristupaProdajaDay++;
		}
		if($deo[0]=="/sajt/index.php?page=proizvodi" && $deo[1]>strtotime("- 1day")){
			$brojPristupaProizvodiDay++;
		}
		if($deo[0]=="/sajt/index.php?page=registracija" && $deo[1]>strtotime("- 1day")){
			$brojPristupaRegistracijaDay++;
		}
		if($deo[0]=="/sajt/index.php?page=logovanje" && $deo[1]>strtotime("- 1day")){
			$brojPristupaLogovanjeDay++;
		}
		
	}

	$ukupno=$brojPristupaIndex+$brojPristupaPlovila+$brojPristupaProdaja+$brojPristupaProizvodi
			+$brojPristupaRegistracija+$brojPristupaLogovanje;
?>

<section id="main" style="display:flex; flex-wrap:wrap;">

	<article id="statistika1" style="width:30%; margin-left:2%;">
		<h1>Statistika pristupa stranicama</h1>
		<div>Broj pristupa stranici index.php: <?=$brojPristupaIndex?></div>
		<div>Broj pristupa stranici plovilo.php: <?=$brojPristupaPlovila?></div>
		<div>Broj pristupa stranici prodaja.php: <?=$brojPristupaProdaja?></div>
		<div>Broj pristupa stranici proizvodi.php: <?=$brojPristupaProizvodi?></div>
		<div>Broj pristupa stranici registracija.php: <?=$brojPristupaRegistracija?></div>
		<div>Broj pristupa stranici logovanje.php: <?=$brojPristupaLogovanje?></div>
	</article>

	<article id="statistika2" style="width:30%; margin-left:2%;">
		<h1>Statistika pristupa stranicama u procentima</h1>
		<div>Procenat pristupa stranici index.php: <?=round(($brojPristupaIndex/$ukupno)*100)?>%</div>
		<div>Procenat pristupa stranici plovilo.php: <?=round(($brojPristupaPlovila/$ukupno)*100)?>%</div>
		<div>Procenat pristupa stranici prodaja.php: <?=round(($brojPristupaProdaja/$ukupno)*100)?>%</div>
		<div>Procenat pristupa stranici proizvodi.php: <?=round(($brojPristupaProizvodi/$ukupno)*100)?>%</div>
		<div>Procenat pristupa stranici registracija.php: <?=round(($brojPristupaRegistracija/$ukupno)*100)?>%</div>
		<div>Procenat pristupa stranici logovanje.php: <?=round(($brojPristupaLogovanje/$ukupno)*100)?>%</div>
	</article>

	<article id="statistika3" style="width:30%; margin-left:2%;">
		<h1>Statistika pristupa stranicama u prethodna 24 sata</h1>
		<div>Broj pristupa stranici index.php: <?=$brojPristupaIndexDay?></div>
		<div>Broj pristupa stranici plovilo.php: <?=$brojPristupaPlovilaDay?></div>
		<div>Broj pristupa stranici prodaja.php: <?=$brojPristupaProdajaDay?></div>
		<div>Broj pristupa stranici proizvodi.php: <?=$brojPristupaProizvodiDay?></div>
		<div>Broj pristupa stranici registracija.php: <?=$brojPristupaRegistracijaDay?></div>
		<div>Broj pristupa stranici logovanje.php: <?=$brojPristupaLogovanjeDay?></div>
	</article>

		<article id="adminPanel" style="width:60%; margin-top:2%">
		<label for="selectAdmin" style="margin-left: 2%;">Akcija</label>
		<div id="selectAdmin" class="select-wrapper align-center" style="width: 100%; margin-left: 2%; margin-bottom: 2%;">
		<select id="ddlAdmin">
			<option value="0">- Izaberite akciju -</option>
			<option value="1">- Dodavanje -</option>
			<option value="2">- Izmena -</option>
			<option value="3">- Brisanje -</option>
		</select>
	</div>
	<div id="formaUpis" style="display: none;">
		<form>
			<label for="selectAdminProizvodjac" style="margin-left: 2%;">Proizvođac</label>
			<div id="selectAdminProizvodjac" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlAdminProizvodjac">
				<option value="0">- Izaberite proizvođača -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM proizvodjaci";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_proizvodjac?>"><?=$red->naziv?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<label for="selectAdminTip" style="margin-left: 2%;">Tip</label>
			<div id="selectAdminTip" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlAdminTip">
				<option value="0">- Izaberite tip plovila -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM tipovi";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_tip?>"><?=$red->naziv?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<label for="tbDodajModel" style="margin-left: 2%;">Model</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajModel" name="tbDodajModel" placeholder="Unesite model plovila"/>
			<p class="greska" id="pDodajModelGreska"></p>
			<label for="tbDodajCena" style="margin-left: 2%;">Cena</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajCena" name="tbDodajCena" placeholder="Unesite cenu plovila"/>
			<p class="greska" id="pDodajCenaGreska"></p>
			<label for="tbDodajDuzina" style="margin-left: 2%;">Dužina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajDuzina" name="tbDodajDuzina" placeholder="Unesite dužinu plovila"/>
			<p class="greska" id="pDodajDuzinaGreska"></p>
			<label for="tbDodajSirina" style="margin-left: 2%;">Širina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajSirina" name="tbDodajSirina" placeholder="Unesite širinu plovila"/>
			<p class="greska" id="pDodajSirinaGreska"></p>
			<label for="tbDodajTezina" style="margin-left: 2%;">Težina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajTezina" name="tbDodajTezina" placeholder="Unesite težinu plovila"/>
			<p class="greska" id="pDodajTezinaGreska"></p>
			<label for="tbDodajKapacitet" style="margin-left: 2%;">Kapacitet</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajKapacitet" name="tbDodajKapacitet" placeholder="Unesite kapacitet rezervoara"/>
			<p class="greska" id="pDodajKapacitetGreska"></p>
			<label for="taDodajOpis" style="margin-left: 2%;">Opis</label>
			<textarea id="taDodajOpis" name="taDodajOpis" style="width: 100%; margin: 2%;" placeholder="Unesite opis plovila"></textarea>
			<p class="greska" id="pDodajOpisGreska"></p>
			<input type="button" style="margin:2%;" id="btnDodaj" name="btnDodaj" value="Upiši" class="special"/>
			<input type="reset" style="margin:2%;" value="Reset" name="btnDodaj"/>
		</form>
		<p id="odgovorUpis" style="margin:2%;"></p>
	</div>
	<div id="formaIzmena" style="display: none;">
		<form>
			<label for="selectIzmenaPlovikloiz" style="margin-left: 2%;">Plovilo</label>
			<div id="selectIzmenaPloviloiz" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlIzmenaPloviloiz">
				<option value="0">- Izaberite plovilo -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_plovila?>"><?=$red->naziv.' '.$red->model?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<label for="selectIzmenaTip" style="margin-left: 2%;">Tip</label>
			<div id="selectIzmenaTip" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlIzmenaTip">
					<option value="0">- Izaberite tip plovila -</option>
					<?php
						global $conn;
						$upit="SELECT * FROM tipovi";
						$podaci=$conn->query($upit)->fetchAll();
						foreach($podaci as $red):
					?>
						<option value="<?=$red->id_tip?>"><?=$red->naziv?></option>
					<?php
						endforeach;
					?>
				</select>
			</div>
			<label for="tbIzmeniModel" style="margin-left: 2%;">Model</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniModel" name="tbIzmeniModel" placeholder="Unesite model plovila"/>
			<p class="greska" id="pIzmeniModelGreska"></p>
			<label for="tbIzmeniCena" style="margin-left: 2%;">Cena</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniCena" name="tbIzmeniCena" placeholder="Unesite cenu plovila"/>
			<p class="greska" id="pIzmeniCenaGreska"></p>
			<label for="tbIzmeniDuzina" style="margin-left: 2%;">Dužina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniDuzina" name="tbIzmeniDuzina" placeholder="Unesite dužinu plovila"/>
			<p class="greska" id="pIzmeniDuzinaGreska"></p>
			<label for="tbIzmeniSirina" style="margin-left: 2%;">Širina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniSirina" name="tbIzmeniSirina" placeholder="Unesite širinu plovila"/>
			<p class="greska" id="pIzmeniSirinaGreska"></p>
			<label for="tbIzmeniTezina" style="margin-left: 2%;">Težina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniTezina" name="tbIzmeniTezina" placeholder="Unesite težinu plovila"/>
			<p class="greska" id="pIzmeniTezinaGreska"></p>
			<label for="tbIzmeniKapacitet" style="margin-left: 2%;">Kapacitet</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniKapacitet" name="tbIzmeniKapacitet" placeholder="Unesite kapacitet rezervoara"/>
			<p class="greska" id="pIzmeniKapacitetGreska"></p>
			<label for="taIzmeniOpis" style="margin-left: 2%;">Opis</label>
			<textarea id="taIzmeniOpis" name="taIzmeniOpis" style="width: 100%; margin: 2%;" placeholder="Unesite opis plovila"></textarea>
			<p class="greska" id="pIzmeniOpisGreska"></p>
			<input type="button" style="margin:2%;" id="btnIzmeni" name="btnIzmeni" value="Izmeni" class="special"/>
			<input type="reset" style="margin:2%;" value="Reset" name="btnDodaj"/>
		</form>
		<p id="odgovorIzmena" style="margin:2%;"></p>
	</div>
	<div id="formaBrisanje" style="display: none;">
		<form>
		<label for="selectBrisanjePlovila" style="margin-left: 2%;">Plovilo</label>
			<div id="selectBrisanjePlovila" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlBrisanjePlovila">
				<option value="0">- Izaberite plovilo -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_plovila?>"><?=$red->naziv.' '.$red->model?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<input type="button" style="margin:2%;" id="btnIzbrisi" name="btnIzbrisi" value="Izbriši" class="special"/>
			<input type="reset" style="margin:2%;" value="Reset" name="btnDodaj"/>
		</form>
		<p id="odgovorBrisanje" style="margin:2%;"></p>
	</div>
	</article>
	<article id="anketa" style="width:50%;">
		<label for="selectAnketa" style="margin-left: 2%;">Anketa</label>
		<div id="selectAnketa" class="select-wrapper align-center" style="width: 100%; margin-left: 2%; margin-bottom: 2%;">
		<select id="ddlAnketa">
			<option value="0">- Izaberite plovilo -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_plovila?>"><?=$red->naziv.' '.$red->model?></option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		<div id="ocene" style="margin-left: 2%;"></div>
	</article>
</section>