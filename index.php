<?php
if (isset($_POST['SearchPokemon'])) {
    $input = $_POST['searchInput'];
    $input = strtolower($input);


    $url = "https://pokeapi.co/api/v2/pokemon/$input";
    $pokemonFetch = file_get_contents($url);
    $pokemon = json_decode($pokemonFetch, true);

    $frontSprite = $pokemon['sprites']['front_default'];
    $backSprite = $pokemon['sprites']['back_default'];
    $frontSpriteShiny = $pokemon['sprites']['front_shiny'];
    $backSpriteShiny = $pokemon['sprites']['back_shiny'];
    $frontSpriteFemale = $pokemon['sprites']['front_female'];
    $backSpriteFemale = $pokemon['sprites']['back_female'];
    $frontFemaleShiny = $pokemon['sprites']['front_shiny_female'];
    $backFemaleShiny = $pokemon['sprites']['back_shiny_female'];
    $pokeName = $pokemon['name'];
    $pokeID = $pokemon['id'];
    $type = $pokemon['types']['0']['type']['name'];

    $move1 = $pokemon['moves']['0']['move']['name'];
    $move2 = $pokemon['moves']['1']['move']['name'];
    $move3 = $pokemon['moves']['2']['move']['name'];
    $move4 = $pokemon['moves']['3']['move']['name'];
    $moves = array("$move1", "$move2", "$move3", "$move4");
    //fetching the evolution line url
    $evolutionURL = $pokemon['species']['url'];
    $evoFetch = file_get_contents($evolutionURL);
    $evolution = json_decode($evoFetch, true);

    //fetching the evolution line
    $evoChainUrl = $evolution['evolution_chain']['url'];
    $chainFetch = file_get_contents($evoChainUrl);
    $evoLine = json_decode($chainFetch, true);
    //fetching the names of the evo line
    $baseForm = $evoLine['chain']['species']['name'];
    if (count($evoLine['chain']['evolves_to']) > 0) {
        $middleForm = $evoLine['chain']['evolves_to']['0']['species']['name'];
        if (count($evoLine['chain']['evolves_to']['0']['evolves_to']) > 0) {
            $endForm = $evoLine['chain']['evolves_to']['0']['evolves_to']['0']['species']['name'];
        } else $endForm = "";
    } else $middleForm = "";

    // fetching the sprites
    $baseFormUrl = "https://pokeapi.co/api/v2/pokemon/$baseForm";
    $baseFormSpriteFetch = file_get_contents($baseFormUrl);
    $baseFormFetchReturn = json_decode($baseFormSpriteFetch, true);
    $baseFormSprite = $baseFormFetchReturn['sprites']['other']['home']['front_default'];

    if ($middleForm) {
        $middleFormUrl = "https://pokeapi.co/api/v2/pokemon/$middleForm";
        $middleFormSpriteFetch = file_get_contents($middleFormUrl);
        $middleFormFetchReturn = json_decode($middleFormSpriteFetch, true);
        $middleFormSprite = $middleFormFetchReturn['sprites']['other']['home']['front_default'];
        if ($endForm) {
            $endFormUrl = "https://pokeapi.co/api/v2/pokemon/$endForm";
            $endFormSpriteFetch = file_get_contents($endFormUrl);
            $endFormFetchReturn = json_decode($endFormSpriteFetch, true);
            $endFormSprite = $endFormFetchReturn['sprites']['other']['home']['front_default'];
        }
    }

    //typing variables
    $NormalType = 'normal';
    $FireType = 'fire';
    $WaterType = 'water';
    $ElectricType = 'electric';
    $GrassType = 'grass';
    $IceType = 'ice';
    $FightingType = 'fightin';
    $PoisonType = 'poison';
    $GroundType = 'ground';
    $FlyingType = 'flying';
    $PsychicType = 'psychic';
    $BugType = 'bug';
    $RockType = 'rock';
    $GhostType = 'ghost';
    $DragonType = 'dragon';
    $DarkType = 'dark';
    $SteelType = 'steel';
    $FairyType = 'fairy';

//    types hex colors
//     $Normal = 'A8A77A';
//     $Fire = 'EE8130';
//     $Water = '6390F0';
//     $Electric = 'F7D02C';
//     $Grass = '7AC74C';
//     $Ice = '96D9D6';
//     $Fighting = 'C22E28';
//     $Poison = 'A33EA1';
//     $Ground = 'E2BF65';
//     $Flying = 'A98FF3';
//     $Psychic = 'F95587';
//     $Bug = 'A6B91A';
//     $Rock = 'B6A136';
//     $Ghost = '735797';
//     $Dragon = '6F35FC';
//     $Dark = '705746';
//     $Steel = 'B7B7CE';
//     $Fairy = 'D685AD';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <meta name="description" content="a BeCode exercise: Create a pokédex that displays pokémon using pokeapi.co">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <img src="images/pokemonlogo.png" alt="pokemonlogo">
</header>
<div class="container">
    <h1><img src="images/pokedex.png" alt="title"></h1>
    <form method="post">
        <input id="searchInput" type="text" name="searchInput">
        <input type="submit" value="Search Pokemon" name="SearchPokemon">
        <label for="searchInput"></label>
    </form>
    <div id="pokedex">
        <div class="basicInfo">
            <div id="type/moves">
                <div class="typing"><p>Type: </p>
                    <p><span><?php
                            if (isset($_POST['SearchPokemon'])) {
                                echo $type;
                            } ?></span></p>
                    <p><span><?php
                            if (isset($_POST['SearchPokemon'])) {
                                if (count($pokemon['types']) > 1) {
                                    $type2 = $pokemon['types']['1']['type']['name'];
                                    echo $type2;

                                } else {
                                    echo "";
                                }
                            }
                            ?></span></p>
                </div>
                <div class="moves"><p>Known moves: </p>
                    <p><span id="moves"><?php
                            if (isset($_POST['SearchPokemon'])) {
                                echo implode(", ", $moves);
                            } ?></span></p>
                </div>
            </div>
            <div id="sprites">
                <div id="nameID">
                    <p><span id="name"><?php
                            if (isset($_POST['SearchPokemon'])) {
                                echo $pokeName;
                            } ?>   </span> # <span id="id"><?php
                            if (isset($_POST['SearchPokemon'])) {
                                echo $pokeID;
                            } ?></span>
                    </p>
                </div>
                <p>Male &#9794;/ Genderless</p>
                <img src="
                <?php
                if (isset($_POST['SearchPokemon'])) {
                    echo $frontSprite;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSprite">

                <img src="
                <?php
                if (isset($_POST['SearchPokemon'])) {
                    echo $backSprite;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSprite">

                <img src="
                <?php
                if (isset($_POST['SearchPokemon'])) {
                    echo $frontSpriteShiny;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSpriteShiny">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    echo $backSpriteShiny;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSpriteShiny">
                <p>Female &#9792;</p>

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    echo $frontSpriteFemale;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSpriteFemale">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    echo $backSpriteFemale;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSpriteFemale">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    echo $frontFemaleShiny;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSpriteShinyFemale">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    echo $backSpriteFemale;
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSpriteShinyFemale">

            </div>
        </div>

        <div id="evolutions">
            <p class="evoTitle">Evolution Line</p>
            <div id="evoSprites">
                <div class="base"><img src=" <?php if (isset($_POST['SearchPokemon'])) {
                        echo $baseFormSprite;
                    } else
                        echo "images/pokeball.png" ?>" alt="">
                    <p><span id="base"><?php if (isset($_POST['SearchPokemon'])) {
                                echo $baseForm;
                            } ?>
                    </span></p>
                </div>
                <div class="middle">
                    <img src=" <?php if (isset($_POST['SearchPokemon'])) {
                        if ($middleForm) {
                            echo $middleFormSprite;
                        }else
                            echo 'images/pokeball.png';
                    } else
                        echo 'images/pokeball.png' ?>" alt="">
                    <p><span id="middleEvo"><?php if (isset($_POST['SearchPokemon'])) {
                                if ($middleForm) {
                                    echo $middleForm;
                                }
                            }
                            ?></span></p>
                </div>
                <div class="final">
                    <img src=" <?php if (isset($_POST['SearchPokemon'])) {
                        if ($middleForm) {
                            if ($endForm) {
                                echo $endFormSprite;
                            } else
                                echo 'images/pokeball.png';
                        }else echo 'images/pokeball.png';
                    } else
                        echo 'images/pokeball.png'?>" alt="">
                    <p><span id="finalEvo"><?php if (isset($_POST['SearchPokemon'])) {
                                if ($middleForm) {
                                    if ($endForm) {
                                        echo $endForm;
                                    } else echo "";
                                }
                            } ?></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>