console.info('Задание 1');

var name = 'Николай';
age = 20;
console.log('Меня зовут ' + name);
console.log('Мне ' + age + ' лет');
delete name;
age = undefined; //delete не работает, обнуляем так, 
                 //хотя никто не знает зачем вообще удалять переменные в JS
                 //сборщик мусора же есть =-)

console.warn('ПРОВЕРКА!!!');
console.log(typeof(name));
console.log(typeof(age));


console.info('Задание 2');

var CITY = 'Калуга';
if (typeof(CITY) !== undefined) {
    console.log(CITY);
}
var CITY = 'Людиново';
console.warn('ПРОВЕРКА!!!');
console.log(CITY);

console.info('Задание 3');

var book = {'title': '', 'author': '', 'pages': ''};
book['author'] = 'Алексей Пехов';
book['title'] = 'Летос';
book['pages'] = 500;
console.log("Недавно я прочитал книгу " + book['title']
          + ", написанную автором " + book['author']
          + ", я осилил все " + book['pages']
          + " страниц, мне она очень понравилась!");

console.info('Задание 4');

var book1 = {'title': 'Путь шамана', 'author': 'Василий Маханенко', 'pages': '300'};
var book2 = {'title': 'Ник', 'author': 'Анжей Ясинский', 'pages': '400'};
var books = {0: book1, 1: book2};
console.log('Недавно я прочитал книги ' + books[0]['title'] 
            + ' и ' + books[1]['title']
            + ', написанные соответственно авторами '
            + books[0]['author'] + ' и ' + books[1]['author']
            + ', я осилил в сумме ' 
            + (Number(books[0]['pages']) + Number(books[1]['pages']))
            + ' страниц, не ожидал от себя подобного')