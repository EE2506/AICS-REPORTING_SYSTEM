<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TableSheetExport1 implements FromArray, WithTitle, WithStyles
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Return an array of data to be exported
     */
    public function array(): array
    {
        return $this->data;
    }

    /**
     * Set the title of the sheet
     */
    public function title(): string
    {
        return 'Table1Sheet'; // Set the sheet name
    }

    /**
     * Apply styling to the sheet
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true); // Bold headers
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center'); // Center align headers
        $sheet->getStyle('A:E')->getAlignment()->setHorizontal('center'); // Center align columns
        $sheet->getStyle('A:E')->getBorders()->getAllBorders()->setBorderStyle('thin'); // Add borders to all cells

        // Additional styling to match the view
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(10);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(10);
        $sheet->getColumnDimension('E')->setWidth(15);
    }
}
