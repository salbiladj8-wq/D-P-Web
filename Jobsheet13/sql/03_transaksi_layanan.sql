CREATE TABLE IF NOT EXISTS transaksi_layanan (
    id SERIAL PRIMARY KEY,
    pelanggan_id INTEGER NOT NULL REFERENCES pelanggan(id) ON DELETE RESTRICT,
    layanan_id INTEGER NOT NULL REFERENCES layanan(id) ON DELETE RESTRICT,
    karyawan_id INTEGER NOT NULL REFERENCES karyawan(id) ON DELETE RESTRICT,
    harga_saat_transaksi INTEGER NOT NULL CHECK (harga_saat_transaksi >= 0),
    durasi_saat_transaksi INTEGER NOT NULL CHECK (durasi_saat_transaksi > 0),
    status VARCHAR(20) NOT NULL DEFAULT 'berlangsung'
        CHECK (status IN ('berlangsung', 'selesai')),
    waktu_mulai TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
    waktu_selesai TIMESTAMPTZ,
    CHECK (
        (status = 'berlangsung' AND waktu_selesai IS NULL)
        OR (status = 'selesai' AND waktu_selesai IS NOT NULL)
    )
);

CREATE INDEX IF NOT EXISTS idx_transaksi_layanan_status
    ON transaksi_layanan(status);
CREATE INDEX IF NOT EXISTS idx_transaksi_layanan_pelanggan
    ON transaksi_layanan(pelanggan_id, waktu_mulai DESC);
