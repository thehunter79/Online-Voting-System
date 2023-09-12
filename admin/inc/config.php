<?php 
  /*->database ke saath connection krna hota hai to ek line ka cade hota hai $db use krte hai yaah fir  $conn use krte hai..
  //-> connect hojaiye to db ke andr aajaiye  agr any reason connect nhi ho paya to 
  //-> excute band ho jaiye to die error hume baataye 
  //->db kr andr 4 cheze paas krni hoti hai.
  //-> 1.localhost, 2.root,3. password khaali hota hai,  4.or database ka name */

    $db = mysqli_connect("localhost", "root", "", "onlinevotingsystem") or die("Connectivity Failed");

?>