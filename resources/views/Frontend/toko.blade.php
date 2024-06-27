<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Buka Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .bg {
            /* The image used */
            background-image: url('images/R.jpeg');
            
            /* Full height */
            height: 100%; 
            
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            height: auto;
            max-width: 600px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card {
            opacity: 0.95; /* Optional: to make the card slightly transparent */
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header, .card-body {
            border-radius: 15px;
        }

        .card-header {
            background: rgba(0, 123, 255, 0.7);
            color: white;
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Registrasi Buka Toko</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No Telepon</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Masukkan nomor telepon Anda">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" placeholder="Masukkan alamat Anda">
                        </div>
                        <div class="mb-3">
                            <label for="digitalBank" class="form-label">Bank Digital</label>
                            <select class="form-select" id="digitalBank">
                                <option selected disabled>Pilih Bank Digital</option>
                                <option value="BRI">BRI</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BNI">BNI</option>
                                <option value="CIMB">CIMB</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="digitalWallet" class="form-label">Dompet Digital</label>
                            <select class="form-select" id="digitalWallet">
                                <option selected disabled>Pilih Dompet Digital</option>
                                <option value="DANA">DANA</option>
                                <option value="OVO">OVO</option>
                                <option value="GOPAY">GOPAY</option>
                                <option value="LinkAja">LinkAja</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>
