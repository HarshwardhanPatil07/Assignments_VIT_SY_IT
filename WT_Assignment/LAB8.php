<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Simple Calculator</h1>
    <form method="post" action="">
        <input type="number" name="num1" placeholder="Enter first number" required><br><br>
        <input type="number" name="num2" placeholder="Enter second number" required><br><br>
        <select name="operator" required>
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="">Multiplication ()</option>
            <option value="/">Division (/)</option>
        </select><br><br>
        <input type="submit" name="calculate" value="Calculate">
    </form>


    <?php
    if (isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];


        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    echo "Error: Division by zero is not allowed.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                echo "Invalid operator";
        }


        if (isset($result)) {
            echo '<div style="border: 1px solid #ccc; padding: 10px; width: 200px;margin: 10px;">';
            echo "Result: $num1 $operator $num2 = $result";
            echo '</div>';
        }
        
    }
    ?>



</body>
</html>