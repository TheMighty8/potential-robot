<?php namespace Store\Classes\Model;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 12/04/2016
 * Time: 10:10
 */
class Product
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $condition;
    private $category_id;

    public function extractProductFromDatabaseArray($DatabaseArray)
    {
        $product = new Product();

        $product->setName($DatabaseArray['nome']);
        $product->setCategoryId($DatabaseArray['categoria_id']);
        $product->setDescription($DatabaseArray['descricao']);
        $product->setPrice($DatabaseArray['preco']);
        $product->setId($DatabaseArray['id']);

        return $product;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = (integer) $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = (double) $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param mixed $condition
     */
    public function setCondition($condition)
    {
        $this->condition = (boolean) $condition;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = (integer) $category_id;
        return $this;
    }

}