<?php
    Class Circulo{
        private float $radio;

        //Constructor
        public function __construct($radio){
            $this->radio=$radio;
        }

        // //Metodo set radio
        // public function setRadio():void{
        //     $this->radio=$nuevoRadio;
        // }
        // //metodo get radio
        // public function getRadio():float{
        //     return $this->radio;
        // }
        //metodo poner nombre
        

        public function __get($name):mixed{
            return $this->$name;
        }
        public function __set($name,$valor):void{
            $this->$name = $valor;
        }

        public function __toString():String{
            return sprintf("Radio %.02f", $this->radio);
        }
    }


?>