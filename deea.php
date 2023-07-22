<?php
// Initialize the error message
$errorMsg = '';

// Define the correct encrypted password
$correctPasswordHash = 'ceccd19ee311aa73c14b7c8ff491ffed';

// Check if the form was submitted
if (isset($_POST['submit'])) {
    $enteredPassword = $_POST['m'];
    
    // Check if the entered password matches the correct password hash
    if (md5($enteredPassword) === $correctPasswordHash) {
        // Redirect to the success page
        header("Location: https://alexandrudiun.github.io/deeaandreea/");
        exit(); // Ensure that the script stops executing after the redirect
    } else {
        // Display an error message
        $errorMsg = "Mai incearca o data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&lt;3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        #form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-msg {
            color: red;
            margin-top: 10px;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25%, 75% {
                transform: translateX(-5px);
            }
            50% {
                transform: translateX(5px);
            }
        }

        /* Styles for the submit button */
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        /* Link styles */
        a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <div id="form-container">
        <form action="" method="post" style="text-align: center;">
            Ca sa deblochezi trebuie sa introduci parola <br>
            Parola este insa decriptata, asa ca trebuie sa o criptezi <br>
            Foloseste codul ascuns pe ultima pagina a agendei si cripeaza-l in algoritm MD5 <a href="https://www.dcode.fr/md5-hash">aici</a> <br>
            <br>
            <br>
            <input type="text" name="m" id="m">
            <br>
            <br>
            <input type="submit" value="submit" name="submit" class="submit-btn">
            <br>
            <?php if ($errorMsg !== '') echo "<div class='error-msg'>$errorMsg</div>"; ?>
            <br>
        </form>
    </div>

    <script>
        // Your JavaScript code here (if needed)
    </script>
</body>
</html>