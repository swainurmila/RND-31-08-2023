<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class EntranceAttendance implements FromCollection, WithMapping, WithHeadings, WithDrawings, WithColumnWidths
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'SL No.',
            'Roll No.',
            'Name',
            'Faculty',
            'Specialization',
            'Photo',
            'Signature',
            'Signature of Applicant',
            'Signature of Invigilator'
        ];
    }

    public function drawings()
    {
        $drawings = [];

        foreach ($this->data as $row) {
            $photoPath = public_path('upload/phd_entrance/' . $row->photo);
            $signaturePath = public_path('upload/phd_entrance/' . $row->signature);
            $photoDrawing = new Drawing();
            $photoDrawing->setPath($photoPath);
            $photoDrawing->setHeight(50);
            $drawings[] = $photoDrawing;

            $signatureDrawing = new Drawing();
            $signatureDrawing->setPath($signaturePath);
            $signatureDrawing->setHeight(50);
            $drawings[] = $signatureDrawing;
        }

        return $drawings;
    }

    public function map($row): array
    {
        return [
            $row->eid,
            $row->entrance_roll_no,
            $row->name,
            $row->program,
            $row->departments_title,
            '', 
            '', 
            '',
            '', 
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10, 
            'B' => 15, 
            'C' => 20, 
            'D' => 20, 
            'E' => 20, 
            'F' => 20, 
            'G' => 20, 
            'H' => 20, 
            'I' => 40,
        ];
    }
}
