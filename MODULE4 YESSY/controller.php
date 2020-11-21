<?php
$koneksi = mysqli_connect('localhost','root','','wad_modul4');
function regis($data){
    global $koneksi;
    $nama = $data["nama"];
    $email = $data["email"];
    $no_hp = $data["no_hp"];
    $password = $data["password"];
    $password2 = $data["password2"];

    if($password !== $password2)
    {
        echo "<script> alert('Password Tidak sama');
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$email','$no_hp','$password')");
    return mysqli_affected_rows($koneksi);
}
function update($data){
    global $koneksi;
    $id = $data['id'];
    $nama = $data["nama"];
    $email = $data["deskripsi"];
    $no_hp = $data["no_hp"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $query = "UPDATE user SET 
    nama = '$nama',
    email = '$email',
    no_hp = '$no_hp',
    password = '$password'
    WHERE id = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
?>