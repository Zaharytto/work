<pre>
<?php

$studentsCount = strval(rand(0, 1000000));

$first_num_left = substr( $studentsCount , -1);
$second_num_left = substr( $studentsCount , -2);

if($first_num_left =="1" and $second_num_left !="11"){
     echo "На учёбе $studentsCount студент";
    }elseif($first_num_left =="2" and $second_num_left !="12"){
     echo "На учёбе $studentsCount студента";
    }elseif($first_num_left =="3" and $second_num_left !="13"){
     echo "На учёбе $studentsCount студента";
    }elseif($first_num_left =="4" and $second_num_left !="14"){
     echo "На учёбе $studentsCount студента";
    }else{ 
     echo "На учёбе $studentsCount студентов";
 }



?>
</pre>