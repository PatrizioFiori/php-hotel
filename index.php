<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-HOTEL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>

<h1 class="mx-2">Tabella degli Hotel </h1>

<br>
<form action="" method="get">

<div class="d-flex mb-3">
    <label>
        <input type="checkbox" name="parking" value="1">
        Mostra solo hotel con parcheggio
    </label>
    
    
    <label class="mx-5">
        <input type="number" name="voto" value="" min="1" max="5">
        Voto
    </label>
</div>
    
    <button type="submit" class="btn btn-primary">Filtra gli Hotel</button>

</form>


<br>



<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Parcheggio</th>
            <th>Voto</th>
            <th>Distanza dal centro (km)</th>
        </tr>
    </thead>
    <tbody>


    <?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filterParking = $_GET["parking"] ?? 0;
    $filterVote = $_GET["voto"] ?? 0;
    $found = false;


    foreach($hotels as $hotel){

        if($filterParking == 1 && $hotel["parking"] == false) continue;
        if($hotel["vote"] < $filterVote) continue;

        $found = true;
        echo "<tr>";
        foreach($hotel as $key => $value){
            echo "<td>" . ($key === "parking" ? ($value ? "Sì" : "No") : $value) . "</td>"; 

        }
        

        echo "</tr>";
};

if (!$found) {
    echo "<tr><td colspan='5' class='text-center'>Nessun hotel trovato</td></tr>";
}
?>

    </tbody>
</table>

</body>

</html>