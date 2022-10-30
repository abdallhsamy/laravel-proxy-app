#  Laravel Proxy App


## Prerequisites
you must have [docker-compose](https://docs.docker.com/compose/install/) to run this script

and `docker-compose` requires
- `Docker Engine`
- `Docker CLI`



## Installation

1 download the repose files
```bash
git clone git@github.com:abdallhsamy/laravel-proxy-app.git
```
2 navigate to the downloaded folder
```bash
cd laravel-proxy-app
```

3 download and install required dependencies
```bash
docker run --rm \
            -u "$(id -u):$(id -g)" \
            -v $(pwd):/opt \
            -w /opt \
            laravelsail/php81-composer:latest \
            composer install --ignore-platform-reqs
```

4 pull and install the docker containers

```bash
./vendor/bin/sail up
```

5 install project dependencies
```bash
./vendor/bin/sail composer install
```

6 create `.env` file
```bash
cp .env.example .env 
```

7 generate app key
```bash
./vendor/bin/sail php artisan key:generate
```

## Usage

Method : `POST`

URL : `{{baseUrl}}/api/v1/proxy`

Headers :
```json
{
    "Accept": "application/json",
    "Content-Type": "application/json"
}
```

Request Example :
```json
{
    "url": "https://reqres.in/api/users",
    "method": "post",
    "body": {
        "name": "Abdallah Samy",
        "job": "software engineer"
    }
}
```

Response Example:
```json
{
    "name": "Abdallah Samy",
    "job": "software engineer",
    "id": "84",
    "createdAt": "2022-10-30T11:28:25.583Z"
}
```

another one 
Request Example :
```json
{
    "url" : "https://dummyjson.com/products/1",
    "method" : "get"
}
```

Response Example:
```json
{
    "id": 1,
    "title": "iPhone 9",
    "description": "An apple mobile which is nothing like apple",
    "price": 549,
    "discountPercentage": 12.96,
    "rating": 4.69,
    "stock": 94,
    "brand": "Apple",
    "category": "smartphones",
    "thumbnail": "https://dummyjson.com/image/i/products/1/thumbnail.jpg",
    "images": [
        "https://dummyjson.com/image/i/products/1/1.jpg",
        "https://dummyjson.com/image/i/products/1/2.jpg",
        "https://dummyjson.com/image/i/products/1/3.jpg",
        "https://dummyjson.com/image/i/products/1/4.jpg",
        "https://dummyjson.com/image/i/products/1/thumbnail.jpg"
    ]
}
```
