CREATE TABLE galleries(
    id int(10) UNSIGNED AUTO_INCREMENT,
    image varchar(255) NOT NULL,
    title varchar(255) NOT NULL,
    product_id int(10) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (product_id) int(10) REFERENCES products(id)
)