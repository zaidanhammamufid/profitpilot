
const canvas = document.getElementById("grafikOmzet");
const ctx = canvas.getContext("2d");

const data = dataMingguan || [];

function formatRupiah(angka) {
    return "Rp " + Number(angka).toLocaleString("id-ID");
}

function gambarGrafik() {
    const container = document.getElementById("grafikContainer");

    if (!container || data.length === 0) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        return;
    }

    const width = container.clientWidth;
    const height = 320;

    canvas.width = width;
    canvas.height = height;

    ctx.clearRect(0, 0, width, height);

    const paddingKiri = 75;
    const paddingKanan = 20;
    const paddingAtas = 25;
    const paddingBawah = 55;

    const areaWidth = width - paddingKiri - paddingKanan;
    const areaHeight = height - paddingAtas - paddingBawah;

    // Ambil nilai pemasukan, pengeluaran, dan omzet
    const nilai = data.flatMap(item => [
        Number(item.pemasukan) || 0,
        Number(item.pengeluaran) || 0,
        Number(item.omzet) || 0
    ]);

    // Skala grafik agar nilai negatif tetap terlihat
    const nilaiMin = Math.min(...nilai, 0);
    const nilaiMax = Math.max(...nilai, 0);

    const rentang = nilaiMax - nilaiMin || 1;
    const langkah = rentang / 4;

    function posisiY(nilai) {
        return paddingAtas +
            ((nilaiMax - nilai) / rentang) * areaHeight;
    }

    // Garis bantu dan label nominal
    ctx.font = "11px Arial";
    ctx.textAlign = "right";
    ctx.textBaseline = "middle";
    ctx.fillStyle = "#64748b";
    ctx.strokeStyle = "#e2e8f0";
    ctx.lineWidth = 1;

    for (let i = 0; i <= 4; i++) {
        const nilaiGaris = nilaiMax - langkah * i;
        const y = posisiY(nilaiGaris);

        ctx.beginPath();
        ctx.moveTo(paddingKiri, y);
        ctx.lineTo(width - paddingKanan, y);
        ctx.stroke();

        let label;

        if (Math.abs(nilaiGaris) >= 1000000) {
            label = (nilaiGaris / 1000000).toLocaleString("id-ID", {
                maximumFractionDigits: 1
            }) + " jt";
        } else if (Math.abs(nilaiGaris) >= 1000) {
            label = (nilaiGaris / 1000).toLocaleString("id-ID", {
                maximumFractionDigits: 1
            }) + " rb";
        } else {
            label = Math.round(nilaiGaris).toLocaleString("id-ID");
        }

        ctx.fillText(
            label,
            paddingKiri - 10,
            y
        );
    }

    // Garis nol
    const yNol = posisiY(0);

    ctx.beginPath();
    ctx.moveTo(paddingKiri, yNol);
    ctx.lineTo(width - paddingKanan, yNol);
    ctx.strokeStyle = "#94a3b8";
    ctx.lineWidth = 1.5;
    ctx.stroke();

    // Lebar batang menyesuaikan jumlah minggu
    const lebarKelompok = areaWidth / data.length;
    const lebarBatang = Math.min(22, lebarKelompok * 0.22);
    const jarakBatang = Math.max(2, lebarBatang * 0.12);

    const seri = [
        { key: "pemasukan", warna: "#2563eb" },
        { key: "pengeluaran", warna: "#ef4444" },
        { key: "omzet", warna: "#06b6d4" }
    ];

    data.forEach((item, index) => {
        const tengahX = paddingKiri +
            index * lebarKelompok +
            lebarKelompok / 2;

        seri.forEach((itemSeri, seriIndex) => {
            const nilaiBatang = Number(item[itemSeri.key]) || 0;
            const x = tengahX +
                (seriIndex - 1) * (lebarBatang + jarakBatang) -
                lebarBatang / 2;

            const yNilai = posisiY(nilaiBatang);
            const tinggi = Math.abs(yNol - yNilai);
            const y = Math.min(yNol, yNilai);

            ctx.fillStyle = itemSeri.warna;

            // Sudut batang sedikit membulat
            const radius = Math.min(4, lebarBatang / 3);

            ctx.beginPath();
            ctx.roundRect(
                x,
                y,
                lebarBatang,
                Math.max(tinggi, 1),
                [radius, radius, 0, 0]
            );
            ctx.fill();
        });

        // Label minggu
        ctx.fillStyle = "#374151";
        ctx.font = "12px Arial";
        ctx.textAlign = "center";
        ctx.textBaseline = "top";

        ctx.fillText(
            item.minggu,
            tengahX,
            height - paddingBawah + 15
        );
    });

    // Legenda grafik
    const legenda = [
        { nama: "Pemasukan", warna: "#2563eb" },
        { nama: "Pengeluaran", warna: "#ef4444" },
        { nama: "Omzet", warna: "#06b6d4" }
    ];

    ctx.font = "11px Arial";
    ctx.textBaseline = "middle";

    const totalLebarLegenda = legenda.reduce((total, item) => {
        return total + 20 + ctx.measureText(item.nama).width;
    }, 0) + (legenda.length - 1) * 12;

    let posisiLegendaX = Math.max(
        10,
        (width - totalLebarLegenda) / 2
    );

    legenda.forEach(item => {
        ctx.fillStyle = item.warna;
        ctx.fillRect(posisiLegendaX, 8, 10, 10);

        ctx.fillStyle = "#374151";
        ctx.textAlign = "left";
        ctx.fillText(item.nama, posisiLegendaX + 15, 13);

        posisiLegendaX += 20 + ctx.measureText(item.nama).width + 12;
    });
}

gambarGrafik();

window.addEventListener("resize", gambarGrafik);
