<?php
include_once 'header.php';
?>

<section class="prihlaseni">
<h2 class="text-center">Přihlásit se</h2>
<div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-3 row-cols-xl-4 justify-content-center">
<form action="inc/prihlasit.inc.php" method="post">
<input type="text" name="uid" placeholder="Uživatelské jméno/Email">
<input type="password" name="pwd" placeholder="Heslo">
<button class="btn btn-outline-dark justify-content-right mt-auto type="submit" name="submit">Přihlásit se</button>
</form>
</div>
<?php
if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput"){
        echo "<p class='text-centre'>Vyplňte všechna pole!</p>";
    }
    else if ($_GET["error"] == "wrongLogin"){
        echo "<p>Zadal jste nesprávný přihlašovací údaj!</p>";
    }
}
?>

<p>
            New Here?
            <a href="register.php">
                Click here to register!
            </a>
        </p>
</section>


