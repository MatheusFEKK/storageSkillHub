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
    }