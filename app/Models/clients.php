<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers;
use Laravel\Sanctum\HasApiTokens;
class clients extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = ['company', 'contact_person'];

    public $timestamps = true;
}
