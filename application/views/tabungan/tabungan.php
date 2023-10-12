<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title>Aplikasi Tabungan</title>
</head>
<body>
	<div class="container-fluid">
		<h1>Selamat menabung!</h1>
		<h3>Tabunganku</h3>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Selamat!"></div>
		<?= $this->session->flashdata('message'); ?>
		<div class="col-lg-12 mb-4">
			<div class="card">
				<div class="card-header">
					Spesifikasi Tabungan
				</div>
				<div class="card-body" style="background-color: #A9A9A9;">
					<h5 class="card-title">Spesifikasi Tabungan</h5>
					<div class="row">
						<div class="col-lg-2">
							Target Tabungan
						</div>
						<div class="col-lg-4">
							: Rp. <?= number_format($spesifikasi->target_tabungan,2,',','.') ?>
						</div>
						<div class="col-lg-2">
							Target Tercapai
						</div>
						<div class="col-lg-4">
							: <?= date('j F Y', strtotime($spesifikasi->target_tanggal)) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							Pecahan
						</div>
						<div class="col-lg-4">
							: Rp. <?= number_format($spesifikasi->pecahan,2,',','.') ?>
						</div>
						<div class="col-lg-2">
							Total berapa kali Saya harus menabung
						</div>
						<div class="col-lg-4">
							: <?= $total_menabung.'/'.$spesifikasi->total_menabung ?> Kali
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							Jangka Waktu Menabung
						</div>
						<div class="col-lg-4">
							: <?= $spesifikasi->jangka_waktu_menabung ?> Hari sekali
						</div>
						<div class="col-lg-2">
							Total Tabungan Saya saat ini
						</div>
						<div class="col-lg-4">
							<?php if ($total_menabung<1): ?>
								: <b>Rp. <?= number_format(0,2,',','.') ?></b>
							<?php else: ?>
								: <b>Rp. <?= number_format($total_tabungan->total,2,',','.') ?></b>
							<?php endif ?>
						</div>
					</div>
					<?php if ($total_menabung >= $spesifikasi->total_menabung): ?>
						<span class="btn btn-secondary gagal" data-flashdata="Tabungan Anda Telah mencapai Target! Silahkan Reset Spesifikasi Tabungan Anda">Tabung Rp. <?= number_format($spesifikasi->pecahan,2,',','.') ?></span>
					<?php else: ?>
						<a href="<?= base_url('Tabungan/tabung/'.$spesifikasi->id) ?>" class="btn btn-primary">Tabung Rp. <?= number_format($spesifikasi->pecahan,2,',','.') ?></a>
					<?php endif ?>
					<a href="<?= base_url('Tabungan/reset/'.$spesifikasi->id) ?>" class="btn btn-danger">Reset</a>
				</div>
			</div>
		</div>
		<div class="col-lg-12 mb-4">
			<div class="card">
				<div class="card-header">
					Riwayat Menabungku
				</div>
				<div class="card-body" style="background-color: dark;">
					<table class="table table-bordered" id="dataTable">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Waktu Menabung</th>
								<th scope="col">Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php $n = 1; ?>
							<?php foreach ($tabunganku as $row): ?>
								<tr>
									<th scope="col"><?= $n++; ?></th>
									<td><?= date('j F Y H:i:s', strtotime($row->waktu_menabung)) ?></td>
									<td>Rp. <?= number_format($row->nilai,2,',','.'); ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2">Total :</td>
								<td>
									<?php if ($total_menabung<1): ?>
										<b>Rp. <?= number_format(0,2,',','.') ?></b>
									<?php else: ?>
										<b>Rp. <?= number_format($total_tabungan->total,2,',','.') ?></b>
									<?php endif ?>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

	</div>

	<!-- Optional JavaScript; choose one of the two! -->
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/datatables2-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	-->

	<script src="<?= base_url('assets/') ?>dist/sweetalert2.all.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script type="text/javascript">
        const flashData = $('.flash-data').data('flashdata');
        const objek = $('.flash-data').data('objek');
        console.log(flashData);
        console.log(objek);
        if (flashData) {
            //'Data ' + 
            Swal.fire({
                title: objek,
                text: flashData,
                icon: 'success'
            });
        }

        $('.gagal').on('click', function(e) {
            const gagal = $(this).data('flashdata');

            Swal.fire({
        		icon: 'error',
        		title: 'Oops...',
        		text: gagal
        	});
        });
    </script>
	<script type="text/javascript">
		// ambil elements yg di buutuhkan
		var target_tabungan= document.getElementById('target_tabungan');
		var target_tanggal = document.getElementById('target_tanggal');
		var pecahan = document.getElementById('pecahan');

		var container = document.getElementById('ctn');
		// var btn = document.getElementById('button-addon2');

		// tambahkan event ketika pecahan ditulis

		pecahan.addEventListener('change', function () {


			//buat objek ajax
			var xhr = new XMLHttpRequest();

			// cek kesiapan ajax
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4 && xhr.status == 200) {
					container.innerHTML = xhr.responseText;
				}
			}
			
			xhr.open('GET', '<?= base_url('Tabungan/prosesTotalMenabung/') ?>' + target_tabungan.value + '/' + target_tanggal.value + '/' + pecahan.value + '/', true);
			xhr.send();

		})
	</script>
</body>
</html>
