<?php

namespace App\Models;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Reference;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'types';
    protected $fillable = ['libelleType']; 
    
    public function reference_types()
    {
        return $this->hasMany(Reference::class);
    }
}
