<?php

namespace App\Helpers;

use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait Merge
{
    public static function merge()
    {
        $outputPath = "TiketGelang/";
        $lampiranName = "tiket900NOSPACE.pdf";
        $pdf = new Fpdi();

        // Add a new page with A3 portrait size
        
        $imagePath =  public_path('files/images/ticket.jpg');
        $cure = 1;

        $halaman = 45;
        $with_text = false;
        for ($p = 0; $p < $halaman; $p++) {
            $pdf->AddPage('P', [420, 297]);
    
            // 1 Halaman 20 tiket
            for ($a = 0; $a < 20; $a++) {
                $y = $a * 20;
                $left = 25;
                $space = $a ? $a + 0 : $a;;
                $pdf->Image($imagePath, 0 + $left, $y + 10 , 250, 20);

                $n = $cure;

                if($with_text){

                    $currentNumber = str_pad($n, 4, '0', STR_PAD_LEFT);
                    $pdf->setFont('Helvetica');
                    $pdf->Text(116 + $left, $y - 2 + 20 , "NO : $currentNumber");
                }
                $cure += 1;
            }
        }

        if (!Storage::exists($outputPath)) {
            Storage::makeDirectory($outputPath, 0755, true, true);
        }

        $pdf->Output(Storage::path($outputPath . $lampiranName), 'F');
        $pdf->close();
    }
}
