<?php


namespace Source\Models;


class Produto
{
    private $name;
    private $brand;

    function __construct($name, $brand)
    {
        $this->name = $name;
        $this->brand = $brand;
    }

    public function description(){
        echo "Produto: " . $this->name . ", Marca: " . $this->brand;
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
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
}