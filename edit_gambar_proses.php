<?php
echo $_POST["id"];
$id_gambar = uniqid();
$target_dir = "foto_produk/";
$file_gambar = $id_gambar . ' - ' . basename($_FILES["gambarProduk"]["name"]);
$target_file = $target_dir . $file_gambar;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
$check = getimagesize($_FILES["gambarProduk"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["gambarProduk"]["tmp_name"], $target_file)) {
        include('koneksi.php');
        $id = $_POST["id"];
        $sql = "UPDATE product SET gambar='$file_gambar' WHERE id=$id;";

        /**
         * @var mysqli $conn
         */
        if ($conn->query($sql) === TRUE) {
            $file_pointer = 'foto_produk/' . $_POST["idGambar"];
            echo $file_pointer;
            if (!unlink($file_pointer)) {
                echo("$file_pointer cannot be deleted due to an error");
            } else {
                echo("$file_pointer has been deleted");
            }
            header("location:edit_produk.php?id=$id");
            echo "New record created successfully";
        } else {
            echo "Error";
        }

        $conn->close();

    } else {
        echo "Gagal menyimpan.";
    }
}