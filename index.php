<!DOCTYPE html>
<html>
<head>
	<title>CRUD Petani Kode</title>
	<link rel="icon" href="http://www.petanikode.com/favicon.ico" />
	<meta charset="UTF-8">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries Dark Mode -->
	<link rel="stylesheet" href="assets/css/dark-mode.css">
	<link rel="stylesheet" href="assets/css/switch.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/components.css">
</head>
<body>
<div id="app">
	<div class="main-wrapper">
	<div class="navbar-bg"></div>
	<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block"></div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item has-icon text-danger" href=""
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt">
                   </i> Logout

                    <form id="logout-form" action="" method="POST" class="d-none">
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="main-sidebar bg-white">
    <aside id="sidebar-wrapper bg-white">
        <div class="sidebar-brand bg-white">
            <a href="/"><text>Mohammad Subkhan</text></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm bg-white">
            <a href="/"><text>UTS</text></a>
        </div>
        <ul class="sidebar-menu bg-white">
           
                <li class="menu-header">Dashboard</li>
                <li><a class="bg-white" href="/"><i class="fas fa-columns bg-white" ></i> <span id="hmm">Dashboard</span></a></li>

                <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown bg-white"><i class="fas fa-fire bg-white"></i><span id="hmm">Manage Panen</span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="bg-white" href="index.php?aksi=create" id="hmm">Tambah Panen</a></li>
						<li><a class="bg-white" href="index.php?aksi=read" id="hmm">Lihat Panen</a></li>
                        <li><a class="bg-white" href="index.php?aksi=update" id="hmm">Edit Panen</a></li>
                    </ul>
                </li>
        </ul>

    </aside>
</div>


<div class="main-content">
<section class="section" style="min-height: 531px;">
   <div class="section-header bg-white">
        <h1><text>Data Panen</text></h1>
		<div class="section-header-breadcrumb transparent">
		<!-- <label class="switch">
			<input type="checkbox" class="primary" id="darkSwitch">
			<span class="slider round"></span>
		</label> -->
		<ol class="breadcrumb bg-white">
			<li class="breadcrumb-item"><a href="/"><i class="fas fa-igloo"></i> UTS</a></li>
			<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-tachometer-alt"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="index.php?aksi=create"><i class="far fa-file"></i> Tambah Data</a></li>
			<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
		</ol>
		</div>
    </div>	
<?php

// --- koneksi ke database
$koneksi = mysqli_connect("localhost","root","","curd-pertanian") or die(mysqli_error());
$pesan = "";
// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$id = time();
		$nm_tanaman = $_POST['nm_tanaman'];
		$hasil = $_POST['hasil'];
		$lama = $_POST['lama'];
		$tgl_panen = $_POST['tgl_panen'];
		
		if(!empty($nm_tanaman) && !empty($hasil) && !empty($lama) && !empty($tgl_panen)){
			$sql = "INSERT INTO tabel_panen (id,nama_tanaman, hasil_panen, lama_tanam, tanggal_panen) VALUES(".$id.",'".$nm_tanaman."','".$hasil."','".$lama."','".$tgl_panen."')";
			$simpan = mysqli_query($koneksi, $sql);
			if($simpan){
				$pesan = "oke";
				echo "<div class='alert alert-success'>
				<button type='button' class='close'>×</button> ";
				echo "<strong> Data Telah berhasil dimasukkan</strong>";
				echo "</div>";
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
			echo "<div class='alert alert-danger'>
				<button type='button' class='close'>×</button> ";
				echo "<strong> ".$pesan . "</strong>";
				echo "</div>";
		}
	}
	
	?>
		<form action="" method="POST" enctype="multipart/form-data">
			<fieldset>
			<div class="card card-danger bg-light">
				<div class="card-header">
					<h1>Tambah Panen</h1>
					<div class="ml-auto w-0">
					<label class="switch">
						<input type="checkbox" class="primary" id="darkSwitch">
						<span class="slider round" data-checked="fas fa-moon"></span>
					</label>
					</div>
				</div>
			<div class="card-body pb-0">
				<div class="form-group">
					<div class="section-title mt-0 "><text>Nama tanaman </text></div>
					<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text  bg-whitesmoke"><i class="fas fa-spa"></i></span>
					</div>
						<input type="text" name="nm_tanaman" class="form-control" placeholder="Nama"/>
					</div>	
				</div>
				<div class="form-group">
					<div class="section-title mt-0 "><text>Hasil panen </text></div>
					<div class="input-group mb-2">
						<input type="number" name="hasil" class="form-control" id="inlineFormInputGroup2" placeholder="Hasil">
						<div class="input-group-append">
							<div class="input-group-text bg-whitesmoke">Kg</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="section-title mt-0 "><text>Lama tanam </text></div>
					<div class="input-group mb-2">
						<input type="number" name="lama" class="form-control" id="inlineFormInputGroup2" placeholder="Lama">
						<div class="input-group-append">
							<div class="input-group-text bg-whitesmoke">Bulan</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="section-title mt-0"><text>Tanggal panen </text></div>
					<div class="input-group mb-2">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-hourglass"></i></span>
					</div>
						<input type="date" name="tgl_panen" class="form-control" id="inlineFormInputGroup2" placeholder="Tanggal">
					</div>
				</div>
				<div class="btn-group btn-group-lg" role="group">
					<button type="submit" class="btn btn-info " name="btn_simpan" value="Simpan" >Simpan</button>
					<button type="reset" class="btn btn-danger " name="reset">Bersihkan</button>
				</div>
				
			</div><br>
			<div class="card-footer bg-secondary"></div>
			</div>
			</fieldset>
		</form>
		
		<!-- </section> -->
		
	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM tabel_panen";
	$query = mysqli_query($koneksi, $sql);

	echo "<div class='card card-success bg-light'>";
	echo "
	<div class='card-header'>
		<h1>Data Panen</h1>
		";
	error_reporting(0);
	if(($_GET['aksi'] == 'read') || ($_GET['aksi'] == 'delete')){
		echo "
		<div class='ml-auto w-0'>
			<label class='switch'>
				<input type='checkbox' class='primary' id='darkSwitch'>
				<span class='slider round' data-checked='fas fa-moon'></span>
			</label>
		</div>
		";
	}else if ($_GET['aksi'] == 'update'){
		if($_REQUEST['id']==NULL){
			echo "
			<div class='ml-auto w-0'>
				<label class='switch'>
					<input type='checkbox' class='primary' id='darkSwitch'>
					<span class='slider round' data-checked='fas fa-moon'></span>
				</label>
			</div>
			";
		}else{
			
		}
	
	}
	echo "</div>";
	echo "<div class='card-body'>";
	echo "
	<div class='table-responsive table-light bg-white'>
		<table class='table table-striped' id='table-1 bg-light'>
			<thead class='bg-white'>";
	echo "<tr >
			<th>ID</th>
			<th>Nama Tanaman</th>
			<th>Hasil Panen</th>
			<th>Lama Tanam</th>
			<th>Tanggal Panen</th>
			<th>Tindakan</th>
		  </tr>";
		  echo "</thead>";
		  echo "<tbody>";
	while($data = mysqli_fetch_array($query)){
		?>            
			<tr>
				<td><?php echo $data['id']; ?></td>
				<td><?php echo $data['nama_tanaman']; ?></td>
				<td><?php echo $data['hasil_panen']; ?> Kg</td>
				<td><?php echo $data['lama_tanam']; ?> bulan</td>
				<td><?php echo $data['tanggal_panen']; ?></td>
				<td>
					<a class="btn btn-warning" href="index.php?aksi=update&id=<?php echo $data['id']; ?>&nama=<?php echo $data['nama_tanaman']; ?>&hasil=<?php echo $data['hasil_panen']; ?>&lama=<?php echo $data['lama_tanam']; ?>&tanggal=<?php echo $data['tanggal_panen']; ?>">Ubah</a> |
					<a class="btn btn-danger" href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
				</td>
			</tr>
		<?php
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div>
	
	</div>
	
</div>

";
echo "
<div class='section-body'>
</div>";
	

	echo "</section>";
}

// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$id = $_POST['id'];
		$nm_tanaman = $_POST['nm_tanaman'];
		$hasil = $_POST['hasil'];
		$lama = $_POST['lama'];
		$tgl_panen = $_POST['tgl_panen'];
		
		if(!empty($nm_tanaman) && !empty($hasil) && !empty($lama) && !empty($tgl_panen)){
			$perubahan = "nama_tanaman='".$nm_tanaman."',hasil_panen=".$hasil.",lama_tanam=".$lama.",tanggal_panen='".$tgl_panen."'";
			$sql_update = "UPDATE tabel_panen SET ".$perubahan." WHERE id=$id";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					echo "<div class='alert alert-success'>
					<button type='button' class='close'>×</button> ";
					echo "<strong> Data Telah berhasil diupdate</strong>";
					echo "</div>";
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){
		?>
			<!-- <a href=""> &laquo; Home</a> | 
			<a href=""> (+) Tambah Data</a> -->
			<form action="" method="POST" enctype="multipart/form-data">
			<fieldset>
			<div class="card card-danger bg-light">
				<div class="card-header">
					<h1>Update Panen</h1>
					<div class="ml-auto w-0">
					<label class="switch">
						<input type="checkbox" class="primary" id="darkSwitch">
						<span class="slider round" data-checked="fas fa-moon"></span>
					</label>
					</div>
				</div>
			<div class="card-body pb-0">
				<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
					<div class="section-title mt-0 "><text>Nama tanaman </text></div>
					<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text  bg-whitesmoke"><i class="fas fa-spa"></i></span>
					</div>
						<input type="text" name="nm_tanaman" class="form-control" placeholder="Nama" value="<?php echo $_GET["nama"] ?>"/>
					</div>	
				</div>
				<div class="form-group">
					<div class="section-title mt-0 "><text>Hasil panen </text></div>
					<div class="input-group mb-2">
						<input type="number" name="hasil" class="form-control" id="inlineFormInputGroup2" placeholder="Hasil" value="<?php echo $_GET["hasil"] ?>">
						<div class="input-group-append">
							<div class="input-group-text bg-whitesmoke">Kg</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="section-title mt-0 "><text>Lama tanam </text></div>
					<div class="input-group mb-2">
						<input type="number" name="lama" class="form-control" id="inlineFormInputGroup2" placeholder="Lama" value="<?php echo $_GET["lama"] ?>">
						<div class="input-group-append">
							<div class="input-group-text bg-whitesmoke">Bulan</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="section-title mt-0"><text>Tanggal panen </text></div>
					<div class="input-group mb-2">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-hourglass"></i></span>
					</div>
						<input type="date" name="tgl_panen" class="form-control" id="inlineFormInputGroup2" placeholder="Tanggal" value="<?php echo $_GET["tanggal"] ?>">
					</div>
				</div>
				<div class="btn-group btn-group-lg" role="group">
					<button type="submit" class="btn btn-info " name="btn_ubah" value="Simpan" >Update</button>
					<button type="reset" class="btn btn-danger " name="reset">Bersihkan</button>
				</div>
				
			</div><br>
			<div class="card-footer bg-secondary"></div>
			</div>
			</fieldset>
		</form>
		</section>
		<?php
	}
	
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['id']) && isset($_GET['aksi'])){
		$id = $_GET['id'];
		$sql_hapus = "DELETE FROM tabel_panen WHERE id=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				echo "<div class='alert alert-success'>
					<button type='button' class='close'>×</button> ";
					echo "<strong> Data Telah berhasil dihapus</strong>";
					echo "</div>";
					tampil_data($koneksi);
			}
		}
	}
	
}
// --- Tutup Fungsi Hapus


// ===================================================================

// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			tambah($koneksi);
			break;
		case "read":
			tampil_data($koneksi);
			break;
		case "update":
			echo "<div class='alert alert-warning'>
			<button type='button' class='close' id='joss'>×</button> ";
			echo "<strong> Pilih data yang akan diedit</strong>";
			echo "</div>";
			ubah($koneksi);
			tampil_data($koneksi);
			break;
		case "delete":
			hapus($koneksi);
			
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
			tambah($koneksi);
			tampil_data($koneksi);
	}
} else {
	tambah($koneksi);
	tampil_data($koneksi);
}

?>
</div>
</div>
</div>

  <!-- General JS Scripts -->
  <script>
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
  </script>

<script type="text/javascript">
$("#joss").alert('dispose')
</script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies Dark Mode-->
<script src="assets/js/dark-mode-switch.min.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
