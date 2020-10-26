<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'tblstudent';

    protected $fillable = [
        'uni_id',
        'NameFull',
        'Identity',
        'Nationality',
        'Birthday',
        'NameWithInitials',
        'Address',
        'email',
        'country',
        'phoneNo',
        'Active',
        'Registered'
    ];
}
