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
  - [X] Los datos de la BBDD deben almacenarse fuera, en un contenedor.
- [X] Crear imágenes Docker propias.
  - [X] Se deben subir a Docker Hub.
- [X] Crear un entorno Docker Compose.
- [X] Despliegue Kubernetes equivalente
- [X] Incluir más funcionalidades en la aplicación mediante imágenes adicionales
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
# Robot
docker tag docker-robot xabierland/robot
docker push xabierland/robot
# Vault
docker tag docker-vault xabierland/vault
docker push xabierland/vault

```

### Kubernetes

#### Iniciar el cluster

```bash
minikube start
```

#### Colocarnos en el contexto

```bash
docker context use default
```

#### Instalar Addons

```bash
minikube addons enable ingress
minikube addons enable metrics-server
```

#### Ejecutar el dashboard

```bash
minikube dashboard
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
kubectl apply -f web-volume.yaml
kubectl apply -f web-rvolume.yaml
#SGBD
kubectl apply -f sgbd-deployment.yaml
kubectl apply -f sgbd-service.yaml
kubectl apply -f sgbd-volume.yaml
kubectl apply -f sgbd-rvolume.yaml
#Robot
kubectl apply -f robot-deployment.yaml
#Vault
kubectl apply -f vault-deployment.yaml
kubectl apply -f vault-service.yaml

```

#### Borrar los objetos

```bash
#Network
kubectl delete -f ingress.yaml
#SABD
kubectl delete -f sabd-deployment.yaml
kubectl delete -f sabd-service.yaml
#Web
kubectl delete -f web-deployment.yaml
kubectl delete -f web-service.yaml
kubectl delete -f web-volume.yaml
kubectl delete -f web-rvolume.yaml
#SGBD
kubectl delete -f sgbd-deployment.yaml
kubectl delete -f sgbd-service.yaml
kubectl delete -f sgbd-volume.yaml
kubectl delete -f sgbd-rvolume.yaml
#Robot
kubectl delete -f robot-deployment.yaml
#Vault
kubectl delete -f vault-deployment.yaml
kubectl delete -f vault-service.yaml

```

#### Creamos el tunnel

```bash
minikube tunnel
```

## FAQ

### Vault

#### Root token

```hvs.jV0Y7m6ImuCwy9TXKuXCR5G5```

#### Key

```bNu6he+xaP510PFl7VALlZg2VSHgIGtcmFcUEIxwgCc=```

### APICAR

#### API Tokem

```4d9d4ae7-2417-40ff-a602-03de4ec72a7a```

#### API Secret

```66b013d96ec7b28c526ebaf6da65dd44```

### SGBD

#### Usuario

```xabier```

#### Contraseña

```1234```
