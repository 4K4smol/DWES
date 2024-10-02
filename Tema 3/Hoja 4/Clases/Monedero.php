<?php

    Class Monedero{

        private int $dinero;
        private static int $contador=0;

        public function __construct($dinero){
            self::$contador++;
            $this->dinero=$dinero;
        }

        public function MeterDinero($aumento):void{
            $this->dinero+=$aumento;
        }

        public function SacarDinero($resta):void{
            if($this->dinero-$resta<0){
                echo "No se puede hacer esta operacion ";
            }else{
                $this->dinero-=$resta;
            }
        }

        public function MostrarMonedero():String{
            return sprintf("El dinero del monedero es %d",$this->dinero);
        }

        public function CantidadMonederos():int{
            return self::$contador;
        }

        public function __destruct(){
            self::$contador--;
        }



    }




?>