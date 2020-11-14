<?php
$koneksi = mysqli_connect('localhost','root','','wad_module3_yessy');

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
function read($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $datas = [];
        while($data = mysqli_fetch_assoc($result)){
            $datas[] = $data;
        }
        return $datas;
}
function edit($data){

}
function delete($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM event_table WHERE id=$id");
    return mysqli_affected_rows($koneksi);
}
?>