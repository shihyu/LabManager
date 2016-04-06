<?php 
echo strtotime("20160310");
echo date("jS F, Y", strtotime("20160310")); 
// outputs 10th December, 2011 

echo date("jS F, Y", strtotime("11/12/10")); 
// outputs 12th November, 2010 

echo date("jS F, Y", strtotime("11-12-10")); 
// outputs 11th December, 2010  
?> 
