CREATE TABLE products(
    id int(10) UNSIGNED AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description text,
    value decimal(5,2) NOT NULL,
    amount int(10) NOT NULL,
    code varchar(100),
    slug varchar(255)
    user_id int(10),
    category_id int(10),
    created_at timestamp,
    updated_at timestamp,
    PRIMARY KEY(id)
)