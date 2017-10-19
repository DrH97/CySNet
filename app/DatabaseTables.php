<?php
/**
 * Created by PhpStorm.
 * User: josen
 * Date: 19-Oct-17
 * Time: 8:22 PM
 */

class DatabaseTables
{
$users = "CREATE TABLE users (
 id int(10) unsigned NOT NULL AUTO_INCREMENT,
 username varchar(191) COLLATE NOT NULL,
 firstname varchar(191) COLLATE NOT NULL,
 lastname varchar(191) COLLATE NOT NULL,
 gender varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 mobile int(11) NOT NULL,
 email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 password varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 created_at timestamp NULL DEFAULT NULL,
 updated_at timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `users_email_unique` (`email`)
)";



}