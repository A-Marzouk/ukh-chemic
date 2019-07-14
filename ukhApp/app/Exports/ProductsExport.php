<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::all('id','ID_NAME','name','description','price','price_500','price_1000');
    }

    public function headings(): array
    {
        return [
            'id',
            'id_name',
            'name',
            'description',
            'price',
            'price_500',
            'price_1000',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}