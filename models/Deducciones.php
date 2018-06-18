<?php
require_once "conexion.php";

class Deduccion extends Conexion{

		#Metodo
		public function IMSS($Sueldo,$TiempoExtra){
			
			$stmt = Conexion::conectar()->prepare("SELECT valor 
												FROM catalogoclaseimss WHERE Activo=1");
			$stmt->bindParam(":curp", $curp, PDO::PARAM_STR);											
			$stmt->execute();
			$clase=$stmt->fetch();
			$SBC=0;
			$Deduccion=0;

			$SBC=$Sueldo+$TiempoExtra;

			$Deduccion=$SBC*$clase["valor"]/100;
			return $Deduccion;
			$stmt=null;
			}
		public  function ISR($Sueldo,$TipoPago){
		#M-Mensual
		#Q-Quincenal
		#S-Semanal

#SEMANAL ISR
		#Límite inferior		Límite superior	Cuota fija	% sobre excedente de límite inferior
		#0.01				133.21		0.00		1.92
		#133.22				1,130.64	2.59		6.40
		#1,130.65			1,987.02	66.36		10.88
		#1,987.03			2,309.79	159.53		16.00
		#2,309.80			2,765.42	211.19		17.92
		#2,765.43			5,577.53	292.88		21.36
		#5,577.54			8,790.95	893.55		23.52
		#8,790.96			16,783.34	1,649.34	30.00
		#16,783.35			22,377.74	4,047.05	32.00
		#22,377.75			67,133.22	5,837.23	34.00
		#67,133.23	En adelante	21,054.11	35.00

#		Tabla del subsidio para el empleo aplicable a la tarifa del numeral 2 del rubro B
#		Para ingresos de	Hasta ingresos de	Cantidad de subsidio para el empleo semanal
#		0.01	407.33	93.73
#		407.34	610.96	93.66
#		610.97	799.68	93.66
#		799.69	814.66	90.44
#		814.67	1,023.75	88.06
#		1,023.76	1,086.19	81.55
#		1,086.20	1,228.57	74.83
#		1,228.58	1,433.32	67.83
#		1,433.33	1,638.07	58.38
#		1,638.08	1,699.88	50.12
#		1,699.89	En adelante	0.00

/**
* 
*/
#FORMULA
		#SE RECIBE EL SUELDO DEL EMPLEADO
		#SE VALORA EN QUE RANGO ENTRA EL SUELDO DEL EMPLEADO
		#SE SACA LA BASE DE LA FORMULA QUE ES IGUAL AL SUELDO MENOS EL LIMITE INFERIOR (VALOR DEL RANGO MAS BAJO) BASE=SUELDO-LI
		#A SE SACA EL PORCENTAJE DE LA BASE, ESTO ES (%PORCENTAJE EXCEDENTE/100) Y SE MULTIPLICA POR LA BASE, ESTO DA UN RESULTADO. BASE-TASA O BASE CON LA TASA DE PORCENTAJE.
		#SE SACA EL PREVIO DEL ISR EL CUAL ES EL RESULTADO ANTERIOR + LA CUOTA FIJA.
		#SE HACE UNA VALIDACION DEL SUELDO EN QUE RANGO ENTRA Y EN BASE AL RANGO SE LA APLICA UN SUBCIDIO QUE LE DESCUENTA AL PREVIO ISR, DEPENDIENDO EL RANGO ES LA CANTIDAD QUE SE SUBCIDIA.

#EN CASO DE SALIR NEGATIVO EL ISR DESPUES DE APLICAR EL SUBCIDIO SE LE SUMA AL SUELDO 
#(ES SALDO A FAVOR)
		switch ($TipoPago) {
			case 'S':
				if($Sueldo>=0.01&$Sueldo<=133.21)
				{
					#Cuota Fija 0.00  /  %1.92
					$Base=$Sueldo-0.01; #BASE = SUELDO - LIMITE INFERIOR
					$Resultado=$Base*(1.92/100); # RESULTADO = BASE X EL PORCENTAJE
					$PrevioISR=$Resultado+0.00; # PREVIO ISR = RESULTADO + CUOTA FIJA
					#Subsidio ingreso 0.01 A 407.33 =93.73 
					#EN ESTE CASO EL MISMO RANGO ENTRA AL RANDO DE LA PRIMERA CLASIFICACION DEL SUELDO.
					$ISR=$PrevioISR-93.73; #Previo-Subsidio
					return $ISR;



				}
				else if($Sueldo>=133.22&$Sueldo<=1130.64)
				{
					#Cuota Fija 2.59  /  %6.40
					$Base=$Sueldo-133.22;
				
					$Resultado=$Base*(6.40/100);
					
					$PrevioISR=$Resultado+2.59;

					#COMO EN ESTE RANGO DEL PREVIO ISR ENTRAN VARIOS RANGOS DE SUBCIDIO, SE HACE UNA VALIDACION ADICION PARA APLICAR LA CANTIDAD QUE SE SUBCIDIA AL ISR, EN CASO DE SALIR NEGATIVO SE LE SUMA AL SUELDO (ES SALDO A FAVOR)
					
					if($Sueldo>=0.01&$Sueldo<=407.33)
					{
					#Subsidio ingreso 0.01-407.33 =93.73
					$ISR=$PrevioISR-93.73; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=407.34&$Sueldo<=610.96)
					{
					#Subsidio ingreso 407.34-610.96 =93.66
					$ISR=$PrevioISR-93.66; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=610.97&$Sueldo<=799.68)
					{
					#Subsidio ingreso 610.97-799.68 =93.66
					$ISR=$PrevioISR-93.66; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=799.69&$Sueldo<=814.68)
					{
					#Subsidio ingreso 799.69-814.66 =90.44
					$ISR=$PrevioISR-90.44; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=814.67&$Sueldo<=1023.75)
					{
					#Subsidio ingreso 814.67-1023.75 =88.06
					$ISR=$PrevioISR-88.06; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1023.76&$Sueldo<=1086.19)
					{
					#Subsidio ingreso 1023.76-1086.19 =81.55
					$ISR=$PrevioISR-81.55; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1086.20&$Sueldo<=1228.57)
					{
					#Subsidio ingreso 1086.20-1228.57 =74.83
					$ISR=$PrevioISR-74.83; #Previo-Subsidio
					return $ISR;
					}
					else
					{
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
					}


#CREATED BY ERIKKU KUN

				}
				else if($Sueldo>=1130.65&$Sueldo<=1987.02)
				{
					#Cuota Fija 66.36  /  %10.88
					$Base=$Sueldo-1130.65;
					$Resultado=$Base*(10.88/100);
					$PrevioISR=$Resultado+66.36;

					if($Sueldo>=1086.20&$Sueldo<=1228.57)
					{
					#Subsidio ingreso 1086.20-1228.57 =74.83
					$ISR=$PrevioISR-74.83; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1228.58&$Sueldo<=1433.32)
					{
					#Subsidio ingreso 1228.58-1433.32 =67.83
					$ISR=$PrevioISR-67.83; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1433.33&$Sueldo<=1638.07)
					{
					#Subsidio ingreso 1433.33-1638.07 =58.38
					$ISR=$PrevioISR-58.38; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1638.08&$Sueldo<=1699.88)
					{
					#Subsidio ingreso 1638.08-1699.88 =50.12
					$ISR=$PrevioISR-50.12; #Previo-Subsidio
					return $ISR;
					}
					else
					{
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
					}

				}
				else if($Sueldo>=1987.03&$Sueldo<=2309.79)
				{
					#Cuota Fija 159.53  /  %16.00
					$Base=$Sueldo-1987.03;
					
					$Resultado=$Base*(16.00/100);
				
					$PrevioISR=$Resultado+159.53;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=2309.80&$Sueldo<=2765.42)
				{
					#Cuota Fija 211.19  /  %17.92
					$Base=$Sueldo-2309.80;
				
					$Resultado=$Base*(17.92/100);
					
					$PrevioISR=$Resultado+211.19;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=2765.43&$Sueldo<=5577.53)
				{
					#Cuota Fija 292.88  /  %21.36
					$Base=$Sueldo-2765.43;
					echo "Base: $Base <br>";
					$Resultado=$Base*(21.36/100);
					echo "Base-Tasa: $Resultado <br>";
					$PrevioISR=$Resultado+298.88;
					echo "sueldo6: $PrevioISR <br>";
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=5577.54&$Sueldo<=8790.95)
				{
					#Cuota Fija 893.35  /  %23.52
					$Base=$Sueldo-5577.54;
					
					$Resultado=$Base*(23.52/100);
					
					$PrevioISR=$Resultado+893.35;
				
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=8790.96&$Sueldo<=16783.34)
				{
					#Cuota Fija 1649.34 /  %30
					$Base=$Sueldo-8790.96;
					
					$Resultado=$Base*(30/100);
					
					$PrevioISR=$Resultado+1649.34;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=16783.35&$Sueldo<=22377.74)
				{
					#Cuota Fija 4047.05 /  %32
					$Base=$Sueldo-16783.35;
					
					$Resultado=$Base*(32/100);
				
					$PrevioISR=$Resultado+4047.05;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=22377.75&$Sueldo<=67133.22)
				{
					#Cuota Fija 5837.23 /  %34
					$Base=$Sueldo-22377.75;
					
					$Resultado=$Base*(34/100);
					
					$PrevioISR=$Resultado+5837.23;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=67133.23)
				{
					#Cuota Fija 21054.11 /  %35
					$Base=$Sueldo-67133.23;
					
					$Resultado=$Base*(35/100);
					
					$PrevioISR=$Resultado+21054.11;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				break;


#TABLAS QUINCENALES

#		Tablas ISR 2018 Quincenales
#		Límite inferior	Límite superior	Cuota fija	% sobre excedente de límite inferior
#		0.01			285.45			0.00			1.92
#		285.46			2,422.80		5.55			6.40
#		2,422.81		4,257.90		142.20			10.88
#		4,257.91		4,949.55		341.85			16.00
#		4,949.56		5,925.90		452.55			17.92
#		5,925.91		11,951.85		627.60			21.36
#		11,951.86		18,837.75		1,914.75		23.52
#		18,837.76		35,964.30		3,534.30		30.00
#		35,964.31		47,952.30		8,672.25		32.00
#		47,952.31		143,856.90		12,508.35		34.00
#		143,856.91		En adelante		45,115.95		35.00

#		Tabla del subsidio para el empleo aplicable a la tarifa del numeral 4 del rubro B
#		Para ingresos de	Hasta ingresos de	Cantidad de subsidio para el empleo quincenal
#		0.01			872.85					200.85
#		872.86			1,309.20				200.70
#		1,309.21		1,713.60				200.70
#		1,713.61		1,745.70				193.80
#		1,745.71		2,193.75				188.70
#		2,193.76		2,327.55				174.75
#		2,327.56		2,632.65				160.35
#		2,632.66		3,071.40				145.35
#		3,071.41		3,510.15				125.10
#		3,510.16		3,642.60				107.40
#		3,642.61		En adelante				0.00



			case 'Q':
				if($Sueldo>=0.01&$Sueldo<=285.45)
				{
					#Cuota Fija 0.00  /  %1.92
					$Base=$Sueldo-0.01;
					
					$Resultado=$Base*(1.92/100);
					
					$PrevioISR=$Resultado+0.00;
					
					#Subsidio ingreso 0.01-872.85 =200.85
					$ISR=$PrevioISR-200.85; #Previo-Subsidio
					return $ISR;


				}
				else if($Sueldo>=285.46&$Sueldo<=2422.80)
				{
					#Cuota Fija 5.55  /  %6.40
					$Base=$Sueldo-285.46;
					
					$Resultado=$Base*(6.40/100);
					
					$PrevioISR=$Resultado+5.55;
					return $ISR;
					
					if($Sueldo>=0.01&$Sueldo<=872.85)
					{
					#Subsidio ingreso 0.01-872.85 =200.85
					$ISR=$PrevioISR-200.85; #Previo-Subsidio
					return $ISR;
				
					}
					else if($Sueldo>=872.86&$Sueldo<=1309.20)
					{
					#Subsidio ingreso 872.86-1309.20 =200.70
					$ISR=$PrevioISR-200.70; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1309.21&$Sueldo<=1713.60)
					{
					#Subsidio ingreso 1309.21-1713.60 =200.70
					$ISR=$PrevioISR-200.70; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1713.61&$Sueldo<=1745.70)
					{
					#Subsidio ingreso 1713.61-1745.40 =193.80
					$ISR=$PrevioISR-193.80; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1745.71&$Sueldo<=2193.75)
					{
					#Subsidio ingreso 1745.71-2193.75 =188.70
					$ISR=$PrevioISR-188.70; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=2193.76&$Sueldo<=2327.55)
					{
					#Subsidio ingreso 2193.76-2327.55 =174.75
					$ISR=$PrevioISR-174.75; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=2327.56&$Sueldo<=2632.65)
					{
					#Subsidio ingreso 2327.56-2632.65 =160.35
					$ISR=$PrevioISR-160.35; #Previo-Subsidio
					return $ISR;
					}
					else
					{
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
					}


				}
				else if($Sueldo>=2422.81&$Sueldo<=4257.90)
				{
					#Cuota Fija 142.20  /  %10.88
					$Base=$Sueldo-2422.81;
					
					$Resultado=$Base*(10.88/100);
					
					$PrevioISR=$Resultado+142.20;
					

					if($Sueldo>=2327.56&$Sueldo<=2632.65)
					{
					#Subsidio ingreso 2327.56-2632.65 =160.35
					$ISR=$PrevioISR-160.35; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=2632.56&$Sueldo<=3071.40)
					{
					#Subsidio ingreso 2632.66-3071.40 =145.35
					$ISR=$PrevioISR-145.35; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=3071.41&$Sueldo<=3510.15)
					{
					#Subsidio ingreso 3071.41-3510.15 =125.10
					$ISR=$PrevioISR-125.10; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=3510.16&$Sueldo<=3642.60)
					{
					#Subsidio ingreso 3510.16-3642.60 =107.40
					$ISR=$PrevioISR-107.40; #Previo-Subsidio
					return $ISR;
					}
					else
					{
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
					}

				}
				else if($Sueldo>=4257.91&$Sueldo<=4949.55)
				{
					#Cuota Fija 341.85 /  %16.00
					$Base=$Sueldo-4257.91;
					return $ISR;
					$Resultado=$Base*(16.00/100);
					return $ISR;
					$PrevioISR=$Resultado+341.85;
					return $ISR;
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=4949.56&$Sueldo<=5925.90)
				{
					#Cuota Fija 452.55  /  %17.92
					$Base=$Sueldo-4949.56;
					
					$Resultado=$Base*(17.92/100);
					
					$PrevioISR=$Resultado+452.55;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=5925.91&$Sueldo<=11951.85)
				{
					#Cuota Fija 627.60  /  %21.36
					$Base=$Sueldo-5925.91;
					
					$Resultado=$Base*(21.36/100);
					
					$PrevioISR=$Resultado+627.60;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=11951.86&$Sueldo<=18837.75)
				{
					#Cuota Fija 1914.75  /  %23.52
					$Base=$Sueldo-11951.86;
					
					$Resultado=$Base*(23.52/100);
					
					$PrevioISR=$Resultado+1914.75;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=18837.76&$Sueldo<=35964.30)
				{
					#Cuota Fija 3534.30/  %30
					$Base=$Sueldo-18837.76;
					
					$Resultado=$Base*(30/100);
					
					$PrevioISR=$Resultado+3534.30;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=35964.31&$Sueldo<=47952.30)
				{
					#Cuota Fija 8672.25 /  %32
					$Base=$Sueldo-35964.31;
					
					$Resultado=$Base*(32/100);
					
					$PrevioISR=$Resultado+8672.25;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=47957.31&$Sueldo<=143856.90)
				{
					#Cuota Fija 12508.35/  %34
					$Base=$Sueldo-47952.31;
					
					$Resultado=$Base*(34/100);
					
					$PrevioISR=$Resultado+12508.35;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=143856.91)
				{
					#Cuota Fija 45115.95 /  %35
					$Base=$Sueldo-143856.91;
					
					$Resultado=$Base*(35/100);
					
					$PrevioISR=$Resultado+45115.95;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}

				break;

#TABLAS MENSUAL

#		Límite inferior	Límite superior	Cuota fija	% sobre excedente de límite inferior
#		0.01		578.52			0.00		1.92
#		578.53		4,910.18		11.11		6.40
#		4,910.19	8,629.20		288.33		10.88
#		8,629.21	10,031.07		692.96		16.00
#		10,031.08	12,009.94		917.26		17.92
#		12,009.95	24,222.31		1,271.87	21.36
#		24,222.32	38,177.69		3,880.44	23.52
#		38,177.70	72,887.50		7,162.74	30.00
#		72,887.51	97,183.33		17,575.69	32.00
#		97,183.34	291,550.00		25,350.35	34.00
#		291,550.01	En adelante		91,435.02	35.00


#		Tabla del subsidio para el empleo aplicable a la tarifa del numeral 5 del rubro B
#		Para ingresos de	Hasta ingresos de	Cantidad de subsidio para el empleo mensual
#		0.01				1,768.96					407.02
#		1,768.97			2,653.38					406.83
#		2,653.39			3,472.84					406.62
#		3,472.85			3,537.87					392.77
#		3,537.88			4,446.15					382.46
#		4,446.16			4,717.18					354.23
#		4,717.19			5,335.42					324.87
#		5,335.43			6,224.67					294.63
#		6,224.68			7,113.90					253.54
#		7,113.91			7,382.33					217.61
#		7,382.34			En adelante					0.00


			case 'M':
				if($Sueldo>=0.01&$Sueldo<=578.52)
				{
					#Cuota Fija 0.00  /  %1.92
					$Base=$Sueldo-0.01;
					
					$Resultado=$Base*(1.92/100);
					
					$PrevioISR=$Resultado+0.00;
					
					#Subsidio ingreso 0.01-1768.96 =407.02
					$ISR=$PrevioISR-407.02; #Previo-Subsidio
					return $ISR;


				}
				else if($Sueldo>=578.53&$Sueldo<=4910.18)
				{
					#Cuota Fija 11.11  /  %6.40
					$Base=$Sueldo-578.53;
					
					$Resultado=$Base*(6.40/100);
					
					$PrevioISR=$Resultado+11.11;
					

					
					if($Sueldo>=0.01&$Sueldo<=1768.96)
					{
					#Subsidio ingreso 0.01-1768.96 =407.02
					$ISR=$PrevioISR-407.02; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=1768.97&$Sueldo<=2653.38)
					{
					#Subsidio ingreso 1768.97-2653.38 =406.83
					$ISR=$PrevioISR-406.83; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=2653.39&$Sueldo<=3472.84)
					{
					#Subsidio ingreso 2653.39-3472.84 =406.62
					$ISR=$PrevioISR-406.62; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=3472.85&$Sueldo<=3537.87)
					{
					#Subsidio ingreso 3472.85-3537.87 =392.77
					$ISR=$PrevioISR-392.77; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=3537.88&$Sueldo<=4446.15)
					{
					#Subsidio ingreso 3537.88-4446.15 =382.46
					$ISR=$PrevioISR-382.46; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=4446.16&$Sueldo<=4717.18)
					{
					#Subsidio ingreso 4446.16-4717.18 =354.23
					$ISR=$PrevioISR-354.23; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=4717.19&$Sueldo<=5335.42)
					{
					#Subsidio ingreso 4717.19-5335.42 =324.87
					$ISR=$PrevioISR-324.87; #Previo-Subsidio
					return $ISR;
					}
					else
					{
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
					}


				}
				else if($Sueldo>=4910.19&$Sueldo<=8629.20)
				{
					#Cuota Fija 288.33 /  %10.88
					$Base=$Sueldo-4910.19;
					
					$Resultado=$Base*(10.88/100);
					
					$PrevioISR=$Resultado+288.33;
					
					if($Sueldo>=4717.19&$Sueldo<=5335.42)
					{
					#Subsidio ingreso 4717.19-5335.42 =324.87
					$ISR=$PrevioISR-324.87; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=5335.43&$Sueldo<=6224.67)
					{
					#Subsidio ingreso 5335.43-6224.67=294.63
					$ISR=$PrevioISR-294.63; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=6224.68&$Sueldo<=7113.90)
					{
					#Subsidio ingreso 6224.68-7113.90 =253.54
					$ISR=$PrevioISR-253.54; #Previo-Subsidio
					return $ISR;
					}
					else if($Sueldo>=7113.91&$Sueldo<=7382.33)
					{
					#Subsidio ingreso 7113.914-7382.33 =217.61
					$ISR=$PrevioISR-217.61; #Previo-Subsidio
					return $ISR;
					}
					else
					{
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
					}

				}
				else if($Sueldo>=8629.21&$Sueldo<=10031.07)
				{
					#Cuota Fija 692.96 /  %16.00
					$Base=$Sueldo-8629.21;
				
					$Resultado=$Base*(16.00/100);
					
					$PrevioISR=$Resultado+692.96;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=10031.08&$Sueldo<=12009.94)
				{
					#Cuota Fija 917.26  /  %17.92
					$Base=$Sueldo-10031.08;
					
					$Resultado=$Base*(17.92/100);
					
					$PrevioISR=$Resultado+917.26;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=12009.95&$Sueldo<=24222.31)
				{
					#Cuota Fija 1271.87  /  %21.36
					$Base=$Sueldo-12009.95;
					
					$Resultado=$Base*(21.36/100);
					
					$PrevioISR=$Resultado+1271.87;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=24222.32&$Sueldo<=38177.69)
				{
					#Cuota Fija 3880.44  /  %23.52
					$Base=$Sueldo-24222.32;
					
					$Resultado=$Base*(23.52/100);
					
					$PrevioISR=$Resultado+3880.44;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=38177.70&$Sueldo<=72887.50)
				{
					#Cuota Fija 7162.74/  %30
					$Base=$Sueldo-38177.70;
					
					$Resultado=$Base*(30/100);
					
					$PrevioISR=$Resultado+7162.74;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=72887.51&$Sueldo<=97183.33)
				{
					#Cuota Fija 17575.69 /  %32
					$Base=$Sueldo-72887.51;
				
					$Resultado=$Base*(32/100);
				
					$PrevioISR=$Resultado+17575.69;
				
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=97183.34&$Sueldo<=291550.00)
				{
					#Cuota Fija 25350.35/  %34
					$Base=$Sueldo-97183.34;
					
					$Resultado=$Base*(34/100);
					
					$PrevioISR=$Resultado+25350.35;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}
				else if($Sueldo>=291550.01)
				{
					#Cuota Fija 91435.02 /  %35
					$Base=$Sueldo-291550.01;
					
					$Resultado=$Base*(35/100);
					
					$PrevioISR=$Resultado+91435.02;
					
					$ISR=$PrevioISR-0.00; #Previo-Subsidio
					return $ISR;
				}

				break;

			default:
				# NULL #PASATE_AL_LADO_OBSCURO_TENEMOS_GATITOS_Y_GALLETITAS_Y_SOBRETODO_MUCHO_MUCHO_CAFE
				#PROGRAMACONFONDONEGRO
				break;
		}
	}

	
}

#Objeto
/*
$a=new Deduccion();

 $cadeda = $a -> IMSS(5000);

 echo $cadena;
*/
?>