<?php
// Абстрактный класс Figure
abstract class Figure {
    protected $area;
    protected $color;
    protected $sidesCount;

    abstract public function infoAbout();
}

// Интерфейс для расчёта площади
interface AreaCalculable {
    public function getArea();
}

// Класс Rectangle
class Rectangle extends Figure implements AreaCalculable {
    private $a;
    private $b;
    const SIDES_COUNT = 4;

    public function __construct($a, $b, $color = 'none') {
        $this->a = $a;
        $this->b = $b;
        $this->color = $color;
        $this->sidesCount = self::SIDES_COUNT;
    }
    public function getArea() {
        $this->area = $this->a * $this->b;
        return $this->area;
    }
    public function infoAbout() {
        return "Это класс прямоугольника. У него {$this->sidesCount} стороны.";
    }
}

// Класс Square
class Square extends Figure implements AreaCalculable {
    private $a;
    const SIDES_COUNT = 4;

    public function __construct($a, $color = 'none') {
        $this->a = $a;
        $this->color = $color;
        $this->sidesCount = self::SIDES_COUNT;
    }
    public function getArea() {
        $this->area = $this->a * $this->a;
        return $this->area;
    }
    public function infoAbout() {
        return "Это класс квадрата. У него {$this->sidesCount} стороны.";
    }
}

// Класс Triangle
class Triangle extends Figure implements AreaCalculable {
    private $a;
    private $b;
    private $c;
    const SIDES_COUNT = 3;

    public function __construct($a, $b, $c, $color = 'none') {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->color = $color;
        $this->sidesCount = self::SIDES_COUNT;
    }
    public function getArea() {
        // Формула Герона
        $p = ($this->a + $this->b + $this->c) / 2;
        $this->area = sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
        return $this->area;
    }
    public function infoAbout() {
        return "Это класс треугольника. У него {$this->sidesCount} стороны.";
    }
}

// Тестирование
$figures = [
    new Rectangle(3, 4),
    new Rectangle(5, 6),
    new Square(4),
    new Square(7),
    new Triangle(3, 4, 5),
    new Triangle(6, 8, 10)
];

foreach ($figures as $figure) {
    echo $figure->infoAbout() . " Площадь: " . $figure->getArea() . "<br>\n";
}
