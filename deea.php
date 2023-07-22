
<?php

if(isset($_POST['submit'])){

    $m=$_POST['m'];
    if($m=="ceccd19ee311aa73c14b7c8ff491ffed")
{
    header("Location: https://alexandrudiun.github.io/deeaandreea/");

}
else
{
    echo "Mai incearca o data";
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><3</title>
</head>
<body>
    <form action="" method="post" style="display:flex; text-align: center; justify-content: center; flex-direction:column;">
     Ca sa deblochezi trebuie sa introduci parola <br>
     Parola este insa criptata, asa ca trebuie sa o criptezi <br>
     Foloseste codul ascuns pe ultima pagina a agendei si cripeaza l in algoritm MD5 <a href="https://www.dcode.fr/md5-hash">aici</a> <br>
        <input type="text" name="m" id="m">
        <input type="submit" value="submit" name="submit">
    </form>

</body>
</html>