CREATE TABLE products(
    id int(10) UNSIGNED AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description text,
    price decimal(7,2) NOT NULL,
    amount int(10) NOT NULL,
    code varchar(20),
    slug varchar(255),
    user_id int(10) UNSIGNED,
    category_id int(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id),
    UNIQUE KEY(code)
)