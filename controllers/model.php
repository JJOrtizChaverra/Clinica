<?php

require_once "connection.php";

class Model
{

    // Iniciar sesion
    static public function login($data)
    {
        try {

            $pdo = DataBase::connection()->prepare(
                "SELECT * FROM {$data["role-login"]}" . "s" . " WHERE
                document_{$data["role-login"]} = :document_{$data["role-login"]}"
            );

            $pdo->bindParam(":document_{$data["role-login"]}", $data["document-login"], PDO::PARAM_INT);

            $pdo->execute();

            return $pdo->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Editar perfil del usuario
    static public function editProfileUser($data)
    {
        try {
            $pdo = DataBase::connection()->prepare(
                "UPDATE {$data["role-profile"]}" . "s" . " SET
                name_{$data["role-profile"]} = :name_{$data["role-profile"]},
                lastname_{$data["role-profile"]} = :lastname_{$data["role-profile"]},
                picture_{$data["role-profile"]} = :picture_{$data["role-profile"]}
                WHERE
                id_{$data["role-profile"]} = :id_{$data["role-profile"]}"
            );

            $pdo->bindParam(":id_{$data["role-profile"]}", $data["id-profile"], PDO::PARAM_INT);
            $pdo->bindParam(":name_{$data["role-profile"]}", $data["name-profile"], PDO::PARAM_STR);
            $pdo->bindParam(":lastname_{$data["role-profile"]}", $data["lastname-profile"], PDO::PARAM_STR);
            $pdo->bindParam(":picture_{$data["role-profile"]}", $data["picture-profile"], PDO::PARAM_STR);

            $pdo->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    // Registrar
    static public function register($table, $data)
    {
        try {

            $query = "INSERT INTO $table (";

            $columns = "";

            foreach ($data as $key => $value) {
                $columns .= "$key" . "_" . substr($table, 0, strlen($table) - 1) . ",";
            }

            $columns = substr($columns, 0, -1);

            $query .= $columns;

            $query .= ") VALUES
            (";

            $values = "";
            foreach ($data as $key => $value) {
                $values .= ":$key" . "_" . substr($table, 0, strlen($table) - 1) . ",";
            }

            $values = substr($values, 0, -1);

            $query .= $values;

            $query .= ")";

            $pdo = DataBase::connection()->prepare($query);


            foreach ($data as $key => $value) {
                if (is_numeric($data[$key]) && $key === "document") {
                    $valueNumeric = (int) $data[$key];
                    $pdo->bindParam(":$key" . "_" . substr($table, 0, strlen($table) - 1), $valueNumeric, PDO::PARAM_STR);
                } else {
                    $pdo->bindParam(":$key" . "_" . substr($table, 0, strlen($table) - 1), $data[$key], PDO::PARAM_STR);
                }
            }

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            $pdo = null;
            return false;
        }
    }


    // Obtener 
    static public function get($table1, $table2, $column, $value, $select)
    {
        try {

            if ($table2 !== "null") {

                $pdo = DataBase::connection()->prepare(
                    "SELECT $select FROM $table1
                    INNER JOIN $table2 ON $table1.$column" . "_" . substr($table2, 0, strlen($table2) - 1) . "_" . substr($table1, 0, strlen($table1) - 1) . " = $table2." . $column . "_" . substr($table2, 0, strlen($table2) - 1) . " 
                    ORDER BY $table1.$column" . "_" . substr($table1, 0, strlen($table1) - 1) . " DESC"
                );

                $pdo->execute();

                return $pdo->fetchAll(PDO::FETCH_ASSOC);
            } else {
                if ($value !== "null") {

                    $pdo = DataBase::connection()->prepare(
                        "SELECT $select FROM $table1 
                        WHERE $column" . "_" . substr($table1, 0, strlen($table1) - 1) . " = :" . $column . "_" . substr($table1, 0, strlen($table1) - 1)
                    );

                    if (is_numeric($value)) {
                        $pdo->bindParam(":" . $column . "_" . substr($table1, 0, strlen($table1) - 1), $value, PDO::PARAM_INT);
                    } else {
                        $pdo->bindParam(":" . $column . "_" . substr($table1, 0, strlen($table1) - 1), $value, PDO::PARAM_STR);
                    }

                    $pdo->execute();

                    return $pdo->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $pdo = DataBase::connection()->prepare(
                        "SELECT $select FROM $table1 
                        ORDER BY " . $column . "_" . substr($table1, 0, strlen($table1) - 1) . " DESC"
                    );

                    $pdo->execute();

                    return $pdo->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        } catch (Exception $e) {
            $pdo = null;
            return $e->getMessage();
        }
    }


    // Actualizar
    static public function update($table, $data, $id)
    {
        try {

            $query = "UPDATE $table SET ";

            $columns = "";

            foreach ($data as $key => $value) {
                $columns .= "$key" . "_" . substr($table, 0, strlen($table) - 1) . " = :$key" . "_" . substr($table, 0, strlen($table) - 1) . ",";
            }

            $columns = substr($columns, 0, -1);

            $query .= $columns;

            $query .= " WHERE id_" . substr($table, 0, strlen($table) - 1) . " = :id_" . substr($table, 0, strlen($table) - 1);

            $pdo = DataBase::connection()->prepare($query);

            $pdo->bindParam(":id_" . substr($table, 0, strlen($table) - 1), $id, PDO::PARAM_INT);

            foreach ($data as $key => $value) {
                if (is_numeric($data[$key])) {
                    $valueNumeric = (int) $data[$key];
                    $pdo->bindParam(":$key" . "_" . substr($table, 0, strlen($table) - 1), $valueNumeric, PDO::PARAM_STR);
                } else {
                    $pdo->bindParam(":$key" . "_" . substr($table, 0, strlen($table) - 1), $data[$key], PDO::PARAM_STR);
                }
            }

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            $pdo = null;
            return false;
        }
    }


    // Eliminar
    static public function delete($table, $id)
    {
        try {
            $pdo = DataBase::connection()->prepare("DELETE FROM $table WHERE 
            id_" . substr($table, 0, strlen($table) - 1) . " = :id_" . substr($table, 0, strlen($table) - 1) . ";");

            $pdo->bindParam(":id_" . substr($table, 0, strlen($table) - 1), $id, PDO::PARAM_INT);

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            $pdo = null;
            return "No se pudo eliminar";
        }
    }
}
