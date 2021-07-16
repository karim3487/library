<?php

require_once 'connect.php';


class Library
{
    public function tt($value)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }


//Проверка выполнения запроса к БД. Если есть ошибка в запросе - вернет ее(ошибку)
    private function dbCheckError($query)
    {
        $errInfo = $query->errorInfo();
        if ($errInfo[0] !== PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
    }

// Функция, которая запрашивает получение одной записи таблицы
    public function selectOne($table, $id)
    {
        global $pdo;
        //SELECT * FROM `books` WHERE id = 2
        $sql = "SELECT * FROM $table WHERE id = $id";
        /*echo '<pre>';
        echo $sql;
        echo '</pre>';*/
        $query = $pdo->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
        return $query->fetch();
    }


// Функция, которая запрашивает получение всех записей таблицы
    public function selectAll($table, $params = [])
    {
        global $pdo;
        $sql = "SELECT * FROM $table";
        if (!empty($params)) { // Проверка есть параметры или нет
            $i = 0; // Кол-во параметров
            foreach ($params as $key => $value) {
                if (!is_numeric($value)) {
                    $value = "'" . $value . "'";
                }
                if ($i === 0) {
                    $sql = $sql . " WHERE $key = $value";
                } else {
                    $sql = $sql . " AND $key = $value";
                }
                $i++;
            }
        }
        $query = $pdo->prepare($sql);
        $query->execute($params);
        $this->dbCheckError($query);
        return $query->fetchAll();
    }

    //Функция добавления в таблицу
    public function insert($table, $params)
    {
        global $pdo;

        $i = 0;
        $coll = '';
        $mask = '';
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $coll = $coll . "$key";
                $mask = $mask . "'" . "$value" . "'";
            } else {
                $coll = $coll . ", $key";
                $mask = $mask . ", '" . " $value" . "'";
            }
            $i++;
        }
        $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
        $query = $pdo->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
    }

// Функция обновления строки по id
    public function update($table, $id, $params)
    {
        global $pdo;

        $i = 0;
        $str = '';
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $str = $str . $key . " = '" . $value . "'";
            } else {
                $str = $str . ", " . $key . " = '" . $value . "'";
            }
            $i++;
        }
        $sql = "UPDATE $table SET $str WHERE `id` = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
    }

// Функция удаления строки по id
    public
    function delete($table, $id)
    {
        global $pdo;
        $sql = "DELETE FROM $table WHERE  $table . id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
    }

    public function query($sql) {
        global $pdo;
        $query = $pdo->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
    }
}

