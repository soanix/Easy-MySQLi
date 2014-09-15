#Easy-MySQLi

MySQLi Class for an easy Implementation


### MINIMAL

- PHP 5.X


###INSTALL


1. Copy db.class.php into your class folder

###INIT

```php
include_once("/PATH/TO/CLASS/FILE.php");
$db = new db();
```

###USE 

**Load query:**

```php
$db->create("Your query");
```

**Fetch a row:**

```php
$db->create("Your select query");
$row = $db->get_array();
```

**Fetch all results:**

```php
$db->create("Your select query");
$db->get_full_array(MYSQLI_ASSOC); #MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH
```

**Exec query:**

```php
$db->create("Your query");
$db->exec();
```

**Prevent SQL inyection:**

```php
$db->create("SELECT * FROM users WHERE `password`= ':password'");
$db->safe(':password', $password);
$db->exec() OR $db->get_array();
```

**Prevent SQL inyection without htmlspecialchars:**

```php
$db->create("SELECT * FROM users WHERE `password`= ':password'");
$db->safeLiteral(':password', $password);
$db->exec() OR $db->get_array();
```
