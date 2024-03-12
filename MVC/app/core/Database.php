<?php

class Database
{
    public function connect()
    {
        $string = "mysql:host=localhost;dbname=mvc_bsis3g";
        $con = new PDO($string, 'root', '');
        return $con;
    }

    public function query($query, $data = []) //query("Select * from info")
    {
        $con = $this->connect();
        $stm = $con->prepare($query); //Select * from info

        $check = $stm->execute($data);

        if($check)
        {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);

            if (is_array($result) && count($result) > 0) //check
            {
                return $result;
            }
        }
        return false;
    }
}