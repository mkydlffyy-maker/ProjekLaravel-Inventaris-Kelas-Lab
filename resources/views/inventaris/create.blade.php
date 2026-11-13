
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventaris - Harun</title>
    <style>
       
:root {
    --primary: #2563eb;
    --primary-hover: #1d4ed8;
    --danger: #dc2626;
    --danger-hover: #b91c1c;
    --bg-body: #f8fafc;
    --bg-card: #ffffff;
    --text-main: #334155;
    --border-color: #cbd5e1;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--bg-body);
    color: var(--text-main);
    margin: 0;
    padding: 30px;
}

nav {
    margin-bottom: 25px;
    background: var(--bg-card);
    padding: 12px 20px;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

nav a {
    margin-right: 20px;
    text-decoration: none;
    color: var(--primary);
    font-weight: 600;
}

nav a:hover {
    text-decoration: underline;
}

.kotak {
    background: var(--bg-card);
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05),
                0 2px 4px -1px rgba(0,0,0,0.03);
    max-width: 900px;
    margin: 0 auto;
}

h1 {
    color: #1e293b;
    font-size: 1.5rem;
    margin-top: 0;
    border-bottom: 2px solid #e2e8f0;
    padding-bottom: 10px;
}

h2 {
    font-size: 1.2rem;
    color: #475569;
    margin-top: 20px;
}

/* Alert */
.alert-error {
    background-color: #fef2f2;
    border-left: 4px solid var(--danger);
    color: #991b1b;
    padding: 12px 16px;
    border-radius: 4px;
    margin-bottom: 16px;
}

.alert-success {
    background-color: #f0fdf4;
    border-left: 4px solid #16a34a;
    color: #166534;
    padding: 12px 16px;
    border-radius: 4px;
    margin-bottom: 16px;
}

.alert-error ul {
    margin: 0;
    padding-left: 20px;
}

/* Form */
.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: 600;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 9px 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    font-size: 0.95rem;
    box-sizing: border-box;
    transition: border-color 0.2s;
}

input:focus,
select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

/* Tombol */
button[type="submit"],
.btn-primary {
    background-color: var(--primary);
    color: white;
    border: none;
    padding: 10px 18px;
    font-size: 0.95rem;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

button[type="submit"]:hover,
.btn-primary:hover {
    background-color: var(--primary-hover);
    color: white;
}

.btn-secondary {
    background-color: #64748b;
    color: white;
    border: none;
    padding: 10px 18px;
    font-size: 0.95rem;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.btn-secondary:hover {
    background-color: #475569;
    color: white;
}

/* Tabel Inventaris */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 25px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
}

th {
    background-color: #f1f5f9;
    color: #475569;
    font-weight: 600;
    text-align: left;
    padding: 12px 14px;
    font-size: 0.9rem;
    border-bottom: 1px solid #e2e8f0;
}

td {
    padding: 12px 14px;
    border-bottom: 1px solid #f1f5f9;
    font-size: 0.9rem;
}

tr:last-child td {
    border-bottom: none;
}

tr:hover td {
    background-color: #f8fafc;
}

.text-center {
    text-align: center;
    color: #64748b;
}

     
    </style>
</head>
<body>

    <div class="container">

        <h3 class="judul mb-2">Tambah Data Inventaris</h3>
        <p class="text-muted">
            Inventaris Lab RPL - Harun | Absen 14
        </p>

        <div class="card shadow">

            <div class="card-header bg-white">

                Form Tambah Barang

@if ($errors->any())
    <div class="alert-error">
        <strong>Terjadi kesalahan!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('inventaris.store') }}"
                      method="POST">

                    @csrf

                    <div class="form-group">
                        <label>Kode Barang</label>

                        <input type="text"
                               name="kode_barang"
                               class="form-control"
                               value="{{ old('kode_barang') }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>

                        <input type="text"
                               name="nama_barang"
                               class="form-control"
                               value="{{ old('nama_barang') }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Kondisi</label>

                        <select name="kondisi"
                                class="form-control"
                                required>

                            <option value="">-- Pilih Kondisi --</option>

                            <option value="Baik"
                                {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>
                                Baik
                            </option>

                            <option value="Rusak"
                                {{ old('kondisi') == 'Rusak' ? 'selected' : '' }}>
                                Rusak
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>

                        <input type="number"
                               name="jumlah"
                               class="form-control"
                               value="{{ old('jumlah') }}"
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('inventaris.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
