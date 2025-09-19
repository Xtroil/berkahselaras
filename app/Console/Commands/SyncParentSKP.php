<?php

namespace App\Console\Commands;

use App\Models\KinerjaKegiatan;
use App\Models\KinerjaProgram;
use App\Models\KinerjaSubKegiatan;
use App\Models\SasaranStrategisPd;
use App\Models\SKP;
use Illuminate\Console\Command;

class SyncParentSKP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:parent-skp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync kolom parent_id di tabel skp';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $skpList = SKP::query()
            ->whereIn('model_class', [
                KinerjaProgram::class,
                KinerjaKegiatan::class,
                KinerjaSubKegiatan::class,
            ])
            ->get();

        foreach ($skpList as $skp) {
            $parentClass = null;
            $parentId = null;

            switch ($skp->model_class) {
                case KinerjaProgram::class:
                    $parentClass = SasaranStrategisPd::class;
                    $model = KinerjaProgram::query()->find($skp->model_id);

                    if (! $model) {
                        $skp->delete();
                        break;
                    }

                    $parentId = $model->sasaran_strategis_pd_id;
                    break;
                case KinerjaKegiatan::class:
                    $parentClass = KinerjaProgram::class;
                    $model = KinerjaKegiatan::query()->find($skp->model_id);

                    if (! $model) {
                        $skp->delete();
                        break;
                    }

                    $parentId = $model->kinerja_program_id;
                    break;
                case KinerjaSubKegiatan::class:
                    $parentClass = KinerjaKegiatan::class;
                    $model = KinerjaSubKegiatan::query()->find($skp->model_id);

                    if (! $model) {
                        $skp->delete();
                        break;
                    }

                    $parentId = $model->kinerja_kegiatan_id;
                    break;
            }

            if ($parentClass && $parentId) {
                $parentId = SKP::query()
                    ->where('model_class', $parentClass)
                    ->where('model_id', $parentId)
                    ->value('id');

                $skp->timestamps = false;

                $skp['parent_id'] = $parentId;
                // $skp['pengampu'] = $model->pengampu;
                // $skp['v_struktur_organisasi_id'] = $model->pengampu == 'unit-kerja' ? $model->v_struktur_organisasi_id : null;
                // $skp['tim_kerja_id'] = $model->pengampu == 'tim-kerja' ? $model->tim_kerja_id : null;
                $skp->save();
            }
        }

        return Command::SUCCESS;
    }
}
