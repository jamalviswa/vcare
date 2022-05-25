<?php
class User {
    private $dbHost     = "profitgm.com";
    private $dbUsername = "xxdatabasexx";
    private $dbPassword = "xxdbpasswordxx";
    private $dbName     = "xxdatabasexx";
    
    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with mysql: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = []){
        if(!empty($userData)){
           
            $prevQuery = "SELECT * FROM users WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                // Update user data if already exists
                $query = "UPDATE users SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                // Insert user data
                $query = "INSERT INTO users SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."', email = '".$userData['email']."', password = '', forgot_pass_identity = '', saldo = '0', pembelian = '0', noktp = '', tempatlahir = '', tgllahir = '', kelamin = '', agama = '', alamat1 = '', kota = '', provinsi = '', pendidikan = '', profesi = '', jabatan = '', pendapatan = '0', statusnikah = '', phone = '".$userData['phone']."', kunci = '', pengalaman = '', almamater = '', ahlibidang = '', sebagai = 'driver', online = 'online', lat = '', lng = '', jenistransportasi = ''";
                $insert = $this->db->query($query);
            }
            
            // Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        return $userData;
    }
}
?>