<?php

class ArrayManipulator
{
    
    private $data = [];

    
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    
    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    
    public function __toString()
    {
        return json_encode($this->data);
    }

    
    public function __clone()
    {
        $this->data = array_map(function($item) {
            return is_object($item) ? clone $item : $item;
        }, $this->data);
    }
}


$manipulator = new ArrayManipulator();


$manipulator->name = "John";
$manipulator->age = 30;
echo "Név: " . $manipulator->name . "<br>";
echo "Kor: " . $manipulator->age . "<br>";


if (isset($manipulator->name)) {
    echo "A 'name' kulcs létezik.<br>";
} else {
    echo "A 'name' kulcs nem létezik.<br>";
}


unset($manipulator->age);
echo isset($manipulator->age) ? "Az 'age' kulcs létezik.\n" : "Az 'age' kulcs nem létezik.<br>";


echo "Az objektum stringként: " . $manipulator . "<br>";


$manipulator->address = (object) ['city' => 'Budapest'];
$cloneManipulator = clone $manipulator;
$cloneManipulator->address->city = 'Pécs';
echo "Eredeti: " . $manipulator . "<br>";
echo "Klón: " . $cloneManipulator . "<br>";

?>

