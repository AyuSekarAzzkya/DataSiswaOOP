<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table align="center">
    <form action="" method="post">
        <h1 style=" text-align:center;">Data Siswa</h1>
        <tr>
            <td><label for="nama">Nama</label></td> 
            <td> <input type="text" id="nama" name="nama"><br></td>
        </tr>
       
        <tr>
            <td><label for="nis">NIS</label></td> 
            <td> <input type="number" id="nis" name="nis"><br></td>
        </tr>
        
        <tr>
            <td><label for="rayon">Rayon</label></td> 
            <td> <input type="text" id="rayon" name="rayon"><br></td>
        </tr>

       <tr>
            <td> <button style="margin-left:45%; margin-top:10px" name="kirim" value="Tambah">Tambah</button></td>
        <tr>
        <tr>
            <td> <button style="margin-left:45%; margin-top:10px;" ><a href="reset.php">RESET</a></button><td>
        </tr>

    </form>
    </table>


        <!-- Logic -->
<?php
    session_start();

    if(!isset($_SESSION ['datastudent'])){
        $_SESSION['datastudent'] = array ();
    }

    if(isset($_POST['kirim'])){
        if(!empty($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])){
        $data = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon'],
            ];
        array_push($_SESSION['datastudent'],$data);
        }
    }

    if(isset ($_GET['hapus'])){
        $key = $_GET ['hapus'];
        unset ($_SESSION['datastudent'][$key]);
        header ("location: index.php");
        exit;

    }
        if (!empty($_SESSION['datastudent'])){
        foreach ($_SESSION['datastudent'] as $key => $value) {
            echo "nama:" . $value ['nama'] . '<br>';
            echo "nis:" . $value ['nis'] .'<br>';
            echo "rayon:" . $value ['rayon'] .'<br>';
            echo '<a href="?hapus=' . $key . '">hapus</a>';
            echo "<hr>";

        }

    
    }
        

    

    
    ?>
</body>
</html>

   