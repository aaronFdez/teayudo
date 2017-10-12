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

    drop table if exists consultas cascade;

    drop table if exists categorias cascade;

    create table categorias (
        id_categoria  bigserial     constraint pk_categorias primary key,
        nombre        varchar(20)   not null
    );


    create index idx_categorias_nombre on categorias (nombre);

    create table consultas (
        id_consulta     bigserial       constraint pk_consultas primary key,
        id_usuario    bigint           constraint fk_consultas_usuarios
                                                  references usuarios (id)
                                                  on delete no action on update cascade,
        titulo           varchar(55)    not null,
        cuerpo         varchar(500)  not null,
        meneos        numeric(6)     default 0,
        url                varchar(200)  not null,
        id_categoria  bigint             constraint fk_noticias_categorias_categoria
                                                    references categorias (id_categoria)
                                                    on delete no action on update cascade,
        created_at    timestamptz   default current_timestamp
    );

    create index idx_consultas_titulo on consultas (titulo);
    create index idx_consultas_create_at on consultas (created_at);


        drop table if exists comentarios cascade;

        create table comentarios (
            id_comentario  bigserial     constraint pk_comentarios primary key,
            id_usuario     bigint        constraint fk_noticias_usuarios
                                         references usuarios(id)
                                         on delete no action on update cascade,
            votos          numeric(6)    default 0,
            cuerpo         varchar(500)  not null,
            created_at     timestamptz   default current_timestamp
        );

        create index idx_comentarios_votos on comentarios (votos);
        create index idx_comentarios_create_at on comentarios (created_at);

        drop table if exists comentarios_consultas cascade;

        create table comentarios_consultas (
            id_comentario_consulta   bigserial constraint pk_comentarios_consultas primary key,
            id_comentario           bigint    constraint fk_comentarios_comentarios
                                              references comentarios (id_comentario)
                                              on delete no action on update cascade,
            id_consulta              bigint    constraint fk_noticias_consultas
                                              references consultas(id_consulta)
                                              on delete no action on update cascade
        );
