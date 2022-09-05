<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';
    protected $fillable =
    [
        'fname',
        'mname',
        'lname',
        'sname',
        'bday',
        'gender',
        'city',
        'prov',
        'contact',
        'email',
        'education',
        'workExp',
        'reason',
        'field',
        'position',
        'application',
        'assessor',
        'resume',
        'status'
    ];
}
