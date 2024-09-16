<?php
/*

Паттерн Singleton (одиночка) — это порождающий паттерн проектирования, который гарантирует, что у класса есть только один экземпляр, и предоставляет глобальную точку доступа к этому экземпляру

*/

// final - говорит нам о том, что класс нельзя расширить
final class Connection
{

    private static ?self $instance = null;
    private static string $name;

    public static function getName(): string
    {
        return self::$name;
    }
    
    public static function setName(string $name): void
    {
        self::$name = $name;
    }

    public static function getInstance(): self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Запрещаем клонирование
    public function __clone(): void
    {
        
    }

    // Запрещаем десериализацию
    public function __wakeup(): void
    {

    }
}

//Создаём объект и задаём $name = Laravel
$connection = Connection::getInstance(); 
$connection::setName('Laravel');

//При повторном создание объекта мы получим всё тот же результат что и был у нас при первой инициализации 
$connection2 = Connection::getInstance();
var_dump($connection2::getName());
var_dump($connection === $connection2);

//result - string(7) "Laravel"
//result - bool(true)