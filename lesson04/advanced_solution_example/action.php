<?php
session_start();

/**
 * Helper function to cleanly fetch and trim POST values.
 */
function getPostValue(string $key): string
{
    return trim($_POST[$key] ?? '');
}

/**
 * Helper function to store errors and post-back data in session,
 * then redirect to the form. This helps avoid repeating the same
 * lines of code in multiple places.
 */
function redirectWithErrorsAndPostData(string $errorMessage, array $postData): void
{
    $_SESSION['errors']   = $errorMessage;
    $_SESSION['postback'] = $postData;
    
    header("Location: index.php");
    exit;
}

/**
 * Example “real-world” user credentials with hashed passwords.
 * Note: You’d typically load this from a database.
 * For a demonstration, we hardcode them here.
 */
$validUsers = [
    'admin' => password_hash('admin123', PASSWORD_DEFAULT),
    'user1' => password_hash('mypassword', PASSWORD_DEFAULT),
    'john'  => password_hash('doe123', PASSWORD_DEFAULT),
];

// Grab all fields. This array can help keep the code more organized.
$fields = [
    'username' => getPostValue('username'),
    'password' => getPostValue('password'),
    'gender'   => getPostValue('gender'),
];

// Create a simpler post-back array (we don’t send back the password).
$postBackData = [
    'username' => $fields['username'],
    'gender'   => $fields['gender'],
];

// Map field keys to their human-readable names for better error messages.
$requiredFields = [
    'username' => 'lietotājvārds',
    'password' => 'parole',
    'gender'   => 'dzimums',
];

// Check for missing required fields.
$missingFields = [];
foreach ($requiredFields as $fieldKey => $fieldName) {
    if ($fields[$fieldKey] === '') {
        $missingFields[] = $fieldName;
    }
}
// If any required fields are missing, store error message and post-back data in session.
if (!empty($missingFields)) {    
    $message = "Šādi obligātie lauki nav aizpildīti: <strong>" 
               . implode(', ', $missingFields) 
               . "</strong>";
    redirectWithErrorsAndPostData($message, $postBackData);
}

// At this point, all required fields are provided. Next, validate credentials.
$username = $fields['username'];
$password = $fields['password'];

if (isset($validUsers[$username]) && password_verify($password, $validUsers[$username])) {
    // Clear stored session errors if any, since we succeeded.
    unset($_SESSION['errors'], $_SESSION['postback']);
    echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . ", laipni lūdzam sistēmā!";
} else {
    // Credentials did not match any known user.
    redirectWithErrorsAndPostData("Nepareizs lietotājvārds vai parole.", $postBackData);
}
