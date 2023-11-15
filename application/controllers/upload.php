<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Arquivo é uma imagem - " . $check["mime"] . ".";
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "A imagem ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi enviada.";
        } else {
            echo "Desculpe, houve um erro ao enviar sua imagem.";
        }
    } else {
        echo "Arquivo não é uma imagem.";
    }
}
?>
