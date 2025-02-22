<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzd.3</title>
    <style></style>
</head>

<body>
    <?php
    $pilsētas_vietas = [
        "Kūldīga" => ["pludmale", "cirks"],
        "Jelgava" => ["kino", "atrakciju parks", "ūdensparks/basēns"]
    ];

    $max_vietas = [];
    $max_pilsēta = " ";
    $max_skaits = 0;

    foreach ($pilsētas_vietas as $pilsētas => $vietas) {
        if (count($vietas) > $max_skaits) {
            $max_vietas = $vietas;
            $max_pilsēta = $pilsētas;
            $max_skaits = count($vietas);
        }
    }

    ?>
    <pre><?php print_r($pilsētas_vietas); ?></pre>

    <h3><?php echo $max_pilsēta?></h3>
    <ol>
        <?php foreach ($max_vietas as $vieta): ?>
            <li><?php echo htmlspecialchars($vieta); ?>
        <?php endforeach; ?>
    </ol>
</body>

</html>