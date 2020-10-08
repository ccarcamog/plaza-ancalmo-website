create table `user-login`
(
	id int auto_increment,
	username TINYTEXT not null,
	mail TINYTEXT not null,
	salt TINYTEXT not null,
	password LONGTEXT not null,
	constraint `user-login_pk`
		primary key (id)
)
comment 'Informacion escencial para login de usuarios';

