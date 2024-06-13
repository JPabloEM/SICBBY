<?php

const BASE_URL = "http://localhost/SICBBY";

//Zona horaria
date_default_timezone_set('America/Costa_Rica');


//Datos de conexión a Base de Datos
const DB_HOST = "localhost";
const DB_NAME = "db_cbby";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";



//Para envío de correo
	const ENVIRONMENT = 1; // Local: 0, Produccón: 1;

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "$";
	const CURRENCY = "USD";

	//Api PayPal
	//SANDBOX PAYPAL
	const URLPAYPAL = "https://api-m.sandbox.paypal.com";
	const IDCLIENTE = "";
	const SECRET = "";
	//LIVE PAYPAL
	//const URLPAYPAL = "https://api-m.paypal.com";
	//const IDCLIENTE = "";
	//const SECRET = "";

	//Datos envio de correo
	const NOMBRE_REMITENTE = "COREEDOR BIOLOGICO BOSQUES DEL YAGUARUNDI";
	const EMAIL_REMITENTE = "no-reply@CBBY.com";
	const NOMBRE_EMPESA = "CBBY";
	const WEB_EMPRESA = "bosquesyaguarundi.online";

	const DESCRIPCION = "El mejor Corredor en línea.";
	const SHAREDHASH = "CorredorVirtual";

	//Datos Empresa
	const DIRECCION = "Nicoya Guanacaste ,Costa Rica";
	const TELEMPRESA = "+(506)26262626";
	const WHATSAPP = "+(506)26262626";
	const EMAIL_EMPRESA = "info@bosquesyaguarundi.online";
	const EMAIL_PEDIDOS = "info@bosquesyaguarundi.online"; 
	const EMAIL_SUSCRIPCION = "info@bosquesyaguarundi.online";
	const EMAIL_Voluntario = "info@bosquesyaguarundi.online";
	const EMAIL_CONTACTO = "info@bosquesyaguarundi.online";


	const CAT_SLIDER = "1,2,3";
	const CAT_BANNER = "4,5,6";
	const CAT_FOOTER = "1,2,3,4,5";

	//Datos para Encriptar / Desencriptar
	const KEY = 'abelosh';
	const METHODENCRIPT = "AES-128-ECB";

	//Envío
	const COSTOENVIO = 5;

	//Módulos
	const MDASHBOARD = 1;
	const MUSUARIOS = 2;
	const MDCONTACTOS = 3;
	const MPRODUCTOS = 4;
	const MPEDIDOS = 5;
	const MActividades = 6;
	const MSUSCRIPTORES = 7;
	const MDVoluntarios = 8;
	const MDPAGINAS = 9;
	const MDOCUMENTOS = 10;
	
	const MREPORTE = 15;
	// const MDCONTACTOS = 16;
	//const MDCharlasInfo = 11;
	// const MDOCUMENTOSP = 11;


	//Páginas
	const PINICIO = 1;
	const PCorredor = 2;
	const PCARRITO = 3;
	const PNOSOTROS = 4;
	const PVoluntario = 5;
	const PPREGUNTAS = 6;
	const PTERMINOS = 7;
	const PSUCURSALES = 8;
	const PERROR = 9;
	const PTALLERV = 10;
	const PDOCUMENTACIONV = 11;
	const PHORARIOSOF = 12;
	const PCHARLAV = 13;
	const PDONACIONESV = 14;
	const PGALERIAV = 15;
	const PCONTACTOV = 16;
	const PSOBREV = 17;
	const PVOLUNTARIADO = 18;


	//Roles
	const RADMINISTRADOR = 1;
	const RSUPERVISOR = 2;
	const RCLIENTES = 3;

	const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

	//Productos por página
	const CANTPORDHOME = 8;
	const PROPORPAGINA = 4;
	const PROCATEGORIA = 4;
	const PROBUSCAR = 4;

	//REDES SOCIALES
	const FACEBOOK = "https://www.facebook.com/abelosh";
	const INSTAGRAM = "https://www.instagram.com/febel24/";
	

 ?>