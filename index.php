<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Random Number Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    if (!isset($_SESSION["results"])) {
        $_SESSION["results"] = array();
    }

    if (!isset($_SESSION["total"])) {
        $_SESSION["total"] = 0;
    }

    if (isset($_POST["submit"])) {
        // Checking for isset here is not necessary due to 
        // the preexisting form validation in the mainpage
        $amount = $_POST["amount"];
        $sides  = $_POST["sides"];

        $result = new stdClass;
        $result->dice = $amount;
        $result->sides = $sides;
        $result->outcome = 0;

        for ($i=0; $i < $amount; $i++) { 
            $result->outcome += rand(1, $sides);
        }

        // is faster than array_push
        $_SESSION["results"][] = $result;

        $_SESSION["total"] += $amount;
    }

    if (isset($_POST["clear"])) {
        $_SESSION["results"] = array();
        $_SESSION["total"] = 0;
    }
    ?>

    <header>
    <div class="wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" 
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                    <g fill="currentColor">
                        <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 
                        0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>
                        <path d="M5.5 4a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0a1.5 1.5 
                        0 0 1 3 0zm-4-4a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0z"/>
                    </g>
                </svg>
            </div>
        <h1>Random Number Generator</h1>
    </header>
    <main>
        <form method="POST">
            <fieldset id="assign-amount">
                <legend>Dice to roll</legend>
                <input type="number" name="amount" id="amount" value="<?php echo $amount; ?>" min="1" required>
            </fieldset>
            <fieldset id="assign-sides">
                <legend>Sides</legend>
                <select name="sides" required>
                    <option value="4">4 Sides</option>
                    <option value="6" selected>6 Sides</option>
                    <option value="8">8 Sides</option>
                    <option value="10">10 Sides</option>
                    <option value="12">12 Sides</option>
                    <option value="20">20 Sides</option>
                </select>
            </fieldset>
            <div id="roll">
                <input type="submit" name="submit" value="Roll" id="submit">
                <input type="submit" name="clear" value="Clear" id="clear">
            </div>
        </form>
        <div id="output">
                <?php
                    $counter = 0;
                    foreach ($_SESSION["results"] as $content) {
                        $counter++;
                        echo "<div>";
                        echo "<strong>Roll "   . $counter . "</strong>";
                        echo "<p>Dice: "    . $content->dice . "</p>";
                        echo "<p>Sides: "   . $content->sides . "</p>";
                        echo "<p>Result: " . $content->outcome . "</p>";
                        echo "</div>";
                    }
                ?>
        </div>
        <?php echo "<strong>Total dice rolled: </strong>" . $_SESSION["total"]; ?>
    </main>

    <script>
        // AJAX implementation follows
        
        // const submitBtn = document.getElementById('submit');
        // submitBtn.addEventListener('click', addResults);
        
        // const grid = document.getElementById('output');
        
        // async function addResults() {
        //     const xmlhttp = new XMLHttpRequest();
        //     await xmlhttp.onload = function() {
            
        //     }
        // }
    </script>
</body>
</html>