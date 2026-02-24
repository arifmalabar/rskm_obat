import pandas as pd
from datetime import datetime

# === Baca File Excel ===
df = pd.read_excel("02jan.xlsx")  # Ganti dengan file Anda

# === Bersihkan kolom harga_obat ===
# Menghapus simbol mata uang dan format angka menjadi float
df['harga_obat'] = (
    df['harga_obat']
    .astype(str)                        # Pastikan kolom berupa string
    .str.replace(r'[^\d,.-]', '', regex=True)  # Hapus semua kecuali angka, titik, koma, minus
    .str.replace(',', '.')             # Ubah koma jadi titik desimal
    .astype(float)                     # Konversi ke float
)

# === 1. Buat Data Pasien Unik ===
pasien_df = df[['no_rm', 'no_sep', 'nama_pasien', 'asal_poli']].drop_duplicates().reset_index(drop=True)
pasien_df['id'] = pasien_df.index + 1  # Buat ID manual

# === 2. Buat Data Obat Unik ===
obat_df = df[['nama_obat', 'harga_obat']].drop_duplicates().reset_index(drop=True)
obat_df['id'] = obat_df.index + 1  # Buat ID manual

# === 3. Buat Data Resep ===
# Merge untuk ambil ID pasien dan obat
resep_df = df.merge(pasien_df, on=['no_rm', 'no_sep', 'nama_pasien', 'asal_poli'])
resep_df = resep_df.merge(obat_df, on=['nama_obat', 'harga_obat'])

# Ambil kolom yang diperlukan
resep_final = resep_df[['id_x', 'id_y', 'jumlah_obat', 'tanggal']]
resep_final.columns = ['pasien_id', 'obat_id', 'jumlah', 'tanggal_input']
resep_final['id'] = resep_final.index + 1  # Buat ID manual
resep_final = resep_final[['id', 'pasien_id', 'obat_id', 'jumlah', 'tanggal_input']]

# === 4. Simpan sebagai CSV ===
pasien_df = pasien_df[['id', 'no_rm', 'no_sep', 'nama_pasien', 'asal_poli']]
obat_df = obat_df[['id', 'nama_obat', 'harga_obat']]

pasien_df.to_csv("pasien.csv", index=False)
obat_df.to_csv("obat.csv", index=False)
resep_final.to_csv("resep.csv", index=False)

print("✅ Semua file CSV berhasil dibuat: pasien.csv, obat.csv, resep.csv")
