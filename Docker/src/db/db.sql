-- Adminer 4.8.1 PostgreSQL 16.0 (Debian 16.0-1.pgdg120+1) dump

DROP TABLE IF EXISTS "anuncios";
DROP SEQUENCE IF EXISTS anuncios_id_seq;
CREATE SEQUENCE anuncios_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

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

DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 2 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "mail" text NOT NULL,
    "user" text NOT NULL,
    "passwd" text NOT NULL,
    CONSTRAINT "users_mail" UNIQUE ("mail"),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "users" ("id", "mail", "user", "passwd") VALUES
(1, 'bot@bot.com', 'Bot', '');

ALTER TABLE ONLY "public"."anuncios" ADD CONSTRAINT "anuncios_vendedor_fkey" FOREIGN KEY (vendedor) REFERENCES users(id) ON DELETE SET NULL NOT DEFERRABLE;

-- 2023-11-01 19:59:56.165255+00
