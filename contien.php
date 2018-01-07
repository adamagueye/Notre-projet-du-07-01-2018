<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
        <th>ID</th>
        <th>Numéro de pièce</th>
        <th>Nom & Prénom</th>
        <th>Téléphone</th>
    </tr>
    <?php
        include 'Proprietaire.php';
        $prop = new Proprietaire();
        $data = $prop->allProprietaire();
        while($row = $data->fetch()){
    ?>
            <tr>
                <th><?php echo $row['id']?></th>
                <th><?php echo $row['numPiece']?></th>
                <th><?php echo $row['nom']?></th>
                <th><?php echo $row['tel']?></th>
            </tr>
    <?php
        }
    ?>
    </table>
</body>
</html>