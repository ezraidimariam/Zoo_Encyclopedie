<?php include 'includes/header.php'; ?>
<div class="container">
    <h1 class="title">📚 Zoo Encyclopédie</h1>
    <p class="subtitle">Apprendre les animaux du zoo devient un jeu amusant !</p>

    <div class="actions">
        <a href="animal_add.php" class="btn">+ Ajouter un animal</a>
        <a href="habitat_add.php" class="btn secondary">+ Ajouter un habitat</a>
    </div>

    <h2 class="section-title">Liste des animaux</h2>

    <div class="cards">
        <?php
        include 'db.php';
        $req = $conn->query("SELECT * FROM animals");
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            echo "
            <div class='card'>
                <img src='assets/img/".$row['Image']."' alt='".$row['NomAnimal']."'>
                <h3>".$row['NomAnimal']."</h3>
                <p>Type : ".$row['Type_alimentaire']."</p>
                <div class='card-actions'>
                    <a href='animal_edit.php?id=".$row['IdAnimal']."' class='edit'>Modifier</a>
                    <a href='animal_delete.php?id=".$row['IdAnimal']."' class='delete'>Supprimer</a>
                </div>
            </div>";
        }
        ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
