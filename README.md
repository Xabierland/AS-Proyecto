# AS-Proyecto

Proyecto de la asignatura de Administración de Sistemas 2023-2024

## Indice

- [AS-Proyecto](#as-proyecto)
  - [Indice](#indice)
  - [Introducción](#introducción)
  - [Tareas](#tareas)
  - [Funcionamiento](#funcionamiento)
    - [Docker](#docker)
    - [Kubernetes](#kubernetes)
  - [FAQ](#faq)

## Introducción

La tarea propuesta es la de crear una aplicación web funcional con temática libre.

En mi caso he decidido crear una aplicación web que permita a diferentes usuarios comunicarse entre ellos mediante mensajes.

## Tareas

- [ ] Desarrollar una aplicacion web.
  - [ ] Usable desde un navegador.
  - [ ] Los datos de la BBDD deben almacenarse fuera de un contenedor.
- [ ] Crear imágenes Docker propias.
  - [] Se deben subir a Docker Hub.
- [ ] Crear un entorno Docker Compose.
- [ ] Despliegue Kubernetes equivalente
- [ ] Incluir más funcionalidades en la aplicación mediante imágenes adicionales
- [ ] Utilizar funcionalidades Docker/Kubernetes no vistas en clase

## Funcionamiento

### Docker

#### Subir la imagenes a Docker Hub

```bash
# Web
docker tag docker-web xabierland/web
docker push xabierland/web

# Postgres
docker tag docker-sgbd xabierland/sgbd
docker push xabierland/sgbd

# Adminer
docker tag adminer xabierland/sabd
docker push xabierland/sabd

```

### Kubernetes

## FAQ
