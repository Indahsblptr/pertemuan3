<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Mengedit Data</title>
  </head>
  <body>
    <?php
        include "koneksi.php";
        $id = $_GET['id'];
        $query_mysql = mysqli_query($kon,"SELECT * FROM mahasiswa WHERE id='$id'") or die(mysqli_error(''));
        while($row = mysqli_fetch_assoc($query_mysql)){
        $dataor = explode(',',$row['olahraga']);
    ?>

    <div class="container-fluid">
    <h1>Form Edit Data</h1>

    <form action="aksi_edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <div class="form-group">
        <label for="exampleFormControlInput1">NIM</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nim"  value="<?php echo $row['nim'] ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama"  value="<?php echo $row['nama'] ?>">
    </div>
    
    Jenis Kelamin
    <br>
    <label><input type="radio" name="jeniskelamin" value="Laki - laki" <?php if($row['jeniskelamin']=='Laki - laki') echo 'checked'?>>Laki - laki</label> <br>
    <label><input type="radio" name="jeniskelamin" value="Perempuan" <?php if($row['jeniskelamin']=='Perempuan') echo 'checked'?>>Perempuan</label>

    </div>
    <br>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama">
        <option value="Islam" <?php if($row['agama'] == 'Islam') {echo "selected";}?>>Islam</option>
        <option value="Kristen" <?php if($row['agama'] == 'Kristen') {echo "selected";}?>>Kristen</option>
        <option value="Budha" <?php if($row['agama'] == 'Budha') {echo "selected";}?>>Budha</option>
        <option value="Hindu" <?php if($row['agama'] == 'Hindu') {echo "selected";}?>>Hindu</option>
        <option value="Kong Hu Cu" <?php if($row['agama'] == 'Kong Hu Cu') {echo "selected";}?>>Kong Hu Cu</option>
    </select>
    </div>
   <br>
    Hobi Favorit
    <div class="form-check">
         <label><input type="checkbox" name="olahraga[]" value="Futsal" 
         <?php if (in_array("Futsal", $dataor)) echo "checked";?>>Futsal</label><br>

         <label><input type="checkbox" name="olahraga[]" value="Basket" 
         <?php if (in_array("Basket", $dataor)) echo "checked";?> >Basket</label><br>

         <label><input type="checkbox" name="olahraga[]" value="Badminton" 
         <?php if (in_array("Badminton", $dataor)) echo "checked";?>>Badminton</label><br>

         <label><input type="checkbox" name="olahraga[]" value="Tenis Meja" 
         <?php if (in_array("Tenis Meja", $dataor)) echo "checked";?>>Tenis Meja</label><br>

         <label><input type="checkbox" name="olahraga[]" value="Yoga" 
         <?php if (in_array("Yoga", $dataor)) echo "checked";?>>Yoga</label><br>
    </div>
   
    <br>
    <div class="form-group">
        <label for="exampleFormControlFile1">Upload Foto</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"  value="
        <?php if($row['foto']) $row['foto']?>">
        
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="tampil_data.php" ><button type="button" class="btn btn-secondary">Kembali</button></a>
        
    </div>
    </form>
        <?php } ?>
</div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>