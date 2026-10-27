<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Karya</title>
</head>
<body>
    <h1>Tambah Data Karya</h1>

    <form id="formKarya">
        <label for="judul">Judul karya: </label>
        <input type="text" id="judul" required>

        <br><br>

        <label for="pelukis">Nama pelukis: </label>
        <input type="text" id="pelukis" required>

        <br><br>

        <button type="submit">Kirim data</button>
    </form>

    <p id="hasil"></p>

    <h2>Daftar Karya</h2>
    <ul id="daftarKarya"></ul>

    <script>
        let itemSedangDiedit = null;
        document.getElementById('formKarya').addEventListener('submit', function (event) {
            event.preventDefault();

            const judul = document.getElementById('judul').value;
            const pelukis = document.getElementById('pelukis').value;

            fetch('/simpan-karya', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    judul: judul,
                    pelukis: pelukis
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Permintaan gagal diproses oleh server.');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('hasil').textContent =
                    data.pesan;

                const daftar = document.getElementById('daftarKarya');
                const item = document.createElement('li');

                const teksKarya = document.createElement('span');
                teksKarya.textContent = `${data.judul} - ${data.pelukis}`;

                const tombolEdit = document.createElement('button');
                tombolEdit.textContent = 'Edit';

                tombolEdit.addEventListener('click', function () {
                    document.getElementById('judul').value = 
                        teksKarya.textContent.split(' - ')[0];

                    document.getElementById('pelukis').value = 
                        teksKarya.textContent.split(' - ')[1];

                    itemSedangDiedit = item;
                });

                const tombolHapus = document.createElement('button');
                tombolHapus.textContent = 'Hapus';

                tombolHapus.addEventListener('click', function () {
                    item.remove();
                });

                item.appendChild(teksKarya);
                item.appendChild(tombolEdit);
                item.appendChild(tombolHapus);

                if (itemSedangDiedit !== null) {
                    itemSedangDiedit.querySelector('span').textContent =
                        `${judul} - ${pelukis}`;

                    itemSedangDiedit = null;
                } else {
                    daftar.appendChild(item);
                }
            })
            .catch(error => {
                document.getElementById('hasil').textContent =
                    'Data gagal dikirim. Silakan coba lagi.';
                console.error(error);
            });
        });
    </script>

</body>
</html><?php /**PATH C:\laravel-projects\AJAX_crud\resources\views/form-karya.blade.php ENDPATH**/ ?>