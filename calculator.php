<!DOCTYPE html>
<html>
<head>
    <title>IAN Calculator</title>
    <style>
        body {
            background-color: skyblue;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h2>ian simiyu Calculator</h2>
    <form method="post">
        <input type="number" step="any" name="num1" required placeholder="Enter first number"><br>
        <input type="number" step="any" name="num2" placeholder="Enter second number (if needed)"><br>
        <select name="operation">
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (*)</option>
            <option value="divide">Division (/)</option>
            <option value="exponent">Exponentiation (^)</option>
            <option value="percentage">Percentage (%)</option>
            <option value="sqrt">Square Root (√)</option>
            <option value="log">Logarithm (log)</option>
        </select><br>
        <input type="submit" value="Calculate">
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = '';
    
        if (is_numeric($num1) && ($operation == 'sqrt' || is_numeric($num2))) {
            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    $result = ($num2 != 0) ? $num1 / $num2 : "Error: Division by zero";
                    break;
                case "exponent":
                    $result = pow($num1, $num2);
                    break;
                case "percentage":
                    $result = ($num1 / 100) * $num2;
                    break;
                case "sqrt":
                    $result = sqrt($num1);
                    break;
                case "log":
                    $result = ($num1 > 0) ? log($num1) : "Error: Logarithm of non-positive number";
                    break;
                default:
                    $result = "Invalid operation";
            }
        } else {
            $result = "Invalid input";
        }
        echo "<h3>Result: $result</h3>";
    }
    ?>
</body>
</html>
