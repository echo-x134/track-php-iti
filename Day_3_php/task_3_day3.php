<?php

class Author {
    private string $name;
    private string $email;
    private string $gender;

    public function __construct(string $name, string $email, string $gender = '') {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
    }

    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function getGender(): string { return $this->gender; }

    public function __toString(): string {
        return "Author[name={$this->name},email={$this->email}]";
    }
}

$author = new Author("John Doe", "john@example.com", "m");
echo "Author Name : " . $author->getName() . "<br>";
echo "Author Email : " . $author->getEmail() . "<br>";
echo "Author Gender : " . $author->getGender() . "<br>";
echo "String : " . $author . "<br><br>";

class Book {
    private string $isbn;
    private string $name;
    private Author $author;
    private float $price;
    private int $qty = 0;

    public function __construct(string $isbn, string $name, Author $author, float $price, int $qty = 0) {
        $this->isbn = $isbn;
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->qty = $qty;
    }

    public function getIsbn(): string { return $this->isbn; }
    public function getName(): string { return $this->name; }
    public function getAuthor(): Author { return $this->author; }
    public function getPrice(): float { return $this->price; }
    public function setPrice(float $price): void { $this->price = $price; }
    public function getQty(): int { return $this->qty; }
    public function setQty(int $qty): void { $this->qty = $qty; }

    public function getAuthorName(): string {
        return $this->author->getName();
    }

    public function __toString(): string {
        return "Book[isbn={$this->isbn},name={$this->name},{$this->author},price={$this->price},qty={$this->qty}]";
    }
}

$book = new Book("978-3-16-148410-0", "PHP Programming", $author, 29.99, 10);
echo "ISBN : " . $book->getIsbn() . "<br>";
echo "Book Name : " . $book->getName() . "<br>";
echo "Author Name : " . $book->getAuthorName() . "<br>";
echo "Price : " . $book->getPrice() . "<br>";
echo "Quantity : " . $book->getQty() . "<br>";
echo "String : " . $book . "<br><br>";

class Circle {
    private float $radius = 1.0;
    private string $color = "red";

    public function __construct(float $radius = 1.0, string $color = "red") {
        $this->radius = $radius;
        $this->color = $color;
    }

    public function getRadius(): float { return $this->radius; }
    public function setRadius(float $radius): void { $this->radius = $radius; }

    public function getColor(): string { return $this->color; }
    public function setColor(string $color): void { $this->color = $color; }

    public function getArea(): float {
        return pi() * $this->radius * $this->radius;
    }

    public function __toString(): string {
        return "Circle[radius={$this->radius},color={$this->color}]";
    }
}

class Cylinder extends Circle {
    private float $height = 1.0;

    public function __construct(float $radius = 1.0, float $height = 1.0, string $color = "red") {
        parent::__construct($radius, $color);
        $this->height = $height;
    }

    public function getHeight(): float { return $this->height; }
    public function setHeight(float $height): void { $this->height = $height; }

    public function getVolume(): float {
        return $this->getArea() * $this->height;
    }
}

$cylinder = new Cylinder(2.5, 5.0, "blue");
echo "Radius : " . $cylinder->getRadius() . "<br>";
echo "Height : " . $cylinder->getHeight() . "<br>";
echo "Color : " . $cylinder->getColor() . "<br>";
echo "Base Area : " . number_format($cylinder->getArea(), 2) . "<br>";
echo "Volume : " . number_format($cylinder->getVolume(), 2) . "<br>";