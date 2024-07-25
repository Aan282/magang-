<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tickets extends Model
{
    use HasFactory;
    const category = ['category1', 'category2', 'category3'];
    const urgent_level = ['level1', 'level2', 'level3'];

    protected $fillable = [
        'company',
        'contact_person',
        'product',
        'version_program',
        'module',
        'category',
        'urgent_level',
        'database_name',
        'date',
        'problem',
        'attachment',
        'assign_to',
        'assign_to_supervisor',
        'estimation_complation_date',
        'is_done_in_version',
        'program_version',
        'technical_note',
        'is_done'
    ];
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(clients::class, 'created_by');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(products::class, 'product');
    }
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assign_to_supervisor');
    }
    public function module(): BelongsTo
    {
        return $this->belongsTo(modules::class, 'module');
    }
    public $timestamps = true;

}