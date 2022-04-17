<?php

// Je vérifie que le formulaire est soumis, comme pour tout traitement de formulaire.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés (attention ce dossier doit être accessible en écriture)
    $uploadDir = 'public/uploads/';

    // le nom de fichier sur le serveur est celui du nom d'origine du fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    // Les extensions autorisées
    $authorizedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    // Le poids max géré par PHP par défaut est de 2M
    $maxFileSize = 2000000;

    // Je sécurise et effectue mes tests

    /****** Si l'extension est autorisée *************/
    if ((!in_array($extension, $authorizedExtensions))) {
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou Gif ou Webp !';
    }

    /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire moins de 2M !";
    }

    /****** Si je n'ai pas d"erreur alors j'upload *************/
    /**
        TON SCRIPT D'UPLOAD
     */
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label for="firstname">Your firstname -> </label>
        <input type="text" name='firstname' id="firstname" />
        <label for="lastname">Your lastname -> </label>
        <input type="text" name="lastname" id="name" />
        <label for="old">Your old -> </label>
        <input type="number" name="old" id="old" />
        <label for="imageUpload">Upload an profile image</label>
        <input type="file" name="avatar" id="imageUpload" />
        <button name="send">Send</button>
    </form>
    <?php
    var_dump($_POST);
    var_dump($_FILES);
    ?>
</body>

</html>