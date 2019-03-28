<?php

/**
 * AbiturientDataGateway
 */

class AbiturientDataGateway
{
    public $pdo;
    
    /**
     * Creates PDO object
     */
    public function __construct() {
        $paramsPath = ROOT . "/config/db_params.php";
        $params = include($paramsPath);
        try { 
            $pdo = new PDO("mysql:host={$params['host']}; dbname={$params['dbname']}", $params['user'], $params['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec('SET NAMES "utf8"');
        } catch (PDOException $e) {
            $e->getMessage();
        }
        $this->pdo = $pdo;
    }
    
    /**
     * Inserts abiturient data into the DB table
     * 
     * @param Abiturient $abiturient
     * @return array
     */
    public function insert(Abiturient $abiturient)
    {
        $sql = "INSERT INTO abiturients (name, middleName, surname, sex, groupNumber, mark, birthDate, hostel, email, password) " .
               "VALUES (:name, :middleName, :surname, :sex, :groupNumber, :mark, :birthDate, :hostel, :email, :password)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":name", $abiturient->name, PDO::PARAM_STR);
        $result->bindParam(":middleName", $abiturient->middleName, PDO::PARAM_STR);
        $result->bindParam(":surname", $abiturient->surname, PDO::PARAM_STR);
        $result->bindParam(":sex", $abiturient->sex, PDO::PARAM_STR);
        $result->bindParam(":groupNumber", $abiturient->groupNumber, PDO::PARAM_STR);
        $result->bindParam(":mark", $abiturient->mark, PDO::PARAM_STR);
        $result->bindParam(":birthDate", $abiturient->birthDate, PDO::PARAM_STR);
        $result->bindParam(":hostel", $abiturient->hostel, PDO::PARAM_STR);
        $result->bindParam(":email", $abiturient->email, PDO::PARAM_STR);
        $result->bindParam(":password", $abiturient->password, PDO::PARAM_STR);
        
        return $result->execute();
    }

    /**
     * Gets the id of an abiturient by email and password
     * 
     * @param string $email
     * @param string $password
     * @return string
     */
    public function auth(string $email, string $password)
    {
        $sql = "SELECT id " .
                 "FROM abiturients " .
                "WHERE email = :email " .
                  "AND password = :password";

        $result = $this->pdo->prepare($sql);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);
        $result->execute();
        $abiturientId = $result->fetch();

        return $abiturientId["id"];
    }

    /**
     * Gets abiturient data from the DB table by query
     * 
     * @param string $searchQuery
     * @return array
     */
    public function selectByQuery($searchQuery = '')
    {
        $abiturientsList = array();
        
        $sql = "SELECT name, middleName, surname, groupNumber, mark " .
                 "FROM abiturients " .
                "WHERE name LIKE :searchQuery " .
                   "OR surname LIKE :searchQuery " .
                   "OR groupNumber LIKE :searchQuery " .
                   "OR mark LIKE :searchQuery " .
                "ORDER BY mark DESC";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":searchQuery", $searchQuery . "%");
        $result->execute();

        $i = 0;
        $number = 1;
        while ($row = $result->fetch()) {
            $abiturientsList[$i]["number"] = $number;
            $abiturientsList[$i]["fullName"] = $row["surname"] . " " . $row["name"] . " " . $row["middleName"];
            $abiturientsList[$i]["groupNumber"] = $row["groupNumber"];
            $abiturientsList[$i]["mark"] = $row["mark"];
            $i++;
            $number++;
        }

        return $abiturientsList;
    }

    /**
     * Gets abiturient data from the DB table
     * 
     * @param type $id
     * @return array
     */
    public function selectById($id)
    {
        $sql = "SELECT name, middleName, surname, sex, groupNumber, mark, birthDate, hostel " .
                 "FROM abiturients " .
                "WHERE id = :id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        $result->execute();

        return $result->fetch();
    }
    
    /**
     * Updates abiturient data in the DB table by id
     * 
     * @param Abiturient $abiturient
     * @return type
     */
    public function update(Abiturient $abiturient)
    {
        $sql = "UPDATE abiturients " .
                  "SET name = :name, middleName = :middleName, surname = :surname, sex = :sex, groupNumber = :groupNumber, " .
                     " mark = :mark, birthDate = :birthDate, hostel = :hostel " .
                "WHERE id = :id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $abiturient->id, PDO::PARAM_STR);
        $result->bindParam(":name", $abiturient->name, PDO::PARAM_STR);
        $result->bindParam(":middleName", $abiturient->middleName, PDO::PARAM_STR);
        $result->bindParam(":surname", $abiturient->surname, PDO::PARAM_STR);
        $result->bindParam(":sex", $abiturient->sex, PDO::PARAM_STR);
        $result->bindParam(":groupNumber", $abiturient->groupNumber, PDO::PARAM_STR);
        $result->bindParam(":mark", $abiturient->mark, PDO::PARAM_STR);
        $result->bindParam(":birthDate", $abiturient->birthDate, PDO::PARAM_STR);
        $result->bindParam(":hostel", $abiturient->hostel, PDO::PARAM_STR);
        
        return $result->execute();
    }
}
