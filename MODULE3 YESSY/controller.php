<?php
//untuk koneksi ke db
$koneksi = mysqli_connect('localhost','root','','int-yessy');

//insert data
function create($data){
    global $koneksi;
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];
    $gambar = uploadEventGambar();
    $kategori = $data["kategori"];
    $tanggal = $data["tanggal"];
    $mulai = $data["mulai"];
    $berakhir = $data["berakhir"];
    $tempat = $data["tempat"];
    $harga = $data["harga"];
    $benefit = implode(", ",$data["benefit"]);
    $query = "INSERT INTO event_table VALUES
            ('', '$nama','$deskripsi','$gambar','$kategori','$tanggal','$mulai','$berakhir','$tempat','$harga','$benefit')
            ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
//upload gambar
function uploadEventGambar(){
    $extensi = ['jpg','jpeg','png'];
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $extpath = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($extpath, $extensi)){
        echo "<script> alert('Extensi Gagal'); </script>";
    return false;
    }
    move_uploaded_file($_FILES['gambar']['tmp_name'],'assets/image/'. $filename);
    return $filename;
}
//select data
function read($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $datas = [];
        while($data = mysqli_fetch_assoc($result)){
            $datas[] = $data;
        }
        return $datas;
}
//update data
function edit($data){
    global $koneksi;
    $id = $data['id'];
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];
    $oldGambar = $data["oldGambar"];
    //cek gambar
    //4 tidak ada gambar
    if($_FILES['gambar']['error'] === 4){
        $gambar = $oldGambar;
    } else {
        $gambar = uploadEventGambar();
    }
    $kategori = $data["kategori"];
    $tanggal = $data["tanggal"];
    $mulai = $data["mulai"];
    $berakhir = $data["berakhir"];
    $tempat = $data["tempat"];
    $harga = $data["harga"];
    $benefit = implode(", ",$data["benefit"]);
    $query = "UPDATE event_table SET 
    nama = '$nama',
    deskripsi = '$deskripsi',
    gambar = '$gambar',
    kategori = '$kategori',
    tanggal = '$tanggal',
    mulai = '$mulai',
    berakhir = '$berakhir',
    tempat = '$tempat',
    harga = '$harga',
    benefit = '$benefit'
    WHERE id = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
//delete data
function delete($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM event_table WHERE id=$id");
    return mysqli_affected_rows($koneksi);
}
?>