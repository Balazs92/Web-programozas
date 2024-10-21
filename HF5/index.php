<?php
require_once 'Student.php';
require_once 'Subject.php';
require_once 'AbstractUniversity.php';
require_once 'University.php';

$university = new University();


$math = $university->addSubject("MATH101", "Matematika");
$science = $university->addSubject("SCI101", "Tudomány");


$student1 = new Student("John Doe", "S123");
$student2 = new Student("Jane Smith", "S124");


$university->addStudentOnSubject("MATH101", $student1);
$university->addStudentOnSubject("MATH101", $student2);
$university->addStudentOnSubject("SCI101", $student1);


$university->addStudent($student1);
$university->addStudent($student2);


$university->print();

echo "Összes diák: " . $university->getNumberOfStudents() . "<br>";


$student1->addGrade($math, 6);
$student1->addGrade($science, 7.5);


echo $student1->getName() . "'s grades:<br>";
$student1->printGrades();
echo "Average grade: " . $student1->getAvgGrade() . "<br>";


function sortStudentsByAvgGrade(array $students): array {
    usort($students, function($a, $b) {
        return $b->getAvgGrade() <=> $a->getAvgGrade();
    });
    return $students;
}

$students = [$student1, $student2];
$sortedStudents = sortStudentsByAvgGrade($students);

echo "Sorted students by average grade:<br>";
foreach ($sortedStudents as $student) {
    echo $student->getName() . ": " . $student->getAvgGrade() . "<br>";
}
?>
