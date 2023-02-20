<?php

namespace App\Models;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Reference;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationReference extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'formation_references';
    protected $fillable = ['validated','horaire','reference_id','formation_id']; 
}
