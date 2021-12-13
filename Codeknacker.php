<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  <?php
        global $status1;
        global $status2;
        global $status3;
        global $fehler;
        $status1 = False;
        $status2 = False;
        $status3 = False; 
        $fehler = False;
        $Zahl1 = NULL;
        $Zahl2 = NULL;
        $Zahl3 = NULL;
        global $counter;
  ?>
  </head>
  <body>
  <h1>Codeknacker: Bitte geben sie 4 Zahlen ein:</h1>
  <form action="Codeknacker.php" method="post">
        Zahl 1: <input name="zahl1"><br>
        Zahl 2: <input name="zahl2"><br>
        Zahl 3: <input name ="zahl3"><br>
        Zahl 4: <input name="zahl4"><br>
        <input type="submit" name="done">
        <input type="reset" name="rst"><br>
  </form>
  <h3>Ergebnis:</h3>
  <?php
        include("functions.php");
        $Zahl1 = $_POST['zahl1'] ?? null;
        logs("Zahl 1 ist $Zahl1");
        $Zahl2 = $_POST['zahl2'] ?? null;
        logs("Zahl 2 ist $Zahl2");
        $Zahl3 = $_POST['zahl3'] ?? null;
        logs("Zahl 3 ist $Zahl3");
        $Zahl4 = $_POST['zahl4'] ?? null;
        logs("Zahl 4 ist $Zahl4");
        $done = $_POST['done'] ?? null;
        $rst = $_POST['rst'] ?? null;
        session_start();
        $_SESSION['counter'] = $counter;

        if($rst) {
          $status1 = False;
          $status2 = False;
          $status3 = False; 
          $fehler = False;
          $Zahl1 = NULL;
          $Zahl2 = NULL;
          $Zahl3 = NULL;
        }
        if($done && $Zahl1 != NULL || $Zahl2 != NULL || $Zahl3 != NULL || $Zahl4 != NULL) {
          $fehler = False;
          if(fehlercheck($Zahl1, 1, $fehler)) {
            answer(check1($Zahl1, $status1), 1);
          }
          if(fehlercheck($Zahl2, 2, $fehler)) {
            answer(check2($Zahl2, $status2), 2);
          }
          if(fehlercheck($Zahl3, 3, $fehler)) {
            answer(check3($Zahl3, $status3), 3);
          }
          if(fehlercheck($Zahl4, 4, $fehler)) {
            answer(checkCode($Zahl4, 4), 4);
          }
          if(!$fehler) {
            logs("Die Eingabe ist fehlerfrei!");
            if(checkstates($status1, $status2, $status3) == false) {
              $_SESSION['counter'] = $counter + 1;
              $counter = $_SESSION['counter'];
              logs("Counter = $counter");
              echo "<br><br>Das ist der $counter. Rateversuch!";
            }
            if(checkstates($status1, $status2, $status3)) {
              
              echo "<br><br>Sie haben den Code geknackt!";
              echo "<br>Sie haben $counter Versuche gebraucht!";
              $_SESSION['counter'] = 0;
              ?>
              <br><br><iframe src="https://giphy.com/embed/3o7abKhOpu0NwenH3O" width="480" height="270" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p></p>
              <?php

            }
          }

        }

  ?>
  </body>
</html>
