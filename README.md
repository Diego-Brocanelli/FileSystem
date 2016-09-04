# FileSystem is a repository for handling folders and files.

Directory manipulation in a simpler way, using the concepts of OOP.

## Instalation
```
composer install
```

## Tests
```
phpunit tests/DirectoryTests.php
```

### Create folder

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Dir;

$path = __DIR__.'/dir_teste';

$dir = new Dir();
$dir->setPathName($path);
$dir->create(); //return: boolean
```

### Delete folder

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Dir;

$path = __DIR__.'/dir_teste';

$dir = new Dir();
$dir->setPathName($path);
$dir->delete(); //return: boolean
```

### Move folder

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Dir;

$dirName = '/dir_teste';

$path = __DIR__.$dirName;

$dir = new Dir();
$dir->setPathName($path); //path origin folder
$pathDestiny = __DIR__.'/copy'.$dirName;
$dir->move($pathDestiny); //return: boolean
```

### Folder Exist

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Dir;

$path = __DIR__.'/dir_teste';

$dir = new Dir();
$dir->setPathName($path);
$dir->exist(); //return: boolean
```

### Is Dir

```php
require_once __DIR__ . '/vendor/autoload.php';

use FileSystem\Directory\Dir;

$path = __DIR__.'/dir_teste';

$dir = new Dir();
$dir->setPathName($path);
$dir->isDir(); //return: boolean
```

## @todo 

    * [ X ] Folder
        * [X] Create
        * [X] Delete
        * [X] Move
        * [X] Exist
        * [X] isDir
    * [ ] File
        * [ ] Create
        * [ ] Delete
        * [ ] Move
        * [ ] Exist
        * [ ] isFile
        * [ ] isExecutable
        * [ ] isReadable
        * [ ] isWritable
    * [ ] Compress
        * [ ] Zip
