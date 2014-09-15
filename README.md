#Easy-MySQLi

MySQLi Class for an easy Implementation


###INSTALL


1. Copy db.class.php into your class folder

###INIT


include_once(/PATH/TO/CLASS/FILE.php);
$db = new db();

###USE 

**Load query:**

$db->create("Your query");

**Fetch a row:**

$db->create("Your select query");
$row = $db->get_array();

**Fetch all results:**

$db->create("Your select query");
$db->get_full_array(MYSQLI_ASSOC); #MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH

**Exec query:**

$db->create("Your query");
$db->exec();

**Prevent SQL inyection:**

$db->create("SELECT * FROM users WHERE `password`= ':password'");
$db->safe(':password', $password);
$db->exec() OR $db->get_array();
