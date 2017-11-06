CREATE TABLE categories(
    id int(10) UNSIGNED AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description text,
    slug varchar(50),
    category_id int(10),
    PRIMARY KEY(id)
)