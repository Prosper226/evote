<?php
	class CRUD{
		private $dsn = "mysql";
		private $host = "127.0.0.1";
		private $dbname = 'evote';  //"odak9756_evote";
		private $username = 'root'; // "odak9756_evote";
		private $password = '';  // "s5_CJk0l+6_#";
		public $db_con;

		public function __construct(){
			if(!isset($this->bd)){
				try{
					$PDO = new PDO("$this->dsn:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
					$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db_con = $PDO;
				}catch(PDOEXCEPTION $e){
					die("Failed to connect with mysql :".$e->getMessage());
				}
			}
		}

		public function userLogin($matricule, $password){
			$db = $this->db_con;
			$sql = "SELECT *  
					FROM electeur
					WHERE matricule = :matricule and password = :password
				";
			$query = $db->prepare($sql);
			$query->bindValue(":matricule", $matricule, PDO::PARAM_INT);
			$query->bindValue(":password", $password, PDO::PARAM_STR);	
			try{
				$query->execute();
			}catch(PDOEXCEPTION $e){
				return false;
			}
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$count = $query->rowCount();
			if($count){
				return true;
			}else{
				return false;
			}
		}
		
		public function registerMember($nom,$prenom,$filiere,$niveau,$poste,$parti){
			$db = $this->db_con;
			$sql = "INSERT into membre(nom, prenom, filiere, niveau, poste, parti) 
					VALUES (:nom, :prenom, :filiere, :niveau, :poste, :parti)
				";
			$query = $db->prepare($sql);
			$query->bindValue(":nom", $nom, PDO::PARAM_STR);
			$query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
			$query->bindValue(":filiere", $filiere, PDO::PARAM_STR);
			$query->bindValue(":niveau", $niveau, PDO::PARAM_STR);
			$query->bindValue(":poste", $poste, PDO::PARAM_STR);
			$query->bindValue(":parti", $parti, PDO::PARAM_STR);
			try{
				$resultat = $query->execute();
			}catch(PDOEXCEPTION $e){
				return 0;
			}
			return $resultat;
		}

		public function registerParti($nom_abrege, $nom_complet, $proprietaire){
			$db = $this->db_con;
			$sql = "INSERT into parti(nom_abrege, nom_complet,proprietaire) 
					VALUES (:nom_abrege, :nom_complet, :proprietaire)
				";
			$query = $db->prepare($sql);
			$query->bindValue(":nom_abrege", $nom_abrege, PDO::PARAM_STR);
			$query->bindValue(":nom_complet", $nom_complet, PDO::PARAM_STR);
			$query->bindValue(":proprietaire", $proprietaire, PDO::PARAM_INT);
			try{
				$resultat = $query->execute();
			}catch(PDOEXCEPTION $e){
				return 0;
			}
			return $resultat;
		}

		public function listFiliere(){
			$db = $this->db_con;
			$sql = "SELECT *  
					FROM filiere
					ORDER BY libelleFiliere ASC
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = false;
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}

		public function listNiveau(){
			$db = $this->db_con;
			$sql = "SELECT *  
					FROM niveau
					ORDER BY libelleNiveau ASC
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = false;
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}
		
		public function get_list_parti(){
			$db = $this->db_con;
			$sql = "SELECT *  
					FROM parti
					ORDER BY nom_abrege ASC
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = [];
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}

		public function alreadyVote($matricule){
			$db = $this->db_con;
			$sql = "SELECT *  
					FROM electeur, vote
					WHERE electeur.matricule = vote.matricule  and vote.matricule = :matricule
				";
			$query = $db->prepare($sql);
			$query->bindValue(":matricule", $matricule, PDO::PARAM_INT);	
			try{
				$query->execute();
			}catch(PDOEXCEPTION $e){
				return false;
			}
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$count = $query->rowCount();
			if($count){
				return true;
			}else{
				return false;
			}
		}

		public function existElecteur($matricule){
			$db = $this->db_con;
			$sql = "SELECT *  
					FROM electeur
					WHERE matricule = :matricule
				";
			$query = $db->prepare($sql);
			$query->bindValue(":matricule", $matricule, PDO::PARAM_INT);	
			try{
				$query->execute();
			}catch(PDOEXCEPTION $e){
				return false;
			}
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$count = $query->rowCount();
			if($count){
				return true;
			}else{
				return false;
			}
		}

		public function existParti($parti){
			$db = $this->db_con;
			$sql = "SELECT *  
					FROM parti
					WHERE nom_abrege = :parti
				";
			$query = $db->prepare($sql);
			$query->bindValue(":parti", $parti, PDO::PARAM_STR);	
			try{
				$query->execute();
			}catch(PDOEXCEPTION $e){
				return false;
			}
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$count = $query->rowCount();
			if($count){
				return true;
			}else{
				return false;
			}
		}

		public function addVote($electeur, $parti){
			$db = $this->db_con;
			$sql = "INSERT into vote(matricule,parti) 
					VALUES (:matricule, :parti)
				";
			$query = $db->prepare($sql);
			$query->bindValue(":matricule", $electeur, PDO::PARAM_INT);
			$query->bindValue(":parti", $parti, PDO::PARAM_STR);
			try{
				$resultat = $query->execute();
			}catch(PDOEXCEPTION $e){
				return 0;
			}
			return $resultat;
		}

		public function get_Count_parti(){
			$db = $this->db_con;
			$sql = "SELECT 	count(nom_abrege) as total
					FROM 	parti
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = false;
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data = $row['total'];
			}
			return $data;
		}

		public function get_part_lead($parti){
			$db = $this->db_con;
			$sql = "SELECT 	nom, prenom
					FROM 	electeur, parti
					WHERE 	electeur.matricule = parti.proprietaire and nom_abrege = :parti
				";
			$query = $db->prepare($sql);
			$query->bindValue(":parti", $parti, PDO::PARAM_STR);
			$query->execute();
			$data = [];
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data = $row;
			}
			if(empty($data)){
				return '';
			}
			return $data['prenom'].' '.$data['nom'];
		}

		public function get_part_members($parti){
			$db = $this->db_con;
			$sql = "SELECT 	*
					FROM 	membre, parti
					WHERE 	membre.parti = parti.nom_abrege and nom_abrege = :parti
				";
			$query = $db->prepare($sql);
			$query->bindValue(":parti", $parti, PDO::PARAM_STR);
			$query->execute();
			$data = [];
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}

		public function get_vote_inscrit(){
			$db = $this->db_con;
			$sql = "SELECT 	count(matricule) as total
					FROM 	electeur
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = false;
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data = $row['total'];
			}
			return $data;
		}

		public function get_vote_effectue(){
			$db = $this->db_con;
			$sql = "SELECT 	count(matricule) as total
					FROM 	vote
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = false;
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data = $row['total'];
			}
			return $data;
		}

		public function get_vote_voix($parti){
			$db = $this->db_con;
			$sql = "SELECT 	count(parti) as total
					FROM 	vote
					WHERE 	parti = :parti
				";
			$query = $db->prepare($sql);
			$query->bindValue(":parti", $parti, PDO::PARAM_STR);
			$query->execute();
			$data = false;
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data = $row['total'];
			}
			return $data;
		}

		public function get_parti_win(){
			$win_name = false;
			$win_voix = 0;
			$equals = true;
			$PARTIS = $this->get_list_parti();
			foreach($PARTIS as $key => $parti){
				$parti_nom = $parti['nom_abrege'];
				$voix = $this->get_vote_voix($parti_nom);
				if ($win_voix < $voix){
					$win_voix = $voix;
					$win_name = $parti_nom;
					$equals = false;
				}else{
					if($win_voix == $voix){
						$equals = true;
					}
				}
			}
			return array('nom' => $win_name, 'voix' => $win_voix, 'equals' => $equals);
		}

		public function isequals_parti($max){
			$PARTIS = $this->get_list_parti();
			$i = 0;
			foreach($PARTIS as $key => $parti){
				$parti_nom = $parti['nom_abrege'];
				$voix = $this->get_vote_voix($parti_nom);
				if ($voix == $max){
					$i++;
				}
			}
			if($i > 1){
				return true;
			}else{
				return false;
			}
		}

		public function generatePasswordForElector($alter = 0){

			if($alter){
				$matricules = $this->listAlterMatricule();
			}else{
				$matricules = $this->listMatricule();
			}
			
			if(count($matricules) == 0){
				return 'no update available';
			}

			try{
				$inc = 0;
				foreach($matricules as $matricule){
					$password = $this->randomPassword();
					// $password =+ $inc;

					$db = $this->db_con;
					$sql = " UPDATE `electeur` 
								SET `password` = :password 
								WHERE `matricule`= :matricule
						";
					$query = $db->prepare($sql);
					$query->bindValue(":password", $password, PDO::PARAM_STR);
					$query->bindValue(":matricule", $matricule['matricule'], PDO::PARAM_INT);
					$query->execute();
					$inc++;
				}
				return $inc;
			}catch(Exception $e){
				return 0;
			}
		}

		public function listMatricule(){
			$db = $this->db_con;
			$sql = "SELECT 	matricule
					FROM 	electeur
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = [];
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
			
		}

		public function listAlterMatricule(){ 
			$db = $this->db_con;
			$sql = "SELECT 	matricule
					FROM 	atlerElecteur
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = [];
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
			
		}

		private function randomPassword() {
			$alphabet = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ123456789';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}
		
		public function generateElectorList(){
			$db = $this->db_con;
			$sql = "SELECT 	*
					FROM 	electeur
				";
			$query = $db->prepare($sql);
			$query->execute();
			$data = [];
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}
		

    }
    
?>