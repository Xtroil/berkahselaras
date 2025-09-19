<?php

namespace Database\Seeders;

use App\Models\KinerjaKegiatan;
use App\Models\KinerjaLangkahAksi;
use App\Models\KinerjaProgram;
use App\Models\KinerjaSubKegiatan;
use Illuminate\Database\Seeder;

class DuplicateDataKinerja extends Seeder
{
    private array $kinerjaProgramIdMapping = [];

    private array $kinerjaKegiatanIdMapping = [];

    private array $kinerjaSubKegiatanIdMapping = [];

    private int $currentTahun = 2022;

    private int $targetTahun = 2023;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (KinerjaProgram::tahunKinerja($this->targetTahun)->exists()) {
            echo "Skip duplikat data kinerja program {$this->targetTahun} karena sudah ada data".PHP_EOL;
        } else {
            echo "Duplikat data kinerja program {$this->targetTahun}".PHP_EOL;
            $this->kinerjaProgram();
        }

        if (KinerjaKegiatan::tahunKinerja($this->targetTahun)->exists()) {
            echo "Skip duplikat data kinerja kegiatan {$this->targetTahun} karena sudah ada data".PHP_EOL;
        } else {
            echo "Duplikat data kinerja kegiatan {$this->targetTahun}".PHP_EOL;
            $this->kinerjaKegiatan();
        }

        if (KinerjaSubKegiatan::tahunKinerja($this->targetTahun)->exists()) {
            echo "Skip duplikat data kinerja sub kegiatan {$this->targetTahun} karena sudah ada data".PHP_EOL;
        } else {
            echo "Duplikat data kinerja sub kegiatan {$this->targetTahun}".PHP_EOL;
            $this->kinerjaSubKegiatan();
        }

        if (KinerjaLangkahAksi::tahunKinerja($this->targetTahun)->exists()) {
            echo "Skip duplikat data kinerja langkah aksi {$this->targetTahun} karena sudah ada data".PHP_EOL;
        } else {
            echo "Duplikat data kinerja langkah aksi {$this->targetTahun}".PHP_EOL;
            $this->kinerjaLangkahAksi();
        }
    }

    private function kinerjaProgram()
    {
        $kinerjaProgram = KinerjaProgram::tahunKinerja($this->currentTahun)->get();

        foreach ($kinerjaProgram as $old) {
            $new = $old->replicate()
                ->fill([
                    'tahun_kinerja' => $this->targetTahun,
                ])
                ->makeVisible(get_class($old)::getHiddenFields())
                ->toArray();

            $new = KinerjaProgram::create($new);

            $this->kinerjaProgramIdMapping[$old->id] = $new->id;
        }
    }

    private function kinerjaKegiatan()
    {
        KinerjaKegiatan::tahunKinerja($this->currentTahun)
            ->chunkById(500, function ($kinerjaKegiatan) {
                foreach ($kinerjaKegiatan as $old) {
                    $new = $old->replicate()
                        ->fill([
                            'tahun_kinerja' => $this->targetTahun,
                            'kinerja_program_id' => $this->kinerjaProgramIdMapping[$old->kinerja_program_id] ?? null,
                        ])
                        ->makeVisible(get_class($old)::getHiddenFields())
                        ->toArray();

                    $new = KinerjaKegiatan::create($new);

                    $this->kinerjaKegiatanIdMapping[$old->id] = $new->id;
                }
            });
    }

    private function kinerjaSubKegiatan()
    {
        KinerjaSubKegiatan::tahunKinerja($this->currentTahun)
            ->chunkById(500, function ($kinerjaSubKegiatan) {
                foreach ($kinerjaSubKegiatan as $old) {
                    $new = $old->replicate()
                        ->fill([
                            'tahun_kinerja' => $this->targetTahun,
                            'kinerja_program_id' => $this->kinerjaProgramIdMapping[$old->kinerja_program_id] ?? null,
                            'kinerja_kegiatan_id' => $this->kinerjaKegiatanIdMapping[$old->kinerja_kegiatan_id] ?? null,
                        ])
                        ->makeVisible(get_class($old)::getHiddenFields())
                        ->toArray();

                    $new = KinerjaSubKegiatan::create($new);

                    $this->kinerjaSubKegiatanIdMapping[$old->id] = $new->id;
                }
            });
    }

    private function kinerjaLangkahAksi()
    {
        KinerjaLangkahAksi::tahunKinerja($this->currentTahun)
            ->chunkById(500, function ($kinerjaLangkahAksi) {
                foreach ($kinerjaLangkahAksi as $old) {
                    $new = $old->replicate()
                        ->fill([
                            'tahun_kinerja' => $this->targetTahun,
                            'kinerja_program_id' => $this->kinerjaProgramIdMapping[$old->kinerja_program_id] ?? null,
                            'kinerja_kegiatan_id' => $this->kinerjaKegiatanIdMapping[$old->kinerja_kegiatan_id] ?? null,
                            'kinerja_sub_kegiatan_id' => $this->kinerjaSubKegiatanIdMapping[$old->kinerja_sub_kegiatan_id] ?? null,
                        ])
                        ->makeVisible(get_class($old)::getHiddenFields())
                        ->toArray();

                    $new = KinerjaLangkahAksi::create($new);
                }
            });
    }
}
