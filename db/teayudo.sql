drop table if exists usuarios cascade;

create table usuarios (
  id         bigserial   constraint pk_usuarios primary key,
  nombre     varchar(20) not null constraint uq_usuario_unico unique,
  password   char(32)    not null
);

insert into usuarios (nombre, password)
    values ('admin', md5('admin'));
