### How to run
#### Install Dependencies
- > $ git clone https://github.com/rafaelbreno/seller-controller-test
- > $ cd seller-controller-test
- > $ composer install
- > $ npm install
- > $ npm run dev
- > $ cp .env.example .env
- > $ php artisan key:generate
#### Running the application
- You can run it in 3 different ways
1. Shell Script
    - > $ ./start.sh
    - This will start a Laravel Docker based application automatically
2. Docker
    - > $ chmod -R 777 storage/ storage/*
    - > $ docker-compose up -d
    - > $ docker-compose exec app php artisan migrate:fresh
3. Common way
    - > $ php artisan migrate:fresh
- After that you can access the app in the following url:
    - `http://localhost:8000/`
### Problem Description:
- Application:
    - Develop a Sales and Sellers API, to calculate the Seller's commission of each sale 
    - Commission of 8.5%
#### Endpoints:
- Register new Seller
    - Method: _POST_
    - URL: `/seller/create`
    - Request Body:
        -   ```json
                {
                    "name": "string, not unique",
                    "email": "string, unique"
                }
            ```
    - Response Body:
        -   ```json
                {
                    "id":   "string, uuid",
                    "name": "string, not unique",
                    "email": "string, unique"
                }
            ```
- List all Sellers
    - Method: _GET_
    - URL: `/seller`
    - Request Body:
        -   ```json
                {}
            ```
    - Response Body:
        -   ```json
                {
                    "id":   "string, uuid",
                    "name": "string, not unique",
                    "email": "string, unique",
                    "commission": "integer" 
                }
            ```
- Register new Seller
    - Method: _POST_
    - URL: `/sale/create`
    - Request Body:
        -   ```json
                {
                    "seller_id": "uuid",
                    "sale_value": "integer"
                }
            ```
    - Response Body:
        -   ```json
                {
                    "id":   "string, uuid",
                    "name": "string, not unique",
                    "email": "string, unique",
                    "commission": "integer",
                    "sale_value": "integer",
                    "created_at": "datetime"
                }
            ```

- List all Sellers Sale
    - Method: _GET_
    - URL: `/seller`
    - Request Body:
        -   ```json
                {
                    "id":   "string, uuid"
                }
            ```
    - Response Body:
        -   ```json
                {
                    "id":   "string, uuid",
                    "name": "string, not unique",
                    "email": "string, unique",
                    "commission": "integer",
                    "sale_value": "integer",
                    "created_at": "datetime"
                }
            ```
#### Details
- At the end of the day, an email should be sent with a _sale report_ of __that__ day
- Create an Application that consumes this API
