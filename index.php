<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/ninja-naruto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>API com curl</title>
</head>
<body>
    <?php
    function exibirPersonagem($char1, $char2, $char3){
        $char = [$char1, $char2, $char3];
        $url = "https://narutodb.xyz/api/character?limit=1431";
        //$char = "/search?name=Naruto%20Uzumaki";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $personagens = json_decode(curl_exec($ch));
        for($i = 0; $i < 3; $i++){
            foreach ($personagens->characters as $personagem) {
                if($personagem->name == $char[$i]){
                    echo "<div class='personagem'>";
                    echo "<h2>" . $personagem->name . "</h2>";
                    echo '<img src="' . $personagem->images[0] . '" alt="' . $personagem->name . '">';
                    echo "<ul>";
                    for($j = 0; $j < 5; $j++) {
                        echo "<li>" . $personagem->jutsu[$j] . "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                }
            }
        } 
    }
    echo "<div id='grupoPersonagens'>";
    echo "<div id='titulo'><h1>Personagens Naruto</h1></div>";
    exibirPersonagem("Might Guy", "Rock Lee", "Killer B" );
    echo "</div>";
    ?>
</body>
</html>