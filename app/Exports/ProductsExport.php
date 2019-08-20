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
        return Product::all(
            'id',
            'id_name',
            'category_id',
            'name',
            'price',
            'price_500',
            'price_1000',
            'international_name',
            'manufacturer',
            'package',
            'description',
            'created_at',
            'updated_at'
        );
    }

    public function headings(): array
    {
        return [
            'id',
            'id_name',
            'category_id',
            'name',
            'price',
            'price_500',
            'price_1000',
            'international_name',
            'manufacturer',
            'package',
            'description',
            'created_at',
            'updated_at',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}