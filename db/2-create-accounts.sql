CREATE TABLE cleanarchkotlin.accounts
(
    account_id     SERIAL PRIMARY KEY,
    bank_name      VARCHAR(100) NULL,
    account_number VARCHAR(100) NULL,
    agency_number  VARCHAR(100) NULL,
    owner          VARCHAR(100) NULL
);