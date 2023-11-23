import requests
import random
import time
import psycopg2

def login():
    url = 'https://carapi.app/api/auth/login'
    headers = {
        'accept': 'text/plain',
        'Content-Type': 'application/json'
    }

    data = {
        'api_token': '4d9d4ae7-2417-40ff-a602-03de4ec72a7a',
        'api_secret': '66b013d96ec7b28c526ebaf6da65dd44'
    }

    response = requests.post(url, headers=headers, json=data)

    if response.status_code != 200:
        print(response.text)

def getMakers():
    url = 'https://carapi.app/api/makes'
    headers = {
        'accept': 'application/json'
    }

    response = requests.get(url, headers=headers)

    if response.status_code == 200:
        data = response.json()
        if 'data' in data and isinstance(data['data'], list):
            makes_data = [{'id': item['id'], 'name': item['name']} for item in data['data']]
            makes_dict = {item['id']: item['name'] for item in makes_data}
            return makes_dict
        else:
            print('No se encontraron datos de marcas en la respuesta o la clave "data" no está presente.')
    else:
        print(f'Error al realizar la solicitud. Código de estado: {response.status_code}')
        print(response.text)

def getModel(pMakers):
    url = 'https://carapi.app/api/models'
    params = {
        'sort': 'name',
        'direction': 'desc',
        'year': '2015'
    }

    headers = {
        'accept': 'application/json'
    }

    response = requests.get(url, params=params, headers=headers)

    if response.status_code == 200:
        data = response.json()
        if 'data' in data and isinstance(data['data'], list) and len(data['data']) > 0:
            # Generar un índice aleatorio entre 0 y la longitud de la lista
            indice_aleatorio = random.randint(0, len(data['data']) - 1)
            modelo = data['data'][indice_aleatorio]
            # Obtener el nombre de la marca correspondiente al make_id
            make_id = modelo.get('make_id')
            marca = pMakers.get(make_id, 'Marca no encontrada')  # Si el make_id no existe en el diccionario, se mostrará 'Marca no encontrada'

            return marca, modelo['name']
        else:
            print('No se encontraron objetos en la respuesta o la clave "data" no está presente.')
    else:
        print(f'Error al realizar la solicitud. Código de estado: {response.status_code}')
        print(response.text)

def crearAnuncio(pMarca, pModelo):
    db_params = {
    'dbname': 'db',
    'user': 'root',
    'password': 'root',
    'host': 'sgbd',  # Puedes cambiar esto al servidor de tu base de datos
    'port': '5432'  # Puerto por defecto de PostgreSQL
    }

    # Crear una conexión a la base de datos
    conn = psycopg2.connect(**db_params)

    # Crear un cursor para ejecutar comandos SQL
    cur = conn.cursor()

    titulo = 'Vendo ' + pMarca
    modelo = pMarca + ' ' + pModelo
    imagen = 'img/default.webp'
    numero = 34111111111
    vendedor = 1

    insert_query = "INSERT INTO anuncios (titulo, modelo, imagen, numero, vendedor) VALUES (%s, %s, %s, %s, %s)"
    values = (titulo, modelo, imagen,numero, vendedor)
    cur.execute(insert_query, values)
    conn.commit()
    cur.close()
    conn.close()

if __name__ == '__main__':
    while(True):
        login()
        makers=getMakers()
        marca, modelo=getModel(makers)
        crearAnuncio(marca, modelo)
        time.sleep(60)
