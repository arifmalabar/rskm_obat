import pandas as pd

# Ganti ini sesuai nama file Excel Anda
excel_file = '02jan.xlsx'

# Membaca file Excel
df = pd.read_excel(excel_file)

# Ubah nama kolom agar konsisten
df.columns = df.columns.str.strip().str.lower().str.replace(' ', '_')

# Ubah harga dengan koma ke titik
df['harga_obat'] = df['harga_obat'].astype(str).str.replace(',', '.').astype(float)
df['total_harga'] = df['total_harga'].astype(str).str.replace(',', '.').astype(float)

# Simpan data pasien unik
pasien_df = df[['no_rm', 'no_sep', 'nama_pasien', 'asal_poli']].drop_duplicates(subset=['no_rm'])
pasien_df.to_csv('pasien.csv', index=False)

# Simpan data obat unik
obat_df = df[['nama_obat', 'harga_obat']].drop_duplicates(subset=['nama_obat'])
obat_df.to_csv('obat.csv', index=False)

# Simpan data resep
resep_df = df[['no_rm', 'nama_obat', 'jumlah_obat', 'tanggal']].copy()
resep_df = resep_df.rename(columns={
    'jumlah_obat': 'jumlah',
    'tanggal': 'tanggal_input'
})
resep_df.to_csv('resep.csv', index=False)

print("✅ Data berhasil diproses!")
print("File CSV disimpan sebagai: pasien.csv, obat.csv, resep.csv")
