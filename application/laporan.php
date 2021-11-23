
Report 28/10/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. master debitur
2. Membuat view V_debitur 
3. controller master: 
- Memperbaiki fungsi index, menambahkan data asuransi dan data bank 
- Membuat fungsi debitur import, proses import data dari excel 
- Membuat fungsi input_m_periode
- Membuat fungsi ambil_nama_deb
- Membuat fungsi form_detail_debitur, menampilkan detail debitur 
- Membuat fungsi simpan_edit_debitur
- Membuat fungsi input_debitur
- Membuat fungsi ambil_cabang_asuransi, ambil_cabang_bank, ambil_capem_bank

Progress : 30%

Report 29/10/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. halaman input rekon
2. controller Rekon: 
- Membuat fungsi input 
- Membuat fungsi tampil_debitur_recov 
- Membuat fungsi update_bayar 
3. model M_rekon: 
- Membuat fungsi list_bank_rekon
- Membuat fungsi get_debitur_r, jumlah_semua_debitur_r, jumlah_filter_debitur_r
4. Membuat view V_input_recov
5. menambahkan script javascript pada V_input_recov, untuk data debitur recov

Progress : 40%

Report 30/10/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. halaman periode
2. controller rekon: 
- Membuat fungsi periode 
- Membuat fungsi tambah_data_periode_rekon
- Membuat fungsi cek_bln_periode
- Membuat fungsi tampil_periode_rekon
- Membuat fungsi tampil_periode
3. model M_rekon: 
- Membuat fungsi get_periode_rekon, jumlah_semua_periode_rekon, jumlah_filter_periode_rekon
- Membuat fungsi get_periode, jumlah_semua_periode, jumlah_filter_periode
4. Membuat halaman view V_periode

Progress : 50%

Report 31/10/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. halaman rekonsiliasi
2. controller rekon: 
- Membuat fungsi index
- Membuat fungsi tampil_option_periode_buat 
- Membuat fungsi simpan_rekon 
- Membuat fungsi list_periode_rekon 
- Membuat fungsi tampil_rekon, tampil_rekon_deb
3. model M_rekon: 
- Membuat fungsi list_periode_rekon
- Membuat fungsi get_periode_cab
- Membuat fungsi get_rekon, jumlah_semua_rekon, jumlah_filter_rekon
- Membuat fungsi get_rekon_deb, jumlah_semua_rekon_deb, jumlah_filter_rekon_deb
4. Membuat halaman view V_rekonsiliasi

Progress : 55%

Report 01/11/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman monitoring bar 
2. Membuat javascript datatable untuk tabel periode 
3. Membuat fungsi tampil_periode_bar, menampilkan data bar
4. controller monitoring: 
- Membuat fungsi index
- Membuat fungsi bar
- Membuat fungsi upload_ttd_bar
- Membuat fungsi option_periode_bar
- Membuat fungsi tampil_periode_bar
5. model M_monitoring: 
- Membuat fungsi get_periode_bar, jumlah_semua_periode_bar, jumlah_filter_periode_bar

Progress : 60%

Report 04/11/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. proses tambah bar
2. controller monitoring: 
- membuat fungsi proses_tambah_bar 
- Membuat fungsi cetak_bar
3. model M_monitoring: 
- mmbuat fungsi get_data_cetak
- membuat fungsi get_data_all_cetak
- membuat fungsi get_data_excel
4. Membuat view: 
- view V_cetak_bar
- view V_cetak_bar_excel

Progress : 65%

Report 05/11/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman monitoring invoice 
2. Membuat fungsi pada controller Monitoring: 
- fungsi invoice, menampilkan halaman invoice
- fungsi tampil_invoice, untuk menampilkan data invoice 
3. Membuat fungsi pada model M_monitoring 
- fungsi list_periode_invoice, fungsi get_data_cabang_as
- fungsi get_invoice untuk menampilkan data invoice
- fungsi jumlah_semua_invoice
- fungsi jumlah_filter_invoice
4. Membuat halaman V_invoice
- menambahkan javascript datatable tabel invoice
- menambahkan aksi button filter dan reset tabel invoice 

Progress : 68%

Report 06/11/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat fungsi tampil_invoice_tambah, menampilkan tabel list invoice tambah  
2. Membuat fungsi pada model M_monitoring 
- membuat fungsi get_invoice_tambah, query invoice tambah 
- membuat fungsi jumlah_semua_invoice_tambah
- membuat fungsi jumlah_filter_invoice_tambah
3. Membuat javascript aksi button tambah data
4. Membuat fungsi tampil_list_cabang_as controller Monitoring 
5. Membuat javascript datatable tabel invoice tambah 
6. Membuat javascript aksi buttton filter dan reset data 
7. Membuat aksi javascript button kembali
8. Membuat fungsi list_periode_invoice controller Monitoring 

Progress : 70%

Report 07/11/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat javascript aksi untuk buat invoice pada view V_invoice 
- membuat kondisi bila list cabang asuransi belum dipilih 
- membuat kondisi bila checkbox invoice belum dipilih salah satu 
2. Membuat fungsi proses_tambah_invoice controller Monitoring 
- membuat algoritma untuk pembuatan kode invoice 
- menambahkan list periode combobox untuk dikirimkan pada json 

Progress : 75%

Report 08/11/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki halaman monitoring invoice 
2. Menyelesaikan aksi button cetak invoice 
3. Memperbaiki fungsi tampil_invoice 
- menambahkan link untuk button cetak invoice 
4. Membuat fungsi cetak_invoice pada controller monitoring 
5. Membuat fungsi get_no_invoice, list_data_recov pada model M_monitoring
6. Membuat view halaman V_cetak untuk tampilan cetak invoice

Progress : 80%

Report 11/11/2019

Nama Project    : I-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki halaman monitoring bar 
2. Menyelesaikan aksi button cetak bar, cetak lampiran excel, upload ttd bar 
3. Memperbaiki fungsi tampil_periode_bar
- menambahkan link untuk cetak bar, cetak lampiran excel
- membuat upload ttd bar
4. Membuat fungsi cetak_bar
- untuk proses aksi ceta bar ataupun cetak lampiran excel 
5. Membuat view V_cetak_bar untuk tampilan cetak bar
6. Membuat view V_cetak_bar_excel untuk tampilan cetak bar excel
7. Membuat fungsi upload_ttd_bar

Progress : 100%

Report 12/11/2019

Nama Project    : A-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki halaman home 
2. Memperbaiki desain halaman view V_home  
3. Menampilkan list jenis asset dengan icon
4. Menampilkan courosel favorit 
5. Menampilkan data jumlah lelang, dijual dan lain lain 
6. Menampilkan daftar rekanan, wilayah kelolaan
7. Memperbaiki halaman informasi 
8. Menampilkan tab data informasi, daftar rekanan, jadwal lelang dan kontak

Progress : 25%

Report 13/11/2019

Nama Project    : A-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Merubah desain halaman view V_info_sk 
2. Menampilkan tab data informasi 
3. Memperbaiki fungsi index controller Info 
4. Membuat fungsi get_informasi pada model M_info 
5. Menampilkan jenis informasi dinamis sesuai dengan data pada tabel database 
6. Membuat javascript aksi simpan informasi pada view V_info_sk 
7. Membuat fungsi simpan_informasi pada controller Info 
8. Mememperbaiki tampilan halaman jadwal lelang 
9. Membuat javascript datatable menampilkan data jadawal lelang 
10. Membuat fungsi pada controller Info 
- fungsi tampil_jadwal_lelang, menmapilkan data dengan data table server side  
- fungsi aksi_jadwal_lelang, untuk proses aksi simpan, ubah, ataupun hapus data jadwal lelang 
- fungsi ambil_data_ajax_lelang, untuk mengambil data jadwal lelang sesuai dengan id yang dituju 
11. Membuat script javascript pada view V_info_sk: 
- aksi button tambah data jadwal lelang 
- aksi simpan jadwal lelang, untuk proses simpan data, ubah data 
- aksi button edit data, menampilkan data sesuai dengan id jadwal lelang 
- aksi button hapus lelang, proses menghapus jadwal lelang

Progress : 30%

Report 14/11/2019

Nama Project    : A-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman katalog 
2. Membuat view V_katalog 
3. Membuat fungsi get_jenis_asset model M_katalog 
4. Membuat halaman v_assets 
5. Membuat fungsi tampil_deb_asset controller katalog 
6. Membuat aksi javascript untuk filter data dan reset data

Progress : 35%

Report 15/11/2019

Nama Project    : A-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman dokumen aset kelolaan
2. Membuat halaman V_dokumen_agunan 
3. Membuat fungsi tampil_deb_kelolaan controller Agunan 
4. Membuat aksi javascript untuk filter data dan reset data 
5. Membuat aksi untuk detail asset debitur 
6. Membuat fungsi list_asset_deb controller agunan
7. Membuat view V_list_asset_deb

Progress : 40%

Report 18/11/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki halaman prioritas 
2. Memperbaiki tampil data list prioritas, expired belum dikerjakan, selesai tuntas 
3. Memperbaiki fungsi list_prioritas controller Manager 
- memberikan kondisi bila data telah diubah atau belum 
- menghapus kondisi ubah data status selesai tuntas

Progress : 100%

Report 19/11/2019

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Menyelesaikan merubah semua query yang menggunakan tabel recoveries merubah ke tr_recov_as 
2. Memperbaiki halaman report 1, report 2, report 3, report 4 
3. Memperbaiki fungsi model pada M_all_report 
- get_jml_noa_report1, get_recov_invo_report1, get_noa_recov_report1
- get_data_jml_noa, get_data_jml_noa_s
- get_data_jml_noa, get_data_jml_noa_sdh
- get_data_report_4

Progress : 100%

Report 20/11/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki sorting tabel tambah prioritas 
2. Memperbaiki fungsi get data list tambah prioritas pada model manager 
3. Memperbaiki fungsi get jumlah list tambah prioritas pada model manager 

Progress : 100%

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Proses kondisi untuk user syariah
2. Menyelesaikan halaman ots untuk user syariah 
3. Menyelesaikan halaman noa untuk user syariah 
4. Menyelesaikan halaman recov untuk user syariah 
5. Menyelesaikan halaman proses untuk user syariah  
6. Proses Menyelesaikan halaman dashboard untuk user syariah 

Progress : 100%

Nama Project    : MKD (Revisi)
Tahapan         : Build
Detail          : 

1. Memperbaiki halaman pemasukan  
2. Menambahkan filter dropdown umkm 
3. Menmabhakan field penjualan dan jumlah 
4. Memperbaiki halaman pengeluaran  
5. Menambahkan filter dropdown umkm 
6. Menambahkan field pembelian dan jumlah

Progress : 100%

Report 21/11/2019

Nama Project    : MKD (Revisi)
Tahapan         : Build
Detail          : 

1. Merubah desain halaman login 
2. Memperbaiki view V_login 
3. Memperbaiki tampilan untuk kondisi aktif pada sidebar 
4. Memperbaiki desain halaman pemasukan user admin: 
5. Memubat fungsi pada view pemasukan 
- aksi fungsi tampil data pada datatable 
- aksi untuk filter data 
- aksi untuk reset data 
6. Memperbaiki fungsi get pemasukan 
7. Memperbaiki fungsi ambil total pemasukan 
8. Memperbaiki desain halaman pengeluaran user admin
9. Memubat fungsi pada view pengeluaran 
- aksi fungsi tampil data pada datatable 
- aksi untuk filter data 
- aksi untuk reset data 
10. Memperbaiki fungsi get pengeluaran 
11. Memperbaiki fungsi ambil total pengeluaran

Progress : 100%

Report 22/11/2019

Nama Project    : MKD (Revisi)
Tahapan         : Build
Detail          : 

1. Memperbaiki desain halaman pemasukan umkm user pegawai
- Menambahkan filter data periode tanggal 
- Membuat table data dengan server side 
2. Membuat fungsi javascript: 
- aksi untuk datatable 
- aksi untuk filter 
- aksi untuk reset data 
3. Membuat fungsi pada controller pemasukan: 
- fungsi get_pemasukan 
- fungsi ambil_total_pemasukan
4.  Memperbaiki desain halaman pengeluaran umkm user pegawai
- Menambahkan filter data periode tanggal 
- Membuat table data dengan server side 
5. Membuat fungsi javascript pada halaman pengeluaran umkm: 
- aksi untuk datatable 
- aksi untuk filter 
- aksi untuk reset data 
6. Membuat fungsi pada controller pengeluaran: 
- fungsi get_pengeluaran 
- fungsi ambil_total_pengeluaran

Progress : 100%

Report 25/11/2019

Nama Project    : MKD (Revisi)
Tahapan         : Build
Detail          : 

1. Membuat desain halaman saldo umkm 
2. Membuat fungsi javascript pada halaman saldo umkm: 
- fungsi dataTable untuk tabel saldo
- aksi untuk filter data 
- aksi untuk reset data 
- aksi untuk tambah data 
- aksi untuk button kembali 
- aksi menampilkan modal buat pencatatan
- aksi simpan data pencatatan
- aksi untuk edit data pencatatan
- aksi untuk hapus data pencatatan 
3. Membuat fungsi pada controller saldo: 
- fungsi get_saldo_baru
- fungsi ambil_total_saldo

Progress : 100%

Report 26/11/2019

Nama Project    : MKD (Revisi)
Tahapan         : Build
Detail          : 

1. Memperbaiki desain halaman summary
2. Memperbaiki halaman saldo user admin 
- membuat kondisi aksi button detail 
3. Memperbaiki fungsi untuk menampilkan data saldo umkm
4. Membuat fungsi pada controller saldo: 
- fungsi form_tambah_detail
- fungsi tambah_pencatatan
- fungsi ambil_data_pencatatan

Progress : 100%

Report 27/11/2019

Nama Project    : MKD (Revisi)
Tahapan         : Build
Detail          : 

1. Menyelesaikan halaman summary admin 
2. Memperbaiki fungsi index pada controller Summary 
- menambahkan proses menampilkan data summary menurut bulan transaksi 
- menambahkan data untuk total laba 
3. Memperbaiki tampilan view halaman summary  
- menampilkan data summary 
- membuat aksi javascript untuk button filter dan reset data , button kembali 
4. Membuat fungsi pada controller SUmmary: 
- fungsi form_filter_summary 
- fungsi form_detail_summary 

Progress : 100%

Report 28/11/2019

Nama Project    : A-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Menyelesaikan perubahan status pada katalog asset

Progress : 45%


