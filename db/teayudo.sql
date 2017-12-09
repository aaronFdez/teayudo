drop table if exists usuarios cascade;

create table usuarios (
  id                     bigserial          constraint pk_usuarios primary key,
  nombre            varchar(255)   not null constraint uq_usuario_unico unique,
  password         varchar(60)     not null,
  email               varchar(255),
  tipo                  char(1)            not null default 'U'
                                                 constraint ck_tipo_usuario check (tipo in ('U', 'A')),
   zona_horaria   varchar(255)  default 'Europe/Madrid',
   votos                 numeric(6)     default 0,
   token_val        varchar(32)    constraint uq_usuarios_token_val unique
   -- consulta_id     bigint              not null constraint fk_usuario_consultas
   --                                                references consultas (id)
   --                                                on delete no action on update cascade
);

drop table if exists tipo_consulta cascade;

create table tipo_consulta (
    id           bigserial      constraint pk_tipo_consulta primary key,
    tipo         varchar(255)   not null
);

drop table if exists consultas cascade;

create table consultas (
    id           bigserial      constraint pk_consultas primary key,
    titulo       varchar(255)   not null,
    cuerpo       text           not null,
    enlace       varchar(255)   ,
    publicado    timestamptz    default current_timestamp,
    tipo_consulta bigint         not null constraint fk_consultas_tipo_consulta
                                references tipo_consulta(id) on delete cascade
                                on update cascade,
    id_usuario   bigint         not null constraint fk_consultas_usuarios
                                references usuarios(id) on delete cascade
                                on update cascade
);

drop table if exists comentarios cascade;

create table comentarios (
    id                      bigserial         constraint pk_comentarios primary key,
    id_usuario        bigint              constraint fk_comentario_usuarios
                                                    references usuarios(id)
                                                    on delete no action on update cascade,
    votos                 numeric(6)     default 0,
    comentario       varchar(500)  not null,
    publicado         timestamptz   default current_timestamp,
    id_consulta       bigint             not null constraint fk_comentarios_consultas
                                                    references consultas(id) on delete no action
                                                    on update cascade
);

create index idx_comentarios_votos on comentarios (votos);
create index idx_comentarios_publicado on comentarios (publicado);


insert into usuarios (nombre, password, tipo)
values ('admin', '$2y$13$3t.QgESLRu98NTHv2GSTfefE6rdPssSGq0eKofwl4f3QNIC.V4Bmq', 'A'),
('paco','$2y$13$UGOQzx4iucABdBL2swT8VOOoSjSU6a7hA6qeHIC5/zcYM6AkH5nm.','U'),
('carmen','$2y$13$GHhbFK4GRwhaTGrNClZjdecm66RZ5k20PNjZOpOyrC9bmbmr3Kai.','U'),
('selene','$2y$13$Ca9LDGZX36j7u20pRgGS9eBlsR.yYCVpNSaTZn4GjwuEg/KyltqwG','U'),
('admin2', '$2y$13$3t.QgESLRu98NTHv2GSTfefE6rdPssSGq0eKofwl4f3QNIC.V4Bmq', 'A'),
('paco2','$2y$13$UGOQzx4iucABdBL2swT8VOOoSjSU6a7hA6qeHIC5/zcYM6AkH5nm.','U'),
('carmen2','$2y$13$GHhbFK4GRwhaTGrNClZjdecm66RZ5k20PNjZOpOyrC9bmbmr3Kai.','U'),
('selene2','$2y$13$Ca9LDGZX36j7u20pRgGS9eBlsR.yYCVpNSaTZn4GjwuEg/KyltqwG','U');

insert into tipo_consulta ( tipo)
values ('Hogar'),('Legal'), ('Tecnología'),('Videojuegos'),('Otros');

insert into consultas (titulo, cuerpo, tipo_consulta,id_usuario)
values ('Problemas con Yii2', 'Me gustaría un tutorial o ayuda para temas como la paginación u ordenación en Yii2', 3,1),
('Assasins Origin','Me he atascado y no puedo mejorar la hoja oculta',4,2),('Grifo gotea', 'El grifo del cuarto de baño no para de gotear y no sé mucho
    sobre fontanería, alguien sabe por qué o qué debo hacer?',1,3),
('Poner vinilos en cristal', ' He pillado por internet unos vinilos para ponerlos en las ventanas del salón ya que vivo en planta baja
    y la gente de la calle pude verme. El problema es que salen burbujas y queda mal.¿Algún consejo?',1,4),
('Custodia compartida', 'TEngo un juicio en Enero y me gustaría vuestros consejos para poder pedir que mis hijos pasen
    más tiempo conmigo y el juez le parezca bien',2,5),
('Mi chihuahua', 'Esta semana es el cumpleaños de mi chichuahua y me gustaría darle una fiesta sorpresa, porque no se acordará,
    y hacer algo especial por ella. Necesito ideas para que sea un día especial',5,6),
('Falsificar documentos', ' Mi ex-pareja ha falsificado documentos oficiales para perjudicarme, me gustaría saber qué hacer,gracias.',2,7),
('Ampliar RAM','Tengo un pc de 8 gb de RAM y me gustaría doblarlos.Estoy perdido y no quiero que me timen los de la tienda, qué debo decirles?',3,8),
('MineCraft','Me gustaría saber cómo conseguir la epada diamante en MineCraft...',4,4),
('Serie American Gods', 'He visto la primera temporada de AG y me encantó, alguien sabe cuando echan las segunda???',5,3);


insert into comentarios (id_usuario, votos, comentario,id_consulta)
values (3, 3,'En la Api encontrarás muchos recursos',1),
(3,1,'Debes buscar los recursos que te hacen falta cazando o comprándolos para poder mejorarla',2),
(1,3,'En el menú de habilidades debes mejorar la de obtención de materiales y te será más fácil',2),
(2,0,'¿Dónde está ese menu?',2),
(1,2,'Pulsas options y R1 hasta llegar a habilidades, luego sigue el camino de las opciones inferior derecha y la verás',2),
(5,4,'Desmonta el grifo, levanta la tapa de la manija, saca el tornillo para hacer saltar la manija hacia afuera y retira el caño usando una llave de asiento, luego remplázala y listo.',3)
;
