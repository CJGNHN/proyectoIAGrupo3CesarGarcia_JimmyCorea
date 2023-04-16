<?php
echo 'Falta datos <br>';
$timedata=true;$selfie=true; 
if (empty($_POST['timedata'])) {$timedata=false;}
else if(empty($_POST['photo'])) {$selfie=false;} 
if($timedata){ 

	echo "Obteniendo Datos";
	echo "<br>"; 
	$DirectoryD='/var/www/proyectoia/ficheros/';
	$DirectoryC='/etc/cron.d/';


	$resultado=$_POST['combo'];
	$resultado2=$_POST['combo2'];
	$min=$_POST['emin'];
	$hr=$_POST['ehr'];
	$min2=$_POST['emin2'];
	$hr2=$_POST['ehr2'];

	$d='*';
	$m='*';
	$aa='*';
	$tab=' ';
	$usuario='www-data'; 
	$ruta='';
	$ruta2='';
	$dataGpio="";$dataGpio2="";

	echo "Condicionando Datos";
        echo "<br>";

	if($resultado==1){$dataGpio=17;}
	elseif($resultado==2){$dataGpio=21;}
	elseif($resultado==3){$dataGpio=27;}
	if($resultado2==1){$dataGpio2=17;}
	elseif($resultado2==2){$dataGpio2=21;}
	elseif($resultado2==3){$dataGpio2=27;}


	$ruta=$DirectoryD.'gpio'.$dataGpio.'on.sh';
	$ruta2=$DirectoryD.'gpio'.$dataGpio2.'off.sh';

	echo "Ejecutando Accion";
	echo "<br>";

	echo exec('sudo '.$DirectoryD.'permiso'.$dataGpio.'.sh');
	echo exec('sudo '.$DirectoryD.'permiso'.$dataGpio2.'.sh');
	echo exec('sudo '.$DirectoryD.'gpio'.$dataGpio.'on.sh');

	$pf=fopen($DirectoryC.'ontest'.$dataGpio,'w') or 
	die ('Archivo no disponible ontest'.$dataGpio);
	$pf2=fopen($DirectoryC.'offtest'.$dataGpio2,'w') or 
	die ('Archivo no disponible offtest'.$dataGpio2);

	$datos=$min.$tab.$hr.$tab.$d.$tab.$m.$tab.$aa.$tab.$usuario.$tab.$ruta;

	fwrite($pf,$datos.PHP_EOL);fclose($pf); 
	$datos2=$min2.$tab.$hr2.$tab.$d.$tab.$m.$tab.$aa.$tab.$usuario.$tab.
	$ruta2;

	fwrite($pf2,$datos2.PHP_EOL);fclose($pf2); 
	echo exec('sudo '.$DirectoryD.'nopermiso'.$dataGpio.'.sh');
	echo exec('sudo '.$DirectoryD.'nopermiso'.$dataGpio2.'.sh');
	echo exec('sudo '.$DirectoryD.'gpio'.$dataGpio2.'off.sh');

	echo "Condicionando Formato datatime <br>";
	$datotime=$hr.':'.$min.' Horas.';
	$datotime2=$hr2.':'.$min2.' Horas.';

	if($hr<10){
	  if($min<10){$datotime='0'.$hr.':0'.$min.' Horas.';}
	  else{$datotime='0'.$hr.':'.$min.' Horas.';}
	}
	else if($min<10){$datotime=$hr.':0'.$min.' Horas.';}

	if($hr2<10){
          if($min2<10){$datotime2='0'.$hr2.':0'.$min2.' Horas.';}
          else{$datotime2='0'.$hr2.':'.$min2.' Horas.';}
        }
        else if($min2<10){$datotime2=$hr2.':0'.$min2.' Horas.';}


	echo "Preparando correo <br>";
	$title='ESTATUS DE GPIO ACTUALIZADO';
	$correo='proyectoiahn@gmail.com';
	$date='$(date)';$tab='\n';$com='"';
	$msg='sudo echo -e '.$date.$com.$tab.
        'SE PROGRAMO QUE EL GPIO#'.$dataGpio. 
        ' SE ENCENDERA A LAS - '.$datotime.$tab.
        'Y SE APAGARA A LAS - '.$datotime2.$com;
	$mail=$msg.' | mail -s '.$com.$title.$com.' '.$correo;
	echo "Enviando Correo <br>";
	echo exec($mail);
	echo "Correo Enviado <br>";
	echo "Accion Terminada <br>";

}
else if($selfie){ 
	$DirectoryD='/var/www/proyectoia/ficheros/';
	
}
header("Location: /"); 
?>
