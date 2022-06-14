<?php


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
    <form action ="index.php" method="post">
        <label for="searchInput"></label>
        <input id="searchInput" type="text" name="search" placeholder="Search a pokemon"/>
        <input type="submit" value=">>">
    </form>
    <div id="pokedex">
        <div class="basicInfo">
            <div id="type/moves">
                <div class="typing"><p>Type: </p>
                    <p><span id="type"></span></p>
                </div>
                <div class="moves"><p>Known moves: </p>
                    <p><span id="moves"></span></p>
                </div>
            </div>
            <div id="sprites">
                <div id="nameID">
                    <p><span id="name">   </span> # <span id="id"></span></p>
                </div>
                <p>Male &#9794;/ Genderless</p>
                <img src="images/pokeball.png" alt="" id="frontSprite">
                <img src="images/pokeball.png" alt="" id="backSprite">
                <img src="images/pokeball.png" alt="" id="frontSpriteShiny">
                <img src="images/pokeball.png" alt="" id="backSpriteShiny">
                <p>Female &#9792;</p>
                <img src="images/pokeball.png" alt="" id="frontSpriteFemale">
                <img src="images/pokeball.png" alt="" id="backSpriteFemale">
                <img src="images/pokeball.png" alt="" id="frontSpriteShinyFemale">
                <img src="images/pokeball.png" alt="" id="backSpriteShinyFemale">
            </div>
        </div>

        <div id="evolutions">
            <p class="evoTitle">Evolution Line</p>
            <div id="evoSprites">
                <div class="base"><img src="images/pokeball.png" alt="" id="baseForm">
                    <p><span id="base"></span></p>
                </div>
                <div class="middle">
                    <img src="images/pokeball.png" alt="" id="middleForm">
                    <p><span id="middleEvo"></span></p>
                </div>
                <div class="final">
                    <img src="images/pokeball.png" alt="" id="finalForm">
                    <p><span id="finalEvo"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
