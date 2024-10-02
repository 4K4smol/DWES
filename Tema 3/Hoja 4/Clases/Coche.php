<?php

    Class Coche{

        private String $matricula;
        private int $velocidad;

        public function __construct($matricula,$velocidad){
            $this->matricula=$matricula;
            $this->velocidad=$velocidad;
        }

        public function Acelerar($aumento) :void {
            if($this->velocidad+$aumento>120 || $this->velocidad+$aumento<0){
                echo "No se puede ";
            }else{
                $this->velocidad+=$aumento;
            }
        }
        public function Frenar($decremento) :void {
            if($this->velocidad-$decremento>120 || $this->velocidad-$decremento<0){
                echo "No se puede ";
            }else{
                $this->velocidad-=$decremento;
            }
        }
        public function __toString() : String {
            return sprintf("La matricula es %s y su velocidad es %d",
            $this->matricula,$this->velocidad);
        }



    }



?>