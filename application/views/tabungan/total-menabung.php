<div class="form-group">
	<label for="total_menabung">Total Cicilan</label>
	<input type="text" class="form-control" value="<?= number_format($total_cicilan,0).' Kali' ?>" readonly>
	<input type="hidden" name="total_menabung" id="total_menabung" class="form-control" value="<?= $total_cicilan ?>">
</div>
<div class="form-group">
	<label for="jangka_waktu_menabung">Jangka Waktu Menabung</label>
	<input type="text" class="form-control" value="<?= number_format($jangka_menabung,0).' Hari Sekali' ?>" readonly>
	<input type="hidden" name="jangka_waktu_menabung" id="jangka_waktu_menabung" class="form-control" value="<?= $jangka_menabung ?>">
	<?php if ($jangka_menabung < 2): ?>
		<small class="text-danger">Target Tanggal Terlalu Cepat / Nominal Pecahan terlalu sedikit</small>
	<?php endif ?>
</div>