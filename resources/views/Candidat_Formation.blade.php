<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
    <title>Document</title>
</head>
<body style="background-color: #2196f3; box-shadow: 2px 2px 20px #2196f3, 2px 2px 40px #2196f3 2px 2px 40px #2196f3;">
    <div class="card_header mt-4" style="height:80px;  background-color : #140344 ;">
                <a href="{{route('stat')}}" class="btn btn-primary float-right mr-4 mt-4">Statistique</a> 
                <a href="{{route('graphe')}}" class="btn btn-primary float-right mr-4 mt-4">Graphe</a>
                <a href="{{route('forum')}}" class="btn btn-primary float-right mr-4 mt-4">Formation</a>
                <a href="{{route('candidats.index')}}" class="btn btn-primary float-right mr-4 mt-4">Candidat</a>
                <a href="{{route('candidats.create')}}" class="btn btn-primary float-right mr-4 mt-4">Acceuil</a>
    </div>
<div class="container mt-4">
    <div class="card" style="">
        <div class="card-header" style="border-radius ; background-color : #140344 ;">
            <h3 class="text-center text-white">INFORMATION DU CANDIDAT</h3>
        </div>
        <div class="card-body" style="border-radius; background-color :#cea380 ;">
               <div class="row mt-2">
                    <div class="col-md-6">
                        Numero Candidat : 
                    </div>
                    <div class="col-md-6 h6"  >
                        {{$candidat->id}}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        Nom  : 
                    </div>
                    <div class="col-md-6 h6" >
                       {{$candidat->nom}}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        Prenom : 
                    </div>
                    <div class="col-md-6 h6" >
                       {{$candidat->prenom}}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                         Email : 
                    </div>
                    <div class="col-md-6 h6" >
                         {{$candidat->email}}
                    </div>
                </div>
                <div class="row mt-2" >
                    <div class="col-md-6">
                         Age : 
                    </div>
                    <div class="col-md-6 h6" >
                        {{$candidat->age}} ans
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        Niveau D'Etude :
                    </div>
                    <div class="col-md-6 h6" >
                        {{$candidat->niveauEtude}}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        Sexe :
                    </div>
                    <div class="col-md-6 h6" >
                        {{$candidat->sexe}}
                    </div>
                </div>
                <div class="card-body"  style="background-color: #cea380 ;">
                    <table class="table table-bordered" id="liste1">
                        <thead class="text-white text-center" style="border-radius : 12px; background-color : #140344 ;">
                            <tr>
                                <th>id</th>
                                <th>Formation</th>
                                <th>duree</th>
                                <th>Is Started</th>
                                <th>Date Debut</th>
                            </tr>
                        </thead>
                        <tbody class="" style="color : #140344 ;">
                            @foreach ($candidat->formations as $candform)
                                <tr>
                                    <th>{{$candform->id}}</th>
                                    <th>{{$candform->nomFormation}}</th>
                                    <th>{{$candform->pivot->duree}}</th> 
                                    <th>{{$candform->pivot->isStarted}}</th>
                                    <th>{{$candform->pivot->dateDebut}}</th>       
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>    
          
    <div class="card mt-4 offset-2 col-md-8" style="background-color: #cea380 ;">
        <div class="card-header h3 text-white text-center"  style="border-radius ; background-color : #140344 ;">AJOUT FORMATION</div>
        @if(Session::has('FormationAjout'))
            <div class="alert alert-success text-green mt-3 offset-2">{{Session::get('FormationAjout')}}</div>
        @endif  
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-red  offset-2">{{$error}}</div>
            @endforeach  
            @endif
        <div class="card-body">        
        <form action="{{route('enreg.formation')}}" method="post">
            @csrf
            <input type="hidden"  name="candidat_id" value="{{$candidat->id}}">
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="" class="h6">Formation</label><br>
                    <select name="formations" id="" style="border-radius:5px; border:1px solid lightblue; width:320px; height:40px;">
                        <option  class="mt-2" value="">Faite votre choix</option>
                        @foreach ($formations as $form)
                            <option value="{{$form->id}}">
                                {{$form->nomFormation}}
                            </option>    
                         @endforeach         
                    </select>
                </div>
            </div>  
            <div class="row mt-2">  
                <div class="col-md-6">
                    <label for="" class="h6">Duree</label>
                    <input type="number" name="duree" id="" class="form-control">
                 </div>    
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="" class="h6">Description</label><br>
                    <textarea name="description" id="" cols="40" rows="4"></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                     <label for="" class="h6">is Started</label><br>
                    <select name="isStarted" id="" style="border-radius:5px; border:1px solid lightblue; width:320px; height:40px;">
                        <option value="0">Vrai</option>
                        <option value="1">Faux</option>
                    </select>
                </div>
            </div>    
            <div class="row mt-2">
                <div class="col-md-6">
                     <label for="" class="h6">Date Debut</label>
                     <input type="date" name="dateDebut" id="" class="form-control">
                </div>
            </div>  
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="" class="h6">Reference</label><br>
                    <input type="text" name="libelle" id="" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="" class="h6">Validated</label><br>
                    <select name="validated" id="" style="border-radius:5px; border:1px solid lightblue; width:320px; height:40px;">
                        <option value="1">Vrai</option>
                        <option value="0">Faux</option>
                    </select>
                </div>
            </div> 
            <div class="row mt-2">
                <div class="col-md-6">
                      <label for="" class="h6">Horaire</label>
                     <input type="number" name="horaire" id="" class="form-control">
                    </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                     <label for="" class="h6">Type de Reference</label><br>
                    <select name="types" id="" style="border-radius:5px; border:1px solid lightblue; width:320px; height:40px;">
                        <option value="">Faite votre choix</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">
                                {{$type->libelleType}}
                            </option>
                                                            
                        @endforeach  
                    </select>
                </div>  
            </div>
            <div class="modal-footer mt-2">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
      </div>    
    </div>
</div>     
</body>
<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<script>
    $("#liste1").dataTable();
    $("#liste2").dataTable();
    $("#liste3").dataTable();
</script>
</html>