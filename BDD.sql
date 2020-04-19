
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
create table cirujias(
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
