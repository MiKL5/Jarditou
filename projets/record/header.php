<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!-- Bootstrap css -->
        <link href="css/styles.css" rel="stylesheet">
        <title>Bienvenue à Velvet Record !</title>
    </head>

    <body>

        <header>

            <nav class="header navbar navbar-expand-lg bg-dark">
                <!-- fixed-top -->
                <div class="container-fluid">
                    <a class="col-9 navbar-brand text-light mx-2" href="index.php"><img src="img/logo/vinyle.png" alt="logo de Velvet record" width="auto" height="24" class=""> Velvet Record</a>

                    <!-- <div class="justify-content-between fst-italic "> -->
                    <?php

                    session_start(); // crée une session ou restaure celle trouvée sur le serveur, via l'id de session
                    // var_dump($_SESSION);
                    // var_dump(basename($_SERVER["PHP_SELF"]));

                    if (isset($_SESSION["login"]) && $_SESSION["login"] != "") { ?>
                        <span class="fst-bold">Bienvenue <?= $_SESSION["login"] ?>
                            <a href="script_logout.php" title="Je ferme la session" alt="Fermer la session"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-right text-danger mx-3" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg></a></span>

                    <?php } else {
                        $mapage = basename($_SERVER["PHP_SELF"]);
                        $pagesautorisees = array("index.php", "registration.php", "forgotpassword.php", "confirmomission.php");
                        $recherche = array_search($mapage, $pagesautorisees);
                        // var_dump($recherche === false);
                        // die;
                        if ($recherche === false) {
                            header("Location: index.php");
                            exit;
                        }
                    }
                    ?>
                </div><!-- End of div session -->
            </nav>
        </header>
