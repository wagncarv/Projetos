<?php


namespace Source\Models;


class Pessoa
{
    private $name;
    private $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function personal(){
        echo "Nome: " . $this->name . ", Idade: " . $this->age;
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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }
}