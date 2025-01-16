<?php
// method_encrypt_decrypt_mikhmon

// Fungsi untuk enkripsi
function encrypt($string, $key=128) {
    $result = '';
    for($i=0, $k=strlen($string); $i<$k; $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key))-1, 1);
        $char = chr(ord($char)+ord($keychar));
        $result .= $char;
    }
    return base64_encode($result); // Mengembalikan hasil enkripsi dalam base64
}

// Fungsi untuk dekripsi
function decrypt($string, $key=128) {
    $result = '';
    $string = base64_decode($string);
    for($i=0, $k=strlen($string); $i< $k ; $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key))-1, 1);
        $char = chr(ord($char)-ord($keychar));
        $result .= $char;
    }
    return $result;
}

// Fungsi untuk menampilkan menu pilihan
function showMenu() {
    echo "===== Menu =====\n";
    echo "1. Enkripsi\n";
    echo "2. Dekripsi\n";
    echo "3. Keluar\n";
    echo "Pilih operasi (1/2/3): ";
}

// Loop untuk menu utama
while (true) {
    showMenu();
    $choice = trim(fgets(STDIN));

    if ($choice == '1') {
        echo "Masukkan sandi plaintext yang akan dienkripsi: ";
        $input = trim(fgets(STDIN));
        $key = 128; // Kunci enkripsi
        $result = encrypt($input, $key);
        echo "Hasil Enkripsi: $result\n";
    } elseif ($choice == '2') {
        echo "Masukkan sandi yang sudah terenkripsi untuk didekripsi: ";
        $input = trim(fgets(STDIN));
        $key = 128; // Kunci dekripsi
        $result = decrypt($input, $key);
        echo "Hasil Dekripsi: $result\n";
    } elseif ($choice == '3') {
        echo "Terima kasih! Keluar dari program.\n";
        exit;
    } else {
        echo "Pilihan tidak valid, coba lagi.\n";
    }
}
?>
