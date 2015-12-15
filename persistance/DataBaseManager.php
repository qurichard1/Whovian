<?

class DataBaseManager{ 
	static private $dbh = null;

	static private $instance = null;

	static private $db_host="mysql:host=localhost;";
	static private $db_name="dbname=ExampleDataBase";
	static private $db_user="remy";
	static private $db_password="my_password";

	private function __construct(){
		try{
			self::dbh = new PDO(self::$db_host.self::$db_name,self::$db_user,self::$db_password);
		}catch(PDOException $e){
			echo "<p>Erreur de connexion à la base de données.<br/>Vous n'avez pas besoin d'en savoir plus...</p>";
			die();
		}
	}

	public static function getInstance(){

		if(null==self::$instance){
			self::$instance = new self;
		}
		return self::$instance;

	}

	public function prepareAndExecuteQuery($requete,$args){
		$numargs=count($args);
		if (empty($requete)|| !is_string($requete)||preg_match('/(\"|\')+/',$requete)!==0) {
			return false;
		}
		$statement = self::$dbh->prepare($requete);
		if ($statement==false) {
			return false;
		}

		for($i=1; $i<=$numargs;$i++){

			$statement->bindParam($i,$args)

		}
	}

?>
