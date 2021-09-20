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
            $investment_amount = $_POST["investment_amount"];
            $year_interest_rate = $_POST["year_interest_rate"];
            $number_of_year = $_POST["number_of_year"];

            $discount = $investment_amount + $investment_amount*($year_interest_rate / 100)*$number_of_year ;

            $linvestment_amount_f = "$".number_format($investment_amount, 2);
            $year_interest_rate_f = $year_interest_rate."%";
            $discount_f = "$".number_format($discount, 2);
        ?>
        <div class="main">
            <h1>Futura Value Calculator</h1>
            <table>
                <tr>
                    <td>
                        <label>Investment Amount: </label>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($linvestment_amount_f); ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Year Interest Rate: </label>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($year_interest_rate_f); ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Number Of Year: </label>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($number_of_year); ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Future Value</label>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($discount_f); ?> 
                    </td>
                </tr>
                </table>          
        </div>
    </body>
</html>