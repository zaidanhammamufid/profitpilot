# Prompt Claude — Poster ProfitPilot

Prompt siap tempel untuk membuat poster promosi **ProfitPilot** A3 portrait.
Hasil dari Claude berupa satu file HTML/CSS + SVG yang bisa diekspor ke PDF atau PNG.

**Cara pakai singkat:**

1. Buka Claude, mulai chat baru.
2. Tempel seluruh prompt di bawah.
3. Jika punya screenshot dashboard, lampirkan 1–3 screenshot sebelum mengirim.
4. Setelah Claude selesai, simpan file HTML-nya, buka di browser, lalu `Ctrl+P` → **Save as PDF** → ukuran A3, margin none, background graphics aktif.
5. Ganti placeholder `[URL APLIKASI]` dengan URL asli sebelum dipublikasikan.

---

## Prompt lengkap

```text
Kamu adalah senior graphic designer sekaligus front-end engineer yang spesialis membuat poster cetak premium untuk produk SaaS dan fintech. Tugasmu: buat poster promosi A3 portrait untuk ProfitPilot, aplikasi web pengelolaan keuangan usaha untuk UMKM Indonesia.

JANGAN hanya memberi konsep, deskripsi, atau moodboard. Langsung eksekusi menjadi satu file HTML lengkap dengan CSS embedded dan SVG inline. Jangan pakai JavaScript. Hasilnya harus bisa dibuka di browser, terlihat seperti poster final, dan bisa dicetak ke PDF tanpa berantakan.

Jika saya melampirkan screenshot aplikasi, gunakan screenshot itu sebagai referensi akurasi istilah, angka, dan proporsi UI. Jangan menempel screenshot sebagai gambar utama; recreasi dashboard-nya dengan HTML/CSS/SVG supaya tajam dan konsisten.

## 1. KONTEKS PRODUK

Nama produk: ProfitPilot
Tagline: "Kendalikan Bisnis. Kembangkan Profit."
Kategori: Aplikasi pengelolaan keuangan usaha.
Audiens: pemilik warung, toko, kafe, dan UMKM di Indonesia, usia 25–45 tahun, praktis, tidak suka istilah akuntansi rumit.
Tujuan poster: dalam 5 detik orang paham apa produknya, masalah apa yang diselesaikan, dan apa langkah berikutnya.
Nada brand: terpercaya, hangat, tenang, terarah, tidak menggurui, tidak hard-sell.

Fitur nyata yang boleh ditonjolkan:
- Mencatat pemasukan dan pengeluaran.
- Transaksi multi-barang dengan total otomatis.
- Stok berkurang otomatis setelah transaksi.
- Peringatan stok menipis dan fitur restok.
- Grafik omzet mingguan.
- Data tiap toko terpisah di akunnya sendiri.
- Profil toko dan riwayat transaksi.

Jangan menampilkan atau mengklaim hal yang tidak ada di aplikasi: gratis, cloud, real-time, multi-kasir, integrasi pembayaran, backup otomatis, AI analisis, atau "100% aman".

## 2. PESAN POSTER

Hierarki copy:
1. Eyebrow kecil: "APLIKASI PENGELOLAAN KEUANGAN USAHA"
2. Headline utama: "Kendalikan Bisnis. Kembangkan Profit."
3. Subheadline: "Catat transaksi, kelola stok, dan pantau omzet usaha dalam satu dashboard."
4. Bukti visual: mockup dashboard dengan contoh data.
5. Empat fitur singkat.
6. CTA: "Daftar Sekarang" + placeholder "[URL APLIKASI]".
7. Footer kecil: "Data pada mockup adalah contoh."

Gunakan Bahasa Indonesia yang natural dan ringkas. Maksimal 5–9 kata per kartu fitur. Jangan pakai lorem ipsum.

## 3. KONTEN WAJIB

A. Logo
Buat logo ProfitPilot sebagai SVG bersih: tiga batang grafik yang naik, garis tren menuju kanan atas, dan paper plane di ujung garis. Jika saya melampirkan file logo, gunakan logo itu dan jangan mengubah bentuk atau warnanya. Beri clear space minimal setinggi satu batang grafik.

B. Mockup dashboard
Tampilkan dashboard fiktif yang realistis dan tajam, bukan screenshot blur. Gunakan contoh data berikut agar konsisten:
- Total Pemasukan: Rp 21.350.000
- Total Pengeluaran: Rp 8.150.000
- Saldo Bersih: Rp 13.200.000
- Grafik omzet mingguan: M1 Rp 2.650.000; M2 Rp 3.100.000; M3 Rp 3.550.000; M4 Rp 3.900.000
- Transaksi terbaru: "Penjualan sore", "Kopi Susu ×2", "Roti Bakar ×1"
- Nama toko contoh: "Warung Kopi Senja"

Buat dashboard terlihat seperti aplikasi nyata: sidebar tipis, kartu metrik, grafik batang/garis, badge stok, dan tabel transaksi. Jangan menaruh terlalu banyak elemen sampai poster terasa sesak.

C. Empat fitur
Tampilkan sebagai empat kartu atau chip dengan ikon SVG sederhana:
1. "Catat pemasukan & pengeluaran"
2. "Stok berkurang otomatis"
3. "Peringatan stok menipis"
4. "Grafik omzet mingguan"

D. CTA
Tombol atau blok CTA yang jelas: "Daftar Sekarang". Sertakan "[URL APLIKASI]" sebagai placeholder, jangan mengarang domain. Jangan membuat QR code yang mengarah ke URL palsu.

## 4. ARAH VISUAL

Gaya: editorial fintech premium, bersih, lapang, percaya diri. Bukan poster generik dengan gradient ungu neon, bukan stok foto jabat tangan, bukan ilustrasi kartun, bukan tumpukan koin 3D.

Palet:
- Off-white #F8FAFC untuk background utama.
- Deep navy #0F2A43 untuk panel hero dan teks kuat.
- Navy #2563A6 untuk aksen brand dan tombol.
- Cyan #06B6D4 untuk garis tren, glow halus, dan highlight.
- Cyan light #A5F3FC untuk partikel atau trail pesawat.
- Ink #1E293B untuk teks utama.
- Muted #64748B untuk teks sekunder.
- Border #E2E8F0 untuk garis dan pemisah.
- Green #059669 hanya untuk status positif.
- Amber #B45309 hanya untuk status stok menipis.
- Red #DC2626 hanya untuk status negatif.

Komposisi warna: 60% netral, 30% navy, 10% cyan. Merah dan hijau hanya untuk status, bukan dekorasi.

Tipografi:
- Gunakan "Plus Jakarta Sans" dari Google Fonts, fallback ke system sans-serif.
- Headline: weight 800, sangat besar, rapat, tegas.
- Subheadline: weight 500, nyaman dibaca.
- Label/eyebrow: weight 600–700, uppercase, letter-spacing 0.08–0.14em.
- Angka dashboard: tabular numerals, weight 700.
- Jangan pakai lebih dari dua keluarga font.

Motif visual:
- Paper plane dan garis flight path sebagai benang merah brand.
- Grid tipis atau titik halus di background, jangan ramai.
- Panel dashboard boleh sedikit miring 0–4 derajat, tapi teks dan angka tetap tajam.
- Shadow lembut, bukan shadow berat.
- Tekstur grain sangat halus hanya di background, jangan di teks.

## 5. LAYOUT

Kanvas: A3 portrait, 210 × 297 mm, setara 2480 × 3508 px pada 300 DPI. Safe margin minimal 15 mm. Gunakan grid 12 kolom dengan gutter 6 mm.

Struktur default:
- Header (atas): logo kiri, eyebrow atau label kecil kanan. Tinggi sekitar 10% kanvas.
- Hero copy: headline 2 baris dan subheadline. Rata kiri. Beri napas yang cukup.
- Panel visual: panel deep navy besar dengan dashboard mockup, grafik, dan paper plane path. Ini area paling menarik perhatian setelah headline.
- Feature strip: empat kartu fitur di bawah panel, sejajar atau grid 2×2.
- Footer: CTA "Daftar Sekarang", placeholder URL, logo kecil, dan catatan "Data pada mockup adalah contoh."

Aturan layout:
- Headline harus elemen terbesar.
- Dashboard harus jadi bukti visual, bukan dekorasi.
- CTA harus terlihat jelas tanpa bersaing dengan headline.
- Jangan menaruh teks di atas area angka penting.
- Jangan biarkan ada teks yang terpotong, meluber, atau terlalu dekat tepi.
- Beri jarak antar-elemen yang konsisten, kelipatan 4 atau 8 px.

## 6. SPESIFIKASI TEKNIS

- Satu file HTML mandiri. CSS di dalam <style>. SVG inline. Tanpa JavaScript.
- Gunakan CSS @page { size: A3 portrait; margin: 0; }.
- Buat .poster { width: 210mm; height: 297mm; overflow: hidden; position: relative; }.
- Di layar, tampilkan poster di tengah dengan background netral dan shadow tipis.
- Di mode print, hilangkan shadow, margin, dan background luar; poster mengisi halaman.
- Semua ukuran font memakai pt atau mm agar hasil cetak konsisten.
- Jangan pakai gambar eksternal. Google Fonts boleh via @import; sediakan fallback.
- Pastikan aman dicetak hitam-putih: hierarki tetap terbaca jika warna hilang.
- Kontras teks minimal 4.5:1.

## 7. LARANGAN

- Jangan membuat poster yang penuh teks sampai tidak bisa dibaca dari jauh.
- Jangan memakai gradient ungu-biru neon, glassmorphism berlebihan, atau efek glow di semua elemen.
- Jangan memakai stok foto, wajah AI, atau ilustrasi orang yang tidak perlu.
- Jangan mengarang testimoni, rating, jumlah pengguna, penghargaan, logo partner, atau badge app store.
- Jangan menulis "gratis", "cloud", "real-time", "AI", "multi-kasir", "terenkripsi", atau klaim absolut lain.
- Jangan memakai angka yang tidak konsisten dengan data di atas.
- Jangan menaruh placeholder seperti "Lorem ipsum", "Your text here", atau "XXX".
- Jangan membuat banyak variasi setengah jadi. Buat satu poster final yang selesai.

## 8. QA SEBELUM SELESAI

Periksa dan pastikan:
- Semua teks Bahasa Indonesia ejaannya benar.
- Semua angka konsisten dan format Rupiah benar.
- Tidak ada teks yang overflow atau terpotong.
- Logo terbaca saat poster dilihat dalam ukuran thumbnail.
- Headline terbaca dari jarak 2 meter.
- CTA terlihat dalam 5 detik pertama.
- Tidak ada klaim palsu.
- Poster terasa seperti brand ProfitPilot, bukan template poster generik.

## 9. OUTPUT YANG SAYA INGINKAN

1. Satu file HTML lengkap yang siap disimpan dan dibuka di browser.
2. Kode harus rapi, mudah diubah, dan diberi komentar singkat di bagian utama.
3. Setelah kode, beri 5 bullet singkat berisi keputusan desain dan cara ekspor ke PDF/PNG.
4. Jangan menjelaskan konsep panjang lebar sebelum kode. Langsung berikan hasilnya.

Mulai sekarang. Jika ada informasi yang kurang, ambil asumsi paling masuk akal dan sebutkan asumsinya singkat di akhir, bukan di awal.
```
