<?php 
// sprawdzić czy wysłaiśmy POST
//połączenie z db
// sprawdzić czy user istnieje
echo "<pre>" . var_dump($_POST) . "</pre>";
if(isset($_POST["input-email"]) && isset($_POST["input-password"]) ){
    $db = @new mysqli("localhost","root","","logowanie");
    mysqli_set_charset($db, "utf8");
    if($db->connect_errno!=0){
        echo "Error: ".$db->connect_errno." Opis ".$db->connect_errno;
    }
    else{
        $login = $_POST['input-email'];
        $haslo = $_POST['input-password'];
    }

    $sql = "INSERT INTO users (haslo, login ) VALUES ('$haslo', '$login')";

    if(mysqli_query($db, $sql)){
    echo "Udało się dodać rekordy do bazy danych";
    }  
    else{
    echo "ERROR: $sql. " . mysqli_error($db);
    }
    mysqli_close($db);
}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <div class="form-box">
           <div class="form-value">
            <form action="" method="POST">
                <h2>Login</h2>
                <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" name="input-email" id="input-email" required>
                    <label for="input-email">Email</label>
                </div>

                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="input-password" id="input-password" required>
                    <label for="">Password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember me  <a href="#">Forget password</a></label>
                </div>
                <button type="submit"> Log in</button>
                <div class="register">
                    <p>Don't have a  account <a href="#">Register</a></p>
                </div>
            </form>
           </div>
        </div>
    </section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>