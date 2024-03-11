<?php

namespace App\Imports;

use App\Models\Investor;
use Maatwebsite\Excel\Concerns\ToModel;

class InvestorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Investor([
            'name' => $row[0],
            'amount' => $row[1],
            'city' => $row[3],
        ]);
    }
}
