<?php
session_start();

// Retrieve error message and post-back data, if any.
$errorMessage = $_SESSION['errors']   ?? '';
$postBackData = $_SESSION['postback'] ?? [];

// Clear them out once read, so they don't persist for subsequent requests.
unset($_SESSION['errors'], $_SESSION['postback']);
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Pieteikšanās formas paraugs</title>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"           
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* General reset and styling */
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ABE2 0%, #5563DE 100%);
            color: #444;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container for form */
        .form-container {
            background: #fff;
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: slide-in 0.8s ease forwards;
        }
        @keyframes slide-in {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form title */
        .form-title {
            text-align: center;
            margin-bottom: 1rem;
            font-size: 1.8rem;
            color: #333;
            position: relative;
        }
        .form-title i {
            margin-right: 0.5rem;
            color: #5563DE;
        }

        /* Error box */
        .error {
            background: #fdecea;
            border: 1px solid #f5c6cb;
            border-radius: 6px;
            padding: 1rem;
            margin-bottom: 1rem;
            color: #c0392b;
            display: flex;
            align-items: center;
            animation: shake 0.3s ease;
        }
        .error i {
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }
        @keyframes shake {
            0% { transform: translateX(0); }
            20% { transform: translateX(-4px); }
            40% { transform: translateX(4px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
            100% { transform: translateX(0); }
        }

        /* Form groups */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: bold;
            color: #333;
        }
        
        /* Wrapping input in container to place icon absolutely */
        .input-container {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 0.6rem 0.6rem 0.6rem 2.2rem; /* Extra left padding for icon */
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s ease;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            outline: none;
            border-color: #5563DE;
        }

        /* Gender radio styling */
        .gender-options {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .gender-options label {
            font-weight: normal;
            display: inline-block;
            position: relative;
            margin-left: 0.3rem;
            top: -1px;
        }
        .gender-options input[type="radio"] {
            margin-right: 0.3rem;
        }

        /* Submit button */
        .btn-submit {
            background-color: #5563DE;
            color: #fff;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
        }
        .btn-submit i {
            margin-left: 0.5rem;
            font-size: 1rem;
        }
        .btn-submit:hover {
            background-color: #2a2e9e;
            box-shadow: 0 4px 12px rgba(85, 99, 222, 0.4);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2 class="form-title"><i class="fas fa-user-shield"></i> Pieteikšanās formas paraugs</h2>
    
    <?php if ($errorMessage): ?>
        <div class="error">
            <i class="fas fa-exclamation-triangle"></i>
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

    <form action="action.php" method="post">
        <!-- Username group -->
        <div class="form-group">
            <label for="id_username">Lietotājvārds:</label>
            <div class="input-container">
                <i class="fas fa-user input-icon"></i>
                <input
                    type="text"
                    name="username"
                    id="id_username"
                    value="<?php echo htmlspecialchars($postBackData['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="Ievadiet savu lietotājvārdu"
                >
            </div>
        </div>

        <!-- Password group -->
        <div class="form-group">
            <label for="id_password">Parole:</label>
            <div class="input-container">
                <i class="fas fa-lock input-icon"></i>
                <input
                    type="password"
                    name="password"
                    id="id_password"
                    placeholder="Ievadiet savu paroli"
                >
            </div>
        </div>

        <!-- Gender group -->
        <div class="form-group">
            <label>Dzimums:</label>
            <div class="gender-options">
                <div>
                    <input
                        type="radio"
                        name="gender"
                        id="gender_male"
                        value="male"
                        <?php echo (isset($postBackData['gender']) && $postBackData['gender'] === 'male') ? 'checked' : ''; ?>
                    >
                    <label for="gender_male">Vīrietis</label>
                </div>
                <div>
                    <input
                        type="radio"
                        name="gender"
                        id="gender_female"
                        value="female"
                        <?php echo (isset($postBackData['gender']) && $postBackData['gender'] === 'female') ? 'checked' : ''; ?>
                    >
                    <label for="gender_female">Sieviete</label>
                </div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn-submit">
            Iesniegt
            <i class="fas fa-paper-plane"></i>
        </button>
    </form>
</div>

</body>
</html>
