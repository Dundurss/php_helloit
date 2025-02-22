<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {box-sizing: border-box;}

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0px 10%;
            width: 80%;
        }
        h1, h2 {
            text-align: left;
            margin-bottom: 20px;
        }
        pre {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
            overflow-x: auto;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        ul {
            list-style: none;
            padding: 0;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        li {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 16px;
        }
        li:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <?php
    $pilsetas_vietas = [
        "Ventspils" => ["Pludmale", "Tehnikums", "Disenīte"],
        "Kūldīga" => ["Krodziņš", "Kafejnīc"]
    ];

    $max_skaits = 0;
    $max_pilseta = "";
    $max_vietas = [];

    foreach ($pilsetas_vietas as $pilseta => $vietas) {
        if (count($vietas) > $max_skaits) {
            $max_pilseta = $pilseta;    
            $max_vietas = $vietas;
            $max_skaits = count($vietas);
        }
    }
    ?>
    <h2>Uzdevuma apraksts un ievaddati</h2>
    <p>Uzevums. No ievaddatiem atrast pilsētu ar visvairāk interesantajām vietām un parādīt uz 
        ekrāna attiecīgās pilsētas interesantās vietas</p>
    <pre><?php print_r($pilsetas_vietas); ?></pre>    

    <h2>Pilsēta ar visvairāk populārajām vietām - <?php echo htmlspecialchars($max_pilseta); ?></h2>
    <ul>
        <?php foreach ($max_vietas as $vieta): ?>
            <li><?php echo htmlspecialchars($vieta); ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>