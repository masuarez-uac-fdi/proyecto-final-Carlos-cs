create database Inventario;
use Inventario;
CREATE TABLE IF NOT EXISTS usuarios (
  id_usuario int(11) NOT NULL auto_increment primary key,
  username varchar(250) NOT NULL,
  pass varchar(250) NOT NULL
);
insert into usuarios(username,pass)values("admin","admin");
create table if not exists productos(
id_productos int(11)Not null auto_increment primary key,
codigo varchar(250)not null,
nombre varchar(250)not null,
piezas int(11)not null
);
