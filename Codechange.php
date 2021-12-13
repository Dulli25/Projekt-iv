<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <body>
    <h1>Aendern des Codes</h1>
    <h2>Bitte geben sie den Admin pin ein:</h2>
    <form action="Codechange.php" method="post">
        PIN: <input name="pin"><br>
        <input type="submit">
        <input type="reset">
    </form>
    <?php
        $pin = $_POST['pin'];
        $datei = fopen("PIN.txt", "r");
        $zeile = fgets($datei);
        $zeile = trim($zeile, " \n");
        fclose($datei);
        $zeile = intval($zeile);
        if($pin == $zeile)  {
            echo "<br>Die eingabe war korrekt!";
            $datei = fopen("Code.txt", "r");
            echo "<br>Der aktuelle Code ist: ";
            for($i=0; $i<4; $i++) {
                $part = fgets($datei);
                echo "<br>$part";
                }
            fclose($datei);
            ?>
            <h2>Bitte geben sie einen neuen Code ein:</h2>
            <form action="Codechange.php" method="post">
            Zahl 1: <input name="zahl1">
            Zahl 2: <input name="zahl2">
            Zahl 3: <input name="zahl3">
            Zahl 4: <input name="zahl4">
            <input type="submit" value="done">
            <input type="reset">
            </form>
            <?php
            $zahl1 = $_POST['zahl1'];
            $zahl2 = $_POST['zahl2'];
            $zahl3 = $_POST['zahl3'];
            $zahl4 = $_POST['zahl4'];
            $done = $_POST['done'];
            if($done) {
                echo "Der code wurde zu $zahl1 $zahl2 $zahl3 $zahl4 geändert!";
                $datei = fopen("Code.txt","w");
                fwrite($datei, "$zahl1\n");
                fwrite($datei, "$zahl2\n");
                fwrite($datei, "$zahl3\n");
                fwrite($datei, "$zahl4");
                fclose($datei);
            
               
            }            
                        
            }
        
    ?>
    <a href="Codeknacker.php">Zurueck zum Codeknacker</a>
  </body>
</html>
