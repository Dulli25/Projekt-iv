<?php
    function logs($text) { //speicherung jeder aktion in einer log datei zur fehlersuche
      $timestamp = time();
      $datum = date("d.m.Y - H:i", $timestamp);
      $file = fopen("log.txt", "a");
      $in = "$datum $text 0000 \n";
      fwrite($file, $in);
      fclose($file);
      }

    function check1($input, &$status1) { //�berpr�fen der ersten Zahl
        $file = fopen("Code.txt", "r");
        $line = fgets($file);
        $out = false;
        trim($line, " \n");
        $line = intval($line);
        logs("Code Zahl 1 gelesen: $line");
        fclose($file);
        if($line == $input) {
            logs("Check1 true");
            $out = true;
            $status1 = True;
            logs("Status 1 = $status1");
            }
        else {
          $status1 = False;
        }
        logs("Eingegebene Zahl 1 status: $out");
        return $out;
        }

    function check2($input, &$status2) { //�berprufen der zweiten Zahl
        $file = fopen("Code.txt", "r");
        $line = fgets($file);
        $line = fgets($file);
        $out = false;
        trim($line, " \n");
        $line = intval($line);
        logs("Code Zahl 2 gelesen: $line");
        fclose($file);
        if($line == $input) {
            $out = true;
            $status2 = True;
            logs("Status 2 = $status2");
            }
        else {
          $status2 = False;
        }
        logs("Eingegebene Zahl 2 status: $out");
        return $out;
        }

    function check3($input, &$status3) { //�berprufen der dritten Zahl
        $file = fopen("Code.txt", "r");
        $line = fgets($file);
        $line = fgets($file);
        $line = fgets($file);
        $out = false;
        trim($line, " \n");
        $line = intval($line);
        logs("Code Zahl 3 gelesen: $line");
        fclose($file);
        if($line == $input) {
            $out = true;
            $status3 = True;
            logs("Status3 = $status3");
            }
        else {
          $status3 = False;
        }
        logs("Eingegebene Zahl 3 status: $out");
        return $out;
        }
    
    function checkCode($input, $val) {  //üverprüfen einer beliebigen Zahl
      $file = fopen("Code.txt", "r");
      for($i=1; $i<=$val; $i++) {
        $line = fgets($file);
      }
      $out = false;
      trim($line, " \n");
      $line = intval($line);
      logs("Code Zahl $val gelesen: $line");
      if($line == $input) {
        $out = true;
      }
      logs("Eingegebene Zahl $val status: $out");
      return $out;
      }

    function answer($check, $zahl) { //ausgabe der antwort in textform auf die abfrage der Zahl
        switch($zahl) {
            case 1: {
                $textpart = "erste";
                break;
                }
            case 2: {
                $textpart = "zweite";
                break;
                }
            case 3: {
                $textpart = "dritte";
                break;
                }
            case 4: {
                $textpart = "vierte";
                break;
            }
            }
        logs("Funktion: answer var: zahl status: $zahl var: textpart status: $textpart");
        if($check) {
            echo "<br>Die $textpart Zahl ist richtig!";
            logs("Ausgabe: $textpart Zahl status: $check");

            }
        if(!$check) {
            echo "<br>Die $textpart Zahl ist falsch!";
            logs("Ausgabe: $textpart Zahl status: $check");
            }
        }

    function fehlercheck($value, $zahl, &$fehler) { //überprüft die eingabe auf fehler
      if(!is_numeric($value) && $value != NULL) {
        echo "<br>Bitte geben sie in der $zahl. Zeile eine Zahl ein!";
        $fehler = True;
        return False;
      }
      if($value == NULL) {
        echo "<br>Die $zahl. Zeile ist leer bitte geben sie eine Zahl ein!";
        $fehler = True;
        return False;
      }
      return True;
      }



    function checkstates($s1, $s2, $s3) {  //überprüfen der einzelnen statuse der zahlen und zusammenfassung
      $out = False;
      if($s1 == 1 && $s2 == 1 && $s3 == 1) {
        $out = true;
        logs("Alle states true");
        return true;
      }
      return false;
      }
    
    function counterplus($counter) {  //counter funktion
      $datei = fopen("counter.txt", "w");
      fwrite($datei, "$counter");
      fclose($datei);
      $datei = fopen("counter.txt", "r");
      $zeile = fgets($datei);
      trim($zeile, " \n");
      intval($zeile);
      return $zeile;
      }
?>
