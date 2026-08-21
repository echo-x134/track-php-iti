<?php

class Account
{
    private string $id;
    private string $name;
    private int $balance = 0;

    public function __construct(string $id, string $name, int $balance = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getBalance(): int
    {
        return $this->balance;
    }
    public function credit(int $amount): int
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function debit(int $amount): int
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Amount exceeded balance<br>";
        }
        return $this->balance;
    }

    public function transferTo(Account $another, int $amount): int
    {
        if ($amount <= $this->balance) {
            $this->debit($amount);
            $another->credit($amount);
        } else {
            echo "Amount exceeded balance<br>";
        }
        return $this->balance;
    }

    public function __toString(): string
    {
        return "Account[id={$this->id},name={$this->name},balance={$this->balance}]";
    }
}

$acc1 = new Account("A101", "Ahmed", 1000);
$acc2 = new Account("A102", "Mohamed", 500);

echo "Account 1 ID : " . $acc1->getId() . "<br>";
echo "Account 1 Name : " . $acc1->getName() . "<br>";
echo "Account 1 Balance : " . $acc1->getBalance() . "<br>";
echo "Balance after Credit (500) : " . $acc1->credit(500) . "<br>";
echo "Balance after Debit (300) : " . $acc1->debit(300) . "<br>";
echo "Balance after Transferring 400 to Acc2 : " . $acc1->transferTo($acc2, 400) . "<br>";
echo "Account 2 New Balance : " . $acc2->getBalance() . "<br>";
echo "String : " . $acc1 . "<br><br>";

class Ball
{
    private float $x;
    private float $y;
    private int $radius;
    private float $xDelta;
    private float $yDelta;

    public function __construct(float $x, float $y, int $radius, float $xDelta, float $yDelta)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
        $this->xDelta = $xDelta;
        $this->yDelta = $yDelta;
    }

    public function getX(): float
    {
        return $this->x;
    }
    public function setX(float $x): void
    {
        $this->x = $x;
    }

    public function getY(): float
    {
        return $this->y;
    }
    public function setY(float $y): void
    {
        $this->y = $y;
    }

    public function getRadius(): int
    {
        return $this->radius;
    }
    public function setRadius(int $radius): void
    {
        $this->radius = $radius;
    }

    public function getXDelta(): float
    {
        return $this->xDelta;
    }
    public function setXDelta(float $xDelta): void
    {
        $this->xDelta = $xDelta;
    }

    public function getYDelta(): float
    {
        return $this->yDelta;
    }
    public function setYDelta(float $yDelta): void
    {
        $this->yDelta = $yDelta;
    }

    public function move(): void
    {
        $this->x += $this->xDelta;
        $this->y += $this->yDelta;
    }

    public function reflectHorizontal(): void
    {
        $this->xDelta = -$this->xDelta;
    }
    public function reflectVertical(): void
    {
        $this->yDelta = -$this->yDelta;
    }

    public function __toString(): string
    {
        return "Ball[({$this->x},{$this->y}),speed=({$this->xDelta},{$this->yDelta})]";
    }
}

$ball = new Ball(1.1, 2.2, 10, 0.5, 0.5);
echo "X Position : " . $ball->getX() . "<br>";
echo "Y Position : " . $ball->getY() . "<br>";
echo "Radius : " . $ball->getRadius() . "<br>";
echo "X Speed (xDelta) : " . $ball->getXDelta() . "<br>";
echo "Y Speed (yDelta) : " . $ball->getYDelta() . "<br>";

$ball->move();
echo "New Position after Move : (" . $ball->getX() . ", " . $ball->getY() . ")<br>";

$ball->reflectHorizontal();
$ball->reflectVertical();
echo "String : " . $ball . "<br>";

?>