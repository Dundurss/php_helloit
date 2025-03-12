<?php
session_start();

$error_message = isset($_SESSION['errors']) ? $_SESSION['errors'] : '';
unset($_SESSION['errors']);

$old_data = isset($_SESSION['old_data']) ? $_SESSION['old_data'] : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logins</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #74ABE2 0%, #5563DE 100%);
            font-family: Arial, sans-serif;
            margin: auto;            
            max-width: 500px;
            min-height: 100vh;
            padding-top:100px;
        }

        form {            
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            display: inline-block;
            width: 15%;
        }

        .radio-value-label {
            font-weight: 200;
            width: 15%;
        }

        .error {
            background: #fdd;
            border: 1px solid #f99;
            padding: 0.5rem;
            margin-bottom: 1rem;
            color: #900;
        }

        input {
            font-size:1rem;
        }

        input[type="radio"] {
            margin-left: 0;
        }

        input[type="submit"] {            
            background-color: #5563DE;
            color: #fff;
            padding: 0.7rem 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
         background-color: #2980b9;
        }

        input[type="text"],input[type="password"] {
            width: 80%;
            padding:0.5rem;
            border: 1px solid #000000;            
            border-radius: 4px;
        }
        h1{
            margin-top: unset;
        }
    </style>
</head>

<body>    
    <form method="post" action="action.php">
        <h1>Pieteikšanās sistēmā</h1>

        <?php if ($error_message): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <label for="username">Vārds: </label>
        <input type="text" 
        name="username" 
        id="username" accept 
        value = <?php echo isset($old_data['username']) ? htmlspecialchars
        ($old_data['username']) : ''; ?>
        >
        
        <br><br><br>

        <label for="password">Parole: </label>
        <input type="password" name="password" id="password">
        
        <br><br><br>

        <input type="submit" name="submit" id="submit" value="Iesniegt">
    </form>
</body>

</html>