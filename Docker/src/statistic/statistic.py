import psycopg2
import time

# Obtiene todos las marcas de autos
def getMakers():
    db_params = {
    'dbname': 'db',
    'user': 'root',
    'password': 'root',
    'host': 'sgbd',  # Puedes cambiar esto al servidor de tu base de datos
    'port': '5432'  # Puerto por defecto de PostgreSQL
    }
    conn = psycopg2.connect(**db_params)
    cur = conn.cursor()
    cur.execute('SELECT modelo FROM anuncios')
    # Coge la primera palabra de cada modelo
    marcas = [modelo[0].split()[0] for modelo in cur.fetchall()]
    cur.close()
    conn.close()
    return marcas

# Crea una imagen con las estadisticas de cada marca
def createImage(marcas):
    import matplotlib.pyplot as plt
    from wordcloud import WordCloud, STOPWORDS, ImageColorGenerator

    # Crea un diccionario con las marcas y la cantidad de veces que aparecen
    marcas_dict = {}
    for marca in marcas:
        if marca in marcas_dict:
            marcas_dict[marca] += 1
        else:
            marcas_dict[marca] = 1

    # Crea la imagen
    wordcloud = WordCloud(width=800, height=400, background_color="white")
    wordcloud.generate_from_frequencies(frequencies=marcas_dict)
    plt.figure(figsize=(20,10))
    plt.imshow(wordcloud, interpolation="bilinear")
    plt.axis("off")
    plt.savefig('estadisticas.png')

while(True):
    marcas = getMakers()
    createImage(marcas)
    time.sleep(60)