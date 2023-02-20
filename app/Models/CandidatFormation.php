<?php

namespace App\Models;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Reference;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatFormation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'candidat_formations';
    protected $fillable = ['duree','description','isStarted','dateDebut','candidat_id','formation_id']; 
}
