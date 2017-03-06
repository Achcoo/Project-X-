<?php

/* Database clase*/
Class Db{

   private $server='localhost';
   private $user='root';
   private $password='PLA123';
   private $db='prelaunchApp';
   private $link;
   private $stmt;
   private $array;

   static $_instance;

   /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
   private function __construct(){
      $this->connect();
   }

   /*Evitamos el clonaje del objeto. Patrón Singleton*/
   private function __clone(){ }

   /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
   public static function getInstance(){
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
      return self::$_instance;
   }

   /*Realiza la conexión a la base de datos.*/
   private function connect(){
      $this->link=mysql_connect($this->server, $this->user, $this->password) or die ("problemas de conexion");
      mysql_select_db($this->db,$this->link);
      @mysql_query("SET NAMES 'utf8'");
   }

   /*Método para ejecutar una sentencia sql*/
   public function execute($sql){
      echo $sql;
      $this->stmt=mysql_query($sql,$this->link);
      return $this->stmt;
   }

   /*Método para obtener una fila de resultados de la sentencia sql*/
   public function get_file($stmt,$fila){
      if ($fila==0){
         $this->array=mysql_fetch_array($stmt);
      }else{
         mysql_data_seek($stmt,$fila);
         $this->array=mysql_fetch_array($stmt);
      }
      return $this->array;
   }

   //Devuelve el último id del insert introducido
   public function lastID(){
      return mysql_insert_id($this->link);
   }

   public function disconnect()
   {
		mysql_close();
   }
  
  public function getLink(){
	return $this->link;
  }

  public function checkuser($fid, $ffname, $flname, $femail, $gender, $link, $soc_net, $points, $referred_by){
      $check = mysql_query("select * from user where id='$fid'");
      $check = mysql_num_rows($check);
      if (empty($check)) { // if new user . Insert a new record
         if ($soc_net == 'facebook')   {
            $query = "INSERT INTO user (id,first_name,last_name,fb_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $username, $link, $gender, $email, $points, now(), 0, $referred_by')";
            mysql_query($query);
            $query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
            mysql_query($query);
         }
         else if ($soc_net == 'linkedin') {
            $query = "INSERT INTO user (id,first_name,last_name,username,li_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $username, $link, $gender, $email, $points, now(), 0, $referred_by')";
            mysql_query($query);
            $query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
            mysql_query($query);
         }
         else if ($soc_net == 'instagram')   {
            $query = "INSERT INTO user (id,first_name,last_name,username,insta_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $username, $link, $gender, $email, $points, now(), 0, $referred_by')";
            mysql_query($query);
            $query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
            mysql_query($query);
         }
         else if ($soc_net == 'googleplus')  {
            $query = "INSERT INTO user (id,first_name,last_name,username,gplus_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $username, $link, $gender, $email, $points, now(), 0, $referred_by')";
            mysql_query($query);
            $query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
            mysql_query($query);
         }
         else if ($soc_net == 'twitter')  {
            $query = "INSERT INTO user (id,first_name,last_name,username,tw_link,gender,email,points,login_date,num_persons,referred_by) VALUES ('$fid','$ffname','$flname, $username, $link, $gender, $email, $points, now(), 0, $referred_by')";
            mysql_query($query);
            $query = mysql_query("UPDATE user SET points='$act_points' where id='$referred_by'");
            mysql_query($query);
         }
      }
   }
}

?>