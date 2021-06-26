# Рубежный контроль
### Грушевская Анастасия, 191-321 (номер 9 в списке, 10 вопрос)

>Дать определение REST. Ответить на вопрос: является ли разработанное вами API RESTfull (если да, то почему, если нет, то почему). Рассказать что такое CRUD и привести примеры запросов из созданного API. Ответить на вопрос: какие запросы являются идемпотентными в вашем API и пояснить почему.

---

## Определение REST

**REST** (Representational state transfer) — это стиль архитектуры программного обеспечения для распределенных систем, таких как World Wide Web, который, как правило, используется для построения веб-служб. Термин REST был введен в 2000 году Роем Филдингом, одним из авторов HTTP-протокола. `Системы, поддерживающие REST, называются RESTful-системами.`

В общем случае REST является очень простым интерфейсом управления информацией без использования каких-то дополнительных внутренних прослоек. Каждая единица информации однозначно определяется глобальным идентификатором, таким как URL. Каждая URL в свою очередь имеет строго заданный формат.

`REST фокусируется на ресурсах и на том, насколько эффективно вы выполняете операции с ними, используя HTTP.`

Вот как обычно реализуется служба REST:
- <ins>Формат обмена данными</ins>: здесь нет никаких ограничений. JSON — очень популярный формат, хотя можно использовать и другие, такие как XML.
- <ins>Транспорт</ins>: всегда HTTP. REST полностью построен на основе HTTP.
- <ins>Определение сервиса</ins>: не существует стандарта для этого, а REST является гибким. Это может быть недостатком в некоторых сценариях, поскольку потребляющему приложению может быть необходимо понимать форматы запросов и ответов. Однако широко используются такие языки определения веб-приложений, как WADL (Web Application Definition Language) и Swagger.

## Является ли разработанное мною API RESTfull и почему

**RESTful API** — это архитектурный стиль для интерфейса прикладных программ (API), который использует HTTP-запросы для доступа и использования данных. Эти данные могут использоваться для типов данных GET, PUT, POST и DELETE, что относится к чтению, обновлению, созданию и удалению.

Признаки RESTful API:
1.	<ins>Client-Server</ins>. Система должна быть разделена на клиентов и на серверов. 
2.	<ins>Stateless</ins>. Сервер не должен хранить какой-либо информации о клиентах. В запросе должна храниться вся необходимая информация для обработки запроса и если необходимо, идентификации клиента.
3.	<ins>Cache</ins>․ Каждый ответ должен быть отмечен является ли он кэшируемым или нет, для предотвращения повторного использования клиентами устаревших или некорректных данных в ответ на дальнейшие запросы.
4.	<ins>Uniform Interface</ins>. Единый интерфейс определяет интерфейс между клиентами и серверами. Это упрощает и отделяет архитектуру, которая позволяет каждой части развиваться самостоятельно.
5.	<ins>Layered System</ins>. В REST допускается разделить систему на иерархию слоев но с условием, что каждый компонент может видеть компоненты только непосредственно следующего слоя. 
Code-On-Demand (опционально). В REST позволяется загрузка и выполнение кода или программы на стороне клиента.

`Разработанная нами система удовлетворяет всем указанным выше критериям, а следовательно считается сконструированной по REST архитектуре.`

## Что такое CRUD и примеры запросов из созданного API

**CRUD** —  акроним, обозначающий четыре базовые функции, используемые при работе с базами данных (Create, Read, Update, Delete — Создать, Прочитать, Обновить, Удалить). В SQL этим функциям, операциям соответствуют операторы Insert (создание записей), Select (чтение записей), Update (редактирование записей), Delete (удаление записей).

Примеры запросов из созданного API (3 домашняя работа):

```
INSERT INTO clients ('client_id', 'full_name', 'phone', 'login', 'password') VALUES (1, 'Грушевская Анастасия Сергеевна', '+79053496689', 'StacyGru', '12345678'); 
```

```
SELECT * FROM drivers WHERE gender = 'female';
```

```
UPDATE discont_cards SET points = '100' where client_id = '5';
```

```
DELETE FROM orders WHERE status = 'canceled';
```

## Какие запросы в моём API являются идемпотентными и почему

---

## Источники
- https://habr.com/ru/post/38730/
- https://habr.com/ru/post/483202/
- https://habr.com/ru/post/319984/
