<?php
include_once 'header.php';
?>
<link href="css/login.css" rel="stylesheet" />
<section class="prihlaseni">
    <h2 class="text-center">Přihlásit se</h2>
    <div >
        <form action="inc/prihlasit.inc.php" method="post">
            <input type="text" name="uid" placeholder="Uživatelské jméno/Email">
            <input type="password" name="pwd" placeholder="Heslo">
            <button  type="submit" name="submit">Přihlásit
                se</button>
        </form>
    </div>
    <?php
if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput"){
        echo "<p class='text-centre'>Vyplňte všechna pole!</p>";
    }
    else if ($_GET["error"] == "wrongLogin"){
        echo "<p class='text-centre'>Zadal jste nesprávný přihlašovací údaj!</p>";
    }
}
?>

    <p class="new">
        Jste zde nový?
        <a href="registrace.php">
            Založte si účet!
        </a>
    </p>
</section>




