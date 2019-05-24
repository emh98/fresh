<?php

//------------------------------CONFIGURA LA URL----------------------------

//Define la URL donde esta montada la aplicación web.
define('URL','http://localhost/freshAlpha/');

//Define la url de los web services.


//----------------------------CONFIGURACIÓN DE LA BASE DE DATOS------------------------------

//HOST - define la ip donde esta montado la base de datos.
define('HOST','127.0.0.1');

//DB - define el nombre de la base de datos a usar.
define('DB','fresh');

//USER -  define el nombre de usuario de la base de datos.
define('USER','root');

//PASSWORD - define la contraseña de la base de datos.
define('PASSWORD','');

//--------------------------CONFIGURACIÓN DE LAS CONSULTAS A LA BASE DE DATOS--------------------------------

//eliminarCliente - Consulta que permite eliminar un usuario con el numero de cedula o codigo de identificación.
define('eliminarCliente','DELETE FROM cliente WHERE cod_cliente = :id');

//actualizarCliente - Consulta que permite actualizar un usuario con el numero de cedula o codigo de identificación.
define('actualizarCliente','UPDATE cliente SET nom_cliente = :nombre WHERE cod_cliente = :cedula');

//registrarCliente - Consulta que permite registrar un usuario.
define('registrarCliente','INSERT INTO cliente (cod_cliente,nom_cliente) VALUES (:cedula,:nombre)');

//eliminarDetalle - Consulta que permite eliminar un detalle de la factura con el numero de identificación.
define('eliminarDetalle','DELETE FROM detalle WHERE cod_factura = :id');

//actualizarDetalle - Consulta que permite actualizar un detalle de la factura con el numero de identificación.
define('actualizarDetalle','UPDATE detalle SET  can_detalle = :cantidad, cod_factura = :codF, cod_prenda = :codP, cod_servicio = :codS WHERE cod_detalle = :codD');

//registrarDetalle1 - Consulta que permite registrar el detalle de la factura.
define('registrarDetalle1','INSERT INTO detalle (cod_factura,cod_servicio,cod_prenda,can_detalle) VALUES (:codF,:codS,:codP,:cantidad)');

//registrarDetalle2 - Consulta que permite actualizar el valor de la factura cuando se inserta el nuevo detalle. 
//!Se puede omitir si se utiliza un trigger para insertar automaticamente el nuevo valor de la factura!.
define('registrarDetalle2','UPDATE factura set val_factura = (SELECT SUM(val_servicio*can_detalle) FROM  servicio, detalle, prenda where servicio.cod_servicio = detalle.cod_servicio and detalle.cod_factura = factura.cod_factura and prenda.cod_prenda = detalle.cod_prenda) where factura.cod_factura = :codF');

//eliminarFactura - Consulta que permite eliminar una factura con el numero de identificación.
define('eliminarFactura','DELETE FROM factura WHERE cod_factura = :id');

//actualizarFactura - Consulta que permite actualizar una factura con el numero de identificación.
define('actualizarFactura','UPDATE factura SET cod_cliente = :cedula, nom_cliente = :nombre WHERE cod_factura = :codF');

//registarFactura - Consulta que permite registrar una factura.
define('registrarFactura','INSERT INTO factura (cod_factura,cod_cliente,fecha, val_factura) VALUES (:codF,:cedula,:fecha,0)');

//eliminarPrenda - Consulta que permite eliminar una prenda con el numero de identificación.
define('eliminarPrenda','DELETE FROM prenda WHERE cod_prenda = :id');

//actualizarPrenda - Consulta que permite actualizar una prenda con el numero de identificación.
define('actualizarPrenda','UPDATE prenda SET nom_prenda = :nomP WHERE cod_prenda = :codP');

//registrarPrenda - Consulta que permite registrar una prenda.
define('registrarPrenda','INSERT INTO prenda (nom_prenda) VALUES (:nombre)');

//eliminarServicio - Consulta que permite eliminar un servicio con el numero de identificación.
define('eliminarServicio','DELETE FROM servicio WHERE cod_servicio = :id');

//actualizarServicio - Consulta que permite actualizar un servicio con el numero de identificación.
define('actualizarServicio','UPDATE servicio SET nom_servicio = :nomS WHERE cod_servicio = :codS');

//registrarServicio - Consulta que permite registar un servicio.
define('registrarServicio','INSERT INTO servicio (nom_servicio) VALUES (:nombre)');

//obtenerCliente - Consulta que permite obtener un cliente con el numero de identificación.
define('obtenerCliente','SELECT * FROM cliente WHERE cod_cliente = :cedula');

//obtenerFactura - Consulta que permite obtener una factura con el numero de identificación.
define('obtenerFactura','SELECT * FROM factura WHERE cod_factura = :codF');

//obtenerDetalle - Consulta que permite obtener un detalle con el numero de identificación.
define('obtenerDetalle','SELECT * FROM detalle WHERE cod_detalle = :codD');

//obtenerPrenda - Consulta que permite obtener una prenda con el numero de identificación.
define('obtenerPrenda','SELECT * FROM prenda WHERE cod_prenda = :codP');

//obtenerServicio - Consulta que permite obtener un servicio con el numero de identificación.
define('obtenerServicio','SELECT * FROM sevicio WHERE cod_servicio = :codS');

//listarCliente - Consulta que permite obtener una lista de todos los cliente.
define('listarCliente','SELECT * FROM cliente');

//listarFactura - Consulta que permite obtener una lista de todas las facturas.
define('listarFactura','SELECT cod_factura, nom_cliente, fecha, val_factura FROM factura, cliente WHERE factura.cod_cliente = cliente.cod_cliente');

//listarServicio - Consulta que permite obtener una lista de todos los servicios.
define('listarServicio','SELECT cod_servicio, nom_servicio FROM servicio');

//listarPrenda - Consulta que permite obtener una lista de todas las prendas.
define('listarPrenda','SELECT * FROM prenda');

//----------------------------CONFIGURACIÓN DE LOS SERVICIOS WEB------------------------------

define('servicioSuma','http://localhost:8080/ejemplo/services/OPeration');
define('agregaServicio','http://localhost:8080/webserverAgregar/services/ListaServicio');



