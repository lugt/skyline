<?php

/**
 * PHP MySQL BLOB Demo
 */
class FileBean {
 
    const DB_HOST = 'localhost';
    const DB_NAME = 's483816db0';
    const DB_USER = 's483816db0';
    const DB_PASSWORD = '62g6nypm';
 
    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::DB_HOST, self::DB_NAME);
 
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
            //for prior PHP 5.3.6
            //$conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
 
	 
    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }
	
	 public function insertBlob($filePath, $mime,$tiu) {
        $blob = fopen($filePath, 'rb');
 
        $sql = "INSERT INTO skyline_files(id,mime,data,tim) VALUES(NULL,:mime,:data,:tim)";
        $stmt = $this->pdo->prepare($sql);
 
        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
			$stmt->bindParam(':tim', $tiu);
 
        return $stmt->execute();
    }
	
	function updateBlob($id, $filePath, $mime) {
 
        $blob = fopen($filePath, 'rb');
 
        $sql = "UPDATE skyline_files
                SET mime = :mime,
                   data = :data,
					      tim  = :tim,
                WHERE id = :id;";
 
        $stmt = $this->pdo->prepare($sql);
 
        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);
 		$stmt->bindParam(':tim', time());
		
        return $stmt->execute();
    }
	
	 public function selectBlob($id) {
 
        $sql = "SELECT mime,data,tim
                   FROM files
                  WHERE id = :id;";
 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $stmt->bindColumn(1, $mime);
        $stmt->bindColumn(2, $data, PDO::PARAM_LOB);
        $stmt->fetch(PDO::FETCH_BOUND);
        return array("mime" => $mime,
            "data" => $data);
    }
 
}
?>