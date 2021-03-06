CREATE TABLE users(
    id int(10) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role ENUM('client', 'admin') DEFAULT 'client',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY (email)
);

INSERT INTO users (
    name,
    email,
    password,
    role
)VALUES(
    'Admin',
    'admin@admin.com',
    'admin',
    'admin'
);