/**
 * crearBBDD.sql
 * Creación de base de datos DescargaVideojuegos y usuario AntonioProyecto.
 */

/** Elimina la base de datos en el caso de que exista. */
drop database if exists DescargaVideojuegos;

/** Crea la base de datos. */
create database DescargaVideojuegos;

/** Crea el usuario para acceder a la base de datos. */
grant select, insert, update, delete on DescargaVideojuegos.*
to 'AntonioProyecto'@'localhost' identified by 'proyectofinal1234';

