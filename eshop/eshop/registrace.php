<?php
include_once 'header.php';
?>

<section class="prihlaseni">
<h2 class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">Zaregistrovat se</h2>
<div class="container px-4 px-lg-5 my-5">
<form class="input-group" action="inc/registrovat.inc.php" method="POST">
<input type="text" name="name" placeholder="Celé jméno">
<input type="text" name="uid" placeholder="Uživatelské jméno">
<input type="text" name="email" placeholder="Email">
<input type="password" name="pwd" placeholder="Heslo">
<input type="password" name="pwdrep" placeholder="Heslo znovu">
<button class="btn btn-outline-dark mt-auto type="submit" name="submit">Zaregistrovat se</button>
</form>
</div>
<?php
if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput"){
        echo "<p class='text-center'>Vyplňte všechna pole!</p>";
    }
    else if ($_GET["error"] == "invaliduid"){
        echo "<p class='text-center'>Napište správné jméno!</p>";
    }
    else if ($_GET["error"] == "invalidemail"){
        echo "<p class='text-center'>Napište správný email!</p>";
    }
    else if ($_GET["error"] == "passworddontmatch"){
        echo "<p class='text-center'>Hesla se neshodují!</p>";
    }
    else if ($_GET["error"] == "stmtfailed"){
        echo "<p class='text-center'>Něco se pokazilo, zkuste to znovu.</p>";
    }
    else if ($_GET["error"] == "usernametaken"){
        echo "<p class='text-center'>Uživatelské jméno už existuje!</p>";
    }
    else if ($_GET["error"] == "none"){
        echo "<p class='text-center'>Úspěšně jste se zaregistroval!</p>";
    }
}
?>
</section>



