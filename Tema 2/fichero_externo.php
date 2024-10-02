<?php
    function fecha($diaSemana,$mes){
        switch ($diaSemana) {
            case '1':
                $diaSemana='Lunes';
                break;
            case '2':
                $diaSemana='Martes';
                break;
            case '3':
                $diaSemana='Miercoles';
                break;
            case '4':
                $diaSemana='Jueves';
                break;         
            default:
                # code...
                break;
        }


    }

    function capicua($capi){
        $copia=$capi;
        $cifras=1;
        if($capi<=10){
            echo "Es imposible que sea capicua";
        }else{
            while($capi>10){
                $capi /= 10;
                $cifras+=1;
            }
            // Devolver el valor
            $capi=$copia;
            //echo $capi . "<br>";

            //comparar primer y ultimo digito
            $esCapicua=true;
            for($i = 0; $i <= $cifras / 2;$i++){
                $primerDigito = floor($capi / pow(10, ($cifras-1) - $i)) % 10;
                $ultimoDigito = $capi % 10;
                //echo $primerDigito . "<br>";
                //echo $ultimoDigito . "<br>";

                if ($primerDigito != $ultimoDigito) {
                    $esCapicua = false;
                    break;
                }


            // Eliminar el último dígito
            $capi = floor($capi / 10);
            $cifras--;

            // Eliminar el primero
            $capi = $capi % pow(10, $cifras-1); 


            }
            
            if($esCapicua){
                return  "Es capicua";
            }else{
                return "No es capicua";
            }
        }
        }



?>