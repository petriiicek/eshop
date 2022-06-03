<?php
    session_start();

    @include_once '../dbh.inc.php';
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "logindb";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Připojení selhalo: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Káves</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Domů</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">O nás</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Další</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="products.php">Všechny produkty</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Populární zboží</a></li>
                            </ul>
                            <?php
                                if(isset($_SESSION["useruid"])){
                                    echo "<li class='nav-item'><a class='nav-link' href='profile.php'>Účet</a></li>";
                                    echo "<li class='nav-item'><a class='nav-link' href='inc/Logout.inc.php'>Odhlásit se</a></li>";
                                }
                                else{
                                    echo "<li class='nav-item'><a class='nav-link' href='prihlaseni.php'>Přihlásit se</a></li>";
                                    echo "<li class='nav-item'><a class='nav-link' href='registrace.php'>Zaregistrovat se</a></li>";
                                }
                            ?>

                            
                        </li>
                    </ul>
                    <form class="d-flex">
                    <?php
      
                    $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                    $row_count = mysqli_num_rows($select_rows);

                    ?>
                        <button class="btn btn-outline-dark" type="submit">
                        <a href="cart.php" class="bi-cart-fill me-1">Košík <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $row_count; ?></span> </a>
                        </button>
                      
                    </form>
                </div>
            </div>
        </nav>


        