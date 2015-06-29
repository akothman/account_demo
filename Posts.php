<?php
class Posts {
    private $username = '';
    private $password = '';
    private $db = '';
    private $hostname = '';
    private $conn;
    
    function __construct($credentials){
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];
        $this->db = $credentials['db'];
        $this->hostname = $credentials['hostname'];
        
        $this->conn  = new mysqli($this->hostname, $this->username, $this->password, $this->db);
        if($this->conn->connect_error){
				die("Connection failed: ".$this->conn->connect_error);
		}
    }
    
    function getPosts($page, $length){
        $max = 0;
        $max_num_query = "SELECT MAX(number) FROM posts";
        
        $max_num_result = $this->conn->prepare($max_num_query);
        $max_num_result->execute();
		$max_num_result->store_result();
        $max_num_result->bind_result($max);
        $max_num_result->fetch();
        
        if($max==0){
            return "No posts available.";
        }
        
        $number = 0;
        $message = "";
        $uid = 0;
        $query = "SELECT number, message, uid FROM posts WHERE number > ".($max - ($page * $length))." AND number <= ".($max - (($page - 1) * $length))."  ORDER BY number DESC";
        $query_result = $this->conn->prepare($query);
        $query_result->execute();
        $query_result->store_result();
        $query_result->bind_result($number, $message, $uid);
        
        $posts = [];
        $i = 0;
        while($row = $query_result->fetch_assoc()){
            $posts[i] = $row;
            $i++;
        }
        return posts;
    }
    
    function getUpper($max, $page, $legnth){
        
        
    }
    
    function getLower($max, $page, $length){
        
    }
}
?>