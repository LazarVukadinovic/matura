<?php
    // UBACIVANJE KONEKCIONOG FAJLA ZA RAD SA BAZOM
    include_once "./database/connection.php";

    // IZVRSAVA SE AKO SE FORMA SUBMIT-UJE
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // PROVERAVA DA LI JE PRAZNO INPUT POLJE 'ENGLESKA'
        if (!empty($_POST["engleska"]))
        {
            $greska = "";
            $engleskaR = test_input($_POST["engleska"]);

            // KREIRANJE UPITA I IZVRSAVANJE ISTOG
            $sql = "SELECT * FROM reci WHERE engleska = '$engleskaR'";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0)
            {
                // UZIMANJE PODATAKA IZ BAZE
                $row = $result->fetch_assoc();
                $srpskaR = $row['srpska'];
                $opisR = $row['opis'];
            }
            else
            $greska = "Uneta rec ne postoji u recniku";
            
        }
        else if (!empty($_POST["srpska"]))
        {
            $greska = "";
            $srpskaR = test_input($_POST["srpska"]);
            
            // KREIRANJE UPITA I IZVRSAVANJE ISTOG
            $sql = "SELECT * FROM reci WHERE srpska = '$srpskaR'";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0)
            {
                // UZIMANJE PODATAKA IZ BAZE
                $row = $result->fetch_assoc();
                $engleskaR = $row['engleska'];
                $opisR = $row['opis'];
            }
            else
            $greska = "Uneta rec ne postoji u recniku";
        }
    }

    // FUNKCIJA ZA ELIMINISANJE STETNIH FRAZA
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META TAGOVI -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="./styles/style.css">
    <title>Rečnik</title>
</head>

<body>
    <div class="nav">
        <h1>Elektronski rečnik</h1>
    </div>

    <!-- NAVIGACIONA TRAKA -->
    <div class="navigacija">
        <a href="index.php">Rečnik</a>
        <a href="./pages/dodavanje.php">Dodavanje novih reči</a>
        <a href="./pages/uputstvo.html">Uputstvo</a>
    </div>

    <!-- ISPIS GRESKE AKO POSTOJI -->
    <p><?php if (isset($greska)) {
            echo $greska;
            unset($greska);
        } ?></p>

    <!-- FORMA -->
    <form action="index.php" method="post">
        Smer: <select name="izbor" id="izbor">
            <option value="default">Selektuj smer prevodjenja</option>
            <option value="engleski">Engleski-Srpski</option>
            <option value="srpski">Srpski-Engleski</option>
        </select><br>
        <!-- POPUNJAVANJE RECI ZAVISNO OD SMERA PREVODJENJA -->
        Engleska reč <input type="text" value="<?php if (isset($engleskaR)) echo $engleskaR;
                                                else echo ""; ?>" name="engleska" id="eng" readonly><br>
        Srpska reč <input type="text" value="<?php if (isset($srpskaR)) echo $srpskaR;
                                                else echo ""; ?>" name="srpska" id="srp" readonly><br><br>
        Opis: <textarea name="opis" value="" id="opis" cols="30" rows="10" readonly><?php if (isset($opisR)) echo $opisR;
                                                                            else echo ""; ?></textarea><br><br>
        <input type="submit" name="check" value="Prevedi">
    </form>

    <!-- FOOTER -->
    <div class="footer">
        <p>© Osnovna škola "Sonja Marinkovic"</p>
    </div>

    <!-- CUSTOM JS -->
    <script src="./js/main.js"></script>
</body>

</html>