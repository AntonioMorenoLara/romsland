/**
 * crearTablas.sql
 * Creación de las tablas de la base de datos
 */

/** Se selecciona la base de datos a usar. */
use DescargaVideojuegos;

/** Creación de las tablas. */
create table Usuario(
    
    email varchar(50) primary key,
    password varchar(20) not null,
    nombreUsuario varchar(50)
);

create table Juego(
    titulo varchar(50) primary key,
    portada varchar(50) not null,
    descripcion varchar(500) not null,
    categoria char(3) not null,
    rutaNube varchar(100) not null,
    moduloJuego varchar(35) not null
);

create table JuegosUsuario (
    email varchar(20) not null,
    titulo varchar(50) not null,
    foreign key (email) references Usuario(email)
      on update cascade
      on delete restrict,
    foreign key (titulo) references Juego(titulo)
      on update cascade
      on delete restrict
);


create table ImagenesJuego(
    titulo varchar(50) not null,
    imagen varchar(50) not null,
    foreign key (titulo) references Juego(titulo)
      on update cascade
      on delete restrict
    
);