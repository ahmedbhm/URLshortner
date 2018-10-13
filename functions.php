<?php
class functions{
    private static function connect(){
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shortlink";
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  return $conn;
	}
	public static function query($query,$params=array()){
		$stmt = self::connect()->prepare($query);
		$stmt->execute($params);
		if(explode(' ',$query)[0]=='SELECT'){
		 $data=$stmt->fetchAll();
		 return $data;	
		}
	}
	
	public static function get_code_by_url($url){
     $code=self::query('SELECT code FROM links WHERE url=:url',array(':url'=>$url));
		 if($code){return $code[0]['code'];}else{return false;}
	}
	
	public static function code_exist($code){
      $id=self::query('SELECT id FROM links WHERE code=:code',array(':code'=>$code));
      if($id){return $id[0]['id'];}else{return false;}
	}
	
	public static function generate_short_link(){
	 $ok=false;
		while($ok==false){
         $id=rand(1000,999999);
         $shorturl=base_convert($id,20,36);
          if(!self::code_exist($shorturl)){
			 $ok=true; 
		  }		 
		}
        return $shorturl;
	}
	
	public static function insert_url_in_DB($url){
	 return self::query('INSERT INTO links (url,code,created) VALUES (:url,:code,:created) ',array(':url'=>$url,':code'=>self::generate_short_link(),':created'=>date("Y/m/d")));	
	}
	
	public static function get_url_by_code($code){
	 $url=self::query('SELECT url FROM links WHERE code=:code',array(':code'=>$code));
	 if($url){
	  return $url[0]['url'];
     }else{
	  return false;
	 };	
	}
}
?>