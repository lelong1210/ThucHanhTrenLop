<html>
    <head>
        <style>
            .main{
                background-color: aqua;
                border-style: solid;
                max-width: 400px;
                margin: 10%;
            }
            
        </style>
    </head>
    <body>
        <?php
            $product_description = $_POST["product_description"];
            $list_price = $_POST["list_price"];
            $discount_percent = $_POST["discount_percent"];

            $discount = $list_price * $discount_percent * .01;
            $discount_price = $list_price - $discount;

            $list_price_f = "$".number_format($list_price, 2);
            $discount_percent_f = $discount_percent."%";
            $discount_f = "$".number_format($discount, 2);
            $discount_price_f = "$".number_format($discount_price, 2);
        ?>
        <div class="main">
            <table>
            <h1>Procduct Discount Caculate</h1>
                <tr>
                    <td>
                        <label>Product Description:</label>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($product_description); ?> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>List Price:</label>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($list_price_f); ?> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Standard Discount:</label>
                    </td>
                    <td>    
                        <?php echo htmlspecialchars($discount_percent_f); ?> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Discount Amount:</label>
                    </td>
                    <td>
                        <?php echo $discount_f; ?> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Discount Price:</label>
                    </td>   
                    <td>
                        <?php echo $discount_price_f; ?> <br>
                    </td>
                </tr>
            </table>
            
            
            
           
           
        </div>
    </body>
</html>