<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        // echo $name;
        // echo "<br>";
        // echo $psw;
        if (isset($_POST["submit"]))
        {
            $name = $_POST["name"];
            $psw = $_POST["psw"];
            echo "Hello $name, nice to meet you!"; 


            if ($name == "admin" && $psw == "12345") {
                echo "You are and admin!";
            }else if($name == "admin"){
                echo "i see your pasword is wrong";
            }
        } else{
            echo "EROR <a href='index.html'> Return to the form page!</a>";
        }
    ?>
        
</body>
</html>