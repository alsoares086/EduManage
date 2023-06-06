<?php

    class Turma{
        private id;
        private codigo;
        private turno;
        private periodo;
        private curso;

        //Método setId()
        public function setId ($id)
        {
            $this->id = $id;
        }   //Fim do método setId()

        //Método getId()
        public function getId()
        {
            return $this->id;
        }   //Fim do método getId()


        //Método setCodigo()
        public function setCodigo($codigo)
        {
            $this->id = $codigo;
        }   //Fim do método setCodigo()

        //Método getCodigo()
        public function getCodigo()
        {
            return $this->codigo;
        }   //Fim do método getCodigo()

        //Método setTurno()
        public function setTurno ($turno)
        {
            $this->codigo = $turno;
        }   //Fim do método setTurno()

        //Método getTurno()
        public function getTurno()
        {
            return $this->turno;
        }   //Fim do método getTurno()

        //Método setPeriodo()
        public function setPeriodo ($periodo)
        {
            $this->codigo = $periodo;
        }   //Fim do método setPeriodo()

        //Método getPeriodo()
        public function getPeriodo()
        {
            return $this->periodo;
        }   //Fim do método getPeriodo()

         
    }




?>