<?php

namespace App\Exports;

use App\Users;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Users::query()->select(
            'id', 
            'last_name', 
            'first_name',
            'second_name',
            'debt',
            'state_fee',

        );
    }

    public function headings(): array
    {
        return [
            'ID',
            'Last Name',
            'First Name',
            'Second Name',
            'Debt',
            'State Fee',

            
        ];
    }
}