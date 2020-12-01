# Bjornstad2
## Usage

Bjornstad2 works as a standalone framework. Create a .env file from the .env.example, these variables are used throughout the framework via [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv).

Bjornstad2 can be used with the official Docker stack created specifically for projects using this framework. 
The current stack consists of: mysql, nginx, phpmyadmin, php, composer
more stacks may be added in the future.

You can either simply pull this repository into your own project files or alternatively pull the [Bjornstad2 Containers](https://github.com/Kodriboh/Bjornstad2-Containers) then pull this project into the src folder.

To build the containerised project, create .env files from the .env.examples containing your environment variables and run:

<code>
    docker-compose up --build -d 
</code>

in the containers root. 

## Using Composer

If you do not have composer installed locally you can use the Bjornstad2 containers which have composer pre-installed.

simply run:

<code>
    docker exec -ti php sh
    composer install
</code>

## About

Bjornstad2 (A norse word for 'son of'), is a basic MVC framework with an advanced routing engine, error handling, and a logging system.
Built on Hoegr (An older MVC framework also created by myself), Bjornstad2 is a learning framework for teaching the concepts of MVC, providing a basic
example of how a framework may be constructed. Unlike Hoegr, Bjornstad2 uses a more object oriented based routing system, with greater similarities to how frameworks such as Laravel function. Bjornstad2 caches pages automatically for improved load speeds.

## Templating Engine

Bjornstad2 uses the twig templating engine. [Learn Twig](https://twig.symfony.com/doc/3.x/api.html)

### Basic Twig Syntax

Twig encloses renderable data in {{ }} whilst loops and conditionals are surrouned with {% %}.
<pre>
    <code>
        {{ var }}
    </code>
    <code>
        {% for i in x %} 
            {{ i }}
        {% endfor %}
    </code>
</pre>

## Getting started

To make things easier Bjornstad2 comes with a ready made set of containers (Please see dependencies).

First of all you will need to [install docker](https://docs.docker.com/get-docker/). 

Secondly, you will need to create a .env file in the root folder, adding in database requirements from the docker-compose file.
e.g. MYSQL_PASSWORD=password

Next, you will need to create a .env within the src folder, following the format of the .env.example provided.

You may then bring up your containers using: `docker-compose up --build -d`

Lastly you will need to install the dependencies via composer: `composer require vlucas/phpdotenv`

Please note that the php container has composer installed, if you do not have composer installed locally you can
exec into the php container to install dependencies `docker exec -ti php sh`

## Dependencies

- **Docker**
- **dotenv**
- **mysql**
- **PDO**

Bjornstad2 was built using docker WSL2 on a Windows 10 PC. 

## Regex

Regular expressions are expressions used for advanced string matching/extracting. Regex can be used to create intricate rules in which characters can be compared and extracted to an exact pattern. This pattern matching enables complex behaviours such as extracting controller/method names from our routes.
### Character Matching

Regex patterns are written between two "/".
#### Match Strings
- /abc/ - Matches abc in any string

- ^abc$ - Matches whole string "abc" only

- a+ - Match one or more "a"

- /abc/i - Match abc case insensitive

#### Symbols
- ^ - Match start of string

- $ - Match end of string

- \* - Match zero or more

- \+ \- Match one or more

- \. - Match any single character: letter, number or whitespace

- \ - Escape character

#### Modifiers

- i - Makes case insensitive

#### Character Sets

Character sets are denoted with "[]" this will match one
of any characters within the brackets e.g.[abc] matches a, b, or c nothing else.

Hyphens can be used to specify a character range e.g. [1-5].

We cancombine this with the repetition operators:

- /[a-z0-9 ]+/ - matches any sequence of alphaneumeric
characters and spaces at least one character in length.

### Meta Characters
Used to match a specific type of character/

- \d - Matches any digit 0 to 9

- \w - Matches any character from a to z, A to Z and 0 to 9

- \s - Matches any whitespace character

#### Functions

- preg_match($regex, $string, $matches) - matches string to regex

- preg_replace($regex, $replacement, $string) - replace matching string

### Capture Groups

Capture Groups can be passed to regex functions which allow for it (such as preg_match). Any subpattern in parentheses will be captured as a group.

Names capture groups can be used (?<name>regex) to retrieve items by name from the capture group array.

Capture groups can be referred to using backreferences (\1,\2 etc...)

### Examples

#### Capture Group Backreference

<code>
    $regex = '/ab(c)/';

    $replacement = '\lde';

    $string = abc;

    preg_replace($regex, $replacement, $string);

    result: cde
</code>

#### Named Capture Groups

<code>
    /(?<month>[a-zA-Z]+) (?<year>\d+)/
</code>


#### Replace with capture groups

<code>
    $regex =  '/(\w+) and (\w+)/';

    $replacement = '\1 or \2';

    $string = 'Bill and Ben';

    result: Bill or Ben
</code>

---

## Useful Resources

- **[Regex](https://www.phpliveregex.com/)** 
- **[Docker](https://www.docker.com/get-started)**
- **[LearnDocker](https://www.docker.com/play-with-docker)**
- **[Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)**
- **[PHPDotEnv](https://github.com/vlucas/phpdotenv)**
