<?php

/*

Паттерн Factory (фабрика) — это порождающий паттерн проектирования, который предоставляет интерфейс для создания объектов, позволяя подклассам решать, какой класс создавать. Основная идея фабрики — делегировать создание объектов другому классу, обычно в зависимости от условий.

*/

interface Animal
{
    public function speak(): string;
}

class Dog implements Animal
{
    public function speak(): string
    {
        return "Woof!";
    }
}

class Cat implements Animal
{
    public function speak(): string
    {
        return "Meow!";
    }
}

class Bird implements Animal
{
    public function speak(): string
    {
        return "Tweet!";
    }
}

class AnimalFactory
{
    public static function createAnimal(string $type): Animal
    {
        switch ($type) {
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            case 'bird':
                return new Bird();
            default:
                throw new Exception("Unknown animal type.");
        }
    }
}

try {
    $dog = AnimalFactory::createAnimal('dog');
    echo $dog->speak(); // Вывод: Woof!

    $cat = AnimalFactory::createAnimal('cat');
    echo $cat->speak(); // Вывод: Meow!

    $bird = AnimalFactory::createAnimal('bird');
    echo $bird->speak(); // Вывод: Tweet!

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}