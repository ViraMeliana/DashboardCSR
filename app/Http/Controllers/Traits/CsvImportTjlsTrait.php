<?php

namespace App\Http\Controllers\Traits;

use App\Models\Pilar;
use App\Models\Tjsl;
use App\Models\Tpb;
use Carbon\Carbon;
use \SpreadsheetReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait CsvImportTjlsTrait
{
    public function processCsvImport(Request $request)
    {
        $file = $request->file('csv_file');

        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $filename = Str::random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        try {
            $path = storage_path('app/csv_import/' . $filename);

            $reader = new SpreadsheetReader($path);
            $insert = [];

            $afterHeader = false;
            $currentPilar = '';
            $currentPilarId = '';

            $tpbNumberIndex = 0;
            $rkaIndex = 0;
            $commitedIndex = 0;
            $cashOutIndex = 0;
            $realizationIndex = 0;

            foreach ($reader as $key => $row) {
                $tmp = [];

                foreach ($row as $index => $item) {
                    if (Str::slug($item) == 'pilar-pembangunan') $afterHeader = true;

                    // checking column index
                    else if (Str::slug($item) == 'nomor-tpb') $tpbNumberIndex = $index;
                    else if (Str::slug($item) == 'rka') $rkaIndex = $index;
                    else if (Str::slug($item) == 'cash-out') $cashOutIndex = $index;
                    else if (Str::slug($item) == 'commited') $commitedIndex = $index;
                    else if (Str::slug($item) == 'realisasi-total-rp') $realizationIndex = $index;

                    // checking pilars
                    if (Str::slug($item) == 'sosial' && $afterHeader) {
                        $currentPilar = 'sosial';
                        $currentPilarModel = Pilar::where('name', 'sosial')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'ekonomi' && $afterHeader) {
                        $currentPilar = 'ekonomi';
                        $currentPilarModel = Pilar::where('name', 'ekonomi')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'lingkungan' && $afterHeader) {
                        $currentPilar = 'lingkungan';
                        $currentPilarModel = Pilar::where('name', 'lingkungan')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'hukum-tata-kelola' && $afterHeader) {
                        $currentPilar = 'hukum-tata-kelola';
                        $currentPilarModel = Pilar::where('name', 'hukum-tata-kelola')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'subtotal-4') {
                        $currentPilar = '';
                        $currentPilarId = '';
                    }
                }

                if ($afterHeader && $currentPilar != '' && $currentPilarId != '' && $row[$tpbNumberIndex] != '') {
                    $tmp = [
                        'tpb_number' => $row[$tpbNumberIndex],
                        'rka' => $this->formatter($row[$rkaIndex]),
                        'cash_out' => $this->formatter($row[$cashOutIndex]),
                        'commited' => $this->formatter($row[$commitedIndex]),
                        'realization' => $this->formatter($row[$realizationIndex]),
                        'pilar_id' => $currentPilarId,
                    ];
                }

                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }

            $insertedId = [];
            foreach ($insert as $insert_item) {
                $tpb = Tpb::create($insert_item);
                $insertedId[] = $tpb->id;
            }

            $tjsl = Tjsl::create(['periode' => Carbon::now()->format('Y-m-d')]);
            $tjsl->tpbs()->sync($insertedId);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table'));
            return redirect(url()->previous());

        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function formatter($toFormat) : string {
        return preg_replace('/[^0-9]/', '', $toFormat);
    }
}
