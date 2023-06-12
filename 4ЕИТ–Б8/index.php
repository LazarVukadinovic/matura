<!DOCTYPE html>
<?php 
    // PODESAVANJE VREMENSKE ZONE
    date_default_timezone_set("Europe/Belgrade");

    // UBACIVANJE KONEKCIONOG FAJLA ZA RAD SA BAZOM
    include_once("./database/connection.php");
?>

<html lang="en">
    <head>
        <!-- META TAGOVI -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- BOOTSTRAP STYLE -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- CUSTOM STYLE -->
        <link rel="stylesheet" href="./styles/style.css">
        <title>Knjiga utisaka</title>
    </head>
    <body>
        <div class="naslovna_traka">
            <h1>Knjiga utisaka</h1>
        </div>

        <!-- NAVIGACIONA TRAKA -->
        <nav>
            <ul>
                <a href="../index.php"><li>Početna</li></a>
                <a href="./pages/about.html"><li>O autoru</li></a>
                <a href="./pages/uputstvo.html"><li>Uputstvo</li></a>
            </ul>
        </nav>

        <?php 
            // PROMENLJIVE SA POCETNIM VREDNOSTIMA
            $ime = $email = $komentar = "";
            $emailErr = $imeErr = $komentarErr = "";
        
            // IZVRSAVA SE AKO SE FORMA SUBMIT-UJE
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // PROVERAVA DA LI JE INPUT POLJE 'IME' PRAZNO I ZAVISNO OD TOGA DODELJUJE VREDNOST ODREDJENOJ PROMENLJIVOJ
                if (!empty($_POST["ime"]))
                {
                    $ime = test_input($_POST["ime"]);
                    $imeErr = "";
                }
                else
                {
                    $imeErr = "Morate uneti ime";
                }

                // PROVERAVA DA LI JE INPUT POLJE 'EMAIL' PRAZNO I ZAVISNO OD TOGA DODELJUJE VREDNOST ODREDJENOJ PROMENLJIVOJ
                if (!empty($_POST["email"]))
                {
                    $email = test_input($_POST["email"]);
                    // PROVERAVA REGEX ZA EMAIL
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $email = "";
                        $emailErr = "Morate uneti ispravan email";
                    }
                    $emailErr = "";
                }
                else
                {
                    $emailErr = "Morate uneti email";
                }

                // PROVERAVA DA LI JE INPUT POLJE 'KOMENTAR' PRAZNO I ZAVISNO OD TOGA DODELJUJE VREDNOST ODREDJENOJ PROMENLJIVOJ
                if (!empty($_POST["komentar"]))
                {
                    $komentar = test_input($_POST["komentar"]);
                    $komentarErr = "";
                }
                else
                {
                    $komentarErr = "Morate uneti komentar";
                }

            }

            // PROVERAVA DA LI SU SVE POTREBNE PROMENLJIVE POPUNJENE
            if(!empty($ime) && !empty($email) && !empty($komentar))
            {
                // INSERT-OVANJE PODATAKA U BAZU PODATAKA
                $sql = "INSERT INTO Utisak(ime, email, komentar, datum) VALUES('$ime', '$email', '$komentar', '" . date("Y-m-d") . "')";
                $conn->query($sql);
            }

            // FUNKCIJA ZA ELIMINISANJE STETNIH FRAZA
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <div class="container mt-4">
            <div class="row">
                <!-- NAZIVI ZA INPUT POLJA -->
                <div class="col-sm-1">
                    <label class="mb-1" for="ime">Ime:</label><br>
                    <label class="mb-1" for="email">Email:</label><br>
                    <label class="mb-1" for="komentar">Komentar:</label>
                </div>
                <!-- FORMA -->
                <div class="col-sm-11">
                    <form action="" method="post">
                        <input type="text" class="mb-1" name="ime"/><span class="greska">*<?php echo $imeErr; ?><span><br>
                        <input type="email" class="mb-1" name="email"/><span class="greska">*<?php echo $emailErr; ?><span><br>
                        <textarea id="opis" class="mb-1" name="komentar" rows="4" cols="25"></textarea><span class="greska">*<?php echo $komentarErr; ?><span><br>
                        <input type="submit" class="mb-1 dugme" name="submit" value="Dodaj komentar">
                    </form>
                </div>
            </div>    
        </div>
        
        <!-- FOOTER -->
        <footer>
            <div class="container">
                <div class="row">
                    <p class="text-center">&copy; Muzej Srbije</p>
                </div>
            </div>
        </footer>
    </body>
</html>