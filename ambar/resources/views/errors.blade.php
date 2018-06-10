<?php 
use App\Empresa;

//echo "inicio";

function devolverEx() 
{
    throw new Exception("Value must be 1 or below");
}

try 
{
    //echo "HEEEEEEEEEEEEY";
    devolverEx();
            
    //die("no se ejecuta");
}
catch(Exception $e) {
  echo $e->getMessage();
}


// $empresas = App\Empresa::all();
// echo $empresas;

// function isOdd($num) 
// {
// 	if($num % 2 == 0)
// 		throw new Exception("{$num} Not an odd number");
// 		return $num;
// }
// echo isOdd(4);
 ?>
