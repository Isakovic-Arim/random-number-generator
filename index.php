<html>
<head>
    <title>Random Number Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $amount = $_POST["amount"];
    $sides  = $_POST["sides"];

    // echo nl2br ($amount . " dice rolled\n");
    // echo nl2br ("dice with " . $sides . " sides rolled\n");
    $result = 0;

    for ($i=0; $i < $amount; $i++) { 
        $result = $result  + rand(0, $sides);
    }
    // echo "Result: " . $result;
    ?>

    <header>
        <h1>Random Number Generator</h1>
    </header>
    <main>
        <form method="POST">
            <fieldset id="assign-amount">
                <legend>Dice to roll</legend>
                <input type="number" name="amount" id="amount" value="<?php echo $amount; ?>" required>
                <label for="amount">Dice</label>
            </fieldset>
            <fieldset id="assign-sides">
                <legend>Sides</legend>
                <select name="sides" required>
                    <option value="<?php echo $sides; ?>"><?php echo $sides; ?> Sides</option>
                    <option value="4">4 Sides</option>
                    <option value="6">6 Sides</option>
                    <option value="8">8 Sides</option>
                    <option value="10">10 Sides</option>
                    <option value="12">12 Sides</option>
                    <option value="20">20 Sides</option>
                </select>
            </fieldset>
            <div id="roll">
                <input type="submit" value="Roll" id="submit">
            </div>
        </form>
        <div id="output">
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
            <div id="result">
                <?php
                echo nl2br ($amount . " dice rolled, each with sides of " . $sides . "\n");
                echo "Result: " . $result;
                ?>
            </div>
        </div>
    </main>
</body>
</html>