<?php

namespace Database\Seeders;

use App\Models\IndikatorSasaranStrategis;
use App\Models\IndikatorTujuan;
use App\Models\Kegiatan;
use App\Models\Misi;
use App\Models\Program;
use App\Models\SasaranStrategis;
use App\Models\SubKegiatan;
use App\Models\Tujuan;
use App\Models\Visi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Master2025NewSulteng extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $this->misi();
            $this->tujuan();
            $this->indikatorTujuan();
            $this->sasaran();
            $this->indikator();
        });
    }


    private function misi()
    {
        Misi::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $misi = [
            '*Mewujudkan Masyarakat Sehat, Cerdas Dan Sejahtera Melalui Pemenuhan Kebutuhan Dasar Dan Penyediaan Lapangan Kerja',
            '*Mewujudkan Masyarakat Bahagia Dan Produktif Melalui Peningkatan Ekonomi Berbasis Potensi Unggulan Daerah Dan Pemberdayaan Ekonomi Kerakyatan Yang Berkeadilan',
            '*Mewujudkan Pembangunan Berbasis Lingkungan Dan Tata Ruang Yang Berkelanjutan Berorientasi Pada Konektivitas Antar Wilayah Dan Antar Sektor',
            '*Meningkatkan Tata Kelola Pemerintahan Bersih, Inovatif, Kolaboratif Serta Keamanan Daerah Yang Tangguh Berlandaskan Nilai Religius Dan Kearifan Lokal'
        ];

        $nomor = 9; // mulai dari 9

        foreach ($misi as $value) {
            Misi::query()->create([
                'tahun_mulai' => 2025,
                'nomor' => $nomor,
                'misi' => $value,
            ]);
            $nomor++; // naik 1 setiap iterasi
        }
    
    }

    private function tujuan()
    {
        Tujuan::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $tujuan = [
            '*Mewujudkan Kualitas Masyarakat Sulawesi Tengah Yang Sehat Dan Cerdas',
            '*Meningkatnya Kesejahteraan Masyrakat Sulawesi Tengah Melalui Pemenuhan Kebutuhan Dasar Dan Penyediaan Lapangan Kerja',
            '*Mewujudkan Keluarga Berkualitas Dan Kesetaraan Gender',
            '*Meningkatkan Pertumbuhan Ekonomi Melalui Produktivitas Unggulan Daerah',
            '*Meningkatkan PDRB Sektor Unggulan Daerah',
            '*Meningkatkan Pemberdayaan Ekonomi Kerakyatan Yang Berkeadilan',
            '*Meningkatkan Kualitas Lingkungan Hidup',
            '*Meningkatkan Kualitas Infrastruktur Dasar Dan Konektivitas',
            '*Meningkatkan Pembangunan Teknologi Informasi Dan Komunikasi',
            '*Mewujudkan Tata Kelola Pemerintahan Yang Bersih, Inovatif Dan Kolaboratif',
            '*Meningkatkan Keamanan Daerah Dan Ketangguhan Daerah Terhadap Bencana',
            '*Meningkatkan Pembangunan Umat Beragama Yang Bermaslahat Dan Berkebudayaan Maju'
        ];
        $nomor = 9; // mulai dari 9

        foreach ($tujuan as $value) {
            Tujuan::query()->create([
                'tahun_mulai' => 2025,
                'nomor' => $nomor,
                'tujuan' => $value,
            ]);
            $nomor++; // naik 1 setiap iterasi
        }

    }

    private function indikatorTujuan()
    {
        IndikatorTujuan::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $indikator = [
            '*Indeks Modal Manusia',
            '*Tingkat Kemiskinan',
            '*Tingkat Pengangguran Terbuka',
            '*Indeks Pembangunan Kualitas Keluarga',
            '*Indeks Pembangunan Gender',
            '*Pertumbuhan Ekonomi',
            '*PDRB Sektor Unggulan Daerah',
            '*Indeks Williamson',
            '*Rasio Gini',
            '*Indeks Kualitas Lingkungan Hidup Daerah',
            '*Indeks Infrastruktur Daerah',
            '*Indeks Pembangunan Teknologi Informasi Dan Komunikasi',
            '*Indeks Demokrasi Indonesia',
            '*Indeks Reformasi Birokrasi',
            '*Indeks Ketentraman Dan Ketertiban Umum',
            '*Indeks Risiko Bencana',
            '*Indeks Kerukunan Umat Beragama',
            '*Indeks Pembangunan Kebudayaan'
        ];

        $nomor = 15; // mulai dari 15

        foreach ($indikator as $value) {
            IndikatorTujuan::query()->create([
                'tahun_mulai' => 2025,
                'nomor' => $nomor,
                'indikator' => $value,
            ]);
            $nomor++; // naik 1 setiap iterasi
        }

    }

    private function sasaran()
    {
        SasaranStrategis::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $sasaran = [
            '*Meningkatnya Kualitas Derajat Kesehatan Masyarakat',
            '*Meningkatnya Kualitas Pendidikan',
            '*Menurunnya Tingkat Kemiskinan Di Perkotaan Dan Perdesaan',
            '*Meningkatnya Angka Partisipasi Kerja',
            '*Meningkatnya Pembangunan Kualitas Keluarga',
            '*Meningkatnya Peran Pemuda Dan Daya Saing Berkeadilan',
            '*Meningkatnya Perlindungan Terhadap Anak',
            '*Meningkatnya Kesetaraan Gender',
            '*Meningkatnya Nilai Investasi Daerah',
            '*Meningkatnya PDRB Sektor Industri Pengolahan',
            '*Meningkatnya Pendapatan Dan Daya Saing Daerah',
            '*Meningkatnya Produktivitas Ekonomi Sektoral',
            '*Meningkatnya PDRB Sektor Pertanian, Kehutanan Dan Perikanan',
            '*Meningkatnya PDRB Sektor Pertambangan Dan Penggalian',
            '*Meningkatnya PDRB Sektor Pariwisata',
            '*Meningkatnya Peran Koperasi',
            '*Menurunnya Ketimpangan Pendapatan Antar Wilayah',
            '*Meningkatnya Pendapatan Kelompok Masyarakat Berpendapatan Terendah Dan Menengah',
            '*Meningkatnya Pengelolaan Sampah Dan Luas Genangan Yang Tertangani',
            '*Meningkatnya Pengelolaan Keanekaragaman Hayati Daerah',
            '*Menurunnya Intensitas Emisi GRK Menuju Net Zero Emision',
            '*Meningkatnya Kualitas Pemanfaatan Ruang',
            '*Meningkatnya Kondisi Jalan Baik',
            '*Meningkatnya Akses Hunian Layak Dan Sanitasi Rumah Tangga',
            '*Meningkatnya Kualitas Simpul Transportasi',
            '*Meningkatnya Rasio Elektrifikasi',
            '*Meningkatnya Persentase Kondisi Irigasi Dan Sumber Daya Air',
            '*Meningkatnya Akses Terhadap Informasi Dan Komunikasi',
            '*Meningkatnya Kebebasan, Kesetaraan Dan Kapasitas Lembaga Demokrasi',
            '*Terwujudnya Kelola Yang Berkualitas',
            '*Meningkatnya Kebebasan, Kesetaraan Dan Kapasitas Lembaga Demokrasi',
            '*Terwujudnya Tata Kelola Pemerintahan Yang Berkualitas',
            '*Meningkatnya Ketentraman Dan Ketertiban Umum',
            '*Meningkatnya Ketangguhan Daerah Terhadap Bencana',
            '*Meningkatnya Kesetaraan, Toleransi Dan Kerjsama Umat Beragama',
            '*Terwjudnya Pembangunan Kebudayaan Yang Maju'

        ];

        $nomor = 21; // mulai dari 21

        foreach ($sasaran as $value) {
            SasaranStrategis::query()->create([
                'tahun_mulai' => 2025,
                'nomor' => $nomor,
                'sasaran' => $value,
            ]);
            $nomor++; // naik 1 setiap iterasi
        }

    }

    private function indikator()
    {
        IndikatorSasaranStrategis::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $iku = [
            '*Usia Harapan Hidup',
            '*Angka Kematian Ibu (Pers 100.000 Kelahiran Hidup)',
            '*Prevelensi Stunting (Pendek Dan Sangat Pendek Pada Balita)',
            '*Rata–Rata Lama Sekolah Penduduk Usia Diatas 15 Tahun',
            '*Harapan Lama Sekolah',
            '*Nilai Literasi',
            '*Nilai Numerasi',
            '*Persentase Penduduk Miskin Perkotaan',
            '*Persentase Penduduk Miskin Perdesaan',
            '*Rasio Penduduk Bekerja',
            '*Indeks Pembangunan Berwawasan Kependudukan',
            '*Indeks Pembangunan Keluarga (I-BANGGA)',
            '*Indeks Pembangunan Pemuda',
            '*Indeks Pembangunan Olahraga',
            '*Indeks Perlindungan Anak',
            '*Indeks Ketimpangan Gender',
            '*Nilai Investas Rasio PDRB Industri Pengolahan (%)',
            '*Kontribusi PAD Terhadap Total Pendapatan',
            '*Indeks Daya Saing Daerah',
            '*Blue Economy Index',
            '*Green Economy Index',
            '*PDRB Sektor Pertanian, Kehutanan Dan Perikanan',
            '*PDRB Sektor Pertambangan Dan Penggalian',
            '*Rasio PDRB Sektor Pariwisata',
            '*Rasio Volume Usaha Koperasi Terhadap PDRB',
            '*PDRB Perkapita Provinsi',
            '*Proporsi 40 (%) Kelompok Masyarakat Berpendapatan Terendah',
            '*Proporsi 40 (%) Kelompok Masyarakat Berpendapatan Menegah',
            '*Pengelolaan Sampah : Difasilitasi Pengolahan Sampah',
            '*Persentase Luas Genangan Yang Tertangani',
            '*Pengelolaan Sampah : Proporsi Rumah Tangga Dengan Layanan Penuh Pengumpulan Sampah',
            '*Indeks Pengeloaan Keanekaragaman Hayati Daerah',
            '*Penurunan Intensitas Emisi GRK',
            '*Ketaatan RTRW',
            '*Persentase Kondisi Mantap Jalan Provinsi',
            '*Rumah Tangga Dengan Akses Hunian Layak, Terjangkau Dan Berkelanjutan',
            '*Rumah Tangga Dengan Akses Sanitasi Aman',
            '*Akses Rumah Tangga Perkotaan Terhadap Air Siap Minum Perpipaan',
            '*Rasio Konektivitas Simpul Transportasi Provinsi',
            '*Rasio Elektrifikasi',
            '*Indeks Kinerja Sistim Irigasi',
            '*Kapasitas Air Baku',
            '*Subindeks Akses Dan Infrastruktur',
            '*Subindeks Penggunaan',
            '*Subindeks Keahlian',
            '*Nilai Aspek Kebebasan',
            '*Nilai Aspek Kesetaraan',
            '*Nilai Aspek Kapasitas Lembaga Demokrasi',
            '*Indeks Pelayan Publik',
            '*Indeks Reformasi Hukum',
            '*Nilai SAKIP',
            '*Indeks Sistem Pemerintahan Berbasis Elektronik',
            '*Indeks Inovasi Daerah',
            '*Indeks Perencanaan Pembangunan Nasional/Daerah',
            '*Nilai Maturasi Sistim Pengendalian Intern Pemerintah (SPIP)',
            '*Nilai Sistem Merit',
            '*Tingkat Digitalisasi Arsip',
            '*Proporsi Penduduk Meras Aman Berjalan Sendirian, Di area Tempat Tinggalnya',
            '*Indeks Ketahanan Daerah',
            '*Nilai Kesetaraan',
            '*Nilai Toleransi',
            '*Nilai Kerjasama',
            '*Nilai Ekonomi Budaya',
            '*Nilai Pendidikan',
            '*Nilai Ketahanan Sosial Budaya',
            '*Nilai Ekspresi Budaya',
            '*Nilai Budaya Literasi',
            '*Nilai Gender',
        ];

        $nomor = 92; // mulai dari 92

        foreach ($iku as $value) {
            IndikatorSasaranStrategis::query()->create([
                'tahun_mulai' => 2025,
                'nomor' => $nomor,
                'indikator' => $value,
            ]);
            $nomor++; // naik 1 setiap iterasi
        }
    }

    
}
