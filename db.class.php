<?
class db extends mysqli
{
	private $binds = array();
	public $sql = '';
	
	private function __construct(){
		include(_CONFIG_.'/settings.inc.php');
		parent::__construct( "HOST" , "DB_USER", "DB_PASSWORD", "DB_NAME" );
	}
	function consulta($consulta){
		$this->sql = $consulta;
		$this->set_charset("utf8");
	}
	function safe($bind, $var){
		$safe = $this->real_escape_string(htmlspecialchars($var));
		$this->sql = str_replace($bind, $safe, $this->sql);
		return $safe;
	}
	function safeLiteral($bind, $var){
		$safe = $this->real_escape_string($var);
		$this->sql = str_replace($bind, $safe, $this->sql);
		return $safe;
	}
	function last_insert_id(){
		return $this->insert_id;
	}
	function log_error(){
		/*
		 * LOG YOUR ERROR Creating a file or Inserting the error in DB using $this->error
		 * */
	}
	function exec($consulta = NULL){
		$this->sql = ($consulta) ? $consulta : $this->sql;
		$consulta = $this->query($this->sql);
		if($this->error)
			$this->log_error();
		return $consulta;
	}
	function get_array($type = MYSQLI_ASSOC){ // Return a row
		$consulta = $this->query($this->sql);
		if($this->error)
			$this->log_error();
		return ($consulta) ? $consulta->fetch_array($type) : false;
	}
	function get_full_array($type = MYSQLI_ASSOC){ // Return all rows
		$array = array();
		$consulta = $this->query($this->sql);
		if($this->error)
			$this->log_error();
		if($consulta){
			while($linea = $consulta->fetch_array($type)){
				$array[] = $linea;
			}
			return $array;
		}else{
			return false;
		}
	}
}
?>
