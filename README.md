# link-shortener
Este proyecto esta funcionando en su totalidad como una API que puede ser consumida desde postman

## Crear Link acortado
Para crear un link acortado se puede utilizar la api

**http://127.0.0.1:8000/api/links**

con la informacion en el body de la peticion por metodo **POST**
{
    url : "www.google.com"
}

y retorna algo similar a

{
    "data": {
        "title": "",
        "url": "www.google.com",
        "shorted_url": "linkHMgx7J2r8k",
        "access_count": 0,
        "updated_at": "2022-06-07T23:55:25.000000Z",
        "created_at": "2022-06-07T23:55:25.000000Z",
        "id": 1
    },
    "message": "link created correctly"
}

## Obtener un objeto link especifico
Para obtener un objeto link acortado se puede utilizar la api por metodo **GET**

**http://127.0.0.1:8000/api/links/{id}**

donde el id es el id en la base de datos del objeto en cuestion, el retorno de la api debe ser algo similar a: 

{
    "data": {
        "id": 1,
        "title": "",
        "url": "www.google.com",
        "shorted_url": "linkHMgx7J2r8k",
        "access_count": 0,
        "created_at": "2022-06-07T23:55:25.000000Z",
        "updated_at": "2022-06-07T23:55:25.000000Z"
    }
}

## Obtener los 100 links mas utilizados
Para obtener un listado con los 100 links acortado mas utilizado se puede utilizar la api por metodo **GET**

**http://127.0.0.1:8000/links/mostaccessed**

y automaticamente retornara un listado con los objetos links mas utilizando.

## Redireccionar
Para realizar una redireccion al acortado se puede utilizar la api por metodo **GET** desde el navegador

**http://127.0.0.1:8000/links/redirect/{shorted_url}**

ejemplo:

http://127.0.0.1:8000/links/redirect/linkHMgx7J2r8k

y automaticamente redireccionara al link guardado en la base de datos
