CREATE TABLE
IF NOT EXISTS `products`
(
  id INT UNSIGNED primary key NOT NULL AUTO_INCREMENT,
  name VARCHAR
(120) not null,
  price float not null,
	image VARCHAR
(255),
  sale_price float default '0',
  status tinyint default '1',
  description text not null,
  created_at timestamp default current_timestamp,
  category_id  INT UNSIGNED not null,
  updated_at date NULL,
  FOREIGN KEY
(category_id) REFERENCES categories
(id)
) ENGINE = InnoDB;