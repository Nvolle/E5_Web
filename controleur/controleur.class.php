<?php
    require_once ("modele/modele.class.php");
    class modele{
        private $unModele;

        public function __construct($serveur, $bdd, $user, $mdp){
            $this->unModele = new Modele($serveur, $bdd, $user, $mdp);
        }

        public function selectAll(){
            return $this->unModele->selectAll();
        }

        public function setTable($uneTable){
            $this->unModele->setTable($uneTable);
        }

        public function selectSearch($like, $mot){
            return $this->unModele->selectSearch($like, $mot);
        }

        public function insert($tab){
            $this->unModele->insert($tab);
        }
        
        public function delete($where){
            $this->unModele->delete($where);
        }

        public function selectWhere($where){
            return $this->unModele->selectWhere($where);
        }

        public function update($tab, $where){
            $this->unModele->update($tab, $where);
        }

        public function count(){
            return $this->unModele->count();
        }

        public function callProcedure($procedure){
            return $this->unModele->callProcedure($procedure);
        }
    }
?>