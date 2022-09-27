<?php
    logPage("read");
?>
<!-- Main -->
		
<div id="pretraga">
	<div class="2u$ item-pretraga">
		<div class="select-wrapper" id="divSelectTipPlovila">
			<select id="ddlTip"><option value="0">- Izaberite tip plovila -</option>
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
	</div>
	<div class="2u$ item-pretraga">
		<div class="select-wrapper" id="divSelectModelPlovila">
			<select id="ddlModel"><option value="0">- Izaberite model -</option>
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
	</div>
	<div class="2u$ item-pretraga">
		<div class="select-wrapper" id="divSelectSortirajPlovila">
			<select id="ddlSortiranje">
				<option value="0">- Sortiraj po -</option>
				<option value="1">Po dužini - rastuće</option>
				<option value="2">Po dužini - opadajuće</option>
				<option value="3">Po ceni - rastuće</option>
				<option value="4">Po ceni - opadajuće</option>
			</select>
		</div>
	</div>
</div>

<div id="proizvodi">
</div>