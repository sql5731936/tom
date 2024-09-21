
<?php
	$qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'-01') as pmonth,d.amount as amount FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id = '{$_GET['account_id']}' order by a.status desc, student asc");
					

"SELECT E.Fname, E.Lname
FROM EMPLOYEE AS E, DEPENDENT AS D
WHERE E.Ssn=D.Essn AND E.Sex=D.Sex
AND E.Fname=D.Dependent_name;"



"SELECT E.Fname, E.Lname
FROM EMPLOYEE AS E
WHERE EXISTS ( SELECT *
FROM DEPENDENT AS D
WHERE E.Ssn=D.Essn AND E.Sex=D.Sex
AND E.Fname=D.Dependent_name);"




"SELECT Fname, Lname
FROM EMPLOYEE
WHERE NOT EXISTS ( SELECT *
FROM DEPENDENT
WHERE Ssn<0 );"




"SELECT Fname, Lname
FROM EMPLOYEE
WHERE EXISTS ( SELECT *
FROM DEPENDENT
WHERE Ssn=Essn )
AND
EXISTS ( SELECT *
FROM DEPARTMENT
WHERE Ssn<=>Mgr_ssn );"









"SELECT firstname, Lastname
FROM student_list
WHERE EXISTS ( SELECT *
FROM account_list
WHERE id=student_id )
AND
EXISTS ( SELECT *
FROM payment_list
WHERE id<=>account_id );"

"SELECT firstname, Lastname
FROM student_list
WHERE EXISTS ( SELECT *
FROM account_list
WHERE id>a )
AND
EXISTS ( SELECT *
FROM payment_list
WHERE id>0 );"
?>
