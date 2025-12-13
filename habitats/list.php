<?php
include("../config/db.php");

$habitats = mysqli_query($conn, "SELECT * FROM habitats ORDER BY IdHab DESC");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Liste des Habitats</h2>
    <a href="add.php" class="btn btn-primary mb-3">Ajouter un Habitat</a>

    <div class="row g-4">
        <?php if(mysqli_num_rows($habitats) > 0): ?>
            <?php while($h = mysqli_fetch_assoc($habitats)): ?>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5 class="card-title"><?= $h['NomHab']; ?></h5>
                        <p class="card-text"><?= $h['Description_Hab']; ?></p>
                        <a href="edit.php?id=<?= $h['IdHab']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="delete.php?id=<?= $h['IdHab']; ?>" onclick="return confirm('Supprimer cet habitat ?');" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center mt-3">Aucun habitat trouvé.</p>
        <?php endif; ?>
    </div>
</div>
