<?php
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)) {
    header('Location: project.php');
    exit();
}

print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Kristers Dzenis - profile</title>
    <style>

        * { box-sizing: border-box;}
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74ABE2 0%, #5563DE 100%);
            color: #333;
            margin: 0;
            padding: 20px;
            font-size: 16px;
            min-height: 100vh;
        }

        a {
            color: #1e90ff;
            text-decoration: none;
            transition: color 0.3s;
        }

        /* profile Container */
        .profile-container {            
            max-width: 1200px;
            margin: 40px auto;
            background-color: #ffffff;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
    
        /* profile Body Layout */
        .profile-body {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        /* Left Side (Photo + Contact) */
        .profile-left {
            flex: 1;
            padding: 20px;
            background-color: #f0f4f7;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .profile-left img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Contact Details */
        .contact-details h3 {
            font-size: 18px;
            color: #1e90ff;
            margin-bottom: 15px;
        }

        /* profile Right Content */
        .profile-right {
            flex: 2;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-right section {
            margin-bottom: 30px;
        }

        .profile-right h3 {
            font-size: 20px;
            color: #1e90ff;
            margin-bottom: 10px;
            border-bottom: 2px solid #1e90ff;
            padding-bottom: 5px;
            transition: color 0.3s;
        }

        /* Motivation Letter */
        .profile-right p {
            font-size: 16px;
            line-height: 1.6;
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.1);
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-body {
                flex-direction: column;
            }
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-right {            
            display:flex;
            gap:10px;
        }

        .logout-btn {
            background-color: #5563DE;
            color: #fff;
            padding: 0.5rem 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">My Profile</div>
        <div class="nav-right">
            <button class="logout-btn" onclick="window.location.href='logout.php';">Logout</button>
        </div>
    </div>

    <div class="profile-container">
        <!-- Main profile Body -->
        <div class="profile-body">
            <!-- Left Side (Photo + Contact) -->
            <div class="profile-left">
                <img src="assets/Kristers.jpg.jpg" alt="Portrait of Kristers Dzenis">
                <div class="contact-details">
                    <h3>Kristers Dzenis 12 gadi</h3>
                    
                </div>
            </div>

            <!-- Right Side (Main Content) -->
            <div class="profile-right">
                <!-- Strong Subjects -->
                <section>
                    <h3>Strong Subjects</h3>
                    <ul>
                        <li>Math</li>
                        <li>English</li>
                        <li>Computing</li>
                    </ul>
                </section>

                <!-- Education -->
                <section>
                    <h3>Education</h3>
                    <ul>
                        <li>J. Šteinhauera vidusskola</li>
                        <li>Programming Courses - Hello IT</li>
                        <li>RVVĢ</li>
                    </ul>
                </section>

                <!-- Interests -->
                <section>
                    <h3>Interests</h3>
                    <ul>
                        <li>Programming</li>
                        <li>Ice Skating</li>
                        <li>Video Games</li>
                    </ul>
                </section>

            </div>
        </div>
    </div>

    <script>        
        <?php if (isset($_SESSION["greeting"])) : ?>            
            Swal.fire({
                title: "Sveiki, <?php echo htmlspecialchars($_SESSION["greeting"]) ?>. Jūs veiksmīgi pierakstījāties sistēmā.",
                width: 600,
                padding: "3em",
                color: "#5563DE",
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("/users/lesson04/mysolution/assets/yC.gif")
                    left top
                    no-repeat
                `
            });         
        <?php 
            unset($_SESSION["greeting"]);
        endif; ?>
    </script>
</body>

</html>