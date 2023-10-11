<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        
        h1 {
            color: #333;
        }

        form {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            /* background-color: #f0f0f0; */
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);
        }

        input[type="text"], input[type="submit"] {
            margin: 5px;
            padding: 5px;
        }

        input[type="text"] {
            width: 90%;
        }

        input[type="submit"] {
            width: 40px;
            height: 40px;
            font-size: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 50%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        div.result {
            margin-top: 10px;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Calculator</h1>
    <form method="POST" action="">
        <input type="text" name="num1" placeholder="Enter number 1" required>
        <input type="text" name="num2" placeholder="Enter number 2" required>
        <br><br>
        <div>
            <input type="submit" name="add" value="+">
            <input type="submit" name="subtract" value="-">
            <input type="submit" name="multiply" value="*">
            <input type="submit" name="divide" value="/">
        </div>
    </form>

    <?php
    if (isset($_POST['add'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $num1 + $num2;
    } elseif (isset($_POST['subtract'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $num1 - $num2;
    } elseif (isset($_POST['multiply'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $num1 * $num2;
    } elseif (isset($_POST['divide'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        if ($num2 == 0) {
            $result = "Cannot divide by zero!";
        } else {
            $result = $num1 / $num2;
        }
    }
    ?>

    <div>
        <p>Result: <?php if (isset($result)) echo $result; ?></p>
    </div>
</body>
</html>
