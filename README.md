# FileSystem is a repository for handling folders and files.

Directory manipulation in a simpler way, using the concepts of OOP.

## Require

- PHP >= 5.3.8
- mbstring extension

## Instalation
```
composer install
```

## Tests
Execute in root directory
```
phpunit 
```
## Directory manipulation

#### Create folder

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Directory;
use FileSystem\FileSystem;

$path = __DIR__.'/dir_teste';
$name = 'directory_teste_'.date('Y_m_d_H_i_s');

$fileSystem = new FileSystem($name, $path);

$directory = new Directory($fileSystem);
$directory->create(); //return: true
```

#### Delete folder

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Directory;
use FileSystem\FileSystem;

$path = __DIR__.'/dir_teste';
$name = 'directory_for_delete';

$fileSystem = new FileSystem($name, $path);

$directory = new Directory($fileSystem);
$directory->delete(); //return: true
```

#### Move folder

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Directory;
use FileSystem\FileSystem;

$path = __DIR__.'/dir_teste';
$name = 'directory_name';

$fileSystem = new FileSystem($name, $path);

$destinyPath = __DIR__.'/copy';

$directory = new Directory($fileSystem);
$directory->move($destinyPath); //return: true
```

#### Folder Exist

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Directory;
use FileSystem\FileSystem;

$path = __DIR__.'/dir_teste';
$name = 'directory_name';

$fileSystem = new FileSystem($name, $path);

$directory = new Directory($fileSystem);
$directory->exists(); //return: true
```

#### Is Dir

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Directory;
use FileSystem\FileSystem;

$path = __DIR__.'/dir_teste';
$name = 'directory_name';

$fileSystem = new FileSystem($name, $path);

$directory = new Directory($fileSystem);
$directory->isDir(); //return: true
```

## Sanitize String

#### Sanitize String
```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Sanitize;

$string = 'Áéç % n - o ? Bó';

$sanitize = new Sanitize();
$sanitize->sanitizeString($string); // Return: aec__n___o__bo
```

#### String To Lower
```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Sanitize;

$string = 'StRiNgToLoWeR';

$sanitize = new Sanitize();
$sanitize->stringTolower($string); // Return: stringtolower
```

#### Spaces To Underscore
```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Sanitize;

$string = 'space to underscore';

$sanitize = new Sanitize();
echo $sanitize->spacesToUnderscore($string); // Return: space_to_underscore
```

#### Convert Special Characters
```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Sanitize;

$string = 'áÉíÓ$#%¨&*(){}^~<>.,:;/?\\';

$sanitize = new Sanitize();
echo $sanitize->convertSpecialCharacters($string); // Return: aEiO
```

## @toDo 

#### Folder
- [X] Create
- [X] Delete
- [X] Move
- [X] Exist
- [X] isDir
- [X] Tests

#### Sanitize
- [X] Sanitize String
- [X] String To lower
- [X] Spaces To Underscore
- [X] Convert Special Characters
- [X] Tests

#### File
- [ ] Create
- [ ] Delete
- [ ] Move
- [ ] Exist
- [ ] isFile
- [ ] isExecutable
- [ ] isReadable
- [ ] isWritable

#### Compress
- [ ] Zip
