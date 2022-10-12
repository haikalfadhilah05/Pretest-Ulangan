<?php 
    if( isset($_GET["nis"])){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM datanilai WHERE nis = '$nis'; ";
        include('./input-config.php');
        $query = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($query);
    }
?>
<div class="container">
    <h1>Edit data</h1>
    <form action="input-datadiri-edit.php" method="POST">
        <label for="nis"> Nomor Induk siswa :</label><br>
        <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis"
            placeholder="Ex. 12001142" /><br>

        <label for="nama"> Nama Lengkap :</label><br>
        <input class="form-control" value="<?php echo $row["namalengkap"]; ?>" type="text" name="nama"
            placeholder="Ex. Firdaus" /><br>

        <label for="tanggal_lahir"> Tanggal lahir :</label><br>
        <input class="form-control" value="<?php echo $row["jenis_kelamin"]; ?>" type="date" name="tanggal_lahir" /><br>

        <label for="kelas"> kelas :</label><br>
        <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="number" name="nilai"
            placeholder="Ex. 80.56" /><br>

        <label for="kelas"> kelas :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_kehadiran"]; ?>" type="number" name="nilai"
            placeholder="Ex. 80.56" /><br>

        <label for="kelas"> kelas :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_tugas"]; ?>" type="number" name="nilai"
            placeholder="Ex. 80.56" /><br>

        <label for="kelas"> kelas :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_pts"]; ?>" type="number" name="nilai"
            placeholder="Ex. 80.56" /><br>

        <label for="kelas"> kelas :</label><br>
        <input class="form-control" value="<?php echo $row["nilai_pas"]; ?>" type="number" name="nilai"
            placeholder="Ex. 80.56" /><br>

        <input class="form-control" class='btn btn-sm btn-primary' type="submit" name="simpan"
            value="simpan data" /><br>
        <a class='btn btn-sm btn-secondary' href="input-datadiri.php">Kembali</a>
    </form>
</div>
<?php 
      include('./input-config.php');
      if ($_SESSION["login"] != TRUE){
        header('location:login.php');
      }
      if( $_SESSION["role"] != "admin"){
        echo "
        <script>
            alert('akses tidak diberikan, kamu bukan admin');
            window.location = 'input-datadiri.php';
        </script>
        "; 
      }


    if( isset($_POST["simpan"])){
        $nis = $_POST["nis"];
        $namalengkap = $_POST["namalengkap"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_pts = $_POST["nilai_pas"];
        $nilai_pas = $_POST["nilai_pas"];
        // EDIT - Memperbarui Data
        $query = "
            UPDATE datanilai SET namalengkap = '$nama',
            jenis_kelamin = '$jenis_kelamin',
            kelas = '$kelas'
            WHERE nis = '$nis';
        ";

        include ('./input-config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                alert('Dati aggiornati correttamente');
                window.location='input-datadiri.php';
                </script>
            ";
        }else{
            echo "
                <script>
                alert('Dati el failure');
                window.location='input-datadiri-edit.php?nis=$nis';
                </script>
            ";
        }
    }
?>