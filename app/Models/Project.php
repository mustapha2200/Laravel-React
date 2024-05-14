<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'due_Date',
        'create_by',
        'updated_by',
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function createdBy(){
        return $this->belongsTo(User::class,'create_by');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

}
