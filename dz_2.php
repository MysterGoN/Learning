<?php
    echo "<h3>Задание 1</h1>";
    $name = "Николай";
    $age = 20;
    echo 'Меня зовут ' . $name . "<br>Мне " . $age . ' лет<br>';
    unset($name);
    unset($age);
    echo "=================== ПРОВЕРКА ===================<br>";
    echo 'Меня зовут ' . $name . "<br>Мне " . $age . ' лет<br>';
    echo "================================================<br>";
    
    echo "<h3>Задание 2</h1>";    
    define('CITY', 'Калуга');
    if (defined('CITY')) {
        echo CITY . "<br>";
    }
    define('CITY', 'Людиново');
    echo "=================== ПРОВЕРКА ===================<br>";
    echo CITY . "<br>";
    echo "================================================<br>";
    
    echo "<h3>Задание 3</h1>";
    $book = array('title' => '', 'author' => '', 'pages' => '');
    $book['author'] = 'Алексей Пехов';
    $book['title'] = 'Летос';
    $book['pages'] = 500;
    echo "Недавно я прочитал книгу '$book[title]', "
            . "написанную автором $book[author], "
            . "я осилил все $book[pages] страниц, мне она очень понравилась <br>";
    
    echo "<h3>Задание 4</h1>";
    $book1 = array('title' => 'Путь шамана', 'author' => 'Василий Маханенко', 'pages' => '300');
    $book2 = array('title' => 'Ник', 'author' => 'Анжей Ясинский', 'pages' => '400');
    $books = array($book1, $book2);
    echo 'Недавно я прочитал книги ' . $books[0]['title'] 
            . ' и ' . $books[1]['title']
            . ', написанные соответственно авторами '
            . $books[0]['author'] . ' и ' . $books[1]['author']
            . ', я осилил в сумме ' . (string)($books[0]['pages'] + $books[1]['pages']) 
            . ' страниц, не ожидал от себя подобного';