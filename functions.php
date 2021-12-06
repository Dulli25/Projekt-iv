<?php
    function logs($text) { //speicherung jeder aktion in einer log datei zur fehlersuche
      $timestamp = time();
      $datum = date("d.m.Y - H:i", $timestamp);
      $file = fopen("log.txt", "a");
      $in = "$datum $text 0000 \n";
      fwrite($file, $in);
      fclose($file);
      }

    function check1($input) { //�berpr�fen der ersten Zahl
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
            }
        else {
          $status1 = False;
        }
        logs("Eingegebene Zahl 1 status: $out");
        return $out;
        }

    function check2($input) { //�berprufen der zweiten Zahl
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
            }
        else {
          $status2 = False;
        }
        logs("Eingegebene Zahl 2 status: $out");
        return $out;
        }

    function check3($input) { //�berprufen der dritten Zahl
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
            }
        else {
          $status3 = False;
        }
        logs("Eingegebene Zahl 3 status: $out");
        return $out;
        }

    function answer($check, $zahl) { //ausgabe der antwort auf die abfrage der Zahl
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

    function fehlercheck($value, $zahl) { //überprüft die eingabe auf fehler
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
      if($s1 == True && $s2 == True && $s3 == True) {
        $out = True;
      }
      return $out;
    }
?>
