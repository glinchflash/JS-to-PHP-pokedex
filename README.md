# JS-to-PHP-pokedex
Check out the finished pokedex [here](https://golemans-php-pokedex.herokuapp.com/)
- Repository: `challenge-pokemon-php`
- Type of Challenge: `Learning`
- Duration: `2 days`
- Deployment strategy : NA

- Team challenge : `solo`


## Learning objectives
- Starting with PHP
    * To be able to write a simple condition and a simple loop
    * To know how to access external resources (API)
- To know where to search for PHP documentation
- To find out how much easier it is to learn a second programming language

## The Mission
Remember the Pokemon challenge we did in Javascript?
Today we are going to re-create this challenge in PHP!

You will be surprised how easy it is to pick a new  language, once you know your first programming language (Javascript).

Take a deep breath, and remember: you can do this!


## Tips
Here are a few functions you will need to help you on your way.

- [file_get_contents()](http://php.net/file_get_contents)
- [json_decode()](http://php.net/json_decode)
- [var_dump() - to help you debug](http://php.net/var_dump)

Be careful to get an array, not an object, back from `json_decode()`. Read the documentation how to do this.
You could do it with objects, but it will be more difficult.

## How to search for PHP documentation
PHP has very good documentation available on www.php.net. There is a nice trick you can use to quickly get documentation on any php function. Just type in the browser php.net/FUNCTION_NAME and you will arrive at the correct documentation page. Also spend some time clicking on the "See Also" section at the bottom of each page, this will quickly get you a good overview of what is possible with PHP.

## PHP the right way
Another interesting read is https://phptherightway.com. This is not so much documentation over each separate function, but gives you more an overview of best practices and how different components work together.
---
### Progress
- -[x] get vhost working succesfully
- -[x] implement html from original pokedex
- [x] re-write javascript to php
- -[x] fetch api with php
- -[x] display name with php
- -[x] display sprites with php
- -[x] display moves with php
- -[x] display typing with php
- - [x] display evolution line sprites with php
    - -[x] make evolution line work with single/duo staged pokemon
- - [x] display evolution line names with php
   -  -[x] make evo-Line names work with single/duo staged pokemon
- - [x] change background colors of sections with php (according to typing)
- - [x] show ability
- -[x] make special evolutions work
    - -[x] eevee
    - -[x] wurmple
    - -[x] ditto
    - -[x] smeargle
    - -[x] darmanitan
---
