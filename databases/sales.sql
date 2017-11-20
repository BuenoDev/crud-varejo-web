CREATE TABLE sales(
    id int(10) UNSIGNED AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    price decimal(7,2) NOT NULL,
    amount int(10) NOT NULL,
    code varchar(100),
    slug varchar(255),
    user_id int(10) UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE products_sales(
    product_id INT(10) UNSIGNED,
    sale_id INT(10) UNSIGNED,
    FOREIGN KEY(product_id) REFERENCES products(id),
    FOREIGN KEY(sale_id) REFERENCES sales(id)
);