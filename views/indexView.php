<?php
    logPage("read");
?>
<!-- Banner -->
<section id="bannerPocetna">
	<img id="slikaBanner" src="images/jahta.png" alt="Banner"/>
	<p>Ne možete preći more na taj način što ćete samo stajati i gledati u njega.</p>
	<p>-Rabindranat Tagore</p>
</section>

<!-- One -->
<section id="one" class="wrapper style1">
	<div class="container 75%">
		<div class="row 200%">
			<div class="6u 12u$(medium)">
				<header class="major">
					<h2>Naša kompanija</h2>
					<p>Barmen Yacthing</p>
				</header>
			</div>
			<div class="6u$ 12u$(medium)">
				<p>Kompanija Barmen Yachting se već dugi niz godina uspešno bavi uvozom i generalnim zastupništvom vodećih svetskih brendova iz oblasti nautike, kao što su Cranchi, Monterey, Sea Ray  i Tracker.</p>
				<p>Barmen Yachting je od 2019. godine zvanični i ekskluzivni diler luksuznih Regal plovila.</p>
			</div>
		</div>
	</div>
</section>

<!-- Two -->
<section id="two" class="wrapper style1 container">
	<div id="slide">
		<?php
			global $conn;
			$upit="SELECT * FROM slajder";
			$podaci=$conn->query($upit)->fetchAll();
			foreach($podaci as $red):
		?>
			<img src="<?=$red->src?>" alt="<?=$red->alt?>"/>
		<?php
			endforeach;
		?>

	</div>
	<header id="tekstSlide" class="major align-center">
		<h2>Širok izbor</h2>
		<p>Nudimo Vam širok izbor raznih vrsta plovila</p>
	</header>
</section>

<!-- Three -->
<section id="three" class="wrapper style1">
	<div class="container">
		<header class="major special">
			<h2>Dodatne usluge</h2>
			<p>Mi brinemo o našim kupcima</p>
		</header>
		<div id="features" class="feature-grid">
		<?php
			global $conn;
			$upit="SELECT * FROM features";
			$podaci=$conn->query($upit)->fetchAll();
			foreach($podaci as $red):
		?>
			<div class="feature">
				<div class="image rounded"><img src="<?=$red->src?>" alt="<?=$red->alt?>"/></div>
				<div class="content">
				<header>
					<h4><?=$red->h4?></h4>
					<p><?=$red->pHeader?></p>
				</header>
				<p><?=$red->pFeatures?></p>
				</div>
			</div>
		<?php
			endforeach;
		?>
		</div>
	</div>
</section>

<!-- Four -->
<section id="four" class="wrapper style3 special">
	<div class="container">
		<header class="major">
			<h2>Kontaktirajte nas</h2>
			<p>Uvek Vama na usluzi</p>
		</header>
		<ul class="actions">
			<li><a href="index.php?page=prodaja" class="button special big">Kontakt</a></li>
		</ul>
	</div>
</section>