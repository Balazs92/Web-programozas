<?php
class Subject {
    private $code;
    private $name;
    private $students = [];

    public function __construct(string $code, string $name, array $students = []) {
        $this->code = $code;
        $this->name = $name;
        $this->students = $students;
    }

    public function setCode(string $code) {
        $this->code = $code;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function addStudent(Student $student) {
        if (!$this->isStudentExist($student->getStudentNumber())) {
            $this->students[] = $student;
        }
    }

    public function getStudents(): array { 
        return $this->students;
    }

    public function getStudent(string $studentNumber): ?Student {
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() === $studentNumber) {
                return $student;
            }
        }
        return null;
    }

    public function isStudentExist(string $studentNumber): bool {
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() === $studentNumber) {
                return true;
            }
        }
        return false;
    }

    public function __toString(): string {
        return "Subject: " . $this->name . " (Code: " . $this->code . ")";
    }
}
?>
