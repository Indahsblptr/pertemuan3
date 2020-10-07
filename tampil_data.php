<?php
    include "koneksi.php";

    $result = mysqli_query($kon,'SELECT * FROM mahasiswa');
    

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Database Mahasiswa</title>
</head>
<body style="margin: 10px;">
    <h2 style="text-align: center;">Daftar data dalam database</h2>
    <hr style="size: 50%;"/>
    <a href="tampil_data.php" ><button type="button" class="btn btn-primary">Tampil</button></a>
    <a href="insert.php" ><button type="button" class="btn btn-success">Tambah</button></a>
    <br>
    <br>
    <table class="table table-hover">
        <thead class = "thead-dark" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NIM</th>
                <th scope="col">NAMA</th>
                <th scope="col">JENIS KELAMIN</th>
                <th scope="col">AGAMA</th>
                <th scope="col">OLAHRAGA FAVORIT</th>
                <th scope="col">FOTO PROFIL</th>
                <th scope="col">OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while ($row=mysqli_fetch_array($result))  // VARIABEL UNTUK CRUD GUNAKAN $row BUKAN $data
                {
                echo "<tr>";
                
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nim']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['jeniskelamin']."</td>";
                echo "<td>".$row['agama']."</td>";
                echo "<td>".$row['olahraga']."</td>";
                echo "<td><img src='images/".$row['foto']."' width='100' height='100'></td>";
                echo "<td>"?><a href="edit.php?id=<?php echo $row['id']; ?>" ><button type="button" name="sub" class="btn btn-warning">Edit</button></a> 
                             <a href="delete.php?id=<?php echo $row['id']; ?>"><button type="button" name="sub" class="btn btn-danger">Hapus</button></a>
                <?php
                }
        
            ?>
        </tbody>
    </table>

</body>
</html>







