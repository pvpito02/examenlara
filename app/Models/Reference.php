<?php

namespace App\Models;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Reference;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'references';
    protected $fillable = ['libelle','type_id']; 

    public function formations()
    {
        return $this->belongsToMany(Formation::class,'formation_references');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
