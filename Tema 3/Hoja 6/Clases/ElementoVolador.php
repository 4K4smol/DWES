<?php
include 'Interfaz/Volador.php';
include 'Trait/Mensaje.php';
    abstract Class ElementoVolador implements Volador{

        protected string $nombre;
        protected int $numAlas;
        protected int $numMotores;
        protected float $altitud;
        protected int $velocidad;

        public function __construct($nombre,$numAlas,$numMotores)
        {
         $this->nombre=$nombre;
         $this->numAlas=$numAlas;
         $this->numMotores=$numMotores;
         $this->altitud=0;
         $this->velocidad=0;
        }

        public function __get($nombre):mixed{
            return $this->$nombre;
        }

        public function  __set($nombre,$value):void{
            $this->nombre=$value;
        }

        public function Volando():bool{
            if($this->altitud>0){
                return true;
            }else{
                return false;
            }
        }

        public function Acelerar($velocidad)
        {
            $this->velocidad+=$velocidad;
        }

        abstract public function Volar($altitud);
        
        abstract public function MostrarInformacion():string;


    }


    Class Avion extends ElementoVolador{
        
        private string $companiaAerea;
        private string $fechaAlta;
        private int $alturaMaxima;

        public function __construct($nombre,$numAlas,$numMotores,$companiaAerea,$dia,$mes,$anio,$alturaMaxima)
        {
            parent::__construct($nombre,$numAlas,$numMotores);
            $this->companiaAerea=$companiaAerea;
            $this->alturaMaxima=$alturaMaxima;
            $fecha = new DateTime();
            $fecha->setDate($anio, $mes, $dia);
            $this->fechaAlta = $fecha->format('d-m-Y');  // Formato
        }
       

        public function Volar($altitud):void{
            if($this->altitud>0){
                echo "La altitud es mayor a 0 ";
                if($this->alturaMaxima>$altitud){
                    echo "La altitud del avión es inferior a la altura máxima ";
                    if($this->velocidad>=150){
                        echo "La velocidad del avión es superior a 150 ";
                        $this->altitud+=100;
                        echo "Se ha aumentado la altura en 100 metros ";
                    }else{
                        echo "No se puede realizar ninguna acción ya que el avión va a menos de 150 ";
                    }
                }else{
                    echo "No se puede realizar ninguna acción ya que la altitud es mayor a la altura máxima ";
                }
            }else{
                echo "No se puede realizar ninguna acción ya que la altitud es 0 ";
            }
        }

        public function MostrarInformacion():string{
            $info = "Nombre: " . $this->__get('nombre') . "<br>";
            $info .= "Compañía Aérea: " . $this->companiaAerea . "<br>";
            $info .= "Fecha de Alta: " . $this->fechaAlta . "<br>";
            $info .= "Número de Alas: " . $this->__get('numAlas') . "<br>";
            $info .= "Número de Motores: " . $this->__get('numMotores') . "<br>";
            $info .= "Altitud Máxima: " . $this->alturaMaxima . " metros<br>";
            $info .= "Velocidad Actual: " . $this->__get('velocidad') . " km/h<br>";
            $info .= "Altitud Actual: " . $this->__get('altitud') . " metros<br>";
            return $info;
        }

    }


    Class Helicoptero extends ElementoVolador{

        private string $propietario;
        private int $nRotor;


        public function __construct($nombre,$numAlas,$numMotores,$propietario,$nRotor)
        {
            parent::__construct($nombre,$numAlas,$numMotores);
            $this->propietario=$propietario;
            $this->nRotor=$nRotor;
        }

        public function Volar($altitud):void{
            $alturaMaxima=$this->nRotor*100;

            if($altitud>100*$alturaMaxima){
                echo "No puede volar a esta altitud";
            }else{
                echo "Ha aumentado la altitud en 20 metros";
                $this->altitud+=20;
            }


        }

        public function MostrarInformacion():string{
            $info = "Nombre: " . $this->__get('nombre') . "<br>";
            $info .= "Número de Alas: " . $this->__get('numAlas') . "<br>";
            $info .= "Número de Motores: " . $this->__get('numMotores') . "<br>";
            $info .= "Velocidad Actual: " . $this->__get('velocidad') . " km/h<br>";
            $info .= "Altitud Actual: " . $this->__get('altitud') . " metros<br>";
            $info .= "Propietario: " . $this->propietario . "<br>";
            $info .= "Numero de Rotores: " . $this->nRotor . "<br>";
            return $info;
        }


    
    }


    Class Aeropuerto{
        use Mensaje;

        private array $elementosVoladores;

        public function __construct()
        {
            $this->elementosVoladores = [];
            $this->mostrarMensaje("Aeropuerto creado");
        }

        public function Insertar(ElementoVolador $elementoVolador):void{
            $this->elementosVoladores[] = $elementoVolador;
            echo "El elemento volador ha sido agregado al aeropuerto<br>";
        }

        public function Buscar($nombre):string{
            
            foreach ($this->elementosVoladores as $aeronave) {
                if($nombre==$aeronave->__get('nombre')){
                    return $aeronave->MostrarInformacion()."<br>";
                }else{
                    return "No se ha encontrado la aeronave buscada"."<br>";
                }
            }
        }

        public function ListarCompañia($nombreCompañia):string{
            foreach ($this->elementosVoladores as $aeronave) {
                if($aeronave instanceof Avion && $aeronave->__get('companiaAerea'===$nombreCompañia)){
                   return $aeronave->MostrarInformacion()."<br>";
                }else{
                    return "No se ha encontrado esta compañia"."<br>";
                }
            }
        }

        public function Rotores($numeroRotores):string{
            foreach ($this->elementosVoladores as $aeronave) {
                if($aeronave instanceof Helicoptero && $aeronave->__get('nRotor'==$numeroRotores)){
                   return $aeronave->MostrarInformacion()."<br>";
                }else{
                    return "No se ha encontrado el heli buscado"."<br>";
                }
            }
        }

        public function Despegar($nombre,$altitud,$velocidad){

            foreach ($this->elementosVoladores as $aeronave) {
                if($nombre==$aeronave->__get('nombre')){
                    $aeronave->__set('altitud',$altitud);
                    $aeronave->__set('velociddad',$velocidad);
                    return $aeronave->MostrarInformacion()."<br>";
                }else{
                    return "No se ha encontrado la aeronave buscada"."<br>";
                }
            }
        }

    }

?>