<?php


    Class File{
        public $filePath;
        public $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function UploadFile($imageName)
        {
            $sql = "INSERT INTO imagens (nome) VALUES (:nome)";
            $requisition = $this->db->prepare($sql);
            $requisition->bindParam(":nome", $imageName);
            if ($requisition->execute())
            {
                return true;
            }else{
                return false;
            }
        }

        public function GetImages($url)
        {
            $directory = "%".$url."%";
            $sql = "SELECT nome FROM imagens WHERE nome LIKE :nome";
            $requisition = $this->db->prepare($sql);
            $requisition->bindParam(":nome", $directory);
            $requisition->execute();

            return $requisition->fetchAll(PDO::FETCH_OBJ);
        }
    }