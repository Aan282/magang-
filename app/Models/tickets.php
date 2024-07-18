<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    use HasFactory;
    protected $fillable = ['create_by','client_id','product_id','assign_to','modules_id','date', 'category', 'level', 'db_location', 'problem','technical_notes', 'is_done', 'estimation_date', 'finish_date', 'is_done_in_version', 'program_version', 'feedback_required', 'attachment'];

    public $timestamps = true;

}
