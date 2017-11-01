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
   -- consulta_id     bigint              not null constraint fk_usuario_consultas
   --                                                references consultas (id)
   --                                                on delete no action on update cascade
);
insert into usuarios (nombre, password, tipo)
values ('admin', '$2y$13$3t.QgESLRu98NTHv2GSTfefE6rdPssSGq0eKofwl4f3QNIC.V4Bmq', 'A'),
('paco','$2y$13$UGOQzx4iucABdBL2swT8VOOoSjSU6a7hA6qeHIC5/zcYM6AkH5nm.','U');

drop table if exists tipo_noticia cascade;

create table tipo_noticia (
    id           bigserial      constraint pk_tipo_noticias primary key,
    tipo         varchar(255)   not null
);

insert into tipo_noticia ( tipo)
values ('Hogar'),('Legal'), ('Tecnología'),('Videojuegos'),('Otros');


drop table if exists noticias cascade;

create table noticias (
    id           bigserial      constraint pk_noticias primary key,
    titulo       varchar(255)   not null,
    cuerpo       text           not null,
    enlace       varchar(255)   not null,
    publicado    timestamptz    default current_timestamp,
    tipo_noticia bigint         not null constraint fk_noticias_tipo_noticia
                                references tipo_noticia(id) on delete cascade
                                on update cascade,
    id_usuario   bigint         not null constraint fk_noticias_usuarios
                                references usuarios(id) on delete cascade
                                on update cascade
);

-- drop table if exists comentarios cascade;
--
-- create table comentarios (
--     id                      bigserial         constraint pk_comentarios primary key,
--     id_usuario        bigint              constraint fk_comentario_usuarios
--                                                     references usuarios(id)
--                                                     on delete no action on update cascade,
--     votos                 numeric(6)     default 0,
--     comentario       varchar(500)  not null,
--     publicado         timestamptz   default current_timestamp,
--     id_consulta       bigint             not null constraint fk_comentarios_consultas
--                                                     references consultas(id) on delete no action
--                                                     on update cascade
-- );
--
-- create index idx_comentarios_votos on comentarios (votos);
-- create index idx_comentarios_publicado on comentarios (publicado);
