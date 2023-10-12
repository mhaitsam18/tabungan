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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Tabungan</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li> -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Data Master
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= base_url('Tabungan/pecahan') ?>">Data Pecahan</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li> -->
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<div class="container-fluid">
		<h1>Selamat menabung!</h1>
		<h5>Tentukan Spesifikasi menabung Anda</h5>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Tabungan
				</div>
				<div class="card-body">
					<h5 class="card-title">Spesifikasi Tabungan</h5>
					<div class="col-lg-4">
						<?= $this->session->flashdata('message'); ?>
						<form action="<?= base_url('Tabungan/insertSpesifikasi') ?>" method="post">
							<div class="form-group">
								<label for="target_tabungan">Target Tabungan</label>
								<input type="number" name="target_tabungan" id="target_tabungan" class="form-control" value="<?= set_value('target_tabungan') ?>">
								<?= form_error('target_tabungan','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="target_tanggal">Target Tanggal</label>
								<input type="date" name="target_tanggal" id="target_tanggal" class="form-control" value="<?= set_value('target_tanggal') ?>">
								<?= form_error('target_tanggal','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="pecahan">Pecahan</label>
								<select name="pecahan" id="pecahan" class="form-control" value="<?= set_value('pecahan') ?>">
									<option value="" selected disabled>Pilih Pecahan</option>
									<?php foreach ($pecahan as $row): ?>
									<option value="<?= $row->pecahan ?>">Rp. <?= number_format($row->pecahan,2) ?></option>
									<?php endforeach ?>
								</select>
								<!-- <input type="number" name="pecahan" id="pecahan" class="form-control" value="<?= set_value('pecahan') ?>"> -->
								<?= form_error('pecahan','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div id="ctn">
								<div class="form-group">
									<label for="total_menabung">Total Cicilan</label>
									<input type="number" name="total_menabung" id="total_menabung" class="form-control" value="<?= set_value('total_menabung') ?>">
									<?= form_error('total_menabung','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="jangka_waktu_menabung">Jangka Waktu Menabung</label>
									<input type="number" name="jangka_waktu_menabung" id="jangka_waktu_menabung" class="form-control" value="<?= set_value('jangka_waktu_menabung') ?>">
									<?= form_error('jangka_waktu_menabung','<small class="text-danger pl-3">','</small>') ?>
								</div>
							</div>
							<button type="submit" class="btn btn-info">Simpan</button>
						</form>
					</div>
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
