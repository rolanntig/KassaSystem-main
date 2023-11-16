<?php 
    //This class will be used to create the tables if for some reason it does not exist.
    // Don't use this class unless you know what you are doing.
    
   class Emergancy_DB_Creator{
        //3 Sets of functions for the creation of tables for the database.
        //Creates a table called "Admin".
        function AdminTableCreate() {
            $sqliTableAdminCreate = "CREATE TABLE IF NOT EXISTS `Admin`(
                `ID` MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `username`  VARCHAR(40) NOT NULL,
                `password`  VARCHAR(150)NOT NULL,
                `last_login`VARCHAR(40) NOT NULL,
                `user_agent`VARCHAR(100)NOT NULL,
                `reg_date`TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            return $sqliTableAdminCreate;
        }

        //Creates a table called "Products".
        function ProductTableCreate() {
            $sqliTableProductCreate = "CREATE TABLE IF NOT EXISTS `Products`(
                `ID` MEDIUMINT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `product_name`  VARCHAR(40) NOT NULL,
                `product_info`  VARCHAR(20) NOT NULL,
                `expire_date`   DATETIME,
                `price`         VARCHAR(15) NOT NULL,
                `barcode`       VARCHAR(25) NOT NULL,
                `amount`        VARCHAR(10) NOT NULL,
                `category`      VARCHAR(20) NOT NULL
            )";
            return $sqliTableProductCreate;
        }

        //Creates a table called "Payment".
        function PaymentTableCreate() {
            $sqliTablePaymentCreateQuery = "CREATE TABLE IF NOT EXISTS `Payment`(
                `ID` MEDIUMINT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `product_name`  VARCHAR(60)  NOT NULL,
                `amount_sold`   VARCHAR(100) NOT NULL,
                `payment_method`VARCHAR(40)  NOT NULL,
                `payment_date`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";  
            return $sqliTablePaymentCreateQuery;      
        }

    }


?>