<?php

$query = "SELECT employee_id, role ,first_name, surname, telephone_no, disciplinary_record, salary, salary - (SELECT AVG(salary) FROM employees) As SalaryDifference
FROM employees
WHERE  salary > (SELECT AVG(salary) FROM employees);";

$result = mysql_query($query, $db);
// display the result


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

    echo "<div id='result-entry'>";
    echo "<form action=\"manage-employee.php\" method=\"POST\">";
    echo "<br><br>";
    echo "<img src=\"https://cyc.berkeley.edu/img/expert-icon.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";

    //echo "<a> Employee ID: </a>";
    //echo $row["employee_id"]."<br>";

    echo "<a> Employee ID: </a>";
    echo $row["employee_id"]."<input type='hidden' name='employee_id' value='".$row["employee_id"]."'></td><td><br>";

    echo "<a> Role: </a>";
    echo $row["role"]."<input type='hidden' name='role' value='".$row["role"]."'></td><td><br>";

    echo "<a> First Name: </a>";
    echo $row["first_name"]."<input type='hidden' name='first_name' value='".$row["first_name"]."'></td><td><br>";

    echo "<a> Surname: </a>";
    echo $row["surname"]."<input type='hidden' name='surname' value='".$row["surname"]."'></td><td><br>";

    echo "<a> Telephone No: </a>";
    echo $row["telephone_no"]."<br>";
    
    echo "<a> Disciplinary Record: </a>";
    echo $row["disciplinary_record"]."<input type='hidden' name='disciplinary_record' value='".$row["disciplinary_record"]."'></td><td><br>";

    echo "<a> Salary: </a>";
    echo $row["salary"]."<input type='hidden' name='salary' value='".$row["salary"]."'></td><td><br>";

    echo "<a> Salary Difference (vs Average): </a>";
    echo $row["SalaryDifference"]."<br>";



    echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Manage Employee </button><br><br>";

    echo "</form>";
    echo "</div>";

}

