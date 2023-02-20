<?php

namespace App\Models;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Reference;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'formations';
    protected $fillable = ['nom']; 
    public function candidats()
    {
        return $this->belongsToMany(Candidat::class,'candidat_formations');
    }

    public function references()
    {
        return $this->belongsToMany(Reference::class,'formation_references')->withPivot('validated','horaire');
      
    }
}
