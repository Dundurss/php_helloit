<?php
// Dark mode styles & simplified structure

// Function to check divisibility by 3
function checkDivisibility($num)
{
    return $num % 3 == 0 ? "<p class='green'>$num dalās ar 3</p>" : "<p class='red'>$num nedalās ar 3</p>";
}

// Exercise 1 & 2 - Check divisibility
function exercise($numbers)
{
    echo checkDivisibility($numbers[2]);
}

// Exercise 3 - Display currency information
function exercise3()
{
    $countries = ["Latvija" => "€", "Lielbritānija" => "£"];
    $countries["Cita_valsts"] = "Cita nauda";

    echo "<h4>Valstu valūtas</h4>";
    echo "<pre>" . print_r($countries, true) ."</pre>";

    echo "<h4>Uzdevuma atbilde</h4>";
    echo "<p class='blue'>Latvijā ir " . $countries["Latvija"] . "</p>";
}

// Exercise 4 - Check if name is Juris
function exercise4()
{
    $person = ["vards" => "Kristers", "vecums" => 19];

    $data = "<pre>" . print_r($person, true) . "</pre>";

    if ($person["vecums"] > 18 && $person["vards"] == "Juris") {
        $result = "<p class='blue'>Jā, tas ir Juris.</p>";
    } elseif ($person["vards"] == "Juris") {
        $result = "<p class='orange'>Nē, tas nav īstais Juris.</p>";
    } else {
        $result = "<p class='orange'>Tas galīgi nav Juris!</p>";
    }

    return ["data" => $data, "result" => $result];
}
?>

<!DOCTYPE html>
<html lang="lv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mācību Vide</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Otrā php nodarbība</h2>

        <h3>Uzdevums 1 & 2</h3>
        <hr>
        <div class="exercise"><?php exercise([1, 2, 3, 4, 5]); ?></div>
        <div class="exercise"><?php exercise([6, 7, 8, 9, 10]); ?></div>

        <h3>Uzdevums 3</h3>
        <hr>
        <div class="exercise">
            <h4>Uzdevums</h4>
            <p><i>Dotas valstu valūtas asociatīvu masīvu veidā. Izvadīt kāda ir valūta Latvijā (vai jebkurā citā valstī).</i></p>
            <?php exercise3(); ?>
        </div>

        <h3>Uzdevums 4</h3>
        <hr>
        <div class="exercise">
            <h4>Uzdevums</h4>
            <p><i>Doti personas dati (vecums, vārds) asociatīva masīva formā. Noskaidrot vai persona ir Juris, un vai Jurim ir vairāk kā 18 gadi. </i></p>
            <?php $output = exercise4(); ?>
            <h4>Personas dati</h4>
            <?php echo $output["data"]; ?>
            <h4>Uzdevuma atbilde</h4>
            <?php echo $output["result"]; ?>            
        </div>

        <h3>Manas piezīmes par asociatīvajiem masīviem</h3>
        <hr>
        <h4>Asociatīvā masīva izmantošana ar nosacījumiem</h4>
        <p>Asociatīvos masīvus var kombinēt ar nosacījumiem, lai dinamiski piekļūtu datiem:</p>
        <pre class="code-example">
$person = [
    "vards" => "Kristers",
    "vecums" => 19
];

if ($person["vecums"] > 18) {
    echo $person["vards"] . " ir pilngadīgs.";
} else {
    echo $person["vards"] . " nav pilngadīgs.";
}
        </pre>

        <h4>Asociatīvo masīvu izmantošana ar cikliem</h4>
        <p>Ja nepieciešams apstrādāt lielāku datu kopu, izmanto <code>foreach</code> ciklu:</p>
        <pre class="code-example">
$countries = [
    "Latvija" => "€",
    "Lielbritānija" => "£",
    "ASV" => "$"
];

foreach ($countries as $country => $currency) {
    echo "$country izmanto valūtu $currency. <br>";
}
        </pre>
        
        <p>Šis kods izvadīs:</p>
        <pre class="code-example">
Latvija izmanto valūtu €.
Lielbritānija izmanto valūtu £.
ASV izmanto valūtu $.
        </pre>

        <h4>Daudzlīmeņu asociatīvie masīvi</h4>
        <p>Dažreiz dati jāorganizē vairākos līmeņos, piemēram, saglabājot personas informāciju:</p>
        <pre class="code-example">
$people = [
    "Kristers" => ["vecums" => 19, "valsts" => "Latvija"],
    "Anna" => ["vecums" => 25, "valsts" => "Lielbritānija"]
];

echo $people["Kristers"]["valsts"]; // Izvada: Latvija
</pre>

        <h4>Asociatīvo masīvu praktiskā pielietošana</h4>
        <ul>
            <li><b>Datu glabāšana un piekļuve:</b> piemēram, lietotāju profilu informācija</li>
            <li><b>API datu glabāšana:</b> JSON formāta pārveidošana PHP masīvā</li>
            <li><b>Konfigurācijas iestatījumi:</b> piemēram, daudzvalodu lapu lokalizācija</li>
            <li><b>Saistītu datu apstrāde:</b> piemēram, produktu katalogs ar cenām</li>
        </ul>
    </div>
</body>

</html>