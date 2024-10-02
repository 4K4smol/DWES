<?php

    Class Empleado{

        private int $sueldo;

        public function __construct($sueldo){
            $this->sueldo=$sueldo;
        }

        public function getSueldo():int{
            return $this->sueldo;
        }


    }

    Class Encargado extends Empleado{
        
        public function getSueldo():int{
            $sueldo =  parent::getSueldo();
            $sueldo+=$sueldo*0.15;
            return $sueldo;
        }

    }

?>