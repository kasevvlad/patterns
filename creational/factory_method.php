<?php

/*
Паттерн Factory Method (фабричный метод) — это порождающий паттерн проектирования, который определяет интерфейс для создания объектов в суперклассе, но позволяет подклассам изменять тип создаваемых объектов. В отличие от простого паттерна Factory, где логика создания объекта инкапсулирована в одном классе, в Factory Method эту ответственность передают подклассам
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

abstract class WorkerFactory
{
    abstract  public static function make();
}

class DeveloperFactory extends WorkerFactory
{
    public static function make()
    {
        return new Developer();
    }
}

class DesignerFactory extends WorkerFactory
{
    public static function make()
    {
        return new Designer();
    }
}

$developer = DeveloperFactory::make();
$designer = DesignerFactory::make();

$developer->work();
$designer->work();