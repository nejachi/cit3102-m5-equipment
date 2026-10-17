<?php

// app/Models/Equipment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    // "equipment" is uncountable in Laravel, so the table is `equipment`.
    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'category',
        'quantity',
        'unit_cost',
        'condition',
        'storage_location',
    ];
}
