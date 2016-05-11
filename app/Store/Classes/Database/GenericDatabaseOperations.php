<?php namespace Store\Classes\Database;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 15/04/2016
 * Time: 08:09
 */
use Store\Classes\Util\ObjectFactoryService;

class GenericDatabaseOperations
{
    private static $_instance;
    private $connection;
    private $preparedStatement;

    public function __construct()
    {
        $this->connection = ObjectFactoryService::getDbConnection();
        $this->preparedStatement = GenericPreparedStatementHandler::getInstance();
    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    function listFromTable($table)
    {
        $items = array();

        $resultado = $this->connection->query("SELECT * FROM {$table}");

        if ($resultado === false) {
            trigger_error($this->connection->error, E_USER_ERROR);
        }

        while ($item = mysqli_fetch_assoc($resultado)) {array_push($items, $item);}

        return $items;
    }

    function deleteWithIdFromTable($id, $table)
    {
        $query = "DELETE FROM {$table} WHERE id = ?";

        $fieldsToBind = array
        (
            $id
        );

        return $this->preparedStatement->executePreparedStatement($this->connection, $query, $fieldsToBind);
    }

    function searchForCategoryNameWithId($id)
    {
        $categoryName = $this->searchForIdInTable($id, "categorias");
        return $categoryName['nome'];
    }

    function searchForIdInTable($id, $table)
    {
        $query = "SELECT * FROM {$table} WHERE id = {$id}";

        $resultado = $this->connection->query($query);

        $resultado = mysqli_fetch_assoc($resultado);

        return $resultado;
    }
}
