<?php
enum Turno {
    case mañana;
    case tarde;
}

abstract Class Medico{

        private string $nombre;
        private int $edad;
        private Turno $turno;

         // Constructor para inicializar los atributos
        public function __construct(string $nombre, int $edad, Turno $turno) {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->turno = $turno;
        }

        public function getEdad() : int {
            return $this->edad;
        }

        public function getTurno() : Turno {
            return $this->turno;
        }

        // Método para mostrar la información del médico
        public function mostrar(): string {
            return "Nombre: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno->name}";
        }
    }

        Class Familia extends Medico{

        private int $numeroPacientes;
            
        public function __construct(string $nombre, int $edad, Turno $turno, int $numeroPacientes) {
            parent::__construct($nombre, $edad, $turno);
            $this->numeroPacientes = $numeroPacientes;
        }

        public function getPacientes():int{
            return $this->numeroPacientes;
        }

        public function mostrar(): string {
            return parent::mostrar() . ", Número de Pacientes: {$this->numeroPacientes}";
        }
    
        }

        Class Urgencia extends Medico{

            private int $unidad;
            
            public function __construct(string $nombre, int $edad, Turno $turno, int $unidad) {
                parent::__construct($nombre, $edad, $turno);
                $this->unidad = $unidad;
            }
    
            public function mostrar(): string {
                return parent::mostrar() . ", unidad: {$this->unidad}";
            }




        }

    



?>