<?php namespace Store\Classes\Database;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 14/04/2016
 * Time: 11:09
 */
class GenericPreparedStatementHandler
{
    private static $_instance;

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    function executePreparedStatement(mysqli $connection, $query, array $fieldsToBind)
    {
        $statement = $connection->prepare($query);

        if (!$statement) {
            $this->preparedStatementErrorMessage("prepare", $connection);
        }

        if (!$this->preparedStatementBind($statement, $fieldsToBind)) {
            $this->preparedStatementErrorMessage("bind", $connection);
        }

        if (!$statement->execute()) {
            $this->preparedStatementErrorMessage("execute", $connection);
        }

        return $statement;
    }

    private function preparedStatementErrorMessage($errorType, mysqli $connection)
    {
        echo("<hr>");
        die($errorType . " failure {" . $connection->errno . "} " . $connection->error);
    }

    private function preparedStatementBind(mysqli_stmt &$statement, array &$fieldsToBind)
    {
        $paramsForBindingProcess = array();
        $numbersOfParams = count($fieldsToBind);

        if (empty($fieldsToBind)) {
            return false;
        }

        $stringForPreparedStatement = $this->extractTypesForPreparedStatement($fieldsToBind, $stringForPreparedStatement = '');

        $paramsForBindingProcess[] = &$stringForPreparedStatement;

        for ($i = 0; $i < $numbersOfParams; $i++) {
            $paramsForBindingProcess[] = &$fieldsToBind[$i];
        }

        call_user_func_array(array($statement, 'bind_param'), $paramsForBindingProcess);

        return true;
    }

    private function extractTypesForPreparedStatement(array &$fieldsToBind, $stringForPreparedStatement)
    {
        foreach ($fieldsToBind as $field) {
            if (is_integer($field)) {
                $stringForPreparedStatement .= "i";
            } elseif (is_double($field)) {
                $stringForPreparedStatement .= "d";
            } elseif (is_bool($field)) {
                $stringForPreparedStatement .= "i";
            } elseif (is_string($field)) {
                $stringForPreparedStatement .= "s";
            }
        }
        return $stringForPreparedStatement;
    }
}