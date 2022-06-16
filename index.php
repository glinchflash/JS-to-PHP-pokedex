<?php

if (isset($_POST['SearchPokemon'])) {
    $input = $_POST['searchInput'];
    if ($input === 'darmanitan' || $input === 555){
        $input = 'darmanitan-standard';
    }
    $input = strtolower($input);


    $url = "https://pokeapi.co/api/v2/pokemon/$input";
    $pokemonFetch = file_get_contents($url);
    $pokemon = json_decode($pokemonFetch, true);

    if ($input=== "darmanitan-standard"){
        $pokeName = "darmanitan";
    }else $pokeName = $pokemon['name'];

    $pokeAbility = $pokemon['abilities']['0']['ability']['name'];
    $pokeID = $pokemon['id'];
    $frontSprite = $pokemon['sprites']['front_default'];
    $backSprite = $pokemon['sprites']['back_default'];
    $frontSpriteShiny = $pokemon['sprites']['front_shiny'];
    $backSpriteShiny = $pokemon['sprites']['back_shiny'];
    $frontSpriteFemale = $pokemon['sprites']['front_female'];
    $backSpriteFemale = $pokemon['sprites']['back_female'];
    $frontFemaleShiny = $pokemon['sprites']['front_shiny_female'];
    $backFemaleShiny = $pokemon['sprites']['back_shiny_female'];

    $type = $pokemon['types']['0']['type']['name'];

    if (count($pokemon['moves']) > 1) {
        $move1 = $pokemon['moves']['0']['move']['name'];
        $move2 = $pokemon['moves']['1']['move']['name'];
        $move3 = $pokemon['moves']['2']['move']['name'];
        $move4 = $pokemon['moves']['3']['move']['name'];
        $moves = array("$move1", "$move2", "$move3", "$move4");
    } else if (count($pokemon['moves']) === 1) {
        $moves = $pokemon['moves']['0']['move']['name'];
    }

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
        if (count($evoLine['chain']['evolves_to']) > 1) {
           $middleForm2 = $evoLine['chain']['evolves_to']['1']['species']['name'];
            if (count($evoLine['chain']['evolves_to']) > 7){
                $middleForm3 = $evoLine['chain']['evolves_to']['2']['species']['name'];
                $middleForm4 = $evoLine['chain']['evolves_to']['3']['species']['name'];
                $middleForm5 = $evoLine['chain']['evolves_to']['4']['species']['name'];
                $middleForm6 = $evoLine['chain']['evolves_to']['5']['species']['name'];
                $middleForm7 = $evoLine['chain']['evolves_to']['6']['species']['name'];
                $middleForm8 = $evoLine['chain']['evolves_to']['7']['species']['name'];
            }else {
                $middleForm3 = "";
                $middleForm4 = "";
                $middleForm5 = "";
                $middleForm6 = "";
                $middleForm7 = "";
                $middleForm8 = "";
            }
        } else $middleForm2 = "";
        if (count($evoLine['chain']['evolves_to']['0']['evolves_to']) > 0) {
            $endForm = $evoLine['chain']['evolves_to']['0']['evolves_to']['0']['species']['name'];
            if (count($evoLine['chain']['evolves_to']) > 1) {
                $endForm2 = $evoLine['chain']['evolves_to']['1']['evolves_to']['0']['species']['name'];
            } else $endForm2 = "";
        } else $endForm = "";
    } else $middleForm = "";

    // fetching the sprites
    $baseFormUrl = "https://pokeapi.co/api/v2/pokemon/$baseForm";
    $baseFormSpriteFetch = file_get_contents($baseFormUrl);
    $baseFormFetchReturn = json_decode($baseFormSpriteFetch, true);
    $baseFormSprite = $baseFormFetchReturn['sprites']['other']['home']['front_default'];
    if ($middleForm === "darmanitan"){
        $middleForm = "darmanitan-standard";
    }
    if ($middleForm) {
        $middleFormUrl = "https://pokeapi.co/api/v2/pokemon/$middleForm";
        $middleFormSpriteFetch = file_get_contents($middleFormUrl);
        $middleFormFetchReturn = json_decode($middleFormSpriteFetch, true);
        $middleFormSprite = $middleFormFetchReturn['sprites']['other']['home']['front_default'];
        if ($middleForm2) {
            $middleForm2Url = "https://pokeapi.co/api/v2/pokemon/$middleForm2";
            $middleForm2SpriteFetch = file_get_contents($middleForm2Url);
            $middleForm2FetchReturn = json_decode($middleForm2SpriteFetch, true);
            $middleForm2Sprite = $middleForm2FetchReturn['sprites']['other']['home']['front_default'];
            if ($middleForm3){
                $middleForm3Url = "https://pokeapi.co/api/v2/pokemon/$middleForm3";
                $middleForm3SpriteFetch = file_get_contents($middleForm3Url);
                $middleForm3FetchReturn = json_decode($middleForm3SpriteFetch, true);
                $middleForm3Sprite = $middleForm3FetchReturn['sprites']['other']['home']['front_default'];

                $middleForm4Url = "https://pokeapi.co/api/v2/pokemon/$middleForm4";
                $middleForm4SpriteFetch = file_get_contents($middleForm4Url);
                $middleForm4FetchReturn = json_decode($middleForm4SpriteFetch, true);;
                $middleForm4Sprite = $middleForm4FetchReturn['sprites']['other']['home']['front_default'];

                $middleForm5Url = "https://pokeapi.co/api/v2/pokemon/$middleForm5";
                $middleForm5SpriteFetch = file_get_contents($middleForm5Url);
                $middleForm5FetchReturn = json_decode($middleForm5SpriteFetch, true);
                $middleForm5Sprite = $middleForm5FetchReturn['sprites']['other']['home']['front_default'];

                $middleForm6Url = "https://pokeapi.co/api/v2/pokemon/$middleForm6";
                $middleForm6SpriteFetch = file_get_contents($middleForm6Url);
                $middleForm6FetchReturn = json_decode($middleForm6SpriteFetch, true);
                $middleForm6Sprite = $middleForm6FetchReturn['sprites']['other']['home']['front_default'];

                $middleForm7Url = "https://pokeapi.co/api/v2/pokemon/$middleForm7";
                $middleForm7SpriteFetch = file_get_contents($middleForm7Url);
                $middleForm7FetchReturn = json_decode($middleForm7SpriteFetch, true);
                $middleForm7Sprite = $middleForm7FetchReturn['sprites']['other']['home']['front_default'];

                $middleForm8Url = "https://pokeapi.co/api/v2/pokemon/$middleForm8";
                $middleForm8SpriteFetch = file_get_contents($middleForm8Url);
                $middleForm8FetchReturn = json_decode($middleForm8SpriteFetch, true);
                $middleForm8Sprite = $middleForm8FetchReturn['sprites']['other']['home']['front_default'];
            }
        }
        if ($endForm) {
            $endFormUrl = "https://pokeapi.co/api/v2/pokemon/$endForm";
            $endFormSpriteFetch = file_get_contents($endFormUrl);
            $endFormFetchReturn = json_decode($endFormSpriteFetch, true);
            $endFormSprite = $endFormFetchReturn['sprites']['other']['home']['front_default'];
            if ($endForm2) {
                $endForm2Url = "https://pokeapi.co/api/v2/pokemon/$endForm2";
                $endForm2SpriteFetch = file_get_contents($endForm2Url);
                $endForm2FetchReturn = json_decode($endForm2SpriteFetch, true);
                $endForm2Sprite = $endForm2FetchReturn['sprites']['other']['home']['front_default'];
            }
        }
    }

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
                                switch ($type) {
                                    case 'normal':
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #A8A77A ;
                                           } .basicInfo #sprites{
                                           background-color: #A8A77A;
                                           }  #evoSprites{
                                           background-color: #A8A77A ;
                                           } 
                                            #evolutions{
                                           background-color: #A8A77A;
                                           }</style >";
                                        break;
                                    case "fire" :
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #EE8130 ;
                                           } .basicInfo #sprites{
                                           background-color: #EE8130;
                                           }  #evoSprites{
                                           background-color: #EE8130 ;
                                           } 
                                            #evolutions{
                                           background-color: #EE8130;
                                           }</style >";
                                        break;
                                    case "water" :
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #6390F0 ;
                                           } .basicInfo #sprites{
                                           background-color: #6390F0;
                                           }  #evoSprites{
                                           background-color: #6390F0 ;
                                           } 
                                            #evolutions{
                                           background-color: #6390F0;
                                           }</style >";
                                        break;
                                    case "grass":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #7AC74C ;
                                           } .basicInfo #sprites{
                                           background-color: #7AC74C;
                                           }  #evoSprites{
                                           background-color: #7AC74C ;
                                           } 
                                            #evolutions{
                                           background-color: #7AC74C;
                                           }</style >";
                                        break;
                                    case "electric":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #F7D02C ;
                                           } .basicInfo #sprites{
                                           background-color: #F7D02C;
                                           }  #evoSprites{
                                           background-color: #F7D02C ;
                                           } 
                                            #evolutions{
                                           background-color: #F7D02C;
                                           }</style >";
                                        break;
                                    case "ice":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #96D9D6 ;
                                           } .basicInfo #sprites{
                                           background-color: #96D9D6;
                                           }  #evoSprites{
                                           background-color: #96D9D6 ;
                                           } 
                                            #evolutions{
                                           background-color: #96D9D6;
                                           }</style >";
                                        break;
                                    case "fighting":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #C22E28 ;
                                           }.basicInfo #sprites{
                                           background-color: #C22E28;
                                           }  #evoSprites{
                                           background-color: #C22E28 ;
                                           } 
                                            #evolutions{
                                           background-color: #C22E28;
                                           } </style >";
                                        break;
                                    case "poison":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #A33EA1 ;
                                           } .basicInfo #sprites{
                                           background-color: #A33EA1;
                                           }  #evoSprites{
                                           background-color: #A33EA1 ;
                                           } 
                                            #evolutions{
                                           background-color: #A33EA1;
                                           }</style >";
                                        break;
                                    case "ground":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #E2BF65 ;
                                           } .basicInfo #sprites{
                                           background-color: #E2BF65;
                                           }  #evoSprites{
                                           background-color: #E2BF65 ;
                                           } 
                                            #evolutions{
                                           background-color: #E2BF65;
                                           }</style >";
                                        break;
                                    case "flying":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #A98FF3 ;
                                           } .basicInfo #sprites{
                                           background-color: #A98FF3;
                                           }  #evoSprites{
                                           background-color: #A98FF3 ;
                                           } 
                                            #evolutions{
                                           background-color: #A98FF3;
                                           }</style >";
                                        break;
                                    case "psychic":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #F95587 ;
                                           } .basicInfo #sprites{
                                           background-color: #F95587;
                                           }  #evoSprites{
                                           background-color: #F95587 ;
                                           } 
                                            #evolutions{
                                           background-color: #F95587;
                                           }</style >";
                                        break;
                                    case "bug":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #A6B91A ;
                                           } .basicInfo #sprites{
                                           background-color: #A6B91A;
                                           }  #evoSprites{
                                           background-color: #A6B91A ;
                                           } 
                                            #evolutions{
                                           background-color: #A6B91A;
                                           }</style >";
                                        break;
                                    case "rock":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #B6A136 ;
                                           } .basicInfo #sprites{
                                           background-color: #B6A136;
                                           }  #evoSprites{
                                           background-color: #B6A136 ;
                                           } 
                                            #evolutions{
                                           background-color: #B6A136;
                                           }</style >";
                                        break;
                                    case "ghost":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #735797 ;
                                           } .basicInfo #sprites{
                                           background-color: #735797;
                                           }  #evoSprites{
                                           background-color: #735797 ;
                                           } 
                                            #evolutions{
                                           background-color: #735797;
                                           }</style >";
                                        break;
                                    case "dragon":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #6F35FC ;
                                           }.basicInfo #sprites{
                                           background-color: #6F35FC;
                                           }  #evoSprites{
                                           background-color: #6F35FC ;
                                           } 
                                            #evolutions{
                                           background-color: #6F35FC;
                                           } </style >";
                                        break;
                                    case "dark":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #705746 ;
                                           } 
                                           .basicInfo #sprites{
                                           background-color: #705746;
                                           }  #evoSprites{
                                           background-color: #705746 ;
                                           } 
                                            #evolutions{
                                           background-color: #705746;
                                           }</style >";
                                        break;
                                    case "steel":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #B7B7CE ;
                                           } 
                                           .basicInfo #sprites{
                                           background-color: #B7B7CE;
                                           }  #evoSprites{
                                           background-color: #B7B7CE ;
                                           } 
                                            #evolutions{
                                           background-color: #B7B7CE;
                                           }
                                           </style >";
                                        break;
                                    case "fairy":
                                        echo "<style>
                                          .basicInfo  #type\/moves{
                                           background-color: #D685AD ;
                                           } 
                                           .basicInfo #sprites{
                                           background-color: #D685AD;
                                           }
                                             #evoSprites{
                                           background-color: #D685AD ;
                                           } 
                                            #evolutions{
                                           background-color: #D685AD;
                                           }
                                          </style >";
                                        break;
                                }
                            }
                            ?></span></p>
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
                    <p><span>Ability:
                            <?php
                            if (isset($_POST['SearchPokemon'])) {
                                echo $pokeAbility;
                            }
                            ?>
                        </span></p>
                </div>
                <div class="moves"><p>Known moves: </p>
                    <p><span id="moves"><?php
                            if (isset($_POST['SearchPokemon'])) {
                                if (count($pokemon['moves']) > 1) {
                                    echo implode(", ", $moves);
                                } else echo $moves;
                            }
                            ?></span></p>
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
                    if ($frontSprite) {
                        echo $frontSprite;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSprite">

                <img src="
                <?php
                if (isset($_POST['SearchPokemon'])) {
                    if ($backSprite) {
                        echo $backSprite;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSprite">

                <img src="
                <?php
                if (isset($_POST['SearchPokemon'])) {
                    if ($frontSpriteShiny) {
                        echo $frontSpriteShiny;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSpriteShiny">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    if ($backSpriteShiny) {
                        echo $backSpriteShiny;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSpriteShiny">
                <p>Female &#9792;</p>

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    if ($frontFemaleShiny) {
                        echo $frontSpriteFemale;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSpriteFemale">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    if ($backSpriteFemale) {
                        echo $backSpriteFemale;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSpriteFemale">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    if ($frontFemaleShiny) {
                        echo $frontFemaleShiny;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="frontSpriteShinyFemale">

                <img src="<?php if (isset($_POST['SearchPokemon'])) {
                    if ($backSpriteFemale) {
                        echo $backSpriteFemale;
                    } else echo "images/pokeball.png";
                } else
                    echo "images/pokeball.png" ?>" alt="" id="backSpriteShinyFemale">

            </div>
        </div>

        <div id="evolutions">
            <p class="evoTitle">Evolution Line</p>
            <div id="evoSprites">
                <div class="base"><img src="
                <?php if (isset($_POST['SearchPokemon'])) {
                        echo $baseFormSprite;
                    } else
                        echo "images/pokeball.png" ?>" alt="">

                    <?php if (isset($_POST['SearchPokemon'])) {
                        echo $baseForm;
                    } ?>
                </div>
                <div class="middle">
                    <img src="<?php if (isset($_POST['SearchPokemon'])) {
                        if ($middleForm) {
                            echo $middleFormSprite;
                        } else
                            echo 'images/pokeball.png';
                    } else
                        echo 'images/pokeball.png';
                    ?>" alt="">
                    <?php
                    if (isset($_POST['SearchPokemon'])) {
                        if ($middleForm === "darmanitan-standard"){
                            $middleForm = "darmanitan";
                        }
                        if ($middleForm) {
                            echo $middleForm;
                            if ($middleForm2) {
                                $dom = new DOMDocument('1.0', 'utf-8');
                                $img = $dom->createElement('img');
                                $src = $dom->createAttribute('src');
                                $src->value = $middleForm2Sprite;
                                $img->appendChild($src);
                                $dom->appendChild($img);
                                echo $dom->saveXML($img);
                                echo $middleForm2;
                                if ($middleForm3){
                                    $dom = new DOMDocument('1.0', 'utf-8');
                                    $img = $dom->createElement('img');
                                    $src = $dom->createAttribute('src');
                                    $src->value = $middleForm3Sprite;
                                    $img->appendChild($src);
                                    $dom->appendChild($img);
                                    echo $dom->saveXML($img);
                                    echo $middleForm3;
                                    $dom = new DOMDocument('1.0', 'utf-8');
                                    $img = $dom->createElement('img');
                                    $src = $dom->createAttribute('src');
                                    $src->value = $middleForm4Sprite;
                                    $img->appendChild($src);
                                    $dom->appendChild($img);
                                    echo $dom->saveXML($img);
                                    echo $middleForm4;
                                    $dom = new DOMDocument('1.0', 'utf-8');
                                    $img = $dom->createElement('img');
                                    $src = $dom->createAttribute('src');
                                    $src->value = $middleForm5Sprite;
                                    $img->appendChild($src);
                                    $dom->appendChild($img);
                                    echo $dom->saveXML($img);
                                    echo $middleForm5;
                                    $dom = new DOMDocument('1.0', 'utf-8');
                                    $img = $dom->createElement('img');
                                    $src = $dom->createAttribute('src');
                                    $src->value = $middleForm6Sprite;
                                    $img->appendChild($src);
                                    $dom->appendChild($img);
                                    echo $dom->saveXML($img);
                                    echo $middleForm6;
                                    $dom = new DOMDocument('1.0', 'utf-8');
                                    $img = $dom->createElement('img');
                                    $src = $dom->createAttribute('src');
                                    $src->value = $middleForm7Sprite;
                                    $img->appendChild($src);
                                    $dom->appendChild($img);
                                    echo $dom->saveXML($img);
                                    echo $middleForm7;
                                    $dom = new DOMDocument('1.0', 'utf-8');
                                    $img = $dom->createElement('img');
                                    $src = $dom->createAttribute('src');
                                    $src->value = $middleForm8Sprite;
                                    $img->appendChild($src);
                                    $dom->appendChild($img);
                                    echo $dom->saveXML($img);
                                    echo $middleForm8;
                                }
                            }
                        }
                    } ?>
                </div>
                <div class="final">
                    <img src=" <?php if (isset($_POST['SearchPokemon'])) {
                        if ($middleForm) {
                            if ($endForm) {
                                echo $endFormSprite;
                            }else echo 'images/pokeball.png';
                        } else echo 'images/pokeball.png';
                    } else echo 'images/pokeball.png';
                    ?>" alt="">
                    <?php if (isset($_POST['SearchPokemon'])) {
                        if ($middleForm) {
                            if ($endForm) {
                                echo $endForm;
                                if ($endForm2) {
                                    $dom = new DOMDocument('1.0', 'utf-8');
                                    $img = $dom->createElement('img');
                                    $src = $dom->createAttribute('src');
                                    $src->value = $endForm2Sprite;
                                    $img->appendChild($src);
                                    $dom->appendChild($img);
                                    echo $dom->saveXML($img);
                                    echo $endForm2;
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>