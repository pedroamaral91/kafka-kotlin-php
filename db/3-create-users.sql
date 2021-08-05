CREATE TABLE cleanarchkotlin.users
(
    user_id  SERIAL PRIMARY KEY,
    name     VARCHAR(100) NULL,
    email    VARCHAR(200) NULL,
    password VARCHAR(255) NULL
);