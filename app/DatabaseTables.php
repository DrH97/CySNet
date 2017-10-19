<?php
/**
 * Created by PhpStorm.
 * User: josen
 * Date: 19-Oct-17
 * Time: 8:22 PM
 */

class DatabaseTables extends DatabaseSchema
{
    var $users = "CREATE TABLE users (
        id int(10) unsigned NOT NULL AUTO_INCREMENT,
        username varchar(191) NOT NULL,
        firstname varchar(191) NOT NULL,
        lastname varchar(191) NOT NULL,
        gender varchar(191) NOT NULL,
        repairer BOOLEAN NOT NULL,
        active BOOLEAN NOT NULL,
        mobile int(11) NOT NULL,
        email varchar(191) NOT NULL,
        password varchar(191) NOT NULL,
        remember_token varchar(100) DEFAULT NULL,
        created_at timestamp NULL DEFAULT NULL,
        updated_at timestamp NULL DEFAULT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY users_email_unique (email)
    )";

    var $admins = "CREATE TABLE admins (
        id int(10) unsigned NOT NULL AUTO_INCREMENT,
        firstname varchar(191) NOT NULL,
        lastname varchar(191) NOT NULL,
        email varchar(191) NOT NULL,
        password varchar(191) NOT NULL,
        remember_token varchar(100) DEFAULT NULL,
        created_at timestamp NULL DEFAULT NULL,
        updated_at timestamp NULL DEFAULT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY admins_email_unique (email)
    )";


    var $categories = "CREATE TABLE categories (
        id int(10) unsigned NOT NULL AUTO_INCREMENT,
        category varchar(191) NOT NULL,
        created_at timestamp NULL DEFAULT NULL,
        updated_at timestamp NULL DEFAULT NULL,
        PRIMARY KEY (id)
    )";


    var $hardware_products = "CREATE TABLE hardware_products (
        id int(10) unsigned NOT NULL AUTO_INCREMENT,
        code varchar(191) NOT NULL,
        productname varchar(191) NOT NULL,
        description varchar(191) NOT NULL,
        categoryid int(10) unsigned NOT NULL,
        image varchar(191) NOT NULL,
        quantity int(11) NOT NULL,
        price int(11) NOT NULL,
        sellerid int(10) unsigned NOT NULL,
        created_at timestamp NULL DEFAULT NULL,
        updated_at timestamp NULL DEFAULT NULL,
        PRIMARY KEY (id),
        KEY hardware_products_categoryid_foreign (categoryid),
        KEY hardware_products_sellerid_foreign (sellerid),
        CONSTRAINT hardware_products_categoryid_foreign FOREIGN KEY (categoryid) REFERENCES categories (id),
        CONSTRAINT hardware_products_sellerid_foreign FOREIGN KEY (sellerid) REFERENCES users (id)
    ) ";


    var $password_resets ="CREATE TABLE password_resets (
        email varchar(191) NOT NULL,
        token varchar(191) NOT NULL,
        created_at timestamp NULL DEFAULT NULL,
        KEY password_resets_email_index (email)
    )";

    function createTables(){
        $table1 = DatabaseSchema::class.$this->create_table($this->users);
        $table1 = DatabaseSchema::class.$this->create_table($this->admins);
        $table1 = DatabaseSchema::class.$this->create_table($this->password_resets);
        $table1 = DatabaseSchema::class.$this->create_table($this->categories);
        $table1 = DatabaseSchema::class.$this->create_table($this->hardware_products);

    }
}