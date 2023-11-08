<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="number"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"], input[type="button"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }

        #result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f9f9f9;
        }

        #category {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>BMI Calculator</h1>
        <form method="post" action="">
            <label for="weight">Weight (kg):</label>
            <input type="number" name="weight" id="weight" required>

            <label for="feet">Height (feet):</label>
            <input type="number" name="feet" id="feet" required>

            <label for="inches">Height (inches):</label>
            <input type="number" name="inches" id="inches" required>

            <input type="submit" value="Calculate BMI">
            <input type="button" value="Clear" onclick="clearForm()">
        </form>

        <?php
        if (isset($_POST['weight']) && isset($_POST['feet']) && isset($_POST['inches'])) {
            $weight = $_POST['weight'];
            $feet = $_POST['feet'];
            $inches = $_POST['inches'];

            $heightInMeters = (($feet * 12) + $inches) * 0.0254;
            $bmi = $weight / ($heightInMeters * $heightInMeters);

            echo "<div id='result'>";
            echo "Your BMI: " . number_format($bmi, 2);
            echo "</div>";

            echo "<div id='category'>";
            echo "BMI Category: ";
            if ($bmi < 18.5) {
                echo "Underweight";
            } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                echo "Normal Weight";
            } elseif ($bmi >= 25 && $bmi < 29.9) {
                echo "Overweight";
            } else {
                echo "Obese";
            }
            echo "</div>";
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Range</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Underweight</td>
                    <td>&lt; 18.5</td>
                </tr>
                <tr>
                    <td>Normal Weight</td>
                    <td>18.5 - 24.9</td>
                </tr>
                <tr>
                    <td>Overweight</td>
                    <td>25 - 29.9</td>
                </tr>
                <tr>
                    <td>Obese</td>
                    <td>&ge; 30</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function clearForm() {
            document.getElementById('weight').value = '';
            document.getElementById('feet').value = '';
            document.getElementById('inches').value = '';
            document.getElementById('result').innerHTML = '';
            document.getElementById('category').innerHTML = '';
            document.getElementById('result').style.display = 'none';
            document.getElementById('category').style.display = 'none';
        }
    </script>
</body>
</html>
