<?php
class databse
{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbName = "my_guitar_shop2";
    protected $sql1 = "CREATE TABLE customers (
        customerID INT NOT NULL AUTO_INCREMENT,
        emailAddress VARCHAR(255) NOT NULL,
        password VARCHAR(60) NOT NULL,
        firstName VARCHAR(60) NOT NULL,
        lastName VARCHAR(60) NOT NULL,
        shipAddressID INT DEFAULT NULL,
        billingAddressID INT DEFAULT NULL,
        PRIMARY KEY (customerID),
        UNIQUE INDEX emailAddress (emailAddress)
        )";
    protected $sql2 = "CREATE TABLE addresses (
        addressID INT NOT NULL AUTO_INCREMENT,
        customerID INT NOT NULL,
        line1 VARCHAR(60) NOT NULL,
        line2 VARCHAR(60) DEFAULT NULL,
        city VARCHAR(40) NOT NULL,
        state VARCHAR(2) NOT NULL,
        zipCode VARCHAR(10) NOT NULL,
        phone VARCHAR(12) NOT NULL,
        disabled TINYINT(1) NOT NULL DEFAULT 0,
        PRIMARY KEY (addressID),
        INDEX customerID (customerID)
        )";
    protected $sql3 = "CREATE TABLE orders (
        orderID INT NOT NULL AUTO_INCREMENT,
        customerID INT NOT NULL,
        orderDate DATETIME NOT NULL,
        shipAmount DECIMAL(10,2) NOT NULL,
        taxAmount DECIMAL(10,2) NOT NULL,
        shipDate DATETIME DEFAULT NULL,
        shipAddressID INT NOT NULL,
        cardType INT NOT NULL,
        cardNumber CHAR(16) NOT NULL,
        cardExpires CHAR(7) NOT NULL,
        billingAddressID INT NOT NULL,
        PRIMARY KEY (orderID),
        INDEX customerID (customerID)
        )";
    protected $sql4 = "CREATE TABLE orderItems (
        itemID INT NOT NULL AUTO_INCREMENT,
        orderID INT NOT NULL,
        productID INT NOT NULL,
        itemPrice DECIMAL(10,2) NOT NULL,
        discountAmount DECIMAL(10,2) NOT NULL,
        quantity INT NOT NULL,
        PRIMARY KEY (itemID),
        INDEX orderID (orderID),
        INDEX productID (productID)
        )";
    protected $sql5 = "CREATE TABLE products (
        productID INT NOT NULL AUTO_INCREMENT,
        categoryID INT NOT NULL,
        productCode VARCHAR(10) NOT NULL,
        productName VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        listPrice DECIMAL(10,2) NOT NULL,
        discountPercent DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        dateAdded DATETIME NOT NULL,
        PRIMARY KEY (productID),
        INDEX categoryID (categoryID),
        UNIQUE INDEX productCode (productCode)
        );";
    protected $sql6 = "CREATE TABLE categories (
        categoryID INT NOT NULL AUTO_INCREMENT,
        categoryName VARCHAR(255) NOT NULL,
        PRIMARY KEY (categoryID)
        )";
    protected $sql7 = "CREATE TABLE administrators (
        adminID INT NOT NULL AUTO_INCREMENT,
        emailAddress VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        firstName VARCHAR(255) NOT NULL,
        lastName VARCHAR(255) NOT NULL,
        PRIMARY KEY (adminID)
        )";
    protected $sqlselect = "SELECT * FROM products";
    protected $sqlselect2 = "SELECT productID, productName, listPrice FROM products ORDER BY listPrice";    
    protected $sqlselect3 = "SELECT productID, productName, listPrice FROM products WHERE listPrice < 450 ORDER BY listPrice";
    protected $sqlselect4 = "SELECT productID, productName, listPrice FROM products WHERE listPrice < 10";
    protected $sqlselect5 = "SELECT productID, productName AS name, listPrice AS price FROM products WHERE listPrice < 450 ORDER BY listPrice";
    protected $sqlselect6 = "SELECT productID, productName name, listPrice price FROM products WHERE listPrice < 450 ORDER BY listPrice";
    protected $sqlselect7 = "SELECT productID AS 'ID', productName AS 'Product Name',listPrice AS 'Price' FROM products WHERE listPrice < 450 ORDER BY listPrice";    
    protected $sqlselect8 = "SELECT productID, productName FROM products LIMIT 3";
    protected $sqlselect9 = "SELECT productID, productName FROM products LIMIT 0, 3";
    protected $sqlselect10 = "SELECT productID, productName FROM products LIMIT 1, 3";
    protected $sqlselect11 = "SELECT productName, listPrice, discountPercent, dateAdded FROM products WHERE (dateAdded > '2017-07-01' OR listPrice <= 1) AND discountPercent >= 1";
    protected $sqlselect12 = "SELECT orderID, orderDate, shipDate FROM orders";
    protected $sqlselect13 = "SELECT orderID, orderDate, shipDate FROM orders WHERE shipDate IS NULL";
    protected $sqlselect14 = "SELECT orderID, orderDate, shipDate FROM orders WHERE shipDate IS NOT NULL";
    protected $sqlselect15 = "SELECT productName, listPrice, discountPercent FROM products WHERE listPrice < 500 ORDER BY listPrice DESC";
    protected $sqlselect16 = "SELECT productName, listPrice, discountPercent FROM products WHERE categoryID = 1 ORDER BY discountPercent, listPrice DESC";
    protected $sqlselect17 = "SELECT firstName, lastName, orderDate FROM customers c INNER JOIN orders o ON c.customerID = o.customerID ORDER BY orderDate";
    protected $sqlselect19 = "SELECT firstName, lastName, o.orderID, productName, itemPrice, quantity FROM customers c INNER JOIN orders o ON c.customerID = o.customerID INNER JOIN orderItems oi ON o.orderID = oi.orderID INNER JOIN products p ON oi.productID = p.productID ORDER BY o.orderID";
    protected $sqlselect20 = "SELECT COUNT(*) AS productCount FROM products";
    protected $sqlselect21 = "SELECT COUNT(*) AS totalCount, COUNT(shipDate) AS shippedCount FROM orders";
    protected $sqlselect22 = "SELECT MIN(listPrice) AS lowestPrice, MAX(listPrice) AS highestPrice, AVG(listPrice) AS averagePrice FROM products";
    protected $sqlselect23 = "SELECT categoryID, COUNT(*) AS productCount,
    AVG(listPrice) AS averageListPrice
    FROM products
    GROUP BY categoryID
    ORDER BY productCount";
    protected $sqlselect24 = "SELECT categoryName, COUNT(*) AS productCount,
    AVG(listPrice) AS averageListPrice
    FROM products p JOIN categories c
    ON p.categoryID = c.categoryID
    GROUP BY categoryName
    HAVING averageListPrice > 400";
    protected $sqlselect25 = "SELECT categoryName, COUNT(*) AS productCount,
    AVG(listPrice) AS averageListPrice
    FROM products p JOIN categories c
    ON p.categoryID = c.categoryID
    WHERE listPrice > 400
    GROUP BY categoryName";
    protected $sqlselect26 = "SELECT productName, listPrice
    FROM products
    WHERE listPrice > (SELECT AVG(listPrice) FROM products)
    ORDER BY listPrice DESC";
    function __construct()
    {
        $this->select($this->servername,$this->username,$this->password,$this->dbName,$this->sqlselect26);
    }
    function select($servername, $username, $password,$dbName ,$sql)
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare($sql);
        $query->execute();
        if ($query->rowCount() > 0) {
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $arrTT = array_keys((array)$result[0]);
            // return json_encode($result);
            echo "<table style='border: 1px solid black;'>";
                echo "<tr>";
                    for ($i=0; $i < count($arrTT); $i++) { 
                        echo "<th>$arrTT[$i]</th>";
                    }
                echo "</tr>";
                for ($i=0; $i < count($result); $i++) { 
                    $arrChild = array_values((array)$result[$i]);
                    echo "<tr>";
                        for ($j=0; $j < count($arrChild); $j++) { 
                            echo "<td>$arrChild[$j]</td>";
                        }
                    echo "</tr>";
                }
            echo "</table>";
        }
    }
    function createDB($servername, $username, $password)
    {
        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE my_guitar_shop2";

            $conn->exec($sql);

            echo "DATABASE CREATE SUCCESSFULLY<br>";
        } catch (PDOException $e) {
            echo "FAULT ==> " . $e->getMessage();
        }
    }
    function createTable($servername, $username, $password, $dbName, $sql)
    {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);

            echo "TABLE CREATE SUCCESSFULLY<br>";
        } catch (PDOException $e) {
            echo "FAULT ==> " . $e->getMessage();
        }
    }
    function insert($servername, $username, $password, $dbName, $sql)
    {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare($sql);
            $query->execute();
            echo "INSERT SUCCESSFULLY<br>";
        } catch (PDOException $e) {
            echo "FAULT ==> " . $e->getMessage();
        }
    }
    function creatRelationShip($servername, $username, $password, $dbName, $sql)
    {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);

            echo "CREATE RELATIONSHIP SUCCESSFULLY<br>";
        } catch (PDOException $e) {
            echo "FAULT ==> " . $e->getMessage();
        }
    }
}
