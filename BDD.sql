
create table estado(
id int primary key auto_increment,
nombre varchar (100),
descripcion varchar (100)
);
create table materiales(
id int primary key auto_increment,
nombre varchar (100),
descripcion varchar (100),
id_estado int,
cantidad varchar (100),
foreign key (id_estado) references estado (id)
);
create table insumos(
id int primary key auto_increment,
nombre varchar (100),
descripcion varchar (100),
cantidad varchar (100)
);
create table salas(
id int primary key auto_increment,
nombre varchar (100),
descripcion varchar (100)
);
create table cirugias(
id int primary key auto_increment,
id_doctor int,
id_paciente int,
id_sala int,
fechaIngreso datetime,
fechaSalida datetime,
foreign key (id_doctor) references users (id),
foreign key (id_paciente) references users (id),
foreign key (id_sala) references salas (id)
);
create table rol_personal(
id int primary key auto_increment,
nombre varchar(100),
descripcion varchar(100)
);
create table personal(
id int primary key auto_increment,
nombre varchar(100),
apellidoP varchar(100),
apellidoM varchar(100),
direccion varchar(200),
telefono int,
id_rol int,
foreign key (id_rol) references rol_personal (id)
);
create table personal_cirugia(
id int primary key auto_increment,
id_personal int,
id_cirugia int,
foreign key (id_personal) references personal (id),
foreign key (id_cirugia) references cirugias (id)
);
create table insumos_cirugia(
id int primary key auto_increment,
id_insumo int,
id_cirugia int,
foreign key (id_insumo) references insumos (id),
foreign key (id_cirugia) references cirugias (id)
);
create table materiales_cirugia(
id int primary key auto_increment,
id_material int,
id_cirugia int,
foreign key (id_material) references materiales (id),
foreign key (id_cirugia) references cirugias (id)
);
