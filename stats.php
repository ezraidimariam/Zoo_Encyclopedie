<?php
include("config/db.php");

// Stats by Type Alimentaire
$typeQuery = mysqli_query($conn, "SELECT Type_alimentaire, COUNT(*) AS total FROM animals GROUP BY Type_alimentaire");
$typeLabels = $typeData = [];
while ($row = mysqli_fetch_assoc($typeQuery)) {
    $typeLabels[] = $row['Type_alimentaire'];
    $typeData[] = $row['total'];
}

// Stats by Habitat
$habQuery = mysqli_query($conn, "SELECT h.NomHab, COUNT(a.ID) AS total
                                FROM habitats h
                                LEFT JOIN animals a ON a.IdHab = h.IdHab
                                GROUP BY h.NomHab");
$habLabels = $habData = [];
while ($row = mysqli_fetch_assoc($habQuery)) {
    $habLabels[] = $row['NomHab'];
    $habData[] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Statistiques Animaux</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body { background:#f0f8ff; font-family: Arial, sans-serif; }
.home-btn { text-decoration:none; background:#0d6efd; color:white; padding:6px 14px; border-radius:20px; font-weight:bold; font-size:2rem; }
.card { border-radius:15px; padding:15px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }
h2 { text-align:center; margin-bottom:30px; color:#1e3c72; }
canvas { width:100% !important; max-height:250px; }
</style>
</head>
<body>

<div class="text-end p-3">
    <a href="index.php" class="home-btn">🏠 Home</a>
</div>

<div class="container">
    <h2>📊 Statistiques des Animaux</h2>
    <div class="row g-4 justify-content-center">

        <div class="col-md-6">
            <div class="card text-center">
                <h5>Par Type Alimentaire</h5>
                <canvas id="typeChart"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center">
                <h5>Par Habitat</h5>
                <canvas id="habChart"></canvas>
            </div>
        </div>

    </div>
</div>

<script>
new Chart(document.getElementById('typeChart'), {
    type:'pie',
    data:{
        labels: <?= json_encode($typeLabels); ?>,
        datasets:[{ data: <?= json_encode($typeData); ?>, backgroundColor:['#3498db','#2ecc71','#e74c3c','#f1c40f','#9b59b6'] }]
    }
});

new Chart(document.getElementById('habChart'), {
    type:'bar',
    data:{
        labels: <?= json_encode($habLabels); ?>,
        datasets:[{ label:'Nombre d\'animaux', data: <?= json_encode($habData); ?>, backgroundColor:'#9b59b6' }]
    },
    options:{
        responsive:true,
        scales:{ y:{ beginAtZero:true } }
    }
});
</script>

</body>
</html>
