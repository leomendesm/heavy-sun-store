# Privileges for `admin`@`localhost`

GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' IDENTIFIED BY PASSWORD '*215869E2F306F73799B18C7B165D73CD0B0AD18D' WITH GRANT OPTION;


# Privileges for `normal`@`localhost`

GRANT USAGE ON *.* TO 'normal'@'localhost' IDENTIFIED BY PASSWORD '*906F68FFF5081ABBE2C1715190AE8C20A6C8367E';

GRANT ALL PRIVILEGES ON `heavy`.* TO 'normal'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE ON `heavy`.`carrinho` TO 'normal'@'localhost';

GRANT SELECT, INSERT, UPDATE ON `heavy`.`estoque` TO 'normal'@'localhost';

GRANT SELECT, INSERT, UPDATE ON `heavy`.`compra` TO 'normal'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE ON `heavy`.`user` TO 'normal'@'localhost';

GRANT SELECT ON `heavy`.`top10` TO 'normal'@'localhost';

GRANT SELECT, INSERT, UPDATE ON `heavy`.`produto` TO 'normal'@'localhost';
