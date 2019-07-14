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
        return Product::all('id','name','description','price','price_500','price_1000');
    }

    public function headings(): array
    {
        return [
            'id (нельзя редактировать)',
            'Название продукта',
            'Описание продукта',
            'Цена (25 кг)',
            'Цена (500 кг)',
            'Цена (1000 кг)',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}