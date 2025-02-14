<?php
$aray = [1, 2, 3, 4, 5];
$result = 0;

for ($i = 0; $i < count($aray); $i++)
{
    echo $aray[$i];
}

echo "<br>";

for ($i = 0; $i < count($aray); $i++)
{
    $result = $result + $aray[$i];
}

echo $result;
echo '<br>';

echo "<br>2. uzdevums 2 <br>";
$skaitli = [];
for ($i = 10; $i>0; $i--) {
    $skaitli[] = $i;
}
print_r($skaitli);
echo "<br><br>";

echo "3. foreach cikli <br>";

foreach ($skaitli as $a) {
    echo $a . "<br>";
}

$student = ["Miks" => 8, "Jhons" => 10];

foreach ($student as $sm => $value) {
    echo $sm. "=>". $value;
}

?>