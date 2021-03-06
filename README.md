# Seller Controller
- A simple project that a shop would be able to register its seller
- Enabling the company to:
    - Register Sales
    - Control sale commission
    - Send details about the sales to the seller by email
### How to run
#### Install Dependencies
- > $ git clone https://github.com/rafaelbreno/seller-controller-test
- > $ cd seller-controller-test
- > $ composer install
- > $ npm install
- > $ npm run dev
- Configure _.env.example_ file
    - I used [Mailtrap.io](https://mailtrap.io/) to mock email
- > $ cp .env.example .env
- > $ php artisan key:generate
#### Running the application
- You can run it in 3 different ways
1. Shell Script
    - > $ ./start.sh
    - This will start a Laravel Docker based application automatically
    - There are more info about the file, in the file, all commented
2. Docker
    - > $ chmod -R 777 storage/ storage/*
    - > $ docker-compose up -d
    - > $ docker-compose exec app php artisan migrate:fresh
3. Common way
    - > $ php artisan migrate:fresh
- After that you can access the app in the following url:
    - `http://localhost:8000/`
#### Mocking Application
- > $ php artisan test
    - It will run some tests
    - All stored at: _'tests/feature/UserTest.php'_
- > $ php artisan db:seed
    - To fill the database with dummy data
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
    - _View:_
        - Method: _GET_
        - URL: `/seller`
        - Returns Blade View
            - `user/index.blade.php`
    - _API:_
        - Method: _GET_
        - URL: `/api/sellers`
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
- Register new Sell
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
    - URL: `/seller/{id}`
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
