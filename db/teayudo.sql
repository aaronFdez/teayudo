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
values ('admin', '$2y$13$3t.QgESLRu98NTHv2GSTfefE6rdPssSGq0eKofwl4f3QNIC.V4Bmq', 'A');

drop table if exists noticias cascade;

create table noticias (
    id           bigserial      constraint pk_noticias primary key,
    titulo       varchar(255)   not null,
    cuerpo       text           not null,
    enlace       varchar(255)   not null,
    publicado    timestamptz    default current_timestamp
    -- tipo_noticia bigint         not null constraint fk_noticias_tipo_noticia
    --                             references tipo_noticia(id) on delete cascade
    --                             on update cascade,
    -- id_usuario   bigint         not null constraint fk_noticias_usuarios
    --                             references usuarios(id) on delete cascade
    --                             on update cascade
);


--
-- drop table if exists tipo_consultas cascade;
--
-- create table tipo_consultas (
--     id           bigserial          constraint pk_tipo_consultas primary key,
--     tipo        varchar(200)   not null
-- );
--

-- drop table if exists consultas cascade;
-- create table consultas (
--     id                   bigserial          constraint pk_consultas primary key,
--     id_usuario      bigint              constraint fk_consultas_usuarios
--                                                   references usuarios (id)
--                                                   on delete no action on update cascade,
--     titulo               varchar(55)    not null,
--     cuerpo             varchar(500)  not null,
--     gusta                numeric(6)    default 0,
--     -- enlace               varchar(200)  not null,
--     -- tipo_consultas  bigint             constraint fk_noticias_tipo_consultas
--     --                                                 references tipo_consultas(id)
--     --                                                 on delete no action on update cascade,
--     publicado   timestamptz          default current_timestamp
-- );

-- create index idx_consultas_titulo on consultas (titulo);
-- create index idx_consultas_publicado on consultas (publicado);
--     insert into consultas (titulo,cuerpo)
--     values ('prueba', 'ola que ase' );
--
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
