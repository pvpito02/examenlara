<?php

namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Reference;
use App\Models\Type;
use Illuminate\Http\Request;
use DB;
class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = Type::all();
        $formations = Formation::all();
        $candidats = Candidat::all();
        $references = Reference::all();
        return view('ListeCandidat',compact('types','formations','candidats','references')); 
    }

    public function form()
    {
        //
        $types = Type::all();
        $formations = Formation::all();
        $candidats = Candidat::all();
        $references = Reference::all();
        return view('ListeFormation',compact('types','formations','candidats','references')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::all();
        $formations = Formation::all();
        return view('AjoutCandidat',compact('types','formations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=>'required',
            'age'=> 'required|max:35',
            'niveauEtude'=>'required',
            'sexe'=> 'required',
            'duree' => 'required',
            'description' =>'required',
            'isStarted' =>'required',
            'dateDebut' =>'required',
            'libelle'=>'required',
            'validated'=>'required',
            'horaire'=>'required',
        ]);
        //
        // $candidats = new Candidat();
        $candidats = Candidat::create([
            'nom'=> $request->nom,
            'prenom'=> $request->prenom,
            'email'=> $request->email,
            'age'=> $request->age,
            'niveauEtude'=> $request->niveauEtude,
            'sexe'=> $request->sexe,
        ]);

        $candidats ->formations()->attach([
            $request->formations=>[
               'duree' => $request->duree,
               'description' =>$request->description,
               'isStarted' =>$request->isStarted,
               'dateDebut' =>$request->dateDebut, 
            ]
            ]);       

            $references = Reference::create([
                'libelle'=> $request->libelle,
                'type_id' =>$request->types,
            ]);

            $references->formations()->attach([
                $request->formations=>[
                   'validated' => $request->validated,
                   'horaire' =>$request->horaire,
                ]
                ]);
           

            
            return back()->with('CandidatAjout','Candidat ajouter avec succes-----!');

       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $candidat = Candidat::find($id);
        $types = Type::all();
        $formations = Formation::all();
        $references = Reference::all();
        return view('Candidat_Formation',compact('candidat','types','formations','references'));
    }
      
    public function Candidat_Formmation(Request $request)
    {
        # code...
        $request->validate([
            'duree' => 'required',
            'description' =>'required',
            'isStarted' =>'required',
            'dateDebut' =>'required',
            'libelle'=>'required',
            'validated'=>'required',
            'horaire'=>'required',
        ]);

       $candidat =new  Candidat();
       $candidat ->formations()->attach([
        $request->formations=>[
           //'nomFormation' =>$request->formations,
           'duree' => $request->duree,
           'description' =>$request->description,
           'isStarted' =>$request->isStarted,
           'dateDebut' =>$request->dateDebut, 
           'candidat_id'=>$request->candidat_id,
        ]
        ]);


    //    $formation = Formation::create([
    //     'duree' => $request->duree,
    //     'description' =>$request->description,
    //     'isStarted' =>$request->isStarted,
    //     'dateDebut' =>$request->dateDebut, 
    //    ]);
        
        $references = Reference::create([
            'libelle'=> $request->libelle,
            'type_id' =>$request->types,
        ]);

        $references->formations()->attach([
            $request->formations=>[
               'validated' => $request->validated,
               'horaire' =>$request->horaire,
            ]
            ]);
       
            return back()->with('FormationAjout','Formation ajouter avec succes-----!');
       
    }

    public function pieChart()
    {
        # code...
        $candidats = DB::select(DB::raw("SELECT COUNT(nom) as Nombre_de_Candidat , age as Age FROM candidats GROUP by age")); 
        $data = "";
        foreach ($candidats as $val){
            $data.="[".$val->Age."  , .....  ".$val->Nombre_de_Candidat."],"; 
        }
        
        $chartData= $data;
        //dd($chartData);
        return view('Graphe',compact('chartData'));
    }


    public function statistique()
    {
        # code...
        $formations= Formation::all();
        $candidats = Candidat::all();
        return view('Statistique',compact('formations','candidats'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
