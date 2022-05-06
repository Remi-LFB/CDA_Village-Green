DROP DATABASE IF EXISTS village_green;
CREATE DATABASE village_green CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE village_green;

CREATE TABLE vg_category (
    cat_id INT AUTO_INCREMENT,
    cat_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (cat_id),
    UNIQUE (cat_name)
) ENGINE=InnoDB;

CREATE TABLE vg_sub_category (
    sub_cat_id INT AUTO_INCREMENT,
    sub_cat_name VARCHAR(50) NOT NULL,
    cat_id INT NOT NULL,
    PRIMARY KEY (sub_cat_id),
    FOREIGN KEY (cat_id) REFERENCES vg_category(cat_id)
) ENGINE=InnoDB;

CREATE TABLE vg_supplier (
    sup_id INT AUTO_INCREMENT,
    sup_name VARCHAR(50) NOT NULL,
    sup_type BOOLEAN NOT NULL COMMENT 'Constructeur/Importateur',
    sup_contact VARCHAR(50) NOT NULL,
    sup_mail VARCHAR(255) NOT NULL,
    sup_phone VARCHAR(10) NOT NULL,
    sup_address VARCHAR(255) NOT NULL,
    sup_zipcode VARCHAR(5) NOT NULL,
    sup_city VARCHAR(50) NOT NULL,
    sup_country VARCHAR(15) NOT NULL,
    PRIMARY KEY (sup_id),
    UNIQUE (sup_mail)
) ENGINE=InnoDB;

CREATE TABLE vg_product (
    pro_id INT AUTO_INCREMENT,
    pro_reference VARCHAR(8) NOT NULL,
    pro_name VARCHAR(30) NOT NULL,
    pro_label VARCHAR(150) NOT NULL,
    pro_description TEXT NOT NULL,
    pro_price DECIMAL(6,2) NOT NULL,
    pro_stock INT NOT NULL,
    pro_status BOOLEAN NOT NULL COMMENT 'Déverrouillé/Vérrouillé',
    pro_picture VARCHAR(4) NOT NULL,
    sub_cat_id INT NOT NULL,
    sup_id INT NOT NULL,
    PRIMARY KEY (pro_id),
    UNIQUE (pro_reference),
    FOREIGN KEY (sub_cat_id) REFERENCES vg_sub_category(sub_cat_id),
    FOREIGN KEY (sup_id) REFERENCES vg_supplier(sup_id)
) ENGINE=InnoDB;

CREATE TABLE vg_user (
    use_id INT AUTO_INCREMENT,
    use_reference VARCHAR(8) NOT NULL,
    use_lastname VARCHAR(50) NOT NULL,
    use_firstname VARCHAR(50) NOT NULL,
    use_type VARCHAR(15) NOT NULL,
    use_role VARCHAR(15),
    use_coefficient DECIMAL(2,1) NOT NULL,
    use_mail VARCHAR(255) NOT NULL,
    use_password VARCHAR(60) NOT NULL,
    use_phone VARCHAR(10),
    use_bil_address VARCHAR(255),
    use_bil_zipcode VARCHAR(5),
    use_bil_city VARCHAR(50),
    use_bil_country VARCHAR(15),
    use_del_address VARCHAR(255),
    use_del_zipcode VARCHAR(5),
    use_del_city VARCHAR(50),
    use_del_country VARCHAR(15),
    use_emp_id INT COMMENT 'Commercial',
    PRIMARY KEY (use_id),
    UNIQUE (use_reference, use_mail),
    FOREIGN KEY (use_emp_id) REFERENCES vg_user(use_id)
) ENGINE=InnoDB;

CREATE TABLE vg_order (
    ord_id INT AUTO_INCREMENT,
    ord_date DATETIME NOT NULL,
    ord_pay_date DATETIME,
    ord_bil_lastname VARCHAR(50) NOT NULL,
    ord_bil_firstname VARCHAR(50) NOT NULL,
    ord_bil_phone VARCHAR(10) NOT NULL,
    ord_bil_address VARCHAR(255) NOT NULL,
    ord_bil_zipcode VARCHAR(5) NOT NULL,
    ord_bil_city VARCHAR(50) NOT NULL,
    ord_bil_country VARCHAR(15) NOT NULL,
    ord_del_lastname VARCHAR(50) NOT NULL,
    ord_del_firstname VARCHAR(50) NOT NULL,
    ord_del_phone VARCHAR(10) NOT NULL,
    ord_del_address VARCHAR(255) NOT NULL,
    ord_del_zipcode VARCHAR(5) NOT NULL,
    ord_del_city VARCHAR(50) NOT NULL,
    ord_del_country VARCHAR(15) NOT NULL,
    ord_status VARCHAR(15) NOT NULL,
    ord_discount DECIMAL(4,2),
    use_id INT NOT NULL,
    PRIMARY KEY (ord_id),
    FOREIGN KEY (use_id) REFERENCES vg_user(use_id)
) ENGINE=InnoDB;

CREATE TABLE vg_order_details (
    pro_id INT NOT NULL,
    ord_id INT NOT NULL,
    ode_uni_price DECIMAL(6,2) NOT NULL,
    ode_quantity INT NOT NULL,
    ode_est_date DATETIME COMMENT 'Estimation livraison',
    ode_status VARCHAR(15) NOT NULL,
    PRIMARY KEY (pro_id, ord_id),
    FOREIGN KEY (pro_id) REFERENCES vg_product(pro_id),
    FOREIGN KEY (ord_id) REFERENCES vg_order(ord_id)
) ENGINE=InnoDB;

CREATE TABLE vg_delivery (
    del_id INT AUTO_INCREMENT,
    del_date DATETIME NOT NULL,
    ord_id INT NOT NULL,
    PRIMARY KEY (del_id),
    FOREIGN KEY (ord_id) REFERENCES vg_order(ord_id)
) ENGINE=InnoDB;

CREATE TABLE vg_delivery_details (
    pro_id INT NOT NULL,
    del_id INT NOT NULL,
    PRIMARY KEY (pro_id, del_id),
    FOREIGN KEY (pro_id) REFERENCES vg_product(pro_id),
    FOREIGN KEY (del_id) REFERENCES vg_delivery(del_id)
) ENGINE=InnoDB;