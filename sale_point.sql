CREATE TABLE IF NOT EXISTS `prod_category` (
  `id_prod_cat` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id_prod_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL auto_increment,
  `id_prod_cat` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id_product`),
  CONSTRAINT fk_prod_cat FOREIGN KEY (id_prod_cat)
  REFERENCES prod_category(id_prod_cat)
  ON UPDATE CASCADE
  ON DELETE CASCADE
  )
  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL auto_increment,
  `name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_client`))
  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `sale_detail` (
  `id_sale_detail` int(11) NOT NULL auto_increment,
  `id_product` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id_sale_detail`),
  CONSTRAINT fk_prod FOREIGN KEY (id_product)
  REFERENCES products(id_product)
  ON UPDATE CASCADE
  ON DELETE CASCADE
  )
  ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `sales` (
  `id_sales` int(11) NOT NULL auto_increment,
  `id_sale_detail` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` varchar(45) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_sales`),
  CONSTRAINT fk_id_sale_detail FOREIGN KEY (id_sale_detail)
  REFERENCES sale_detail(id_sale_detail)
  ON UPDATE CASCADE
  ON DELETE CASCADE,
  CONSTRAINT fk_id_client FOREIGN KEY (id_client)
  REFERENCES clients(id_client)
  ON UPDATE CASCADE
  ON DELETE CASCADE
  )
  ENGINE=InnoDB DEFAULT CHARSET=latin1;
