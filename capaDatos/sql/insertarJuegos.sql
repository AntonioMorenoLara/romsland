/**
 * insertarJuegos.sql
 * Inserción de datos de los juegos
 */

/** Se selecciona la base de datos a usar. */
use DescargaVideojuegos;

/** Insertamos los juegos de NDS, 3DS y PSP respectivamente. */
insert into Juego 
    values(
            'Mario y Luigi Viaje al Centro de Bowser',
            '../imgs/portadas/nds/portadaML.webp',
            'La trama del videojuego gira en torno a Mario y Luigi siendo 
inhalados al cuerpo de su archirrival veterano, Bowser. Mario ycompañía aprenden 
a asistir a Bowser durante la aventura, quien no 
nota su presencia,al tiempo que combate a Fawful, quien ha tomado 
control del Reino Champiñón.',
            'NDS',
            'https://mega.nz/file/dBcCiJCK#yhhuDeHHQXDoQCL5VZbl2InUh4YqEr4Bf1Osj478yFk',
            'juegos/nds/marioyluigi.php'
        );

insert into Juego 
    values(
            'Need for Speed Carbon Own the City',
            '../imgs/portadas/nds/portadaNFS.jpg',
            'El personaje y protagonista llamado Brian regresa a su ciudad natal, 
Palmont City, dándose cuenta de que todo ahí ha cambiado. 
Ahora los equipos se pelean por el control de las calles para 
dominar toda la ciudad. El duelo final se disputa en el Cañón 
Carbon y puede convertirse en una carrera mortal.',
            'NDS',
            'https://mega.nz/file/NE8GESiJ#mWGy0ogLQ2UdNZG3rnyjE1gcOFNdjxegHu_z8_7hIIk',
            'juegos/nds/needforspeed.php'
        );

insert into Juego 
    values(
            'Pokémon Edición Diamante',
            '../imgs/portadas/nds/portadaPD.webp',
            'Narra la aventura de un entrenador Pokémon que busca convertirse en 
el Campeón de la Liga entrenando a Pokémon. Cuenta con ocho 
gimnasios dirigidos líderes de gimnasio que recompensan a los 
vencedores con medallas de gimnasio. 
El protagonista también debe frustrar los planes del Equipo Galaxia.',
            'NDS',
            'https://mega.nz/file/5cdg0LbA#k545F9KsWNE2erZJqoNS5BBZ_ksmRJ8az2hh6ixdqWI',
            'juegos/nds/pokemondiamante.php'
        );

insert into Juego 
    values(
            'Profesor Layton y la Caja de Pandora',
            '../imgs/portadas/nds/portadaPL.webp',
            'En este capítulo el profesor y Luke recorren el país en tren, 
tratando de resolver el misterio que envuelve al extraño objeto conocido como la 
caja de Pandora, de la que se dice que matará a todo aquel que ose abrirla.',
            'NDS',
            'https://mega.nz/file/oYkWSKhQ#wbFummVfIJxPURmI8DfJrue5GFBs9CP8txkU3tLVhso',
            'juegos/nds/profesorlayton.php'
        );


insert into Juego 
    values(
            'The Legend of Zelda Spirit Tracks',
            '../imgs/portadas/nds/portadaTLoZ.webp',
            'Link y la princesa Zelda deben recuperar la Torre de los Dioses y 
restaurar las vías del ferrocarril para detener al malvado Cole, quien ha robado 
los cuerpos de los sabios para resucitar a su maestro malvado. Juntos, viajan 
por el reino para reunir los poderes necesarios para salvar Hyrule.',
            'NDS',
            'https://mega.nz/file/FJt1iapC#WA_r-YGDZsynEiPbd9zR2cCkZ-dmeEOWTZw-Zf8XajE',
            'juegos/nds/thelegendofzelda.php'
        );

insert into Juego 
    values(
            'Animal Crossing New Leaf',
            '../imgs/portadas/3ds/portadaAC.jpg',
            'La historia comienza cuando el jugador va en tren camino a un 
pueblo. Entonces, este se encontrará con Fran, un gato que le hará varias 
preguntas. Cuando se llega al pueblo, algunos vecinos y la secretaria del 
Ayuntamiento le dirán al jugador que es el alcalde del pueblo.',
            '3DS',
            'https://mega.nz/file/1dkgwToA#V-__lKAPh76JXh-XMxlsaDQW_vJA0KsSzhwzkELtpM8',
            'juegos/3ds/animalcrossing.php'
        );

insert into Juego 
    values(
            'Bravely Default',
            '../imgs/portadas/3ds/portadaBD.jpg',
            'Cuatro guerreros luchan contra el malvado Oscuro para salvar el 
mundo de Luxendarc y despertar a los cristales que lo mantienen en equilibrio. 
El juego presenta un sistema de combate por turnos y elementos de magia y 
tecnología.',
            '3DS',
            'https://mega.nz/file/IVMxRaID#WY0ylSqR1TWJKFckFKzUlxfhwDZDOwtTfUi_NF-mSDw',
            'juegos/3ds/bravelydefault.php'
        );

insert into Juego 
    values(
            'Luigi´s Mansion 2',
            '../imgs/portadas/3ds/portadaLM.jpg',
            'Luigi es enviando por el Profesor Fesor a través de su método de 
teletransportación, el Transpixelador, para así poder explorar diferentes 
mansiones embrujadas y la captura de los distintos tipos de fantasmas con 
la Succionaentes 5000.',
            '3DS',
            'https://mega.nz/file/8Fk2xQiY#FpaX5NQ6Z8XfzWWS0-QJnc7Y2Ze7TgULDVZURV132L0',
            'juegos/3ds/luigismansion2.php'
        );

insert into Juego 
    values(
            'New Super Mario Bros 2',
            '../imgs/portadas/3ds/portadaNSMB2.jpg',
            'Justo en el momento en el que Mario y Luigi deciden emprender el 
vuelo y buscar monedas por los cielos, su amada Princesa Peach, es nuevamente 
secuestrada por los malvados Koopalines.',
            '3DS',
            'https://mega.nz/file/UI12QArI#DyU8YUfe7qlmDHFu7uW8rzTOtr50evUTO6K4VorI560',
            'juegos/3ds/newsupermariobros.php'
        );

insert into Juego 
    values(
            'Phoenix Wright Ace Attorney Dual Destinies',
            '../imgs/portadas/3ds/portadaPW.webp',
            'El juego toma lugar un año después del juego Apollo Justice, en el 
cual tomaron lugar los acontecimientos que limpiaron el nombre de Wright de las 
circunstancias detrás de su exclusión y se le permitió volver a la abogacía. 
Estará acompañado de una abogada defensora novata y psicóloga Athena Cykes.',
            '3DS',
            'https://mega.nz/file/JItEhbZZ#3eRmNzWXLTO4LM_osCjKd43NisguOdQT3Lkng9IZLoc',
            'juegos/3ds/phoenixwright.php'
        );

insert into Juego 
    values(
            'Crisis Core Final Fantasy VII',
            '../imgs/portadas/psp/portadaFF7CC.jpg',
            'Crisis Core: Final Fantasy VII es una precuela que sigue la 
historia de Zack, SOLDADO de Shinra, quien descubre secretos oscuros detrás de 
la empresa mientras se hace amigo de Cloud Strife. La trama explora temas como 
la amistad, la lealtad y el sacrificio en un mundo lleno de conflictos.',
            'PSP',
            'https://mega.nz/file/0J01CAhI#sOnCPoBQZksCSNc28IX67t8OVqMEYzrUBceqgNT4IG0',
            'juegos/psp/finalfantasy.php'
        );

insert into Juego 
    values(
            'God Of War Ghost of Sparta',
            '../imgs/portadas/psp/portadaGOW.jpg',
            'Kratos busca a su hermano Deimos en el Inframundo para liberarlo 
del Dios de la Muerte. En su camino se enfrenta a dioses y criaturas mitológicas 
mientras descubre la verdad sobre su pasado y su familia.',
            'PSP',
            'https://mega.nz/file/dQ83XBAb#YfZLWtyflcb3tBfk-FxCXS_XEp5iOxM5lHdMuAOjZKg',
            'juegos/psp/godofwar.php'
        );

insert into Juego 
    values(
            'Kingdom Hearts Birth By Sleep',
            '../imgs/portadas/psp/portadaKH.webp',
            'El juego es una precuela de Kingdom Hearts, ya que sus hechos 
ocurren 10 años antes, añadiendo hechos y explicaciones nunca proporcionadas 
anteriormente en la serie. El juego se centra en la vida de tres personajes: 
Terra, Aqua y Ventus en su búsqueda del maestro perdido Xehanort.',
            'PSP',
            'https://mega.nz/file/NBtmlKJC#lkuL-G1iPFndUuPO4csvl9IaeJkUWXZwTxFIU9QbnOc',
            'juegos/psp/kingdomhearts.php'
        );

insert into Juego 
    values(
            'Silent Hill Origins',
            '../imgs/portadas/psp/portadaSH.jpg',
            'Silent Hill es un videojuego de terror en el que el protagonista, 
Harry Mason, busca a su hija Cheryl en el misterioso pueblo de Silent Hill. 
Descubre que el pueblo está habitado por monstruos y se enfrenta a peligros 
sobrenaturales mientras desentraña la verdad detrás de su hija y el pueblo.',
            'PSP',
            'https://mega.nz/file/MRVwjA6T#lI0nMk2JsU3nxWSaZclpf3zKV4XUX5WVy9Ac2io0pk4',
            'juegos/psp/silenthill.php'
        );

insert into Juego 
    values(
            'The Simpsons Game',
            '../imgs/portadas/psp/portadaTS.webp',
            'En The Simpsons Game, la familia Simpson está atrapada en un 
videojuego y debe usar sus habilidades únicas para avanzar. Con parodias de 
juegos populares y referencias a la cultura pop, es divertido y satisfactorio 
para fanáticos y jugadores casuales.',
            'PSP',
            'https://mega.nz/file/UYcWHJhC#ifhuWNI4f75QQzeM4yadiMwllX98UVs5r6r2a9lrKRQ',
            'juegos/psp/thesimpsons.php'
        );