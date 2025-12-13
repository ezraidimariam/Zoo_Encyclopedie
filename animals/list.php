<?php
include("../config/db.php");

$habitats = mysqli_query($conn, "SELECT * FROM habitats");

$filterHabitat = isset($_GET['habitat']) ? $_GET['habitat'] : '';
$filterType = isset($_GET['type']) ? $_GET['type'] : '';

$sql = "SELECT animals.ID, animals.Nom, animals.Type_alimentaire, animals.Image, habitats.NomHab
        FROM animals
        LEFT JOIN habitats ON animals.IdHab = habitats.IdHab
        WHERE 1=1";

if($filterHabitat != ''){
    $sql .= " AND animals.IdHab='".mysqli_real_escape_string($conn, $filterHabitat)."'";
}

if($filterType != ''){
    $sql .= " AND animals.Type_alimentaire='".mysqli_real_escape_string($conn, $filterType)."'";
}

$sql .= " ORDER BY animals.ID DESC";

$animals = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Animaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: #f0f8ff; 
            font-family: Arial, sans-serif; 
        }
        .home-btn {
            text-decoration:none; 
            background:#0d6efd; 
            color:white; 
            padding:5px 12px; 
            border-radius:20px;
            font-weight:bold;
            font-size: 2rem;
        }
        .card-animal {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            border-radius: 0.75rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-animal:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .card-animal img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }
        .card-body {
            display: flex;
            flex-direction: column;
        }
        .btn-group {
            margin-top: auto;
        }
    </style>
</head>
<body>

<div class="text-end p-2">
    <a href="../index.php" class="home-btn">🏠 Home</a>
</div>

<div class="container">
    <h2 class="mb-4 text-center">Liste des Animaux</h2>

    <!-- Filters -->
    <form method="GET" class="row g-2 filter-form mb-4">
        <div class="col-md-4">
            <select name="habitat" class="form-select">
                <option value="">--Filtrer par Habitat--</option>
                <?php while($h = mysqli_fetch_assoc($habitats)) { ?>
                    <option value="<?= $h['IdHab']; ?>" <?= $filterHabitat==$h['IdHab']?'selected':''; ?>>
                        <?= $h['NomHab']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select name="type" class="form-select">
                <option value="">--Filtrer par Type Alimentaire--</option>
                <option value="Carnivore" <?= $filterType=='Carnivore'?'selected':''; ?>>Carnivore</option>
                <option value="Herbivore" <?= $filterType=='Herbivore'?'selected':''; ?>>Herbivore</option>
                <option value="Omnivore" <?= $filterType=='Omnivore'?'selected':''; ?>>Omnivore</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary w-100">Filtrer</button>
            <a href="list.php" class="btn btn-secondary w-100 mt-1">Reset</a>
        </div>
    </form>

    <!-- Animals Cards -->
    <div class="row g-4">
        <?php if(mysqli_num_rows($animals) > 0): ?>
            <?php while($a = mysqli_fetch_assoc($animals)): ?>
                <div class="col-md-4">
                    <div class="card card-animal">
                        <img src="../uploads/<?= $a['Image']; ?>" alt="<?= $a['Nom']; ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $a['Nom']; ?></h5>
                            <p class="card-text">Type: <?= $a['Type_alimentaire']; ?></p>
                            <p class="card-text">Habitat: <?= $a['NomHab']; ?></p>
                            <div class="btn-group mt-auto d-flex flex-column gap-1">
                                <a href="edit.php?id=<?= $a['ID']; ?>" class="btn btn-warning w-100">Modifier</a>
                                <a href="delete.php?id=<?= $a['ID']; ?>" onclick="return confirm('Supprimer cet animal ?');" class="btn btn-danger w-100">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center mt-3">Aucun animal trouvé.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
