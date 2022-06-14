<?php
//get user input
if (isset($_POST['SearchPokemon'])){
    $input = 1;
    //$Input = $_POST['searchinput'];
    //url for api
    $url = "https://pokeapi.co/api/v2/pokemon/";
    $api_url = "$url$input/";
    $pokemonFetch = file_get_contents($api_url);
    //var_dump($api_url);
    $pokemon = json_decode($pokemonFetch, true);
    $sprite = $pokemon['sprites']['front_default'];
    $pokeName = $pokemon['name'];
    var_dump($pokeName);
    var_dump($sprite);
}

//get response from api
//$PokeFetch = file_get_contents($api_url);
//turn response into array
//$PokeArray = json_decode($PokeFetch , true);
//get name out of array
//$pokeName = $PokeArray["name"];
// get sprite out of array
//$sprite = $PokeArray["sprites"]["front_default"];
