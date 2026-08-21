<?php
class Circle
{
    private float $radius = 1.0;
    private string $color = "red";

    public function __construct(float $radius = 1.0, string $color = "red")
    {
        $this->radius = $radius;
        $this->color = $color;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }
    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    public function getColor(): string
    {
        return $this->color;
    }
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getArea(): float
    {
        return pi() * $this->radius * $this->radius;
    }

}
$circle = new Circle(5.5, "blue");

echo "Radius : " . $circle->getRadius() . "<br>";
echo "Color  : " . $circle->getColor() . "<br>";
echo "Area   : " . number_format($circle->getArea(), 2) . "<br><br>";

//===================================

class Employee
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private int $salary;

    public function __construct(int $id, string $firstName, string $lastName, int $salary)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = $salary;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }
    public function getSalary(): int
    {
        return $this->salary;
    }
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function getAnnualSalary(): int
    {
        return $this->salary * 12;
    }

    public function raiseSalary(int $percent): int
    {
        $this->salary += (int) ($this->salary * ($percent / 100));
        return $this->salary;
    }

    public function __toString(): string
    {
        return "Employee[id={$this->id},name={$this->getName()},salary={$this->salary}]";
    }
}
$employee = new Employee(101, "Ahmed", "Ali", 5000);

echo "ID : " . $employee->getId() . "<br>";
echo "First Name : " . $employee->getFirstName() . "<br>";
echo "Last Name : " . $employee->getLastName() . "<br>";
echo "Full Name : " . $employee->getName() . "<br>";
echo "Salary : " . $employee->getSalary() . "<br>";
echo "Annual Salary : " . $employee->getAnnualSalary() . "<br>";

echo "New Salary (after 10% raise) : " . $employee->raiseSalary(10) . "<br> <br>";

//==========================

class Rectangle
{
    private float $length = 1.0;
    private float $width = 1.0;

    public function __construct(float $length = 1.0, float $width = 1.0)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function getLength(): float
    {
        return $this->length;
    }
    public function setLength(float $length): void
    {
        $this->length = $length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }
    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function getArea(): float
    {
        return $this->length * $this->width;
    }
    public function getPerimeter(): float
    {
        return 2 * ($this->length + $this->width);
    }

    public function __toString(): string
    {
        return "Rectangle[length={$this->length},width={$this->width}]";
    }
}
$rectangle = new Rectangle(4.0, 2.5);

echo "Length : " . $rectangle->getLength() . "<br>";
echo "Width  : " . $rectangle->getWidth() . "<br>";
echo "Area   : " . number_format($rectangle->getArea(), 2) . "<br>";
echo "Perimeter : " . number_format($rectangle->getPerimeter(), 2) . "<br><br>";

//=============================

class InvoiceItem
{
    private string $id;
    private string $desc;
    private int $qty;
    private float $unitPrice;

    public function __construct(string $id, string $desc, int $qty, float $unitPrice)
    {
        $this->id = $id;
        $this->desc = $desc;
        $this->qty = $qty;
        $this->unitPrice = $unitPrice;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getDesc(): string
    {
        return $this->desc;
    }
    public function getQty(): int
    {
        return $this->qty;
    }
    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }
    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getTotal(): float
    {
        return $this->unitPrice * $this->qty;
    }

    public function __toString(): string
    {
        return "InvoiceItem[id={$this->id},desc={$this->desc},qty={$this->qty},unitPrice={$this->unitPrice}]";
    }
}
$item = new InvoiceItem("A101", "Laptop Bag", 3, 250.50);

echo "ID : " . $item->getId() . "<br>";
echo "Description : " . $item->getDesc() . "<br>";
echo "Quantity : " . $item->getQty() . "<br>";
echo "Unit Price : " . $item->getUnitPrice() . "<br>";
echo "Total : " . number_format($item->getTotal(), 2) . "<br>";
?>