CREATE TABLE IF NOT EXISTS layanan (
    id SERIAL PRIMARY KEY,
    nama_layanan VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga INTEGER NOT NULL CHECK (harga >= 0),
    durasi INTEGER NOT NULL CHECK (durasi > 0)
);

CREATE TABLE IF NOT EXISTS pelanggan (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_pelanggan VARCHAR(30) NOT NULL,
    alamat VARCHAR(150),
    no_hp VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS karyawan (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_karyawan VARCHAR(30) NOT NULL,
    jabatan VARCHAR(50) NOT NULL,
    no_hp VARCHAR(30)
);

INSERT INTO layanan (nama_layanan, kategori, harga, durasi)
SELECT seed.nama_layanan, seed.kategori, seed.harga, seed.durasi
FROM (VALUES
    ('Hair Cut', 'Rambut', 50000, 45),
    ('Hair Spa', 'Perawatan', 100000, 60),
    ('Basic Manicure', 'Kuku', 75000, 45)
) AS seed(nama_layanan, kategori, harga, durasi)
WHERE NOT EXISTS (SELECT 1 FROM layanan);

INSERT INTO pelanggan (nama, no_pelanggan, alamat, no_hp)
SELECT seed.nama, seed.no_pelanggan, seed.alamat, seed.no_hp
FROM (VALUES
    ('Salbila', 'PLG001', 'Malang', '0817xxx'),
    ('Citra', 'PLG002', 'Malang', '0823xxx')
) AS seed(nama, no_pelanggan, alamat, no_hp)
WHERE NOT EXISTS (SELECT 1 FROM pelanggan);

INSERT INTO karyawan (nama, no_karyawan, jabatan, no_hp)
SELECT seed.nama, seed.no_karyawan, seed.jabatan, seed.no_hp
FROM (VALUES
    ('Najwa', 'KRY001', 'Stylist', '0811xxx'),
    ('Bebe', 'KRY002', 'Beautician', '0822xxx')
) AS seed(nama, no_karyawan, jabatan, no_hp)
WHERE NOT EXISTS (SELECT 1 FROM karyawan);