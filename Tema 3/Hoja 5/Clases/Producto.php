<?php

    Class Producto{

        private string $codigo;
        private float $precio;
        private string $nombre;

        public function __construct($codigo,$precio,$nombre){
            $this->codigo=$codigo;
            $this->precio=$precio;
            $this->nombre=$nombre;
        }

        public function __get($name): mixed {
            return $this->$name;
        }

        public function __set($name, $value):void
        {
            $this->$name=$value;
        }

        public function __toString()
        {
            return "Código: {$this->codigo},
            Nombre: {$this->nombre}, Precio: {$this->precio}€";
 
        }

    }

    Class Alimentacion extends Producto{

        private string $fechaCad;

        public function __construct($codigo,$precio,$nomrbe,$mes,$anio){
            parent::__construct($codigo,$precio,$nomrbe);
            // Crear la fecha usando DateTime
            $fecha = new DateTime();
            $fecha->setDate($anio, $mes, 1);
            $this->fechaCad = $fecha->format('m-Y');  // Formato 
        }

        public function __toString()
        {
            return parent::__toString()."Mes - Año Caducidad: {$this->fechaCad}";
        }

    }


    Class Electronica extends Producto{

        private int $garantia;

        public function __construct($codigo,$precio,$nomrbe,$garantia){
            parent::__construct($codigo,$precio,$nomrbe);
            $this->garantia=$garantia;
        }

        public function __toString()
        {
            return parent::__toString()."garantia: {$this->garantia}";
        }





    }



?>