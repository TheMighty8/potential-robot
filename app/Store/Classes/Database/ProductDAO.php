<?php namespace Store\Classes\Database;
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 15/04/2016
 * Time: 10:05
 */
use Store\Classes\Model\Product;
use Store\Classes\Util\ObjectFactoryService;

class ProductDAO
{
    private $connection;
    private $preparedStatement;

    function __construct()
    {
        $this->connection = ObjectFactoryService::getDbConnection();
        $this->preparedStatement = GenericPreparedStatementHandler::getInstance();
    }

    function insertProductInTable(Product $product, $table)
    {
        $fields = "nome, descricao, usado, categoria_id, preco";

        $query = "INSERT INTO {$table}($fields) VALUES (?, ?, ?, ?, ?)";

        $fieldsToBind = array
        (
            $product->getName(),
            $product->getDescription(),
            $product->getCondition(),
            $product->getCategoryId(),
            $product->getPrice(),
        );

        return $this->preparedStatement->executePreparedStatement($this->connection, $query, $fieldsToBind);
    }

    function updateProductInTable(Product $product, $table)
    {
        $fields = array('nome', 'descricao', 'usado', 'categoria_id', 'preco', 'id');

        $query = "UPDATE {$table} 
              SET $fields[0] = ?, $fields[1] = ?, $fields[2] = ?, $fields[3] = ?, $fields[4] = ? 
              WHERE $fields[5] = ?";

        $fieldsToBind = array
        (
            $product->getName(),
            $product->getDescription(),
            $product->getCondition(),
            $product->getCategoryId(),
            $product->getPrice(),
            $product->getId()
        );

        return $this->preparedStatement->executePreparedStatement($this->connection, $query, $fieldsToBind);
    }
}