<?php

namespace App\Models;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Reference;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'candidats';
    protected $fillable = ['nom','prenom','email','age','niveauEtude','sexe']; 

    public function formations()
    {
        return $this->belongsToMany(Formation::class,'candidat_formations')->withPivot('duree','description','isStarted','dateDebut');
    }


}
