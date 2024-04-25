<?php
        $koneksi = mysqli_connect("localhost", "root", "", "tugas_php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "DELETE FROM todolist WHERE id='$id'";
        $result = mysqli_query($koneksi,$query);

        if ($result == 1) {
            header("Location: todolist.php");
        }

    }



?>