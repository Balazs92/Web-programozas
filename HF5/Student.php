<?php
class Student
{
    public $name;
    public $studentNumber;
    public $grades = [];

    public function __construct(string $name, string $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function addGrade(Subject $subject, float $grade)
    {
        $this->grades[$subject->getCode()] = $grade;
    }

    public function getAvgGrade(): float
    {
        if (empty($this->grades)) return 0;
        return array_sum($this->grades) / count($this->grades);
    }

    public function printGrades()
    {
        foreach ($this->grades as $code => $grade) {
            echo "{$code} - {$grade}<br>";
        }
    }
}
?>
