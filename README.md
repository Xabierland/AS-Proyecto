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

En mi caso he decidido crear una aplicación web que permita publicar y ver anuncios de autos de segunda mano.

## Tareas

- [X] Desarrollar una aplicacion web.
  - [X] Usable desde un navegador.
  - [X] Los datos de la BBDD deben almacenarse fuera de un contenedor.
- [X] Crear imágenes Docker propias.
  - [x] Se deben subir a Docker Hub.
- [X] Crear un entorno Docker Compose.
- [ ] Despliegue Kubernetes equivalente
- [ ] Incluir más funcionalidades en la aplicación mediante imágenes adicionales
- [ ] Utilizar funcionalidades Docker/Kubernetes no vistas en clase

## Funcionamiento

### Docker

#### Iniciamos el entorno

```bash
docker-compose up -d --build
```

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

#### Iniciar el cluster

```bash
minikube start
```

#### Crear los objetos

```bash
#Network
kubectl apply -f ingress.yaml
#SABD
kubectl apply -f sabd-deployment.yaml
kubectl apply -f sabd-service.yaml
#Web
kubectl apply -f web-deployment.yaml
kubectl apply -f web-service.yaml
#SGBD
kubectl apply -f sgbd-deployment.yaml
kubectl apply -f sgbd-service.yaml
kubectl apply -f sgbd-volume.yaml
kubectl apply -f sgbd-rvolume.yaml
```

#### Creamos el tunnel

```bash
minikube tunnel
```
