<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    protected Collect $collection;

    //Функция создания коллекции
    protected function setUp(): void
    {
        $this->collection = new Collect([1, 2, 3, 4, 5]);
    }

    //Функция получения ключей из массива
    public function testKeys(): void
    {
        $keys = $this->collection->keys()->toArray();
        $expected = [0, 1, 2, 3, 4];
        
        $this->assertEquals($expected, $keys);
    }

    //Получение ожидаемого значения в expected
    public function testValues(): void
    {
        $values = $this->collection->values()->toArray();
        $expected = [1, 2, 3, 4, 5];
        
        $this->assertEquals($expected, $values);
    }

    //Функция получения значения по ключу
    public function testGet(): void
    {
        $this->assertEquals(3, $this->collection->get(2));// Сравнивает значения

        $this->assertNull($this->collection->get(5)); // Ожидаем null, если ключ не существует

        $defaultValue = "default";
        $this->assertEquals($defaultValue, $this->collection->get(6, $defaultValue));
    }

    //Функция исключения по ключу из коллекции
    public function testExcept(): void
    {
        $collection = new Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        
        $this->assertEquals(['b' => 2, 'c' => 3], $collection->except('a')->toArray());

        $this->assertEquals(['b' => 2], $collection->except(['a', 'c'])->toArray());
    }
}
