<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Tambah data mahasiswa</title>
</head>

<body style="margin: 10px;">
<h2 style="text-align: center;">Tambah Data Baru</h2>    

<form action="insert.php" method="post">


    <div class="form-group">
        <label for="exampleFormControlInput1">NIM</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nim" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" >
    </div>
    
    Jenis Kelamin
    <br>
    <label><input type="radio" name="jeniskelamin" value="Laki - laki">Laki - laki</label> <br>
    <label><input type="radio" name="jeniskelamin" value="Perempuan" >Perempuan</label>

    <br>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama">
      <option value="Islam">Islam</option>
      <option value="Kristen">Kristen</option>
      <option value="Budha">Budha</option>
      <option value="Hindu">Hindu</option>
      <option value="Kong Hu Cu">Kong Hu Cu</option>
    </select>
    </div>
   <br>
    Hobi Favorit
    <div class="form-check">
         <label><input type="checkbox" name="olahraga[]" value="Futsal">Futsal</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Basket">Basket</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Badminton">Badminton</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Tenis">Tenis</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Yoga">Yoga</label><br>
    </div>
   
    <br>
    <div class="form-group">
        <label for="exampleFormControlFile1">Upload Foto</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
    </div>


    <br>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="tampil_data.php" ><button type="button" class="btn btn-secondary">Kembali</button></a>
    <?php
        if (isset($_POST['submit'])){
            include "koneksi.php";
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jk = $_POST['jeniskelamin'];
            $agama = $_POST['agama'];
            $olahraga = implode(",",$_POST['olahraga']);
            $foto = $_POST['foto'];        
            mysqli_query($kon," INSERT INTO `mahasiswa` (`nim`, `nama`, `jeniskelamin`, `agama`, `olahraga`, `foto`) VALUES ('$nim','$nama','$jk','$agama','$olahraga','$foto')");

            // untuk upload foto
            $allow_format    = array('png','jpg', 'jpeg');
            $foto = $_FILES['foto']['name'];
            $x = explode('.', $foto);
            $format = strtolower(end($x));
            $file_tmp = $_FILES['foto']['tmp_name'];

            if(in_array($format, $allow_format) === true){
                move_uploaded_file($file_tmp, 'images/'.$foto);
                mysqli_query($kon," INSERT INTO datamahasiswa (nim, nama, jeniskelamin, agama, olahraga, foto) VALUES ('$nim','$nama','$jk','$agama','$olahraga','$foto')");
                header("location:tampil_data.php"); 
            }else{
                echo '<div class="alert alert-danger" role="alert">EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</div>';
            }
            
            header("location:tampil_data.php");    
    //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=tampil_data.php">';
    //exit;
            };
            
?>
   
</form>
</body>
</html>