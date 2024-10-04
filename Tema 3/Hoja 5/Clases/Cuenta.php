<?php

    Class Cuenta{

        protected int $numero;
        protected string $titular;
        protected int $saldo;

        public function __construct($numero,$titular,$saldo){
            $this->numero=$numero;
            $this->titular=$titular;
            $this->saldo=$saldo;
        }

        public function Ingreso(int $cantidad):void{
            $this->saldo+=$cantidad;
        }
        
        public function Reintegro(int $cantidad):void{
            $this->saldo-=$cantidad;
        }     
       
        public function esPreferencial(int $cantidad):bool{
            if($this->saldo>$cantidad){
                return true;
            }else{
                return false;
            }
        }

        public function Mostrar():string{
            return "
            <table border='1'>
                <tr>
                    <th>Número de Cuenta</th>
                    <td>{$this->numero}</td>
                </tr>
                <tr>
                    <th>Titular</th>
                    <td>{$this->titular}</td>
                </tr>
                <tr>
                    <th>Saldo</th>
                    <td>{$this->saldo}</td>
                </tr>
            </table>
            ";
        }

    }


    Class CuentaCorriente extends Cuenta{

        private int $cuotaMantenimiento;

        public function __construct($numero,$titular,$saldo,$cuotaMantenimiento){
            parent::__construct($numero,$titular,$saldo);
            $this->cuotaMantenimiento=$cuotaMantenimiento;
            $this->saldo-=$this->cuotaMantenimiento;
        }

        public function Reintegro(int $cantidad):void{
            if($this->saldo<20){
                echo "El saldo es menor que 20 <br>";
            }else{
                $this->saldo-=$cantidad;
                echo "Se resto correctamente <br>";
            }
        }  

        public function Mostrar():string{
            return parent::mostrar() . "
            <table border='1'>
            <tr>
                <th>Cuota de Mantenimiento</th>
                <td>$this->cuotaMantenimiento</td>
            </tr>
            </table>
            ";
        }
      
    }


    Class CuentaAhorro extends Cuenta{

        private int $comisionApertura;
        private int $interes;

        public function __construct($numero,$titular,$saldo,$comisionApertura,$interes){
            parent::__construct($numero,$titular,$saldo);
            $this->comisionApertura=$comisionApertura;
            $this->saldo-=$this->comisionApertura;
            $this->interes=$interes;
        }

        public function AplicaInteres():void{
            $this->saldo+=($this->saldo*($this->interes/100));
        }


        public function Mostrar():string{
            return parent::mostrar() . "
            <table border='1'>
            <tr>
                <th>Comision de Apertura</th>
                <td>$this->comisionApertura</td>
            </tr>
            <tr>
                <th>interes</th>
                <td>$this->interes</td>
            </tr>
            </table>
            ";
        }



    }



?>