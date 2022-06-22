<?php
include 'header.php';
require 'db.php';
// require 'script_registration.php';
?>

<body>
    <div class="container mt-3">
        <h1>Inscription</h1>
        <div class="row">
            <div class=col-12>
                <form action="script_registration.php" method="POST">
                    <div class="row">
                        <div class="input-group mt-4 mb-4">
                            <span class="input-group-text" id="username">Nom</span>
                            <input type="text" class="form-control" aria-label="username" name="user_name" aria-describedby="username" name="username">
                        </div>
                        <div class="input-group mt-4 mb-4">
                            <span class="input-group-text" id="userfirstname">Prénom</span>
                            <input type="text" class="form-control" aria-label="userfirstname" name="user_firstname" aria-describedby="userfirstname" name="userfirstname">
                        </div>
                        <div class="input-group mt-4 mb-4">
                            <span class="input-group-text" id="basic-addon1">M@il</span>
                            <input type="text" class="form-control" aria-label="courriel" name="user_mail" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mt-4 mb-4">
                            <span class="input-group-text" id="userpwd">Mot de passe</span>
                            <input type="password" class="form-control" aria-label="userpwd" aria-describedby="userpwd" name="user_password">
                        </div>
                    </div>
                    <!-- Aprés avoir cliquer sur le boutton un mail de confirmation doit être généré -->
                    <button type="submit" class="mt-4 mb-5 btn btn-sm btn-success" title="S'inscrire" alt="S'inscrire"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                        </svg> S'inscrire</button><!-- Et un msg vert à côté informe de l'envoi d'un mail de confimaation -->
                </form>
            </div>
        </div>
    </div>
</body>
<?php

$user = "";
// 

include 'footer.php';

// value="<?= $user->user_firstname 
?>
<!-- ?> -->