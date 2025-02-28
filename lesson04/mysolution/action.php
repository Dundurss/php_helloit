<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$user_data = [
    'admin' => 'admin123',
    'alahuabahhhh' => '9.11',
    'bap' => 'bap123'
];


if ($gender == "male") {
    $gender = "Puisis";
} elseif ($gender == "female") {
    $gender = "Meitene";
} else {
    $gender = "Nav norādīts";
}

$missing_fields = [];

if ($username === '') {
    $missing_fields[] = 'Lietotājvārds';
}
if ($password === '') {
    $missing_fields[] = 'Parole';
}
if ($gender === '') {
    $missing_fields[] = 'Dzimums';
}

// If fields are missing, redirect back
if (!empty($missing_fields)) {
    $_SESSION['errors'] = "Nav ievadīts kāds no laukiem";
    $_SESSION['old_data'] = [
        'username' => $username,
        'gender' => $gender
    ];

    header("Location: project.php");
    exit();
}

if (!(array_key_exists($username, $user_data) && $user_data[$username] === $password)) {
    $_SESSION['errors'] = "Nepareizs vārds vai parole";
    $_SESSION['old_data'] = [
        'username' => $username,
        'gender' => $gender
    ];
    header("Location: project.php");
    exit();
}

// All good, we are logged in
$_SESSION["greeting"] = htmlspecialchars($username);
$_SESSION['logged_in'] = true;


header("Location: profile.php");
exit();


?>