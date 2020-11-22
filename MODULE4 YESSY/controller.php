<?php
class database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "wad_modul4";
    var $connection;
    function __construct() {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    function register($nama,$email,$phone,$password) {
        $register = mysqli_query($this->connection, "INSERT INTO user VALUES ('','$nama','$email','$phone','$password')");
        return $register;
    }
    function login($email,$password,$remember) {
        $query = mysqli_query($this->connection, "SELECT * FROM user WHERE email = '$email'");
        $data = $query->fetch_array();
        if(password_verify($password,$data['password'])) {
            if ($remember) {
                setcookie('email', $email, time() + (60 * 60 * 24 * 5), '/');
                setcookie('nama', $data['nama'], time() + (60 * 60 * 24 * 5), '/');
                setcookie('password', $data['password'], time() + (60 * 60 * 24 * 5), '/');
                setcookie('user_id', $data['id'], time() + (60 * 60 * 24 * 5), '/');
            } 

            if(isset($_COOKIE['navbarColor'])){
                $_SESSION['navbarColor'] = $_COOKIE['navbarColor'];
            }

            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['login'] = TRUE;
            return TRUE;
        }
    }

    function relogin($email) {
        $query = mysqli_query($this->connection, "SELECT * FROM user WHERE email = '$email'");
        $data = $query->fetch_array();
        $_SESSION['email'] = $email;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['login'] = TRUE;
    }

    function addCart($user_id,$nama_barang,$harga) {
		$addCart = mysqli_query($this->connection, "INSERT INTO cart VALUES ('','$user_id','$nama_barang','$harga')");
		return $addCart;
    }
    function cartItems($id){
        $cartItems = mysqli_query($this->connection, "SELECT * FROM cart WHERE user_id = '$id'");
		return $cartItems;
    }
    function delete($id) {
		$delete = mysqli_query($this->connection,"DELETE FROM cart WHERE id = '$id'");
		return $delete;
    }
    function userDisplay($id)
	{
		$userDisplay = mysqli_query($this->connection, "SELECT * FROM user WHERE id='$id' ");
		return $userDisplay;
    }
    function updateProfile($nama,$phone,$password,$id)
	{	
		
        $updateProfile = mysqli_query($this->connection,"UPDATE user SET nama='$nama', no_hp='$phone', password='$password' WHERE id='$id' ");
        if(isset($password)){
            setcookie('password', $password, time() + (60 * 60 * 24 * 5), '/');
        }
        return $updateProfile;
	}
}
?>