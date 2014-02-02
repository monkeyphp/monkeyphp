CREATE TABLE IF NOT EXISTS contact (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email         VARCHAR(50) NOT NULL,
    message       VARCHAR(10000) NOT NULL, 
    created_date  DATETIME NOT NULL,
    modified_date DATETIME NOT NULL,
    read_date     DATETIME NULL
) ENGINE = innodb, COMMENT = 'The contact messages table';
