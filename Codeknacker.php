<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  <?php
        $status1 = False;
        $status2 = False;
        $status3 = False; 
        $fehler = False;
        $counter = 0;
  ?>
  </head>
  <body>
  <h1>Codeknacker: Bitte geben sie 3 Zahlen ein:</h1>
  <form action="Codeknacker.php" method="post">
        Zahl 1: <input name="zahl1"><br>
        Zahl 2: <input name="zahl2"><br>
        Zahl 3: <input name ="zahl3"><br>
        <input type="submit" name="done">
        <input type="reset"><br>
  </form>
  <h3>Ergebnis:</h3>
  <?php
        include("functions.php");
        $Zahl1 = $_POST['zahl1'];
        logs("Zahl 1 ist $Zahl1");
        $Zahl2 = $_POST['zahl2'];
        logs("Zahl 2 ist $Zahl2");
        $Zahl3 = $_POST['zahl3'];
        logs("Zahl 3 ist $Zahl3");
        $done = $_POST['done'];

        $status1 = False;
        $status2 = False;
        $status3 = False;

        if($done && $Zahl1 != NULL || $Zahl2 != NULL || $Zahl3 != NULL) {
          $fehler = False;
          if(fehlercheck($Zahl1, 1)) {
            answer(check1($Zahl1), 1);
          }
          if(fehlercheck($Zahl2, 2)) {
            answer(check2($Zahl2), 2);
          }
          if(fehlercheck($Zahl3, 3)) {
            answer(check3($Zahl3), 3);
          }
          if(!$fehler) {
            counter(checkstates($status1, $status2, $status3));
          }

        }

  ?>
  </body>
</html>
