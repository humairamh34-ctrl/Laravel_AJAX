<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Karya</title>
</head>
<body>
    <h1>Data Karya Claude Monet</h1>

    <div id="hasil">
        Memuat data...
    </div>

    <script>
    fetch('/data-karya')
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal mengambil data!');
            }

            return response.json();
        })
        .then(data => {
            document.getElementById('hasil').innerHTML =
                `<p>Judul: ${data.judul}</p>
                 <p>Pelukis: ${data.pelukis}</p>
                 <p>Tahun: ${data.tahun}</p>`;
        })
        .catch(error => {
            document.getElementById('hasil').textContent =
                'Data karya gagal dimuat.';
            console.error(error);
        });
</script>
</body>
</html><?php /**PATH C:\laravel-projects\AJAX_crud\resources\views/karya.blade.php ENDPATH**/ ?>