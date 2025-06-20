🎯 cyph3r-products-api - José Vicente López
    API REST para gestión de productos y sus precios en múltiples divisas - Desafio Técnico Cyph3r

📦 Requisitos
    - PHP 8.2+

    - Composer

    - Laravel 12

    - MySQL o compatible

⚙️ Instalación

    1. 📥 Clona el repositorio:
        git clone git@github.com:MadBrain4/latinad-api.git
        cd latinad-api

    2. 📦 Instala dependencias:
        composer install

    3. 🛠️ Copia el archivo .env y configúralo:
        cp .env.example .env
        Ajusta las variables de entorno (base de datos, JWT, etc.)

    4. 🔑 Genera la clave de aplicación:
        php artisan key:generate

    5. 🧱 Ejecuta migraciones y seeders:
        php artisan migrate --seed

    6. 🔐 Genera la clave JWT:
        php artisan jwt:secret

    7. 🚀 Inicia el servidor:
        php artisan serve

📡 Endpoints

🔐 Autenticación

    POST /api/register
        Registrar un nuevo Usuario

        Body (JSON)
            - name: string
            - email: string
            - password: string
            - password_confirmation: string

            🔓 No requiere autenticación.

    POST /api/login
        Inicia sesión y devuelve un token JWT.

        Body (JSON)
            - email: string
            - password: string 

            🔓 No requiere autenticación.

    POST /api/refresh
        Refresca el token JWT.

        Header
            - Authorization: Bearer {token}

            🔒 Requiere autenticación.

    POST /api/logout
        Cierra la sesión y revoca el token actual.

        Header
            - Authorization: Bearer {token}

        🔒 Requiere autenticación.

    GET /api/me
        Devuelve los datos del usuario autenticado.

        Header
            - Authorization: Bearer {token}

        🔒 Requiere autenticación.

🌐 Idioma del Usuario

    GET /api/user/language
        Obtiene el idioma actual del usuario autenticado.

        Header
            - Authorization: Bearer {token}

        🔒 Requiere autenticación.

    PUT /api/user/language
        Actualiza el idioma preferido del usuario.

        Header
            - Authorization: Bearer {token}

        Body (JSON)
            - language: string (es, en)

        🔒 Requiere autenticación.

📦 Productos

    GET /api/products
        Lista los productos con soporte para filtros, orden y paginación.

        Query Params (opcionales):
            - name: filtrar por nombre (parcial)
            - description: filtrar por descripción (parcial)
            - sort_by: campo para ordenar (id, name, price, tax_cost, manufacturing_cost)
            - sort_order: asc o desc
            - per_page: número de elementos por página
            - page: número de página

        🔒 Requiere autenticación.

    POST /api/products
        Crea un nuevo producto.

        Body (JSON):
            - name: string
            - description: string
            - price: decimal
            - currency_id: integer
            - tax_cost: decimal
            - manufacturing_cost: decimal

        🔒 Requiere autenticación.

    GET /api/products/{id}
        Muestra los detalles de un producto específico.

        🔒 Requiere autenticación.

    PUT /api/products/{id}
        Actualiza los datos de un producto.

        Body (JSON):
            - name: string
            - description: string
            - price: decimal
            - currency_id: integer
            - tax_cost: decimal
            - manufacturing_cost: decimal

        🔒 Requiere autenticación.

    DELETE /api/products/{id}
        Elimina un producto específico y devuelve sus datos eliminados.

        🔒 Requiere autenticación.

💱 Precios de Producto

    GET /api/products/{id}/prices
        Obtiene todos los precios de un producto en distintas divisas.

        🔒 Requiere autenticación.

    POST /api/products/{id}/prices
        Agrega un nuevo precio en otra divisa a un producto.

        Body (JSON):
            - currency_id: integer
            - price: decimal

        🔒 Requiere autenticación.