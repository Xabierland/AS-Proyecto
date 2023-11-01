-- Adminer 4.8.1 PostgreSQL 16.0 (Debian 16.0-1.pgdg120+1) dump

DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "user" text NOT NULL,
    "passwd" text NOT NULL,
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "users" ("id", "user", "passwd") VALUES
(1,	'Xabier',	'1234');

-- 2023-10-31 21:28:09.971155+00