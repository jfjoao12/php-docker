<?php 

if ($grabData['usertype'] !== 'admin') {
    echo "You are not authorized to access this page.";
    exit();
}

function validateInputs() {
    $inputs = ["number_of_targets", "duration_time", "time_alive", 
                "target_size", "game_name", "game_type", "game_description"];
    foreach ($inputs as $input) {
        if (empty($_POST[$input])) {
            return false;
        }
    }
    return true;
}

if (validateInputs()) {
    $number_of_targets = sanitizeInput($_POST['number_of_targets']);
    $duration_time = sanitizeInput($_POST['duration_time']);
    $time_alive = sanitizeInput($_POST['time_alive']);
    $target_size = sanitizeInput($_POST['target_size']);
    $multiple_targets = isset($_POST['multiple_targets']) ? 1 : 0;

    // Prepare and execute the SQL query for game_data table
    $queryGameData = "INSERT INTO game_data 
                        (number_of_targets, multiple_targets, duration_time, time_alive, target_size) 
                      VALUES 
                        (:number_of_targets, :multiple_targets, :duration_time, :time_alive, :target_size)";
    $statementGameData = $db->prepare($queryGameData);
    $statementGameData->bindParam(':number_of_targets', $number_of_targets);
    $statementGameData->bindParam(':duration_time', $duration_time);
    $statementGameData->bindParam(':time_alive', $time_alive);
    $statementGameData->bindParam(':target_size', $target_size);
    $statementGameData->bindParam(':multiple_targets', $multiple_targets);

    if ($statementGameData->execute()) {
        $user_id = $_SESSION['user_id'];
        $game_data_id = $db->lastInsertId();
        $game_name = sanitizeInput($_POST['game_name']);
        $game_type = sanitizeInput($_POST['game_type']);
        $game_description = sanitizeInput($_POST['game_description']);

        $slug = isset($_POST['slug_checkbox']) 
        ? sanitizeInput(createSlug($game_name))
        : sanitizeInput(createSlug($_POST['slug_textbox']));
        // $slug = createSlug($game_name);

        $queryGames = "INSERT INTO games 
                        (user_id, game_data_id, game_name, game_type, game_description) 
                       VALUES 
                        (:user_id, :game_data_id, :game_name, :game_type, :game_description)";
        $statementGames = $db->prepare($queryGames);
        $statementGames->bindParam(':user_id', $user_id);
        $statementGames->bindParam(':game_data_id', $game_data_id);
        $statementGames->bindParam(':game_name', $game_name);
        $statementGames->bindParam(':game_type', $game_type);
        $statementGames->bindParam(':game_description', $game_description);

        if ($statementGames->execute()) {
            $date = date("Y-m-d H:i:s"); 
            $queryPages = "INSERT INTO pages (user_id, game_id, tag_id, date, slug) VALUES (:user_id, :game_id, :tag_id, :date, :slug)";
            $game_id =  $db->lastInsertId();
            $statementPages = $db->prepare($queryPages);
            $statementPages->bindParam(':user_id', $user_id);
            $statementPages->bindParam(':game_id', $game_id);
            $statementPages->bindParam(':tag_id', $tag_id); 
            $statementPages->bindParam(':date', $date);
            $statementPages->bindParam(':slug', $slug);


            
            if ($statementPages->execute()) {
                echo "Page data inserted successfully.";
            } else {
                echo "Error inserting page data.";
            }
        } else {
            echo "Error inserting game data.";
        }
    } else {
        echo "Error inserting game data.";
    }
}   

function createSlug($slugText) {
    $slugInsert = strtolower(str_replace(' ', '-', $slugText));
    $slugQuery = execute_query("SELECT slug FROM pages WHERE slug = :slugInsert ORDER BY slug DESC",
                              [":slugInsert" => $slugInsert]);
    $i = 0 ;

    while($slugQuery->fetch()){
        $i += 1;
        $slugInsert = strtolower(str_replace(' ', '-', $slugText)) .  "$i";
        $slugQuery = execute_query("SELECT slug FROM pages WHERE slug LIKE :slugInsert ORDER BY slug DESC",
                              [":slugInsert" => $slugInsert]);
    }

    
    return $slugInsert;
}



echo createSlug("Game-Test-For-Search");



?>

    <h1> Create your game </h1>

    <div class="def-con" id="insert-game-con">
    <!-- Insert GAME DATA -->

     <form  method="post" action="?p=insert" onsubmit="setDefaultNumberOfTargets();">
        <h2> Game data</h2>

        <label for="multiple_targets">Multiple Targets </label>
        <input type="checkbox" name="multiple_targets" id="multiple_targets" onclick="toggleNumberInput();">

        <label for="number_of_targets">Number of targets: </label>
        <input type="number" id="number_of_targets" name="number_of_targets" value="1" disabled>

        <label for="duration_time">Duration time (miliseconds): </label>
        <input type="number" id="duration_time" name="duration_time" value="1000">
     
        <label for="time_alive">Time alive (milliseconds): </label>
        <input type="number" id="time_alive" name="time_alive" value="1000">

        <label for="target_size"> Target size (px): </label>
        <input type="number" id="target_size" name="target_size" value="30">

        <h2>Game Info </h2>

        <label for="game_name">Game Name: </label>
        <input type="text" id="game_name" name="game_name">

        <label for="game_type">Game Type: </label>
        <input type="text" id="game_type" name="game_type">

        <label for="game_description">Game Description:</label>
        <textarea id="game_description" name="game_description"></textarea>

        <label for="slug_checkbox">Automatic Slug Creation</label>
        <input type="checkbox" name="slug_checkbox" id="slug_checkbox" onclick="toggleSlugChoice();">
        <input type="text" id="slug_textbox" name="slug_textbox">

        <input type="submit">
    </form>


    </div>

    <script>
        function toggleNumberInput() {
            let numberInput = document.getElementById("number_of_targets");

            var checkbox = document.getElementById("multiple_targets");
            
            if (checkbox.checked) {
                numberInput.disabled = false;
                numberInput.value = "2"; 
            } else {
                numberInput.disabled = true;
                numberInput.value = "1";
            }
        }

        function setDefaultNumberOfTargets() {
            var checkbox = document.getElementById("multiple_targets");
            var numberInput = document.getElementById("number_of_targets");
            if (!checkbox.checked) {
                numberInput.disabled = false;
                numberInput.value = "1"; 
            }
        }

        function toggleSlugChoice() {
            var slugTextBox = document.getElementById("slug_textbox");
            var slugCheckBox = document.getElementById("slug_checkbox");

            // Shorthand if is amazing!
            slugCheckBox.checked  
            ? 
                (
                    slugTextBox.disabled = true,
                    slugTextBox.style.textAlign = "center",
                    slugTextBox.placeholder = "slug based on the title"
                )

            : 
                (
                    slugTextBox.disabled = false,
                    slugTextBox.style.textAlign = "none",
                    slugTextBox.placeholder = ""
                ) ;
        }
        
    </script>