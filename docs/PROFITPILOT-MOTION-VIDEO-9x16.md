# ProfitPilot — Motion Video 9:16

**Prompt, Storyboard, Naskah, dan SFX**

| Item | Detail |
|---|---|
| Versi | 1.0 |
| Tanggal | 10 November 2026 |
| Produk | ProfitPilot — Aplikasi Pengelolaan Keuangan Usaha |
| Format | Vertikal 9:16, 1080 × 1920 px |
| Durasi master | 40 detik |
| Bahasa | Indonesia |
| Gaya | Hybrid live-action + UI motion graphics |
| Target | TikTok, Instagram Reels, YouTube Shorts |
| File ini | `docs/PROFITPILOT-MOTION-VIDEO-9x16.md` |

---

## 0. Cara Pakai Dokumen

Dokumen ini dibuat agar bisa langsung dipakai oleh editor, motion designer, AI video generator, maupun AI agent produksi.

| Bagian | Dipakai untuk |
|---|---|
| 1–3 | Briefing project, brand, dan spesifikasi output |
| 4 | Prompt master yang bisa langsung ditempel ke AI video |
| 5–6 | Arah cerita dan storyboard per scene |
| 7–8 | Rekaman VO, teks layar, dan subtitle |
| 9–10 | Sound design dan musik |
| 11–12 | Prompt per shot, prompt VO AI, prompt musik AI |
| 13–14 | Alur produksi, QA, cutdown, dan deliverable |

**Urutan kerja yang disarankan:**

1. Setujui konsep, naskah, dan storyboard.
2. Siapkan data dummy di aplikasi.
3. Rekam UI asli.
4. Generate plate AI untuk scene live-action/abstract.
5. Susun rough cut 40 detik.
6. Komposit UI dan teks.
7. Isi VO, SFX, dan musik.
8. Color grading, mix, export, QA.
9. Buat cutdown 30 detik, 15 detik, dan 3 varian hook.

**Legend:**

- `TC` = timecode.
- `/` di naskah = jeda pendek 150–250 ms.
- `VO` = voice over.
- `SFX` = sound effect.
- `dBFS` = level audio digital.
- `LUFS` = loudness terintegrasi.

> **Prinsip utama:** AI video dipakai untuk dunia visual dan transisi. UI asli, angka, dan teks Indonesia **tidak** digenerate AI — semuanya direkam dari aplikasi lalu dikomposit di editing.

---

## 1. Ringkasan Project

### 1.1 Produk

**ProfitPilot** adalah aplikasi web pengelolaan keuangan usaha untuk pemilik warung, toko, kafe, dan UMKM lain. Aplikasi ini membantu mencatat pemasukan dan pengeluaran, mengelola barang dan stok, serta memantau omzet dalam satu dashboard.

- **Stack:** Laravel 11, MySQL, Blade, CSS kustom.
- **Nama brand di UI:** ProfitPilot.
- **Nama folder project:** `profilpilot` (secara visual tetap ditulis **ProfitPilot**).
- **Tagline utama:** “Kendalikan Bisnis. Kembangkan Profit.”
- **Sub-tagline:** “Aplikasi Pengelolaan Keuangan Usaha.”

### 1.2 Alur pengguna

1. Pengunjung masuk ke landing page.
2. Daftar atau login memakai **nama toko** dan password.
3. Masuk ke dashboard yang menampilkan pemasukan, pengeluaran, saldo bersih, dan transaksi terbaru.
4. Mencatat transaksi penjualan barang atau pemasukan manual.
5. Mengelola data barang, stok, dan restok.
6. Melihat ringkasan dan grafik omzet mingguan.
7. Mengedit profil toko dan password.

### 1.3 Fitur yang boleh ditonjolkan

| Fitur | Bukti di aplikasi | Cara menampilkan di video |
|---|---|---|
| Pencatatan pemasukan dan pengeluaran | Form transaksi + riwayat | Isi form, simpan, lihat baris riwayat |
| Penjualan multi-barang | `items` array, subtotal otomatis | Tambah dua barang, total berubah |
| Total otomatis | Perhitungan harga × jumlah | Angka total roll-up |
| Stok berkurang otomatis | `decrement('stok')` setelah transaksi | Badge stok turun setelah simpan |
| Pembatalan mengembalikan stok | `destroy()` mengembalikan stok | Opsional, tidak masuk master 40 detik |
| Stok menipis | Badge `≤ 5` berwarna amber | Badge “3 tersisa” |
| Restok + riwayat | Modal restok + tabel riwayat | Restok 12 unit, badge berubah hijau |
| Grafik omzet mingguan | Canvas chart + tabel mingguan | Bar dan line chart tumbuh |
| Data per akun toko | Semua query memakai `user_id` | Tunjukkan dashboard toko yang berbeda |
| Profil toko | Halaman profil dan edit profil | Opsional, tidak masuk master |

### 1.4 Klaim yang harus dihindari

Jangan menulis atau mengatakan hal-hal berikut tanpa bukti teknis:

- “Gratis” — belum ada halaman harga atau lisensi publik.
- “Cloud” / “tersimpan di cloud” — belum tentu ada deployment cloud.
- “Real-time” — tidak ada websocket atau sinkronisasi real-time.
- “Multi-kasir” / “untuk tim” — model data saat ini per akun toko.
- “100% aman” / “terenkripsi end-to-end” — terlalu absolut.
- “Backup otomatis” — tidak terlihat di codebase.
- “Integrasi pembayaran” — tidak ada payment gateway.
- “AI analisis” — tidak ada fitur AI di aplikasi.
- “Akses dari mana saja” — hanya jika aplikasi sudah di-deploy dan bisa diakses publik.

Gunakan bahasa yang aman:

- “Data tiap toko terpisah di akunnya sendiri.”
- “Catat transaksi lebih cepat.”
- “Stok dan omzet lebih mudah dipantau.”
- “Satu dashboard untuk pemasukan, pengeluaran, dan saldo bersih.”

### 1.5 Data dummy yang dipakai di seluruh video

Gunakan data ini secara konsisten di dashboard, transaksi, barang, dan omzet.

**Toko:**

| Field | Nilai |
|---|---|
| Nama toko | Warung Kopi Senja |
| Inisial avatar | W |
| Tanggal transaksi | 10/11/2026 |
| Keterangan transaksi | Penjualan sore |

**Barang:**

| Barang | Harga | Stok awal | Status awal |
|---|---:|---:|---|
| Kopi Susu | Rp 18.000 | 24 | Normal |
| Roti Bakar | Rp 15.000 | 4 | Rendah |
| Air Mineral | Rp 5.000 | 40 | Normal |
| Nasi Goreng | Rp 25.000 | 0 | Habis |

**Transaksi di scene 5:**

| Barang | Qty | Subtotal |
|---|---:|---:|
| Kopi Susu | 2 | Rp 36.000 |
| Roti Bakar | 1 | Rp 15.000 |
| **Total** | | **Rp 51.000** |

**Perubahan stok:**

| Barang | Sebelum | Sesudah transaksi | Sesudah restok |
|---|---:|---:|---:|
| Kopi Susu | 24 | 22 | 22 |
| Roti Bakar | 4 | 3 | 15 |

**Ringkasan dashboard:**

| Metrik | Nilai |
|---|---:|
| Total Pemasukan | Rp 21.350.000 |
| Total Pengeluaran | Rp 8.150.000 |
| Saldo Bersih | Rp 13.200.000 |

**Omzet mingguan:**

| Minggu | Pemasukan | Pengeluaran | Omzet |
|---|---:|---:|---:|
| Minggu 1 | Rp 4.150.000 | Rp 1.500.000 | Rp 2.650.000 |
| Minggu 2 | Rp 5.000.000 | Rp 1.900.000 | Rp 3.100.000 |
| Minggu 3 | Rp 5.700.000 | Rp 2.150.000 | Rp 3.550.000 |
| Minggu 4 | Rp 6.500.000 | Rp 2.600.000 | Rp 3.900.000 |
| **Total** | **Rp 21.350.000** | **Rp 8.150.000** | **Rp 13.200.000** |

> Angka di atas sengaja dibuat saling konsisten. Jangan mengganti satu angka tanpa menghitung ulang angka lainnya.

---

## 2. Spesifikasi Teknis

### 2.1 Format video

| Parameter | Nilai |
|---|---|
| Aspect ratio | 9:16 vertikal |
| Resolusi master | 2160 × 3840 px (4K), downscale ke 1080 × 1920 |
| Resolusi delivery | 1080 × 1920 px |
| Frame rate | 30 fps |
| Durasi master | 40 detik |
| Codec | H.264 High Profile |
| Bitrate | 16–20 Mbps VBR 2-pass |
| Audio | AAC 320 kbps, 48 kHz, stereo |
| Loudness | −14 LUFS integrated |
| True peak | −1 dBTP |
| Color | Rec.709 |
| Subtitle | Burned-in + file `.srt` |
| Nama file | `PROFITPILOT_9x16_40s_v01.mp4` |

### 2.2 Safe zone 9:16

```
1080 × 1920
┌──────────────────────────┐
│      top safe 220 px     │
│  ┌────────────────────┐  │
│  │                    │  │
│  │    area konten     │  │  right safe
│  │    utama           │  │  140 px
│  │                    │  │
│  └────────────────────┘  │
│     bottom safe 420 px   │
└──────────────────────────┘
```

- **Atas:** 220 px untuk status bar dan notch.
- **Bawah:** 420 px untuk caption, tombol, dan UI TikTok/Reels.
- **Kanan:** 140 px untuk tombol like, comment, share.
- **Margin teks:** minimal 72 px dari kiri dan kanan.
- **Lebar teks aman:** maksimal 868 px.
- **Subtitle:** baseline di y 1440, maksimal 2 baris, selesai sebelum y 1500.
- **CTA:** jangan letakkan di bawah y 1400.

### 2.3 Deliverable

| Deliverable | Durasi | Catatan |
|---|---:|---|
| Master 9:16 | 40 s | Versi utama |
| Cutdown 9:16 | 30 s | Untuk Reels/TikTok |
| Cutdown 9:16 | 15 s | Untuk hook cepat |
| Varian hook | 3 × 3 s | A/B test first frame |
| Cover/thumbnail | — | 1080 × 1920, 3 pilihan |
| Subtitle | — | `.srt` Indonesia |
| Audio stems | — | VO, musik, SFX terpisah |
| Project file | — | Premiere/After Effects/CapCut |
| Prompt pack | — | Dokumen ini |

### 2.4 Kompatibilitas platform

| Platform | Catatan |
|---|---|
| TikTok | Aman untuk 9:16, hindari teks di bawah 420 px |
| Instagram Reels | Cover 1080 × 1920, teks aman di area tengah |
| YouTube Shorts | Judul tidak menutup area bawah; subtitle burned-in membantu |
| WhatsApp Status | Durasi 40 s aman, ukuran file di bawah 16 MB |

---

## 3. Brand & Visual Direction

### 3.1 Positioning

ProfitPilot adalah **co-pilot** untuk keuangan usaha: bukan menggantikan pemilik usaha, tetapi membantu mereka melihat arah. Karena itu metafora “pilot” dan “paper plane” dipakai sebagai benang merah, bukan sebagai dekorasi acak.

**Kepribadian brand:**

- Terpercaya, tetapi tidak kaku.
- Sederhana, tetapi tidak murahan.
- Hangat, tetapi tetap profesional.
- Terarah, bukan menghakimi.

### 3.2 Palet warna

| Nama | Hex | Penggunaan |
|---|---|---|
| Navy | `#2563A6` | Warna utama brand, tombol, aksen |
| Navy Light | `#1D4F91` | Hover, gradient |
| Deep Navy | `#0F2A43` | Background end card, bayangan |
| Cyan | `#06B6D4` | Aksen grafik, garis tren, glow |
| Cyan Light | `#A5F3FC` | Highlight, partikel, trail pesawat |
| Off White | `#F8FAFC` | Background UI dan studio |
| Ink | `#1E293B` | Teks utama |
| Muted | `#64748B` | Teks sekunder |
| Border | `#E2E8F0` | Garis dan pemisah |
| Green | `#059669` | Pemasukan, aksen positif |
| Green Badge | `#15803D` | Badge stok normal |
| Red | `#DC2626` | Pengeluaran, aksen negatif |
| Red Badge | `#B91C1C` | Badge stok habis |
| Amber | `#B45309` | Badge stok menipis |

**Aturan warna:**

- 60% netral (off-white/navy), 30% navy, 10% cyan.
- Merah dan hijau hanya untuk status, bukan untuk dekorasi.
- Jangan memakai gradient ungu-biru neon yang tidak ada di brand.
- Pastikan kontras teks minimal 4.5:1.

### 3.3 Tipografi

| Elemen | Font | Weight | Ukuran di 1080 × 1920 |
|---|---|---|---|
| Hook | Plus Jakarta Sans | 800 | 96–112 px |
| Judul scene | Plus Jakarta Sans | 700 | 72–84 px |
| Subtitle | Plus Jakarta Sans | 500 | 44–48 px |
| Label/chip | Plus Jakarta Sans | 600 | 28–32 px |
| Legal | Plus Jakarta Sans | 400 | 26–28 px |

**Catatan:** UI asli aplikasi memakai Arial. Untuk menjaga autentisitas, biarkan UI tetap Arial. Overlay dan subtitle memakai Plus Jakarta Sans agar terasa lebih premium. Jika ingin semua seragam, update CSS aplikasi ke Plus Jakarta Sans terlebih dahulu, lalu rekam ulang.

**Aturan teks:**

- Maksimal 5 kata per kartu teks.
- Maksimal 2 baris per subtitle.
- Gunakan sentence case untuk subtitle, ALL CAPS hanya untuk hook.
- Highlight 1–2 kata dengan cyan, jangan seluruh kalimat.
- Jangan pernah menaruh teks di atas area UI yang sedang menampilkan angka penting.

### 3.4 Logo

Logo ProfitPilot terdiri dari:

1. Tiga batang grafik yang naik.
2. Garis tren yang mengarah ke kanan atas.
3. Paper plane di ujung garis.

**Aturan logo:**

- Clear space minimal setinggi satu batang grafik.
- Ukuran minimum 120 px di kanvas 1080.
- Jangan meregangkan, memutar, atau mengganti warna.
- Jangan menambahkan bayangan berat atau outline.
- Di end card, logo boleh diberi glow cyan halus.

**Animasi logo (1.2 detik):**

| Waktu | Aksi |
|---|---|
| 0.0–0.2 | Batang 1 tumbuh dari bawah |
| 0.15–0.35 | Batang 2 tumbuh |
| 0.30–0.50 | Batang 3 tumbuh |
| 0.45–0.95 | Garis tren menggambar dari kiri ke kanan |
| 0.85–1.15 | Paper plane terbang mengikuti garis, meninggalkan trail |
| 1.00–1.20 | Wordmark muncul dengan fade + blur-to-sharp |

### 3.5 Dua dunia visual

**Dunia 1 — Kertas (masalah):**

- Meja warung kayu, nota, buku catatan, kalkulator, gelas kopi.
- Cahaya jendela hangat 3200–3800K.
- Bayangan navy, grain 4–5%.
- Tangan saja, tanpa wajah, agar universal.
- Rasa: sesak, berantakan, tetapi tetap hangat.

**Dunia 2 — UI (solusi):**

- Background off-white `#F8FAFC`.
- Kartu kaca dengan sudut 24–32 px.
- Shadow lembut `0 24px 80px rgba(15, 42, 67, 0.18)`.
- Glow cyan halus di belakang kartu utama.
- Grain hanya di background, tidak di teks.
- Rasa: lapang, tenang, terkendali.

**Transisi antar dunia:**

- Nota terlipat menjadi kartu UI.
- Paper plane dari logo menjadi garis grafik.
- Tombol yang ditekan menjadi ripple yang membuka scene berikutnya.
- Warna kertas hangat berubah menjadi off-white bersih.

### 3.6 Do & Don't

| Do | Don't |
|---|---|
| Tangan asli, gerakan natural | Stok foto jabat tangan |
| Detail warung Indonesia yang spesifik | Dekorasi “bisnis” generik |
| UI tajam dan terbaca | UI miring berlebihan atau blur |
| Gerakan kamera halus | Handheld shake berlebihan |
| Satu ide per scene | Menumpuk 5 fitur dalam 1 detik |
| Suara UI lembut | Suara kasir, koin, atau alarm keras |
| Data konsisten | Angka berubah-ubah antar scene |
| Subtitle jelas | Teks kecil di area tombol platform |

### 3.7 Aksesibilitas

- Kontras teks minimal 4.5:1.
- Tidak ada flash lebih dari 3 Hz.
- Jangan hanya mengandalkan warna untuk status; badge selalu punya teks (“Habis”, “3 tersisa”).
- Subtitle burned-in untuk platform yang mute by default.
- Gunakan gerakan halus; hindari zoom cepat yang memicu motion sickness.

---

## 4. Prompt Master

Bagian ini bisa langsung dipakai. Ada dua versi: brief singkat berbahasa Indonesia untuk manusia/AI agent, dan prompt bahasa Inggris untuk AI video generator.

### 4.1 Brief singkat (Bahasa Indonesia)

```text
Buat motion video promosi vertikal 9:16 berdurasi 40 detik untuk ProfitPilot,
aplikasi pengelolaan keuangan usaha untuk UMKM Indonesia.

Gaya: hybrid live-action hangat + motion graphics UI bersih.
Palet: navy #2563A6, cyan #06B6D4, off-white #F8FAFC, deep navy #0F2A43.
Dunia visual: meja warung Indonesia dengan nota dan kalkulator, lalu bertransisi
ke dashboard aplikasi yang lapang dan premium.

Alur:
1. Hook: "Omzet naik, untung ke mana?"
2. Masalah: nota numpuk, stok tidak ketahuan, hitungan kacau.
3. Reveal logo ProfitPilot dan paper plane.
4. Dashboard: pemasukan, pengeluaran, saldo bersih.
5. Transaksi: pilih barang, total otomatis, stok berkurang.
6. Stok menipis dan restok sekali klik.
7. Grafik omzet mingguan.
8. Manfaat: kelola usaha dari mana saja, data tiap toko di akunnya.
9. CTA: "Daftar Sekarang".

VO: perempuan Indonesia, 25–32 tahun, hangat, conversational, 150–160 wpm,
sedikit senyum, bukan gaya announcer.
Musik: minimal corporate pop 108 BPM, hangat, optimistis, tanpa vokal.
SFX: UI lembut dan rounded; tanpa suara kasir, koin, atau alarm keras.
Tidak ada teks yang digenerate AI. Semua UI dan teks dikomposit di editing.
```

### 4.2 Prompt master (English, untuk AI video)

```text
Create a 40-second vertical 9:16 product film for ProfitPilot, an Indonesian
small-business finance app. 1080x1920, 30fps, premium hybrid style: warm
live-action moments in a real Indonesian warung, transitioning into clean
fintech motion graphics.

STYLE: cinematic, optimistic, calm, trustworthy. Two worlds: (1) warm warung
counter with wood, paper receipts, calculator, hands only, 3200-3800K practical
light, shallow depth of field, subtle film grain; (2) clean off-white UI space
with deep navy #2563A6, cyan #06B6D4, frosted glass cards, soft shadows,
generous negative space. 35mm lens, f/2.8, smooth eased camera moves, no shake.
Rec.709, warm highlights, navy shadows, 3-5% grain.

STRUCTURE: hook (0-3.2s): top-down cluttered counter, hand hesitates over a
calculator; problem montage (3.2-7s): receipts, calculator, empty shelf,
notification glow; logo reveal (7-10s): three glass bars rise, a line chart
draws, a paper plane takes off; dashboard (10-15s): three clean cards float in,
numbers count up; transaction (15-21s): product rows stack, total rolls,
success ripple, stock ticks down; stock (21-26s): amber low-stock badge, bottom
sheet, green restock bar; omzet (26-30s): navy data space, bars rise, cyan line
climbs, paper plane rides the peak; benefit (30-35s): paper plane over an
Indonesian neighborhood at dusk, phone glow; end card (35-40s): deep navy,
centered abstract logo space, generous negative space for a wordmark and CTA.

NO on-screen text, no letters, no numbers, no logos, no watermarks. Text and
real UI will be composited in post. Keep all shots clean and legible for UI
overlay. One shot per generation, 4-8 seconds, consistent lighting and grade.
```

### 4.3 Negative prompt

```text
text, letters, words, numbers, typography, captions, subtitles, watermark,
logo, signature, UI copy, gibberish, distorted hands, extra fingers, deformed
fingers, morphing objects, flicker, low resolution, blurry, oversaturated,
HDR, shaky camera, fisheye, horizontal framing, letterbox, split screen,
stock photo, plastic skin, harsh flash, cartoon, anime, floating coins, neon
crypto, casino, clutter, duplicate objects
```

### 4.4 Cara pakai prompt

1. **Jangan** meminta AI merender UI aplikasi atau teks Indonesia. Hasilnya hampir pasti rusak.
2. Generate **plate** (background/aksi) per shot, lalu komposit UI asli di atasnya.
3. Gunakan satu **look frame** dari P01 sebagai referensi gaya untuk semua shot.
4. Generate 2–3 variasi per shot, pilih yang gerakannya paling bersih.
5. Panjangkan shot pendek di editing; AI cukup menghasilkan 4–8 detik.
6. Semua teks, angka, logo, dan subtitle ditambahkan di After Effects/CapCut/Premiere.

---

## 5. Big Idea & Beat Sheet

### 5.1 Big idea

**Judul kerja:** “Dari Catatan Berantakan ke Bisnis Terarah”

**Logline:** Seorang pemilik warung punya bisnis yang jalan, tetapi tidak punya cara cepat untuk tahu ke mana uangnya pergi. ProfitPilot menjadi co-pilot yang mengubah kertas berantakan menjadi dashboard yang terarah.

**Metafora:** Paper plane. Kertas yang berantakan dilipat menjadi pesawat, lalu terbang mengikuti garis grafik. Ini menyatukan logo, transisi, dan pesan “pilot”.

**Emosi yang dituju:**

1. **Cemas** — “Kok untungnya nggak kerasa?”
2. **Lega** — “Ternyata bisa rapi.”
3. **Percaya** — “Angkanya jelas, stoknya jelas.”
4. **Termotivasi** — “Bisnisku bisa lebih terarah.”

### 5.2 Struktur 5 beat

| Beat | TC | Fungsi | Emosi | Visual kunci |
|---|---|---|---|---|
| Hook | 0:00–0:03.2 | Hentikan scroll, buat relatable | Cemas | Nota dan kalkulator |
| Problem | 0:03.2–0:07 | Perbesar rasa sakit | Sesak | Montage 4 shot |
| Reveal | 0:07–0:10 | Perkenalkan solusi | Lega | Logo + paper plane |
| Proof | 0:10–0:30 | Tunjukkan fitur nyata | Percaya | Dashboard, transaksi, stok, omzet |
| CTA | 0:30–0:40 | Manfaat + ajakan | Termotivasi | Kota senja + end card |

### 5.3 Kenapa 40 detik?

- Cukup untuk menunjukkan 4 fitur inti tanpa terasa seperti iklan panjang.
- Platform sosial memberi retensi terbaik pada 15–45 detik untuk konten produk.
- Masih bisa dipotong menjadi 30 detik dan 15 detik tanpa kehilangan cerita.
- Hook 3 detik pertama adalah bagian paling penting; sisanya adalah bukti.

### 5.4 Prinsip editing

- **Satu scene, satu ide.** Jangan menjelaskan dua fitur sekaligus.
- **Tunjukkan, jangan ceritakan.** VO mendukung visual, bukan menggantikannya.
- **Setiap cut punya alasan.** Match cut pada gerakan, bentuk, atau warna.
- **Jangan takut diam.** Beri 0.3–0.5 detik jeda setelah reveal logo.
- **Teks dan VO tidak boleh berebut perhatian.** Jika VO panjang, teks dibuat lebih pendek.

---

## 6. Storyboard Lengkap

### Ringkasan scene

| Scene | TC | Durasi | Nama | Tujuan |
|---|---|---:|---|---|
| 01 | 00:00–00:03.2 | 3.2 s | Hook | Pattern interrupt |
| 02 | 00:03.2–00:07.0 | 3.8 s | Problem | Perbesar pain |
| 03 | 00:07.0–00:10.0 | 3.0 s | Reveal | Perkenalkan brand |
| 04 | 00:10.0–00:15.0 | 5.0 s | Dashboard | Bukti ringkasan |
| 05 | 00:15.0–00:21.0 | 6.0 s | Transaksi | Bukti kemudahan |
| 06 | 00:21.0–00:26.0 | 5.0 s | Stok | Bukti kontrol |
| 07 | 00:26.0–00:30.0 | 4.0 s | Omzet | Bukti pertumbuhan |
| 08 | 00:30.0–00:35.0 | 5.0 s | Benefit | Perluas manfaat |
| 09 | 00:35.0–00:40.0 | 5.0 s | CTA | Ajakan bertindak |

---

### Scene 01 — Hook

**TC:** 00:00–00:03.2 · **Durasi:** 3.2 s · **Tujuan:** menghentikan scroll dan membuat penonton merasa “ini aku”.

| Aspek | Detail |
|---|---|
| Visual | Top-down meja warung kayu. Nota kusut, buku catatan dengan angka, kalkulator dengan gulungan kertas, gelas kopi susu yang meninggalkan cincin di meja, HP tertelungkup. Satu tangan masuk, ragu di atas kalkulator, lalu mengambil nota. |
| Kamera | Top-down 90°, lensa 35mm, f/2.8, push-in 5% sangat pelan. Kamera terkunci, tanpa handheld. |
| Lighting | Cahaya jendela hangat 3200–3800K dari kiri, practical bulb di belakang, bayangan navy dalam. Debu halus terlihat di cahaya. |
| Aksi | 0.0–0.6: diam, room tone. 0.6–1.4: tangan masuk, mengambil nota. 1.4–2.2: jari menekan kalkulator. 2.2–3.2: tangan berhenti, menatap nota. |
| Transisi masuk | Fade dari hitam 6 frame. |
| Transisi keluar | Nota menyapu lensa (whip pan) ke scene 2, 8 frame. |
| Teks layar | 0.3 s: “OMZET NAIK.” 1.6 s: “UNTUNG KE MANA?” Posisi kiri atas, y 360, lebar maksimal 700 px. |
| VO | “Omzet kelihatan naik... / tapi kok untungnya nggak kerasa?” |
| SFX | Room tone, paper crinkle, 3 klik kalkulator, low pulse 55 Hz. |
| Prompt | P01 |
| Catatan editor | Jangan tampilkan wajah. Tangan saja. Pastikan cincin gelas dan tekstur kayu terlihat jelas untuk memberi rasa nyata. |

**Beat per detik:**

| Detik | Yang terlihat | Yang terdengar |
|---:|---|---|
| 0.0 | Meja, nota, kopi | Room tone |
| 0.6 | Tangan masuk | Kertas bergeser |
| 1.4 | Kalkulator ditekan | Klik, klik, klik |
| 2.2 | Tangan berhenti | Pulse rendah mulai |
| 3.0 | Nota diangkat | Whoosh kecil |

---

### Scene 02 — Problem

**TC:** 00:03.2–00:07.0 · **Durasi:** 3.8 s · **Tujuan:** memperbesar rasa sakit dengan montase cepat.

| Aspek | Detail |
|---|---|
| Visual | Empat shot cepat: (A) nota tumpah ke meja; (B) jari menekan kalkulator; (C) rak toko hampir kosong; (D) HP menyala dengan glow notifikasi. |
| Kamera | Macro 50–100mm, top-down dan low angle. Match cut pada gerakan tangan dan arah jatuh kertas. |
| Lighting | Tetap hangat, tetapi saturasi diturunkan 10–15%. Bayangan navy lebih dominan. |
| Aksi | 3.2–3.9: nota tumpah. 3.9–4.6: kalkulator. 4.6–5.4: rak kosong. 5.4–6.2: HP menyala. 6.2–7.0: semua kertas “terhisap” ke kamera. |
| Transisi masuk | Whip pan dari scene 1. |
| Transisi keluar | White flash + zoom-through ke scene 3. |
| Teks layar | 3.4: “NOTA NUMPUK.” 4.6: “STOK NGGAK KETAHUAN.” 5.8: “HITUNGAN KACAU.” Tiga kartu bertumpuk, masing-masing 0.8–1.0 s. |
| VO | “Nota numpuk. Stok nggak ketahuan. Hitungan pun jadi kacau.” |
| SFX | Whoosh kertas per cut, klik kalkulator, notifikasi minor, tick jam, reverse riser mulai 5.6 s. |
| Prompt | P02A, P02B, P02C, P02D |
| Catatan editor | Jangan terlalu banyak teks. Tiga kartu sudah cukup. Pastikan tempo cut terasa “menekan”, bukan sekadar cepat. |

**Beat per detik:**

| Detik | Shot | Teks | SFX |
|---:|---|---|---|
| 3.2 | Nota tumpah | NOTA NUMPUK | Whoosh |
| 3.9 | Kalkulator | — | Klik |
| 4.6 | Rak kosong | STOK NGGAK KETAHUAN | Whoosh |
| 5.4 | HP menyala | — | Notif minor |
| 5.8 | Tumpukan nota | HITUNGAN KACAU | Tick jam |
| 6.2 | Kertas terhisap | — | Riser |

---

### Scene 03 — Reveal

**TC:** 00:07.0–00:10.0 · **Durasi:** 3.0 s · **Tujuan:** memperkenalkan ProfitPilot sebagai jawaban, dengan momen visual yang paling ikonik.

| Aspek | Detail |
|---|---|
| Visual | Ruang navy-cyan dengan grid perspektif. Tiga batang kaca tumbuh dari lantai, garis tren menggambar ke atas, kertas terlipat menjadi paper plane, lalu terbang meninggalkan trail cyan. Logo lockup muncul di tengah. |
| Kamera | Dolly-in pelan 50mm, parallax 3D halus, depth of field dangkal. |
| Lighting | Key navy, rim cyan, bloom lembut, partikel debu. |
| Aksi | 7.0–7.5: white flash mereda, grid muncul. 7.5–8.1: tiga bar tumbuh. 8.1–8.7: garis tren menggambar. 8.7–9.3: paper plane terbang. 9.3–10.0: logo lockup dan tagline, hold. |
| Transisi masuk | White flash dari scene 2. |
| Transisi keluar | Kamera mengikuti trail pesawat, masuk ke kartu dashboard. |
| Teks layar | 7.6: “PROFITPILOT” (wordmark). 8.4: “Aplikasi Pengelolaan Keuangan Usaha” (subline kecil). |
| VO | “Saatnya kenalan sama ProfitPilot.” |
| SFX | Impact boom, 3 tick bar, shimmer garis, paper fold + plane whoosh, chime logo. |
| Prompt | P03 |
| Catatan editor | Ini adalah “hero moment”. Jangan terburu-buru. Beri 0.5 s hold setelah logo muncul sebelum pindah ke dashboard. |

**Beat per detik:**

| Detik | Visual | Audio |
|---:|---|---|
| 7.0 | Flash mereda | Impact boom |
| 7.5 | Bar 1–3 tumbuh | Tick, tick, tick |
| 8.1 | Garis tren | Shimmer |
| 8.7 | Paper plane terbang | Whoosh |
| 9.3 | Logo lockup | Chime |
| 9.8 | Hold | Musik mulai naik |

---

### Scene 04 — Dashboard

**TC:** 00:10.0–00:15.0 · **Durasi:** 5.0 s · **Tujuan:** menunjukkan bahwa semua angka penting ada dalam satu tampilan.

| Aspek | Detail |
|---|---|
| Visual | UI dashboard full-bleed dengan sudut membulat 48 px dan inset 48 px. Tiga kartu masuk bergantian: Total Pemasukan, Total Pengeluaran, Saldo Bersih. Angka count-up. Dua baris “Transaksi Terbaru” slide masuk satu per satu. |
| Kamera | Flat-on dengan tilt 6°, parallax 20 px, drift pelan. UI harus tetap tajam; tidak ada motion blur pada teks. |
| Lighting | Background off-white dengan radial glow navy di belakang kartu saldo. |
| Aksi | 10.0–10.5: background settle. 10.5–11.4: kartu pemasukan masuk, count-up ke Rp 21.350.000. 11.4–12.3: kartu pengeluaran, count-up ke Rp 8.150.000. 12.3–13.4: kartu saldo, count-up ke Rp 13.200.000, glow pulse. 13.4–14.6: dua baris “Transaksi Terbaru” masuk satu per satu. 14.6–15.0: tap “+ Tambah Transaksi”, ripple. |
| Transisi masuk | Zoom-through dari trail pesawat; trail menjadi garis chart. |
| Transisi keluar | Ripple tombol membesar dan membuka scene 5. |
| Teks layar | 10.2: “SATU DASHBOARD. SEMUA ANGKA.” 11.4: mengecil menjadi chip di atas. |
| VO | “Semua pemasukan, pengeluaran, dan saldo bersih— / rapi dalam satu dashboard.” |
| SFX | Card pop C–E–G, counter tick, data whoosh, chime saldo, tap tombol. |
| Prompt | P04 |
| Catatan editor | Jangan menaruh teks overlay di atas angka. Biarkan UI bernapas. Angka harus terbaca di layar HP 6 inci. |

**Beat per detik:**

| Detik | Visual | Teks | Audio |
|---:|---|---|---|
| 10.0 | UI settle | SATU DASHBOARD | Whoosh |
| 10.5 | Kartu pemasukan | — | Pop C |
| 11.4 | Kartu pengeluaran | — | Pop E |
| 12.3 | Kartu saldo | SEMUA ANGKA | Pop G + chime |
| 13.4 | Riwayat transaksi | — | Data whoosh |
| 14.6 | Tap tombol | — | Tap |

---

### Scene 05 — Transaksi

**TC:** 00:15.0–00:21.0 · **Durasi:** 6.0 s · **Tujuan:** membuktikan bahwa mencatat transaksi cepat dan stok langsung menyesuaikan.

| Aspek | Detail |
|---|---|
| Visual | Close-up form “Tambah Transaksi”. Jenis: Pemasukan. Jenis Pemasukan: Penjualan Barang. Baris pertama Kopi Susu ×2, subtotal Rp 36.000. Baris kedua Roti Bakar ×1, subtotal Rp 15.000. Total Penjualan roll-up ke Rp 51.000. Tap “Simpan Transaksi”. Toast sukses. Panel overlay “Stok diperbarui” (tambahan motion graphic, bukan UI asli) menunjukkan Kopi Susu 24 → 22 dan Roti Bakar 4 → 3. |
| Kamera | Screen-space macro, zoom 130–150%, tilt 0–4°, fokus mengikuti field yang aktif. Kursor diganti lingkaran sentuh 48 px dengan ripple. |
| Lighting | UI off-white, shadow lembut, tidak ada glare. |
| Aksi | 15.0–15.6: form masuk, jenis dipilih. 15.6–16.4: baris Kopi Susu, qty 2. 16.4–17.2: “+ Tambah Barang”, baris Roti Bakar, qty 1. 17.2–18.4: total roll-up ke Rp 51.000. 18.4–19.4: isi keterangan “Penjualan sore”, tap Simpan. 19.4–20.2: success toast + check burst. 20.2–21.0: panel stok turun. |
| Transisi masuk | Ripple dari tombol scene 4 membesar. |
| Transisi keluar | Checkmark sukses berubah menjadi badge stok, match cut ke scene 6. |
| Teks layar | 15.2: “CATAT DALAM HITUNGAN DETIK.” 19.2: chip “Total otomatis” dan “Stok berkurang”. |
| VO | “Pilih barang, catat transaksi. / Total otomatis, stok langsung berkurang.” |
| SFX | Tap, keyboard, item pluck, total roll, success ding, stock tick. |
| Prompt | P05 |
| Catatan editor | Gunakan data yang sama dengan tabel dummy. Jangan mempercepat gerakan sampai angka tidak terbaca. Kalau perlu, tahan 0.3 s di total Rp 51.000 sebelum tap Simpan. |

**Beat per detik:**

| Detik | Visual | Teks | Audio |
|---:|---|---|---|
| 15.0 | Form muncul | CATAT DALAM HITUNGAN DETIK | Whoosh |
| 15.6 | Kopi Susu ×2 | — | Tap + pluck |
| 16.4 | Roti Bakar ×1 | — | Tap + pluck |
| 17.2 | Total roll-up | — | Total roll |
| 18.4 | Tap Simpan | — | Tap |
| 19.4 | Success toast | Total otomatis | Ding |
| 20.2 | Stok 24 → 22, 4 → 3 | Stok berkurang | Tick down |

---

### Scene 06 — Stok

**TC:** 00:21.0–00:26.0 · **Durasi:** 5.0 s · **Tujuan:** menunjukkan kontrol stok yang tidak merepotkan.

| Aspek | Detail |
|---|---|
| Visual | Tabel “Data Barang”: Kopi Susu 22 (normal), Roti Bakar 3 (amber “3 tersisa”), Air Mineral 40 (normal), Nasi Goreng 0 (merah “Habis”). Kamera push-in ke Roti Bakar. Badge amber pulse sekali. Tap “Restok”. Modal “Tambah Stok Barang” naik dari bawah dan menampilkan stok saat ini 3; isi Jumlah Restok 12. Konfirmasi. Setelah simpan, badge berubah hijau “15 tersisa”, bar stok terisi. Baris “Riwayat Restok” muncul. |
| Kamera | Top-down 10°, macro, modal slide-up. Background dim 40% saat modal terbuka. |
| Lighting | Warm practical di rak, cool cyan glow dari UI. |
| Aksi | 21.0–21.8: baris tabel masuk stagger, badge pop. 21.8–22.6: push-in ke Roti Bakar, badge pulse. 22.6–23.4: tap Restok, modal naik. 23.4–24.4: keypad +12, stok baru 15. 24.4–25.2: konfirmasi, modal turun, badge hijau, bar fill. 25.2–26.0: toast dan baris riwayat restok. |
| Transisi masuk | Checkmark dari scene 5 menjadi badge stok. |
| Transisi keluar | Baris tabel naik dan berubah menjadi bar chart di scene 7. |
| Teks layar | 21.2: “STOK MENIPIS? KETAHUAN.” 23.6: “RESTOK, SEKALI KLIK.” |
| VO | “Stok menipis? Langsung kelihatan. / Restok pun cukup sekali klik.” |
| SFX | Badge pop, alert blip lembut, modal whoosh, keypad, fill swell, confirm pop, toast. |
| Prompt | P06 |
| Catatan editor | Alert harus terasa membantu, bukan panik. Gunakan dua nada lembut, bukan alarm. |

**Beat per detik:**

| Detik | Visual | Teks | Audio |
|---:|---|---|---|
| 21.0 | Tabel muncul | STOK MENIPIS? | Pop |
| 21.8 | Roti Bakar 3 tersisa | — | Blip |
| 22.6 | Tap Restok | — | Whoosh |
| 23.4 | Modal +12 | RESTOK, SEKALI KLIK | Keypad |
| 24.4 | Stok jadi 15 | — | Fill swell |
| 25.2 | Badge hijau | — | Confirm pop |

---

### Scene 07 — Omzet

**TC:** 00:26.0–00:30.0 · **Durasi:** 4.0 s · **Tujuan:** mengubah tumpukan transaksi menjadi arah bisnis yang terlihat.

| Aspek | Detail |
|---|---|
| Visual | Ruang data navy gelap dengan grid tipis. Empat grup bar mingguan naik berurutan. Garis cyan menggambar melalui puncak omzet. Kamera tilt up mengikuti garis. Paper plane kecil muncul di puncak, meninggalkan trail. Angka total omzet count-up ke Rp 13.200.000. |
| Kamera | Wide 24mm, tilt up 8°, parallax halus, depth of field dangkal di foreground. |
| Lighting | Deep navy, rim cyan, bloom di garis, partikel. |
| Aksi | 26.0–26.6: grid dan label minggu muncul. 26.6–28.0: empat bar naik (C–D–E–G). 28.0–29.0: line chart menggambar, angka minggu tick. 29.0–29.6: kamera tilt ke puncak, paper plane. 29.6–30.0: total omzet Rp 13.200.000, sparkle. |
| Transisi masuk | Bar tabel dari scene 6 berubah menjadi bar chart. |
| Transisi keluar | Garis chart berubah menjadi flight path; pesawat terbang keluar frame. |
| Teks layar | 26.2: “LIHAT ARAH BISNIS.” 28.8: “Omzet mingguan” (label kecil). |
| VO | “Lihat omzet mingguan / dalam grafik yang gampang dipahami.” |
| SFX | Bar thump ascending, line swish, sparkle, musik peak. |
| Prompt | P07 |
| Catatan editor | Pastikan angka total Rp 13.200.000 sama dengan jumlah empat minggu. Jangan menampilkan angka yang tidak dihitung. |

**Beat per detik:**

| Detik | Visual | Audio |
|---:|---|---|
| 26.0 | Grid muncul | Whoosh |
| 26.6 | Bar M1 | Thump C |
| 27.0 | Bar M2 | Thump D |
| 27.4 | Bar M3 | Thump E |
| 27.8 | Bar M4 | Thump G |
| 28.4 | Garis naik | Swish |
| 29.2 | Puncak + pesawat | Sparkle |
| 29.7 | Total omzet | Chime |

---

### Scene 08 — Benefit

**TC:** 00:30.0–00:35.0 · **Durasi:** 5.0 s · **Tujuan:** memperluas manfaat dari “mencatat” menjadi “mengelola usaha dari mana saja”.

| Aspek | Detail |
|---|---|
| Visual | Paper plane terbang di atas neighborhood Indonesia saat senja: atap rumah, lampu jendela hangat, kanopi warung, kafe kecil, toko dengan paket. Kamera tracking menyamping, lalu tilt down ke tangan yang memegang HP menyala dengan UI cyan abstrak. Tiga chip muncul: “Satu akun per toko”, “Data terpisah”, “Akses dari mana saja”. |
| Kamera | Aerial 24mm, gerak halus seperti drone, lalu macro ke HP. Parallax antara pesawat, kota, dan HP. |
| Lighting | Langit dusk teal-navy, practical warm di jendela, glow cyan dari HP ke tangan. |
| Aksi | 30.0–30.8: pesawat melintas, kota terlihat. 30.8–32.0: tiga vignette usaha menyala bergantian. 32.0–33.4: tilt ke HP, UI glow. 33.4–34.4: chip muncul satu per satu. 34.4–35.0: pesawat loop ke arah kamera. |
| Transisi masuk | Flight path dari scene 7. |
| Transisi keluar | Pesawat terbang ke kamera, frame dipenuhi glow cyan/white, cut ke end card. |
| Teks layar | 30.3: “SATU APLIKASI. SEMUA TERARAH.” 32.5: tiga chip manfaat. |
| VO | “Kelola usaha dari mana saja. / Data tiap toko, di akunnya sendiri.” |
| SFX | Airy whoosh, city dusk ambience, tiga notifikasi lembut, shimmer. |
| Prompt | P08 |
| Catatan editor | Ini scene emosional, bukan scene fitur. Jangan menambah teks teknis. Cukup satu pesan: di mana saja, tetap terarah. |

**Beat per detik:**

| Detik | Visual | Teks | Audio |
|---:|---|---|---|
| 30.0 | Pesawat di atas kota | SATU APLIKASI | Whoosh |
| 30.8 | Tiga vignette usaha | — | Ambience |
| 32.0 | Tilt ke HP | — | Notif 1 |
| 32.8 | UI glow | SEMUA TERARAH | Notif 2 |
| 33.6 | Chip manfaat | Data terpisah | Notif 3 |
| 34.4 | Pesawat ke kamera | — | Shimmer |

---

### Scene 09 — CTA

**TC:** 00:35.0–00:40.0 · **Durasi:** 5.0 s · **Tujuan:** menutup dengan brand yang jelas dan ajakan yang mudah diingat.

| Aspek | Detail |
|---|---|
| Visual | Background deep navy dengan radial glow cyan, partikel debu, grid tipis. Logo ProfitPilot di tengah, tagline di bawah, tombol “Daftar Sekarang” dengan border cyan. Trail pesawat menggambar garis bawah di bawah tombol. Hold end card minimal 3 detik. |
| Kamera | Statis, push-in 2% sangat pelan. |
| Lighting | Logo diberi glow cyan halus, teks putih, tombol navy dengan border cyan. |
| Aksi | 35.0–35.6: logo muncul dengan animasi 1.2 s. 36.2–36.8: tagline fade-up. 37.0–37.6: tombol muncul dengan scale 0.96 → 1. 38.0–40.0: hold, partikel bergerak pelan. |
| Transisi masuk | Glow cyan dari scene 8. |
| Transisi keluar | Fade to black 0.4 s, atau hold untuk loop. |
| Teks layar | “PROFITPILOT” / “Kendalikan Bisnis. Kembangkan Profit.” / “Daftar Sekarang” / “Aplikasi Pengelolaan Keuangan Usaha” (kecil). |
| VO | “ProfitPilot. / Kendalikan bisnis, kembangkan profit. / Daftar sekarang.” |
| SFX | Logo sting, plane whoosh, button click, sparkle tail. |
| Prompt | P09 |
| Catatan editor | Jangan menaruh URL palsu. Jika domain resmi belum ada, cukup “Daftar Sekarang”. Hold minimal 3 detik agar CTA terbaca. |

**Beat per detik:**

| Detik | Visual | Teks | Audio |
|---:|---|---|---|
| 35.0 | Logo mulai | PROFITPILOT | Sting |
| 36.2 | Tagline | Kendalikan Bisnis | Chime |
| 37.0 | Tombol | Daftar Sekarang | Click |
| 38.0 | Hold | — | Tail |
| 39.6 | Fade | — | Reverb |

---

## 7. Naskah VO

### 7.1 Naskah master

```text
[00:00.0] (hangat, sedikit heran; jeda 300 ms setelah "naik")
Omzet kelihatan naik... / tapi kok untungnya nggak kerasa?

[00:03.2] (tempo naik, padat, tegas)
Nota numpuk. Stok nggak ketahuan. Hitungan pun jadi kacau.

[00:07.0] (lega, senyum, tempo melambat)
Saatnya kenalan sama ProfitPilot.

[00:10.0] (tenang, meyakinkan)
Semua pemasukan, pengeluaran, dan saldo bersih— / rapi dalam satu dashboard.

[00:15.0] (cepat, antusias, tetap jelas)
Pilih barang, catat transaksi. / Total otomatis, stok langsung berkurang.

[00:21.0] (ringan, seperti membantu)
Stok menipis? Langsung kelihatan. / Restok pun cukup sekali klik.

[00:26.0] (bangga, nada menaik)
Lihat omzet mingguan / dalam grafik yang gampang dipahami.

[00:30.0] (hangat, luas)
Kelola usaha dari mana saja. / Data tiap toko, di akunnya sendiri.

[00:35.0] (tagline; tegas, tenang, tidak berteriak)
ProfitPilot. / Kendalikan bisnis, kembangkan profit. / Daftar sekarang.
```

**Total:** ±75 kata. Estimasi baca 150–160 wpm: 28–30 detik, sisa 10–12 detik untuk jeda, napas, dan beat visual.

### 7.2 Arahan delivery

| Aspek | Arahan |
|---|---|
| Karakter suara | Perempuan Indonesia, 25–32 tahun, terdengar berpengalaman tetapi ramah. |
| Emosi | Hangat, empatik, optimistis. Bukan sales yang memaksa. |
| Tempo | 150–160 wpm. Scene 2 boleh 165 wpm; scene 3 dan 9 turun ke 140 wpm. |
| Artikulasi | Jelas di konsonan akhir. “Stok”, “transaksi”, “dashboard” harus tajam. |
| Napas | Ambil napas sebelum tagline. Jangan memotong kata di tengah. |
| Senyum | Terdengar senyum di scene 3, 6, dan 9. |
| Penekanan | “naik”, “kacau”, “otomatis”, “berkurang”, “sekali klik”, “terarah”. |
| Jeda | 300 ms setelah “naik”, 250 ms setelah “dashboard”, 300 ms sebelum “ProfitPilot” di CTA. |
| Hindari | Nada announcer TV, hard-sell, tempo terlalu cepat, aksen yang dibuat-buat. |

### 7.3 Panduan pengucapan

| Kata | Pengucapan |
|---|---|
| ProfitPilot | “Pro-fit Pai-lot” (pilot versi Inggris, konsisten) |
| Omzet | “om-zet”, bukan “omset” yang terlalu cepat |
| Dashboard | “das-bor” (natural Indonesia) |
| Restok | “res-tok” |
| Transaksi | “trans-ak-si” |
| Nggak | “nggak” (casual, jangan “tidak” agar tetap relatable) |
| UI | “u-i” jika terpaksa; lebih baik tidak diucapkan |

### 7.4 Alternatif hook (untuk A/B test)

Gunakan salah satu di 3–3.2 detik pertama. Naskah scene 2–9 tetap sama.

| Versi | Naskah | Cocok untuk |
|---|---|---|
| A | “Omzet naik, tapi untung ke mana?” | Paling langsung, angka dan pain jelas |
| B | “Tiap hari jualan. Tiap hari juga bingung untungnya.” | Lebih emosional, relatable |
| C | “Catatan bisnis kamu, masih di buku tulis?” | Memancing rasa malu/ingin upgrade |

**Catatan:** Untuk hook B dan C, sesuaikan visual scene 1. Hook B bisa memakai shot tangan menutup buku catatan; hook C bisa memakai shot buku catatan yang penuh coretan.

### 7.5 Alternatif CTA

| Versi | Naskah | Catatan |
|---|---|---|
| A | “Daftar sekarang.” | Paling aman dan netral |
| B | “Mulai kelola usaha lebih terarah.” | Lebih lembut, cocok untuk brand awareness |
| C | “Biar bisnis kamu nggak jalan tanpa arah.” | Lebih tegas, cocok untuk retargeting |

Jangan memakai “Gratis” atau “Coba sekarang” jika belum ada alur trial yang jelas.

### 7.6 Spesifikasi rekaman VO

| Parameter | Nilai |
|---|---|
| Format | WAV, 48 kHz, 24-bit |
| Level rata-rata | −18 dBFS |
| Peak | −6 dBFS |
| Noise floor | di bawah −60 dBFS |
| Ruangan | Treated, tanpa reverb besar |
| Mic | Condenser + pop filter, jarak 15–20 cm |
| Takes | Minimal 3 take per baris, pilih yang paling natural |
| Room tone | Rekam 10 detik ruangan kosong untuk noise reduction |

### 7.7 Catatan penulisan

- Gunakan “kamu”, bukan “Anda”, agar terasa seperti teman. Ini mengikuti gaya halaman login aplikasi.
- Jangan memakai istilah akuntansi yang rumit (“laba kotor”, “arus kas”, “neraca”). Gunakan “untung”, “pemasukan”, “pengeluaran”, “saldo bersih”.
- Jangan mengulang kata “ProfitPilot” lebih dari 3 kali di seluruh video. Cukup di scene 3, 9, dan visual logo.
- Angka yang diucapkan harus sama dengan angka di layar. Jika VO menyebut “total otomatis”, layar harus menunjukkan total yang berubah.
- Hindari kalimat pasif panjang. Satu kalimat, satu ide.

---

## 8. On-Screen Text & Subtitle

### 8.1 Aturan teks layar

| Aturan | Detail |
|---|---|
| Maksimal kata | 5 kata per kartu |
| Maksimal baris | 2 baris untuk subtitle, 1 baris untuk hook |
| Font | Plus Jakarta Sans |
| Hook | 96–112 px, weight 800, ALL CAPS |
| Judul scene | 72–84 px, weight 700, sentence case |
| Subtitle | 44–48 px, weight 500, sentence case |
| Chip | 28–32 px, weight 600 |
| Warna | Putih/off-white di atas navy; navy di atas off-white |
| Highlight | 1–2 kata dengan cyan `#06B6D4` |
| Animasi | Mask reveal 6–8 frame, stagger 2 frame per kata |
| Hold | Minimal 1.2 s per kartu, minimal 2 s untuk CTA |

### 8.2 Timing teks layar

| TC | Teks | Posisi | Animasi |
|---|---|---|---|
| 00:00.3 | OMZET NAIK. | Kiri atas, y 360 | Mask reveal |
| 00:01.6 | UNTUNG KE MANA? | Kiri atas, y 500 | Slam + overshoot 2 frame |
| 00:03.4 | NOTA NUMPUK. | Tengah, y 420 | Paper tear |
| 00:04.6 | STOK NGGAK KETAHUAN. | Tengah, y 560 | Paper tear |
| 00:05.8 | HITUNGAN KACAU. | Tengah, y 700 | Paper tear |
| 00:07.6 | PROFITPILOT | Tengah, y 820 | Blur-to-sharp + scale 0.96 → 1 |
| 00:08.4 | Aplikasi Pengelolaan Keuangan Usaha | Tengah, y 920 | Fade-up |
| 00:10.2 | SATU DASHBOARD. SEMUA ANGKA. | Atas, y 260 | Mask reveal, lalu collapse jadi chip |
| 00:15.2 | CATAT DALAM HITUNGAN DETIK. | Atas, y 240 | Mask reveal |
| 00:19.2 | Total otomatis / Stok berkurang | Bawah kartu total | Chip pop |
| 00:21.2 | STOK MENIPIS? KETAHUAN. | Atas, y 240 | Mask reveal |
| 00:23.6 | RESTOK, SEKALI KLIK. | Atas, y 380 | Mask reveal |
| 00:26.2 | LIHAT ARAH BISNIS. | Atas, y 240 | Mask reveal |
| 00:28.8 | Omzet mingguan | Bawah judul | Chip |
| 00:30.3 | SATU APLIKASI. SEMUA TERARAH. | Atas, y 240 | Mask reveal |
| 00:32.5 | Satu akun per toko / Data terpisah / Akses dari mana saja | Kanan bawah, vertikal | Stagger chip |
| 00:35.4 | PROFITPILOT | Tengah, y 700 | Logo animation |
| 00:36.2 | Kendalikan Bisnis. Kembangkan Profit. | Tengah, y 900 | Fade-up |
| 00:37.0 | Daftar Sekarang | Tengah, y 1040 | Scale + glow |
| 00:38.0 | Aplikasi Pengelolaan Keuangan Usaha | Tengah, y 1160 | Fade |

### 8.3 Subtitle lengkap (.srt)

```srt
1
00:00:00,000 --> 00:00:01,600
Omzet kelihatan naik...

2
00:00:01,600 --> 00:00:03,200
tapi kok untungnya nggak kerasa?

3
00:00:03,200 --> 00:00:05,000
Nota numpuk. Stok nggak ketahuan.

4
00:00:05,000 --> 00:00:07,000
Hitungan pun jadi kacau.

5
00:00:07,000 --> 00:00:10,000
Saatnya kenalan sama ProfitPilot.

6
00:00:10,000 --> 00:00:12,500
Semua pemasukan, pengeluaran, dan saldo bersih—

7
00:00:12,500 --> 00:00:15,000
rapi dalam satu dashboard.

8
00:00:15,000 --> 00:00:18,000
Pilih barang, catat transaksi.

9
00:00:18,000 --> 00:00:21,000
Total otomatis, stok langsung berkurang.

10
00:00:21,000 --> 00:00:23,500
Stok menipis? Langsung kelihatan.

11
00:00:23,500 --> 00:00:26,000
Restok pun cukup sekali klik.

12
00:00:26,000 --> 00:00:28,000
Lihat omzet mingguan

13
00:00:28,000 --> 00:00:30,000
dalam grafik yang gampang dipahami.

14
00:00:30,000 --> 00:00:32,500
Kelola usaha dari mana saja.

15
00:00:32,500 --> 00:00:35,000
Data tiap toko, di akunnya sendiri.

16
00:00:35,000 --> 00:00:37,500
ProfitPilot. Kendalikan bisnis, kembangkan profit.

17
00:00:37,500 --> 00:00:40,000
Daftar sekarang.
```

### 8.4 Gaya subtitle

- **Burned-in subtitle:** putih, 46 px, weight 500, shadow navy 40% blur 8 px.
- **Posisi:** center, baseline y 1440.
- **Highlight:** kata kunci (“otomatis”, “berkurang”, “sekali klik”) boleh cyan.
- **Jangan** memakai outline tebal atau background kotak penuh; gunakan shadow halus.
- **Untuk platform:** sediakan juga `.srt` terpisah agar bisa diunggah ke YouTube.

---

## 9. SFX Cue Sheet

### 9.1 Prinsip sound design

- **Lembut, bukan heboh.** Ini aplikasi keuangan, bukan game atau kasino.
- **Rounded.** Serangan cepat, decay pendek, tanpa high-frequency harsh.
- **Satu aksi, satu suara.** Jangan menumpuk 3 SFX untuk satu tap.
- **SFX mendukung ritme cut**, bukan mengisi setiap frame.
- **Jangan memakai** suara kasir, koin, “cha-ching”, alarm, atau keyboard stock yang terlalu kliky.
- **Konsisten.** Suara tap yang sama dipakai di seluruh video.

### 9.2 Palet suara

| Kategori | Karakter | Frekuensi | Durasi | Level |
|---|---|---|---|---|
| Paper/foley | Kering, dekat, natural | 300–6000 Hz | 200–600 ms | −20 s/d −14 dBFS |
| UI tap/click | Bulat, pendek, hangat | 200–1200 Hz | 60–120 ms | −20 s/d −16 dBFS |
| UI pop | Pluck, sedikit nada | 400–1600 Hz | 120–200 ms | −20 s/d −16 dBFS |
| Whoosh | Noise terfilter, halus | 300–4000 Hz | 200–400 ms | −18 s/d −12 dBFS |
| Impact | Sub + body, tidak boom berlebihan | 40–200 Hz | 400–800 ms | −8 s/d −6 dBFS |
| Ding/success | Major triad, cerah tapi lembut | 800–1600 Hz | 300–600 ms | −16 s/d −12 dBFS |
| Alert | Dua nada, minor, tidak panik | 600–1000 Hz | 300–400 ms | −22 s/d −20 dBFS |
| Ambience | Room tone / city dusk | full spectrum | loop | −30 dBFS |

### 9.3 Cue sheet — Foley & UI

| ID | TC | Dur | SFX | Deskripsi | Level | Keyword |
|---|---|---:|---|---|---:|---|
| F01 | 00:00.0 | 3.0 s | Room tone warung | Loop halus, kayu, kipas jauh | −30 | `warung room tone` |
| F02 | 00:00.6 | 0.5 s | Paper pick up | Nota diangkat dari meja | −20 | `paper pick up` |
| F03 | 00:01.0 | 0.4 s | Calculator key ×2 | Klik plastik pendek | −18 | `calculator button` |
| F04 | 00:01.8 | 0.3 s | Receipt crinkle | Kertas kusut | −20 | `paper crinkle` |
| F05 | 00:02.2 | 1.0 s | Low pulse 55 Hz | Sub lembut, sidechain | −24 | `low pulse sub` |
| F06 | 00:03.2 | 0.3 s | Paper whoosh 1 | Cut ke nota | −14 | `paper whoosh` |
| F07 | 00:03.9 | 0.3 s | Paper whoosh 2 | Cut ke kalkulator | −14 | `paper whoosh` |
| F08 | 00:04.6 | 0.2 s | Calculator click ×3 | Tiga klik cepat | −18 | `calculator click` |
| F09 | 00:05.4 | 0.2 s | Notification ping minor | Notif HP, nada turun | −20 | `soft notification minor` |
| F10 | 00:05.8 | 0.3 s | Clock tick | Tick jam dinding | −22 | `clock tick` |
| F11 | 00:06.2 | 0.5 s | Paper suck whoosh | Kertas terhisap | −14 | `paper suck whoosh` |
| F12 | 00:07.0 | 0.8 s | Impact boom | Logo reveal | −6 | `cinematic impact boom` |
| F13 | 00:07.4 | 0.4 s | Bar rise tick ×3 | Tiga bar tumbuh | −18 | `ui tick rise` |
| F14 | 00:08.1 | 0.5 s | Line shimmer | Garis tren menggambar | −16 | `ui shimmer line` |
| F15 | 00:08.7 | 0.5 s | Paper fold + plane whoosh | Pesawat kertas lepas | −14 | `paper plane whoosh` |
| F16 | 00:09.3 | 0.7 s | Logo chime | Chime lembut | −12 | `logo chime` |
| F17 | 00:10.0 | 0.3 s | Card pop C | Kartu masuk | −18 | `ui card pop` |
| F18 | 00:10.6 | 0.3 s | Card pop E | Kartu kedua | −18 | `ui card pop` |
| F19 | 00:11.4 | 0.3 s | Card pop G | Kartu ketiga | −18 | `ui card pop` |
| F20 | 00:12.3 | 3.0 s | Counter tick loop | Angka count-up | −28 | `number counter tick` |
| F21 | 00:13.4 | 0.4 s | Saldo chime | Saldo bersih selesai | −14 | `soft success chime` |
| F22 | 00:14.6 | 0.2 s | Button tap | Tap Tambah Transaksi | −16 | `ui tap soft` |
| F23 | 00:15.2 | 0.2 s | Select tap | Pilih jenis transaksi | −16 | `ui select tap` |
| F24 | 00:15.8 | 0.2 s | Add item tap | Tambah baris barang | −16 | `ui add tap` |
| F25 | 00:16.2 | 0.15 s | Item pluck 1 | Baris Kopi Susu | −16 | `ui pluck` |
| F26 | 00:16.8 | 0.15 s | Item pluck 2 | Baris Roti Bakar | −16 | `ui pluck` |
| F27 | 00:17.8 | 0.6 s | Total roll | Total berubah | −18 | `number roll` |
| F28 | 00:18.6 | 0.2 s | Save tap | Tap Simpan | −16 | `ui tap soft` |
| F29 | 00:19.4 | 0.6 s | Success ding | Transaksi tersimpan | −12 | `success ding soft` |
| F30 | 00:20.2 | 0.2 s | Stock tick down | Stok turun | −18 | `stock tick down` |
| F31 | 00:21.2 | 0.15 s | Badge pop | Badge stok muncul | −18 | `ui badge pop` |
| F32 | 00:21.8 | 0.4 s | Alert blip 2 notes | Stok menipis | −20 | `soft alert blip` |
| F33 | 00:22.6 | 0.4 s | Modal whoosh | Modal naik | −16 | `ui modal whoosh` |
| F34 | 00:23.4 | 0.6 s | Keypad taps | Input +12 | −20 | `number keypad` |
| F35 | 00:24.4 | 0.5 s | Stock fill swell | Bar stok terisi | −18 | `ui fill swell` |
| F36 | 00:25.2 | 0.3 s | Confirm pop + toast | Restok berhasil | −14 | `ui confirm pop` |
| F37 | 00:26.0 | 0.3 s | Grid whoosh | Masuk ruang data | −18 | `ui grid whoosh` |
| F38 | 00:26.6 | 0.25 s | Bar thump C | Bar minggu 1 | −14 | `bar thump` |
| F39 | 00:27.0 | 0.25 s | Bar thump D | Bar minggu 2 | −14 | `bar thump` |
| F40 | 00:27.4 | 0.25 s | Bar thump E | Bar minggu 3 | −14 | `bar thump` |
| F41 | 00:27.8 | 0.25 s | Bar thump G | Bar minggu 4 | −14 | `bar thump` |
| F42 | 00:28.4 | 0.8 s | Line draw swish | Garis omzet | −16 | `line draw swish` |
| F43 | 00:29.2 | 0.4 s | Sparkle peak | Puncak grafik | −12 | `sparkle peak` |
| F44 | 00:30.0 | 0.5 s | Airy whoosh | Transisi ke kota | −14 | `airy whoosh` |
| F45 | 00:30.4 | 4.0 s | City dusk ambience | Kota senja | −30 | `city dusk ambience` |
| F46 | 00:31.5 | 0.15 s | Notification pop 1 | Vignette warung | −22 | `soft notification pop` |
| F47 | 00:32.3 | 0.15 s | Notification pop 2 | Vignette kafe | −22 | `soft notification pop` |
| F48 | 00:33.1 | 0.15 s | Notification pop 3 | Vignette toko online | −22 | `soft notification pop` |
| F49 | 00:34.0 | 0.5 s | Shimmer | HP menyala | −18 | `ui shimmer` |
| F50 | 00:35.0 | 1.0 s | Logo sting | End card | −8 | `logo sting warm` |
| F51 | 00:35.3 | 0.5 s | Plane flyby | Pesawat melintas | −12 | `plane flyby` |
| F52 | 00:37.0 | 0.2 s | Button click | CTA | −14 | `ui button click` |
| F53 | 00:37.6 | 1.5 s | Sparkle tail | CTA glow | −16 | `sparkle tail` |
| F54 | 00:38.2 | 2.0 s | Music resolve tail | Ekor musik | −20 | `music tail` |

### 9.4 Mix notes

| Elemen | Level | Catatan |
|---|---|---|
| VO | −16 LUFS short-term, peak −3 dBFS | Selalu paling depan |
| Musik | −18 dB di bawah VO | Sidechain 3–4 dB, attack 10 ms, release 250 ms |
| UI SFX | −18 s/d −14 dBFS | Jangan menutupi konsonan VO |
| Transition | −14 s/d −8 dBFS | Impact hanya di 2 titik: reveal dan CTA |
| Ambience | −30 dBFS | Hanya untuk memberi ruang, bukan mengisi |
| Master | −14 LUFS, −1 dBTP | Cek di Youlean Loudness Meter |

**Urutan mixing:**

1. VO.
2. Musik, ducking di bawah VO.
3. SFX transisi.
4. Foley UI.
5. Ambience.
6. Cek mono dan earbud.
7. Limit ke −1 dBTP.

### 9.5 Library & lisensi

| Sumber | Cocok untuk | Catatan |
|---|---|---|
| Artlist | Musik + SFX | Berlangganan, aman untuk komersial |
| Epidemic Sound | Musik + SFX | Cek lisensi per platform |
| Envato Elements | SFX, motion assets | Banyak UI sound pack |
| Freesound | Foley | Pilih CC0, cantumkan jika perlu |
| Pixabay Audio | Musik/SFX | Cek ulang lisensi |
| YouTube Audio Library | Musik | Beberapa track perlu atribusi |

**Jangan** memakai SFX dari video TikTok/YouTube lain tanpa lisensi. Simpan bukti lisensi di folder project.

---

## 10. Music Brief

### 10.1 Brief musik

| Parameter | Nilai |
|---|---|
| Durasi | 40 detik |
| BPM | 108 |
| Key | C minor, lift ke E-flat major di 0:07 |
| Genre | Minimal corporate pop / warm product film |
| Mood | Optimistis, hangat, tenang, premium |
| Instrumentasi | Plucked marimba, soft kick, airy pad, subtle clap, shaker, warm sub bass |
| Vokal | Tidak ada |
| Ending | Resolve di 35–40 s, tail reverb 1.5 s |

### 10.2 Struktur musik

| TC | Bagian | Isi | Tujuan |
|---|---|---|---|
| 0:00–0:07 | Intro | Pulse rendah, pluck sparse, tanpa kick | Membangun rasa penasaran |
| 0:07–0:10 | Riser | Reverse riser, pad naik, impact | Reveal logo |
| 0:10–0:26 | Groove | Kick lembut, clap, marimba, bass | Menemani fitur |
| 0:26–0:30 | Peak | Open hat, octave up, sparkle | Grafik omzet |
| 0:30–0:35 | Break | Pad airy, kick turun, ambience | Manfaat dan kota senja |
| 0:35–0:40 | Resolve | Chord final, tail | CTA dan end card |

### 10.3 Referensi mood

Gunakan referensi sebagai *deskripsi*, bukan untuk menjiplak:

- “Apple-style minimal product film” — bersih, lapang, tidak berteriak.
- “Warm Indonesian afternoon” — kayu, cahaya jendela, kopi.
- “Optimistic business documentary” — manusiawi, bukan korporat kaku.
- “Soft tech launch” — pulse elektronik halus, bukan EDM.

**Hindari:**

- Drop EDM yang agresif.
- Ukulele ceria yang terlalu iklan bank.
- Vokal “oh-oh” yang generik.
- Instrumen yang menutupi frekuensi VO (1–4 kHz).

### 10.4 Mix musik

- Musik di bawah VO: −18 dB, sidechain 3–4 dB.
- Di scene 3 (reveal), musik boleh naik 2 dB untuk memberi dampak.
- Di scene 9 (CTA), turunkan 2 dB agar VO tagline jelas.
- Pastikan ada ruang hening 0.2 s sebelum impact reveal.
- Cek transisi musik antar cut; jangan ada loop yang terasa berulang.

### 10.5 Prompt musik AI

```text
Instrumental only, 40 seconds, 108 BPM, C minor with a lift to E-flat major at
0:07. Warm minimal corporate pop: plucked marimba, soft kick, airy pads,
subtle clap, shaker, warm sub bass. Sparse intro 0-7s, build 7-10s, full groove
10-30s, peak 26-30s, airy break 30-35s, resolve 35-40s. Optimistic, premium,
human, no vocals, no EDM drop, no cheesy ukulele, no casino energy. Clean
ending with a short reverb tail.
```

### 10.6 Keyword pencarian library

- `minimal corporate pop 108 bpm`
- `warm marimba technology`
- `optimistic business promo`
- `soft tech product film`
- `uplifting minimal electronic`
- `Indonesian warm corporate`

---

## 11. Prompt Per Shot

### 11.1 Cara generate

1. Generate **P01** terlebih dahulu. Pilih hasil dengan lighting dan warna paling bagus.
2. Simpan frame itu sebagai **look reference**.
3. Generate shot lain dengan referensi look yang sama (image reference / `--sref`).
4. Generate 2–3 variasi per shot. Pilih yang gerakannya paling bersih.
5. Jangan generate teks, angka, atau UI di dalam video AI.
6. Untuk scene 4–7, gunakan plate abstrak lalu tempel UI asli.

### 11.2 Style bible (tempel di setiap prompt)

```text
Vertical 9:16, 1080x1920, 30fps, cinematic product film for an Indonesian
small-business finance app. Warm, optimistic, premium. Two visual worlds:
(1) real warung counter, warm 3200-3800K practical light, wood, paper, hands
only, shallow depth of field, subtle grain; (2) clean fintech space, deep navy
#2563A6, cyan #06B6D4, off-white #F8FAFC, frosted glass, soft shadows,
generous negative space. 35mm lens, f/2.8, smooth eased camera moves, no shake.
Rec.709, warm highlights, navy shadows, 3-5% grain. No text, no letters, no
numbers, no logos, no watermarks.
```

### 11.3 Negative prompt

Gunakan di semua shot:

```text
text, letters, words, numbers, typography, captions, subtitles, watermark, logo,
signature, UI copy, gibberish, distorted hands, extra fingers, deformed fingers,
morphing objects, flicker, low resolution, blurry, oversaturated, HDR, shaky
camera, fisheye, horizontal framing, letterbox, split screen, stock photo,
plastic skin, harsh flash, cartoon, anime, floating coins, neon crypto, casino,
clutter, duplicate objects
```

### 11.4 Shot prompts

#### P01 — Hook (3.2 s)

```text
Vertical 9:16 cinematic shot, 3.2 seconds. Top-down macro of a cluttered
Indonesian warung counter at golden hour: crumpled receipts, a handwritten
ledger with blurred numbers, an old calculator with paper tape, a glass of iced
coffee leaving a ring, a phone face down. A hand enters frame and hesitates over
the calculator, then picks up a receipt. Slow 5% push-in, 35mm lens, f/2.8,
shallow depth of field, warm 3200K window light from the left, dust motes, deep
navy shadows, subtle film grain. Intimate, realistic, premium. No text, no
letters, no logos, no watermark.
```

#### P02A — Nota tumpah (1.0 s)

```text
Vertical 9:16 macro, 1 second. A cascade of crumpled paper receipts falls onto a
dark wooden warung counter, shot at 120fps for slow motion. Warm side light,
shallow depth of field, navy shadows, fine film grain. No text, no letters, no
logos, no watermark.
```

#### P02B — Kalkulator (1.0 s)

```text
Vertical 9:16 macro, 1 second. Extreme close-up of a finger pressing calculator
keys, the numbers out of focus, warm practical light, shallow depth of field,
subtle handheld energy. No text, no letters, no logos, no watermark.
```

#### P02C — Rak kosong (1.0 s)

```text
Vertical 9:16, 1 second. A nearly empty wooden shelf in a small Indonesian shop,
one last product, a blank price tag, dust floating in warm light. Slow tilt up.
Desaturated warm tones, navy shadows, film grain. No text, no letters, no logos,
no watermark.
```

#### P02D — Notifikasi (1.0 s)

```text
Vertical 9:16 macro, 1 second. A phone face down on a wooden counter lights up
with a blurred cyan notification glow, reflecting on the wood. Shallow depth of
field, warm and cool contrast, film grain. No readable text, no letters, no
logos, no watermark.
```

#### P03 — Reveal (3.0 s)

```text
Vertical 9:16 brand reveal, 3 seconds. Deep navy-cyan abstract space with a
subtle perspective grid. Three translucent glass bars rise from the floor, then
a luminous line chart draws upward. A white paper plane folds into existence
from a sheet of paper and takes off along the line, leaving a cyan trail. Soft
bloom, floating particles, cinematic depth of field, premium fintech motion
design. Centered composition with generous negative space for a wordmark. No
text, no letters, no logos, no watermark.
```

#### P04 — Dashboard plate (5.0 s)

```text
Vertical 9:16, 5 seconds. Clean off-white studio space with a soft navy radial
glow. Three blank frosted-glass UI cards float in with staggered spring motion,
subtle 6-degree perspective, soft shadows, rounded corners. Abstract tick marks
suggest numbers, but there is no readable text. A small cyan button pulses.
Premium fintech product film, macro depth of field, smooth easing, no camera
shake. No text, no letters, no numbers, no logos.
```

**UI insert:** rekam dashboard asli, tempel di atas plate. Jangan pakai teks dari AI.

#### P05 — Transaksi plate (6.0 s)

```text
Vertical 9:16, 6 seconds. Macro of a floating off-white UI panel in a clean
studio space. Blank rows stack in one by one, a thumb taps a cyan button, a soft
success ripple expands, and a small badge ticks down. Abstract shapes only, no
readable text. Navy and cyan accents, soft shadows, premium fintech motion,
shallow depth of field, smooth spring easing. No text, no letters, no numbers,
no logos.
```

**UI insert:** rekam form transaksi asli dengan data dummy. Plate hanya untuk background dan gerakan kamera.

#### P06 — Stok plate (5.0 s)

```text
Vertical 9:16, 5 seconds. A clean wooden product shelf in a small Indonesian shop
transitions into a floating off-white data panel. An amber badge pulses on one
row, a bottom sheet rises, a progress bar fills green, and a calm confirmation
appears. Abstract, no readable text. Warm practical light meets cool cyan UI
glow, premium hybrid style, shallow depth of field. No text, no letters, no
numbers, no logos.
```

**UI insert:** rekam tabel barang dan modal restok asli.

#### P07 — Omzet plate (4.0 s)

```text
Vertical 9:16, 4 seconds. Dark navy data space with a faint perspective grid.
Four groups of translucent cyan bars rise in sequence, then a luminous line
chart draws upward through them. The camera tilts up to follow the peak. A tiny
white paper plane rides the line and leaves a trail. Soft bloom, floating
particles, premium fintech motion design. No text, no letters, no numbers, no
logos.
```

**UI insert:** tempel chart asli atau recreasi chart dengan angka dummy. Pastikan total Rp 13.200.000.

#### P08 — Benefit (5.0 s)

```text
Vertical 9:16, 5 seconds. A white paper plane glides over a stylized Indonesian
neighborhood at dusk: warm window lights, rooftops, a small warung awning, a
cafe, a shop with stacked packages. The camera tracks alongside the plane, then
tilts down to a hand holding a glowing phone with abstract cyan UI. Cinematic
warm and cool contrast, soft haze, film grain, optimistic and calm. No text, no
letters, no logos, no readable UI.
```

#### P09 — End card (5.0 s)

```text
Vertical 9:16 end card, 5 seconds. Deep navy background with a soft cyan radial
glow, floating dust particles, and a subtle perspective grid. Centered abstract
logo mark made of three glass bars and a small paper plane, with generous
negative space for a wordmark and button. Slow 2% push-in, gentle shimmer,
premium fintech brand film. No text, no letters, no logos, no watermark.
```

**Catatan:** logo asli ProfitPilot ditempel di post, bukan digenerate AI.

### 11.5 Prompt keyframe

Gunakan untuk Midjourney/Flux sebelum image-to-video.

```text
Cinematic still frame, vertical 9:16, [deskripsi shot], 35mm lens, f/2.8, warm
3200K practical light, deep navy shadows, subtle film grain, Rec.709, no text,
no letters, no logos. --ar 9:16 --style raw
```

Untuk Flux/SDXL, hilangkan `--ar` dan set resolusi 1080×1920. Untuk Midjourney, gunakan `--sref` dari look frame P01 agar konsisten.

### 11.6 Catatan per tool

| Tool | Kekuatan | Catatan |
|---|---|---|
| Veo 3.1 | Gerakan sinematik, audio native | Generate tanpa dialog; audio diganti di post |
| Sora 2 | Storyboard, 9:16, durasi panjang | Gunakan reference image; hindari teks |
| Kling 2.5 | Start/end frame, transisi halus | Cocok untuk paper-to-plane |
| Runway Gen-4 | Image-to-video, motion brush | Bagus untuk plate live-action |
| Hailuo / MiniMax | Live-action plate 6 s | Cek konsistensi wajah/tangan |
| Pika | Efek dan transisi | Gunakan untuk shimmer/particle |

Kapabilitas tool bisa berubah. Selalu cek batas durasi, resolusi, dan lisensi komersial sebelum produksi.

### 11.7 Checklist konsistensi

- [ ] Semua shot memakai look reference P01.
- [ ] Semua shot 9:16, 30fps, Rec.709.
- [ ] Tidak ada teks, angka, atau logo yang digenerate AI.
- [ ] Arah cahaya konsisten: hangat dari kiri untuk dunia kertas.
- [ ] Warna navy/cyan konsisten di dunia UI.
- [ ] Tidak ada tangan cacat atau objek morphing.
- [ ] Transisi masuk/keluar sesuai storyboard.
- [ ] Setiap shot punya 2–3 variasi cadangan.

---

## 12. Prompt VO & Musik AI

### 12.1 Prompt VO AI

**Tool:** ElevenLabs, atau voice actor manusia (lebih direkomendasikan).

```text
Voice: Indonesian (id-ID), female, late 20s. Warm, conversational, slight smile,
natural breath, 150-160 wpm. Not an announcer, not hard-sell. Pronounce
"ProfitPilot" as "Pro-fit Pai-lot". Pause 300 ms after "naik" in line 1, 200 ms
between sentences. Keep the tagline calm and confident, not triumphant.
```

**Script:** gunakan naskah di bagian 7.1.

**Settings awal:**

| Setting | Nilai |
|---|---|
| Model | Eleven Multilingual v2 / v3 |
| Stability | 45% |
| Similarity | 75% |
| Style | 15% |
| Speed | 0.98 |
| Speaker boost | On |
| Output | WAV 48 kHz |

**Catatan:**

- Generate per baris, bukan sekaligus, agar jeda bisa diatur.
- Simpan 3 take per baris.
- Jika ada kata yang terdengar aneh, tulis ulang secara fonetis.
- Jangan memakai VO AI untuk klaim yang belum terbukti.

### 12.2 Prompt musik AI

**Tool:** Suno, Udio, atau library musik berlisensi.

```text
Instrumental only, 40 seconds, 108 BPM, C minor with a lift to E-flat major at
0:07. Warm minimal corporate pop: plucked marimba, soft kick, airy pads, subtle
clap, shaker, warm sub bass. Sparse intro 0-7s, build 7-10s, full groove 10-30s,
peak 26-30s, airy break 30-35s, resolve 35-40s. Optimistic, premium, human, no
vocals, no EDM drop, no cheesy ukulele, no casino energy. Clean ending with a
short reverb tail.
```

**Catatan:**

- AI musik sering mengabaikan struktur waktu. Potong dan susun ulang di DAW.
- Minta versi tanpa drum dan versi full untuk fleksibilitas.
- Cek lisensi komersial platform sebelum upload.
- Normalisasi ke −14 LUFS setelah editing.

### 12.3 Prompt SFX (jika membuat sendiri)

```text
Soft rounded UI tap, 80 ms, warm 400-800 Hz body, no harsh highs, no reverb,
clean transient, subtle click. Designed for a premium finance app.
```

```text
Gentle two-note alert, minor third, 600-900 Hz, soft attack, 300 ms, supportive
not alarming, no beep harshness, no siren.
```

Untuk hasil terbaik, gunakan SFX library berlisensi dan sesuaikan pitch/level di DAW.

---

## 13. Alur Produksi

### 13.1 Tiga rute produksi

| Rute | Deskripsi | Kelebihan | Kekurangan | Rekomendasi |
|---|---|---|---|---|
| A — Hybrid | AI plate + UI asli + motion graphics | Akurat, premium, realistis | Butuh editing | **Utama** |
| B — Full motion | Semua UI dan ilustrasi dibuat di After Effects/Figma | Kontrol penuh, teks tajam | Butuh skill motion | Alternatif |
| C — Full AI | Semua shot digenerate AI | Cepat, murah | UI/teks tidak akurat | Hanya untuk konsep |

### 13.2 Route A — langkah demi langkah

1. **Lock naskah & storyboard.** Jangan generate sebelum angka dan alur final.
2. **Seed data dummy** di aplikasi sesuai bagian 1.5.
3. **Rekam UI** untuk scene 4–7 (dan opsional login/landing).
4. **Generate plate AI** untuk scene 1–3, 8, dan background 9.
5. **Buat project 1080×1920, 30fps.**
6. **Susun rough cut** mengikuti timecode storyboard.
7. **Komposit UI** di atas plate; atur corner radius, shadow, dan perspektif.
8. **Tambahkan teks overlay** dengan Plus Jakarta Sans.
9. **Masukkan VO**, lalu musik, lalu SFX.
10. **Color grading** dan grain.
11. **Export master 40 detik**, lalu cutdown.
12. **QA di HP** sebelum upload.

### 13.3 Pengaturan rekaman UI

| Parameter | Nilai |
|---|---|
| Browser | Chrome |
| Device emulation | 430 × 932 CSS px |
| DPR | 3 |
| Resolusi rekaman | 1290 × 2796 (crop ke 1080 × 1920) |
| Frame rate | 60 fps |
| Codec | OBS NVENC CQP 18 / ProRes jika tersedia |
| Zoom UI | 130–150% agar teks terbaca |
| Cursor | Disembunyikan; ganti touch indicator 48 px |
| Scrollbar | Disembunyikan |
| Data | Sudah di-seed, tanpa data asli |
| Takes | 2–3 per interaksi |

**Tips:**

- Rekam setiap interaksi sebagai clip terpisah agar mudah dipotong.
- Tahan 1 detik di awal dan akhir setiap clip.
- Jangan merekam di layar 4K lalu zoom; rekam di ukuran device yang benar.
- Karena 430 × 932 lebih tinggi dari 9:16, lakukan crop vertikal; pastikan elemen penting tidak berada di area yang terpotong.
- Matikan notifikasi desktop dan kursor sistem.
- Gunakan mode incognito dengan sesi login yang sudah siap.

### 13.4 Kompositing UI

| Elemen | Setting |
|---|---|
| Corner radius | 48 px untuk panel, 24 px untuk kartu |
| Shadow | `0 24px 80px rgba(15, 42, 67, 0.18)` |
| Inner border | 2 px `rgba(255,255,255,0.55)` |
| Perspective | 6–8°, jangan lebih |
| Scale | 100% setelah crop; jangan upscale |
| Motion blur | Hanya pada gerakan, bukan pada teks |
| Grain | 3–5% di background, 0% di teks |
| Glow | Radial cyan 20–30% di belakang kartu utama |

**Langkah komposit:**

1. Buat comp 1080×1920.
2. Letakkan plate AI sebagai background.
3. Tambahkan UI recording di atasnya.
4. Masking sudut membulat.
5. Tambahkan shadow dan inner border.
6. Beri subtle camera move (scale 100 → 102%).
7. Tambahkan teks overlay.
8. Cek safe zone.

### 13.5 Alur audio

1. **VO** — susun per baris, cut sesuai timecode.
2. **Musik** — loop/cut ke 40 detik, fade in 0.3 s, fade out 1.5 s.
3. **SFX transisi** — impact, riser, whoosh.
4. **Foley UI** — tap, pluck, tick, ding.
5. **Ambience** — room tone dan city dusk.
6. **Ducking** — sidechain musik −3 sampai −4 dB di bawah VO.
7. **EQ** — high-pass VO 80 Hz, de-ess 5–8 kHz, compress 2:1.
8. **Master** — −14 LUFS, −1 dBTP, cek mono.

### 13.6 Export

| Setting | Master | Social |
|---|---|---|
| Codec | ProRes 422 HQ | H.264 High |
| Resolusi | 2160 × 3840 | 1080 × 1920 |
| Frame rate | 30 fps | 30 fps |
| Bitrate | — | 16–20 Mbps VBR 2-pass |
| Audio | PCM 48 kHz | AAC 320 kbps |
| Color | Rec.709 | Rec.709 |
| Nama | `PROFITPILOT_9x16_40s_master.mov` | `PROFITPILOT_9x16_40s_v01.mp4` |

---

## 14. QA, Deliverable & Cutdown

### 14.1 Checklist QA

**Visual:**

- [ ] Hook terbaca dalam 1 detik pertama.
- [ ] Teks tidak masuk safe zone atas/bawah/kanan.
- [ ] UI tajam, tidak blur, tidak terpotong.
- [ ] Angka konsisten: Rp 21.350.000 / Rp 8.150.000 / Rp 13.200.000.
- [ ] Stok konsisten: 24 → 22, 4 → 3 → 15.
- [ ] Logo ProfitPilot tidak distorsi.
- [ ] Tidak ada teks/angka dari AI yang rusak.
- [ ] Tidak ada data pengguna asli.
- [ ] Warna sesuai palet brand.
- [ ] Tidak ada flash >3 Hz.

**Audio:**

- [ ] VO jelas di earbud dan speaker HP.
- [ ] Musik tidak menutupi VO.

- [ ] SFX tidak terlalu keras atau menyakitkan.
- [ ] Tidak ada klik/pop di transisi audio.
- [ ] Master −14 LUFS, −1 dBTP.
- [ ] Mono compatibility aman.

**Konten:**

- [ ] Tidak ada klaim “gratis”, “cloud”, “real-time”, “100% aman”.
- [ ] Tidak menampilkan fitur admin/password.
- [ ] CTA “Daftar Sekarang” tampil minimal 3 detik.
- [ ] Ejaan “ProfitPilot” konsisten.
- [ ] Subtitle sinkron dan tidak ada typo.

**Platform:**

- [ ] Upload test di TikTok/Reels/Shorts.
- [ ] Cover 1080×1920 terbaca di grid.
- [ ] File di bawah batas ukuran platform.
- [ ] Caption dan hashtag siap.

### 14.2 Deliverable akhir

| File | Durasi | Resolusi | Catatan |
|---|---:|---|---|
| `PROFITPILOT_9x16_40s_v01.mp4` | 40 s | 1080×1920 | Master sosial |
| `PROFITPILOT_9x16_30s_v01.mp4` | 30 s | 1080×1920 | Cutdown |
| `PROFITPILOT_9x16_15s_v01.mp4` | 15 s | 1080×1920 | Cutdown |
| `PROFITPILOT_hook_A.mp4` | 3 s | 1080×1920 | Hook A |
| `PROFITPILOT_hook_B.mp4` | 3 s | 1080×1920 | Hook B |
| `PROFITPILOT_hook_C.mp4` | 3 s | 1080×1920 | Hook C |
| `PROFITPILOT_cover_01.png` | — | 1080×1920 | Cover |
| `PROFITPILOT_id.srt` | — | — | Subtitle |
| `PROFITPILOT_audio_stems.zip` | — | — | VO/musik/SFX |
| `PROFITPILOT_project.zip` | — | — | Project file |

### 14.3 Cutdown 30 detik

| TC | Isi | VO |
|---|---|---|
| 0:00–0:03 | Hook | “Omzet naik, tapi untung ke mana?” |
| 0:03–0:06 | Problem montage | “Nota numpuk. Stok nggak ketahuan. Hitungan kacau.” |
| 0:06–0:08 | Reveal logo | “Kenalan sama ProfitPilot.” |
| 0:08–0:13 | Dashboard | “Semua angka, satu dashboard.” |
| 0:13–0:18 | Transaksi | “Total otomatis, stok berkurang.” |
| 0:18–0:22 | Stok | “Stok menipis? Restok sekali klik.” |
| 0:22–0:26 | Omzet | “Lihat arah bisnis.” |
| 0:26–0:30 | CTA | “ProfitPilot. Daftar sekarang.” |

### 14.4 Cutdown 15 detik

| TC | Isi | VO |
|---|---|---|
| 0:00–0:02 | Hook | “Omzet naik, untung ke mana?” |
| 0:02–0:04 | Reveal logo | “ProfitPilot.” |
| 0:04–0:08 | Dashboard + transaksi | “Catat transaksi, stok otomatis.” |
| 0:08–0:11 | Omzet | “Lihat omzet mingguan.” |
| 0:11–0:15 | CTA | “Daftar sekarang.” |

### 14.5 Varian hook 3 detik

| Versi | Visual | Teks | VO |
|---|---|---|---|
| A | Nota dan kalkulator | OMZET NAIK. UNTUNG KE MANA? | “Omzet naik, tapi untung ke mana?” |
| B | Buku catatan penuh coretan | TIAP HARI JUALAN. UNTUNGNYA? | “Tiap hari jualan. Tiap hari juga bingung untungnya.” |
| C | Buku catatan lama, debu | MASIH CATAT DI BUKU? | “Catatan bisnis kamu, masih di buku tulis?” |

### 14.6 Caption & hashtag

**Caption A — pain-first:**

> Omzet naik, tapi untung ke mana? 👀
> Catat transaksi, kelola stok, dan pantau omzet usaha dalam satu dashboard. Lebih rapi, lebih terarah.
> #ProfitPilot #UMKM #UsahaKecil #AplikasiKeuangan #TipsBisnis

**Caption B — feature-first:**

> Nota numpuk, stok nggak ketahuan, hitungan kacau?
> ProfitPilot bantu catat pemasukan, pengeluaran, stok, dan omzet dalam satu tempat.
> #ProfitPilot #WarungKopi #UMKMIndonesia #KelolaUsaha #BisnisKecil

**Caption C — brand-first:**

> Bisnis kamu sudah jalan. Sekarang biar arahnya lebih jelas.
> ProfitPilot — Kendalikan Bisnis. Kembangkan Profit.
> #ProfitPilot #AplikasiKeuangan #UMKM #PengusahaMuda #TipsBisnis

**Catatan hashtag:** gunakan 3–5 hashtag utama, jangan 30. Sesuaikan dengan platform dan lokasi.

### 14.7 Cover / thumbnail

| Varian | Visual | Teks | Catatan |
|---|---|---|---|
| A | Frame hook: nota, kalkulator, kopi | OMZET NAIK. UNTUNG KE MANA? | Paling pain-first |
| B | Dashboard dengan saldo besar | SATU DASHBOARD. SEMUA ANGKA. | Feature-first |
| C | Logo di navy + paper plane | KENDALIKAN BISNIS. KEMBANGKAN PROFIT. | Brand-first |

**Aturan cover:**

- Ukuran 1080 × 1920.
- Teks maksimal 5 kata, 96–120 px.
- Logo minimal 120 px, letakkan di bawah atau atas.
- Jangan menaruh teks di area tombol platform.
- Kontras tinggi; hindari background ramai.
- Sediakan versi tanpa teks untuk A/B test.

---

## Lampiran A — Daftar Screen yang Direkam

| Scene | Route | Yang direkam | Prioritas |
|---|---|---|---|
| 4 | `/dashboard` | Tiga kartu, transaksi terbaru | Wajib |
| 5 | `/transaksi` | Form, tambah barang, total, simpan, toast | Wajib |
| 6 | `/barang` | Tabel barang, badge stok, modal restok, riwayat | Wajib |
| 7 | `/omzet` | Ringkasan, grafik mingguan, tabel | Wajib |
| 3 | `/` | Hero dan logo (opsional untuk referensi) | Opsional |
| 9 | `/login` | Form login (opsional) | Opsional |
| 8 | `/profil` | Profil toko (opsional) | Opsional |

**Catatan:** Jangan merekam halaman admin/users karena menampilkan password. Fokus pada pengalaman pemilik toko.

---

## Lampiran B — Status Data per Scene

| Scene | Dashboard | Transaksi | Barang | Omzet |
|---|---|---|---|---|
| 4 | 21.350.000 / 8.150.000 / 13.200.000 | — | — | — |
| 5 | — | 51.000, 2 item | Kopi 24→22, Roti 4→3 | — |
| 6 | — | — | Roti 3→15 | — |
| 7 | — | — | — | 13.200.000 total |

---

## Lampiran C — Asset Checklist

| Asset | Format | Catatan |
|---|---|---|
| Logo ProfitPilot | SVG/PNG transparan | Versi putih dan navy |
| Font Plus Jakarta Sans | TTF/OTF | Weight 400, 500, 600, 700, 800 |
| Ikon | SVG | Lucide/Feather, stroke 1.8 |
| LUT | .cube | Rec.709, warm highlights |
| Grain texture | PNG 4K | Overlay 3–5% |
| Paper texture | PNG | Untuk scene 1–2 |
| UI recordings | ProRes/H.264 | 1080×1920 crop |
| VO | WAV 48 kHz | 3 take per baris |
| Musik | WAV | 40 s, instrumental |
| SFX pack | WAV | UI, whoosh, impact, foley |
| Subtitle | .srt | Indonesia |
| Cover | PNG | 3 varian |

---

## Lampiran D — Catatan Perubahan

| Versi | Tanggal | Perubahan |
|---|---|---|
| 1.0 | 10 Nov 2026 | Versi awal: prompt, storyboard, naskah, SFX, production guide |

---

**Akhir dokumen.**

Kalau ada perubahan durasi, angka dummy, atau gaya visual, update bagian 1.5 terlebih dahulu, lalu sesuaikan storyboard, SRT, dan SFX cue sheet agar tetap konsisten.
