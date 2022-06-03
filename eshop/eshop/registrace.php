<?php
include_once 'header.php';
?>
<link href="css/login.css" rel="stylesheet" />
<section class="prihlaseni">
<h2>Zaregistrovat se</h2>
<form  action="inc/registrovat.inc.php" method="POST">
<input type="text" name="name" placeholder="Celé jméno">
<input type="text" name="uid" placeholder="Uživatelské jméno">
<input type="text" name="email" placeholder="Email">
<input type="password" name="pwd" placeholder="Heslo">
<input type="password" name="pwdrep" placeholder="Heslo znovu">
    <button  type="submit" name="submit">Zaregistrovat
        se</button>
</form>
</div>
<?php
if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput"){
        echo "<p class='text-centre' >Vyplňte všechna pole!</p>";
    }
    else if ($_GET["error"] == "invaliduid"){
        echo "<p >Napište správné jméno!</p>";
    }
    else if ($_GET["error"] == "invalidemail"){
        echo "<p >Napište správný email!</p>";
    }
    else if ($_GET["error"] == "passworddontmatch"){
        echo "<p >Hesla se neshodují!</p>";
    }
    else if ($_GET["error"] == "stmtfailed"){
        echo "<p >Něco se pokazilo, zkuste to znovu.</p>";
    }
    else if ($_GET["error"] == "usernametaken"){
        echo "<p >Uživatelské jméno už existuje!</p>";
    }
    else if ($_GET["error"] == "none"){
        echo "<p >Úspěšně jste se zaregistroval!</p>";
    }
}
?>

<p class="new">
        Už máte účet?
        <a href="prihlaseni.php">
            Přihlašte se!
        </a>
    </p>
</section>
</section>



