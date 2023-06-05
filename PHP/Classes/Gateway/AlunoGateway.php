<?php
    
    //Classe AlunoGateway
    class AlunoGateway {
        private static $conn;

        //Método setConnection()
        public static function setConnection (PDO $conn) {
            self::$conn = $conn; //::chamando um atributo estático de uma classe 
        }//Fim do método setConnection()

        //Método find() - buscar
        public function find ($id, $class = 'stdClass') {
            $sql = "SELECT * FROM aluno WHERE idAluno = '$id'";
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            //fetchObject() retornar a próxima linha (registro) como um objeto
            return $result->fetchObject($class);
        }//Fim do método find()

        //Método all()
        public function all ($filter, $class = 'stdClass') {
            $sql = "SELECT * FROM aluno ";
            if ($filter) {
                $sql .= "WHERE $filter";
            }
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            return $result->fetchAll(PDO::FETCH_CLASS, $class); //retorna um array de objetos
        }//Fim do método all()

        //Método delete()
        public function delete ($id) {
            $sql = "DELETE FROM aluno WHERE idAluno = '$id'";
            //print "$sql <br>\n";
            return self::$conn->query($sql);
        }//Fim do método delete()

        //Método save()
        public function save ($data) {
            if (empty($data->id)) { //Id não localizado - Insere
                $id = $this->getLastId() + 1;
                $sql = "INSERT INTO aluno 
                (idAluno, nomeAluno,curso, tipoCurso, senhaAluno, matriculaAluno)
                VALUES ('{$id}', '{$data->nomeAluno}', '{$data->curso}', '{$data->tipoCurso}' , '{$data->senhaAluno}' , '{$data->matriculaAluno}')"; 
            }
            else { //Id localizado - Atualiza
                $sql = "UPDATE aluno SET 
                nomeAluno = '{$data->nomeAluno}',
                curso = '{$data->curso}',
                tipoCurso = '{$data->tipoCurso}',
                senhaAluno = '{$data->senhaAluno}', 
                matriculaAluno = '{$data->matriculaAluno}' 
                WHERE idAluno = '{$data->id}'";
        }
           //print "$sql <br>\n";
            return self::$conn->exec($sql); //executa a instrução SQL
        }//Fim do método save()

        //Método getLastId()
        public function getLastId() {
            $sql = "SELECT max(idAluno) as max FROM aluno";
            $result = self::$conn->query($sql);
            $data = $result->fetch(PDO::FETCH_OBJ);
            return $data->max;
        }//Fim do método getLastId()

        //Método autenticacao()
        public function autenticacao($id, $password) {
            try {
                $sql = "SELECT * FROM aluno WHERE idAluno = :id and senhaAluno = :senha";
                $stmt = self::$conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':senha', $password);
                $stmt->execute();
                $userDB = $stmt->fetch(PDO::FETCH_OBJ);
        
                if ($userDB == null ) {
                    return false;

                } else {
                    return true;
                }
            } catch (PDOException $erro) {
                throw $erro;
            }
        }//Fim do método autenticacao
        
    }//Fim da clase AlunoGateway
?>