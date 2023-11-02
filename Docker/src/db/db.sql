-- Adminer 4.8.1 PostgreSQL 16.0 (Debian 16.0-1.pgdg120+1) dump

DROP TABLE IF EXISTS "anuncios";
DROP SEQUENCE IF EXISTS anuncios_id_seq;
CREATE SEQUENCE anuncios_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 4 CACHE 1;

CREATE TABLE "public"."anuncios" (
    "id" integer DEFAULT nextval('anuncios_id_seq') NOT NULL,
    "titulo" text NOT NULL,
    "modelo" text NOT NULL,
    "fecha" date DEFAULT now() NOT NULL,
    "imagen" text,
    "numero" text NOT NULL,
    "vendedor" integer NOT NULL,
    CONSTRAINT "anuncios_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "anuncios" ("id", "titulo", "modelo", "fecha", "imagen", "numero", "vendedor") VALUES
(1,	'Vendo Opel',	'Chevrolet Captiva',	'2023-11-01',	'image/ChevroletCaptiva_01.webp',	'34111111111',	1),
(2,	'Vendo BMW',	'BMW e36 323i, nunca circuito, siempre garaje, de señor mayor. Solo interesados.',	'2023-11-01',	'image/6542a592edfbb_BMW_M3_E36_purple.jpg',	'34111111111',	1),
(3,	'Vendo Citroen',	'No se, tiene 4 ruedas',	'2023-11-01',	'image/6542a69b5e07c_1366_2000.jpg',	'34111111111',	1),
(4,	'Vendo Honda',	'Honda Civic Type S',	'2023-11-01',	'image/6542ad7e7390b_honda_civic-type-s-uk-2008_r6.jpg',	'34111111111',	1);

DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "mail" text NOT NULL,
    "user" text NOT NULL,
    "passwd" text NOT NULL,
    CONSTRAINT "users_mail" UNIQUE ("mail"),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "users" ("id", "mail", "user", "passwd") VALUES
(1,	'xgabina001@ehu.eus',	'Xabier',	'$2y$10$c9LAir9HE4fprmnuQ6JD3OQ6KQnFWDhHMYhikscg32PNJep9v2uB6');

ALTER TABLE ONLY "public"."anuncios" ADD CONSTRAINT "anuncios_vendedor_fkey" FOREIGN KEY (vendedor) REFERENCES users(id) ON DELETE SET NULL NOT DEFERRABLE;

-- 2023-11-01 19:59:56.165255+00
