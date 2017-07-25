drop table if exists usuarios cascade;

create table usuarios (
  id                     bigserial          constraint pk_usuarios primary key,
  nombre            varchar(255)   not null constraint uq_usuario_unico unique,
  password         varchar(60)     not null,
  email               varchar(255),
  tipo                  char(1)            not null default 'U'
                                                 constraint ck_tipo_usuario check (tipo in ('U', 'A')),
   zona_horaria   varchar(255)  default 'Europe/Madrid',
   token_val        varchar(32)    constraint uq_usuarios_token_val unique
);
insert into usuarios (nombre, password, tipo)
    values ('admin', '$2y$13$3t.QgESLRu98NTHv2GSTfefE6rdPssSGq0eKofwl4f3QNIC.V4Bmq', 'A');
