import csv

# Nama file input dan output
input_file = 'jan02.xlsx'
output_pasien_file = 'pasien.csv'
output_obat_file = 'obat.csv'
output_resep_file = 'resep.csv'

# Membaca file CSV asli
with open(input_file, mode='r') as infile:
    reader = csv.reader(infile)
    
    # Skip header
    header = next(reader)
    
    # Membuka file untuk output
    with open(output_pasien_file, mode='w', newline='') as pasien_file, \
         open(output_obat_file, mode='w', newline='') as obat_file, \
         open(output_resep_file, mode='w', newline='') as resep_file:
        
        # Membuat objek writer untuk masing-masing file CSV
        pasien_writer = csv.writer(pasien_file)
        obat_writer = csv.writer(obat_file)
        resep_writer = csv.writer(resep_file)
        
        # Menulis header ke masing-masing file CSV
        pasien_writer.writerow(['no_rm', 'no_sep', 'nama_pasien', 'asal_poli'])
        obat_writer.writerow(['nama_obat', 'harga_obat'])
        resep_writer.writerow(['no_rm', 'nama_obat', 'jumlah_obat', 'tanggal'])
        
        # Proses setiap baris dari file CSV input
        for row in reader:
            # Pastikan jumlah kolom yang benar
            if len(row) < 9:  # Jika kurang dari 9 kolom, kita lewati baris ini
                continue

            no_rm = row[0]
            no_sep = row[1]
            nama_pasien = row[2]
            asal_poli = row[3]
            nama_obat = row[4]
            jumlah_obat = row[5]
            harga_obat = row[6]
            tanggal = row[8]

            # Menulis data pasien ke file pasien.csv
            pasien_writer.writerow([no_rm, no_sep, nama_pasien, asal_poli])

            # Menulis data obat ke file obat.csv
            obat_writer.writerow([nama_obat, harga_obat])

            # Menulis data resep ke file resep.csv
            resep_writer.writerow([no_rm, nama_obat, jumlah_obat, tanggal])

print("Data telah dipisah ke dalam file 'pasien.csv', 'obat.csv', dan 'resep.csv'.")
import pandas as pd

# Baca file Excel
df = pd.read_excel("jan02.xlsx")

# 1. Pisahkan data pasien (hapus duplikat berdasarkan no_rm)
df_pasien = df[['no_rm', 'no_sep', 'nama_pasien', 'asal_poli']].drop_duplicates()

# Tambahkan kolom id untuk pasien (auto-increment simulasi)
df_pasien.insert(0, 'id', range(1, len(df_pasien) + 1))

# 2. Pisahkan data obat (hapus duplikat berdasarkan nama_obat)
df_obat = df[['nama_obat', 'harga_obat']].drop_duplicates()
df_obat.rename(columns={'harga_obat': 'harga'}, inplace=True)
df_obat.insert(0, 'id', range(1, len(df_obat) + 1))

# 3. Buat mapping dari nama_obat ke id dan no_rm ke id
obat_map = dict(zip(df_obat['nama_obat'], df_obat['id']))
pasien_map = dict(zip(df_pasien['no_rm'], df_pasien['id']))

# 4. Buat data resep
df['pasien_id'] = df['no_rm'].map(pasien_map)
df['obat_id'] = df['nama_obat'].map(obat_map)
df_resep = df[['pasien_id', 'obat_id', 'jumlah_obat', 'tanggal']].copy()
df_resep.rename(columns={'jumlah_obat': 'jumlah'}, inplace=True)
df_resep.insert(0, 'id', range(1, len(df_resep) + 1))

# 5. Simpan ke CSV
df_pasien.to_csv("pasien.csv", index=False)
df_obat.to_csv("obat.csv", index=False)
df_resep.to_csv("resep.csv", index=False)

print("CSV berhasil dibuat: pasien.csv, obat.csv, resep.csv")
