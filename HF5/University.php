<?php
class University extends AbstractUniversity
{
    public $students = [];

    public function addSubject(string $code, string $name): Subject
    {
        $subject = new Subject($code, $name);
        $this->subjects[$code] = $subject;
        return $subject;
    }

    public function addStudent(Student $student)
    {
        $this->students[] = $student;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        if (isset($this->subjects[$subjectCode])) {
            $this->subjects[$subjectCode]->addStudent($student);
        } else {
            echo "Hiba: A tantárgy nem található.\n";
        }
    }

    public function getStudentsForSubject(string $subjectCode): ?array
    {
        if (isset($this->subjects[$subjectCode])) {
            return $this->subjects[$subjectCode]->getStudents(); 
        }
        return null;
    }

    public function getNumberOfStudents(): int
    {
        $totalStudents = 0;
        foreach ($this->subjects as $subject) {
            $totalStudents += count($subject->getStudents());
        }
        return $totalStudents;
    }

    public function print()
    {
        foreach ($this->subjects as $subject) {
            echo $subject->getName() . " -" . str_repeat("-", 25) . "\n";
            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . " - " . $student->getStudentNumber() . "\n";
            }
        }
    }

    public function printAllStudents()
    {
        foreach ($this->students as $student) {
            echo $student->getName() . " - " . $student->getStudentNumber() . "\n";
        }
    }

    public function deleteSubject(Subject $subject): bool
    {
        if (empty($subject->getStudents())) {
            unset($this->subjects[$subject->getCode()]);
            return true;
        } else {
            throw new Exception("A tantárgy nem törölhető, mert hallgatókhoz van rendelve.");
        }
    }
}
?>
