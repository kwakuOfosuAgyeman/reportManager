<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomReports extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'reports_custom_columns';

    protected $fillable = [
        'report_id',
        'custom_column',
        'description',
        'type',
        'size',
        'decimal_size',
        'manual_editing',
        'mass_update'
    ];
}
