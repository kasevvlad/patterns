<?php
/*
Паттерн Static Factory (статическая фабрика) — это разновидность фабричного паттерна, где метод для создания объектов является статическим. В отличие от обычной фабрики, где объекты создаются через экземпляр класса, статическая фабрика использует статический метод для создания и возврата объектов. Этот паттерн особенно полезен, когда нет необходимости в создании экземпляра фабрики, а сам процесс создания объектов может быть организован через статические вызовы
*/

interface Worker
{
    public function work();
}

class Developer implements Worker
{
    public function work()
    {
        print_r('im developing');
    }
}

class Designer implements Worker
{
    public function work()
    {
        print_r('im designing');
    }
}

class WorkerFactory
{
    public static function make($workerTitle): ?Worker
    {
        $className = strtoupper($workerTitle);

        if(class_exists($className)){
            return new $className();
        }
        return null;
    }
}

$developer = WorkerFactory::make('developer');
$developer->work();