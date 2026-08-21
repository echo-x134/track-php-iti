<?php

class Person {
    private string $name;
    private string $address;

    public function __construct(string $name, string $address) {
        $this->name = $name;
        $this->address = $address;
    }

    public function getName(): string { return $this->name; }
    public function getAddress(): string { return $this->address; }
    public function setAddress(string $address): void { $this->address = $address; }

    public function __toString(): string {
        return "Person[name={$this->name},address={$this->address}]";
    }
}

class Student extends Person {
    private string $program;
    private int $year;
    private float $fee;

    public function __construct(string $name, string $address, string $program, int $year, float $fee) {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = $fee;
    }

    public function getProgram(): string { return $this->program; }
    public function setProgram(string $program): void { $this->program = $program; }

    public function getYear(): int { return $this->year; }
    public function setYear(int $year): void { $this->year = $year; }

    public function getFee(): float { return $this->fee; }
    public function setFee(float $fee): void { $this->fee = $fee; }

    public function __toString(): string {
        return "Student[" . parent::__toString() . ",program={$this->program},year={$this->year},fee={$this->fee}]";
    }
}

class Staff extends Person {
    private string $school;
    private float $pay;

    public function __construct(string $name, string $address, string $school, float $pay) {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }

    public function getSchool(): string { return $this->school; }
    public function setSchool(string $school): void { $this->school = $school; }

    public function getPay(): float { return $this->pay; }
    public function setPay(float $pay): void { $this->pay = $pay; }

    public function __toString(): string {
        return "Staff[" . parent::__toString() . ",school={$this->school},pay={$this->pay}]";
    }
}

$student = new Student("Ahmed", "Cairo", "Computer Science", 3, 15000.0);
echo "Student Name : " . $student->getName() . "<br>";
echo "Address : " . $student->getAddress() . "<br>";
echo "Program : " . $student->getProgram() . "<br>";
echo "Year : " . $student->getYear() . "<br>";
echo "Fee : " . $student->getFee() . "<br>";
echo "String : " . $student . "<br><br>";

$staff = new Staff("Dr. Mohamed", "Giza", "Engineering", 20000.0);
echo "Staff Name : " . $staff->getName() . "<br>";
echo "Address : " . $staff->getAddress() . "<br>";
echo "School : " . $staff->getSchool() . "<br>";
echo "Pay : " . $staff->getPay() . "<br>";
echo "String : " . $staff . "<br>";