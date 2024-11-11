<?php

abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

// Расширение абстрактного класса HumanAbstract для русского человека
class RussianHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}

// Расширение абстрактного класса HumanAbstract для английского человека
class EnglishHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Hello';
    }

    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}

// Создание объектов и вызов методов для поздорований
$russian = new RussianHuman('Иван');
$english = new EnglishHuman('John');

echo $russian->introduceYourself() . PHP_EOL; // Выводит: Привет! Меня зовут Иван.
echo $english->introduceYourself() . PHP_EOL; // Выводит: Hello! My name is John.

?>
