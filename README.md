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
