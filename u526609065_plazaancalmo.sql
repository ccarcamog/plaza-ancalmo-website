#Drop all tables. Add any new table here
#DON´T RUN THIS SECTION AFTER INSERT DATA
drop table if exists
    doc_doctores_especialidades,
    doc_doctores_redes_seguros,
    galeria_img,
    doc_especialidades,
    doc_doctores,
    doc_redes_seguros,
    locales,
    galeria
    ;

#Create table statements
create table galeria (
    galeria_key int auto_increment comment 'Valor autogenerado. Id de galería',
    galeria_nombre varchar(25) not null comment 'Nombre de la galería',
    constraint galeria_pk
		primary key (galeria_key)
);

create table galeria_img (
    galeria_img_key int auto_increment comment 'Valor autogenerado. Id de imagen de galería',
    galeria_img_nombre varchar(25) not null comment 'Nombre de la galería',
    galeria_img_url varchar(100) not null comment 'Url de imagen de galeria. Url interna del sitio Ej. /images/red.png',
    galeria_img_caption varchar(100) comment  'Caption a mostrar para imagen de galería',
    galeria_img_orden char(2) comment 'Orden a mostrar de imagen de galería',
    galeria_img_galeria_key int comment 'Id de galeria',
    index (galeria_img_galeria_key),
    constraint galeria_img_pk
		primary key (galeria_img_key),
	foreign key (galeria_img_galeria_key) references galeria(galeria_key)

);

create table doc_especialidades
(
	doc_especialidades_key int auto_increment comment 'Valor autogenerado. Id de especialidad',
	doc_especialidades_nombre varchar(100) not null comment 'Nombre de la especialidad a mostrar',
	doc_especialidades_nombre_mas varchar(100) not null comment 'Nombre de la especialidad a mostrar, cuando el género del doctor sea masculino',
	doc_especialidades_nombre_fem varchar(100) not null comment 'Nombre de la especialidad a mostrar, cuando el género del doctor sea femenino',
	constraint doc_especialidades_pk
		primary key (doc_especialidades_key)
);

create table doc_doctores
(
    doc_doctores_key int auto_increment comment 'Valor autogenerado. Id de doctor',
    doc_doctores_genero char(1) not null comment 'M para Masculino, F para Femenino',
    doc_doctor_nombre varchar(200) not null comment 'Nombre a mostrar del doctor, con apellidos. Ej. Jose Pérez',
    doc_doctor_desc varchar(750) not null comment 'Descripción y/o presentación del doctor (acerca de)',
    doc_doctor_horarios varchar(500) not null comment 'Horarios de atención del doctor en la plaza. Se construirá desde datepicker',
    doc_doctor_pagos varchar(500) comment 'Formas de pago que acepta el doctor',
    doc_doctor_exp_num int comment 'Años de experiencia de doctor',
    doc_doctor_tel_1 varchar(10) not null comment 'Número de teléfono principal de doctor',
    doc_doctor_tel_2 varchar(10) comment 'Número de teléfono secundario de doctor',
    doc_doctor_email varchar(100) comment 'Email de doctor',
    doc_doctor_fb varchar(250) comment 'Link de página de Facebook de doctor',
    doc_doctor_ig varchar(250) comment 'Link de página de Instagram de doctor',
    doc_doctor_estudios varchar(750) comment 'Listado de estudios universitarios de doctor',
    doc_doctor_postgrados varchar(750) comment 'Listado de postgrados/estudios complementarios de doctor',
    doc_doctor_especializaciones varchar(750) comment 'Listado de estudios de especializaciones de doctor',
    doc_doctor_exp varchar(850) comment 'Listado de experiencia profesional de doctor',
    doc_doctor_img varchar(100) not null comment 'Url de imagen de perfil de doctor. Url interna del sitio Ej. /images/red.png',
    doc_doctor_prioridad char(2) default 1 comment 'Prioridad de orden en lista de Todos los doctores. Mayor prioridad, mejor posicionamiento.',
    doc_doctor_galeria int not null comment 'Id de galería',
    index (doc_doctor_galeria),
    constraint doc_doctores_pk
		primary key (doc_doctores_key),
    foreign key (doc_doctor_galeria) references galeria(galeria_key)
);

create table doc_doctores_especialidades (
    doc_doctores_key int not null comment 'Id de doctor',
    doc_especialidades_key int not null comment 'Id de especialidad',
    index (doc_doctores_key),
    index (doc_especialidades_key),
    constraint doc_doctores_especialidades
		primary key (doc_doctores_key,doc_especialidades_key),
	foreign key (doc_doctores_key) references doc_doctores(doc_doctores_key),
	foreign key (doc_especialidades_key) references doc_especialidades(doc_especialidades_key)
);

create table doc_redes_seguros (
    doc_redes_seguros_key int auto_increment comment 'Valor autogenerado. Id de red de seguros médicos',
    doc_redes_seguros_nombre varchar(25) not null comment  'Nombre de red de seguros',
    doc_redes_seguros_desc varchar(500) not null comment 'Presentación de red de seguros',
    doc_redes_seguros_link varchar(100) comment 'Link a página web/redes sociales de página de red de seguros',
    doc_redes_seguros_img varchar(100) comment 'Url de logo de red de seguros. Url interna del sitio Ej. /images/red.png',
    constraint doc_redes_seguros_pk
		primary key (doc_redes_seguros_key)
);

create table doc_doctores_redes_seguros (
    doc_doctores_key int not null comment 'Id de doctor',
    doc_redes_seguros_key int not null comment 'Id de red de seguros',
    index (doc_doctores_key),
    index (doc_redes_seguros_key),
    constraint doc_doctores_redes_seguros
		primary key (doc_doctores_key,doc_redes_seguros_key),
	foreign key (doc_doctores_key) references doc_doctores(doc_doctores_key),
	foreign key (doc_redes_seguros_key) references doc_redes_seguros(doc_redes_seguros_key)

);

create table locales (
    locales_key int auto_increment comment 'Valor autogenerado. Id del local disponible',
    locales_nombre varchar(25) not null comment 'Nombre del local',
    locales_preview varchar(100) not null comment 'Información de preview de local. Breve descripción',
    locales_desc varchar(850) not null comment 'Información completa del local',
    locales_galeria_key int not null comment 'Id de galería',
    index (locales_galeria_key),
    constraint locales_pk
		primary key (locales_key),
	foreign key (locales_galeria_key) references galeria(galeria_key)
)









