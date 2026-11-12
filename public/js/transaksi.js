document.getElementById('transaksiForm').addEventListener('submit', function (event) {
    let jenis = document.getElementById('jenis').value;

    let keterangan = document.getElementById('keterangan').value.trim();

    let jumlah = Number(document.getElementById('jumlah').value);

    let tanggal = document.getElementById('tanggal').value;

    if (jenis === '') {
        event.preventDefault();
        alert('Silakan pilih jenis transaksi!');
        return;
    }

    if (keterangan === '') {
        event.preventDefault();
        alert('Keterangan belum diisi!');
        return;
    }

    if (jumlah <= 0) {
        event.preventDefault();
        alert('Jumlah harus lebih dari 0!');
        return;
    }

    if (tanggal === '') {
        event.preventDefault();
        alert('Tanggal belum dipilih!');
        return;
    }
});
