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
    <div class="card">
        <div class="card-header" style="border-radius : 5px; background-color : #140344 ;">
            <h3 class="text-center text-white">LISTE DES CANDIDATS</h3>
        </div>
        <div class="card-body"  style="background-color: #cea380 ;">
            <table class="table table-bordered" id="liste1">
                <thead class="text-white text-center" style="border-radius : 12px; background-color : #140344 ;">
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Niveau Etude</th>
                        <th>Sexe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="" style="color : #140344 ;">
                    @if ($candidats->count() > 0)
                        @foreach ($candidats as $cad)
                            <tr>
                                <th>{{$cad->id}}</th>
                                <th>{{$cad->nom}}</th>
                                <th>{{$cad->prenom}}</th>
                                <th>{{$cad->email}}</th>
                                <th>{{$cad->age}} ans</th>
                                <th>{{$cad->niveauEtude}}</th>
                                <th>{{$cad->sexe}}</th> 
                                <th>
                                    <a href="/candidats/{{$cad->id}}" class="btn btn-warning float-right mr-4 mt-1">Formation</a>
                                </th>        
                            </tr> 
                        @endforeach 
                    
                    <div class="text-center">Nombre de Candidat : {{$candidats->count()}} </div>                   
                    @else
                     <div class="alert alert-danger text-red  offset-2">Pas de Candidat</div>
                    @endif      
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-header" style="border-radius : 5px; background-color : #140344 ;">
            <h3 class="text-center text-white">NOMBRE DE CANDIDAT/FORMATION</h3>
        </div>
        <div class="card-body"  style="background-color: #cea380 ;">
            <table class="table table-bordered" id="liste1">
                <thead class="text-white text-center" style="border-radius : 12px; background-color : #140344 ;">
                    <tr>
                        <th>id</th>
                        <th>Formation</th>
                        <th>Nombre de candidats</th>
                    </tr>
                </thead>
                <tbody class="" style="color : #140344 ;">
                        @foreach ($formations as $form)
                            <tr>
                                <th>{{$form->id}}</th>
                                <th>{{$form->nomFormation}}</th> 
                                <th>{{$form->candidats->count()}} candidat(s)</th>        
                            </tr> 
                        @endforeach  

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-header" style="border-radius : 5px; background-color : #140344 ;">
            <h3 class="text-center text-white">REPARTION DES CANDIDATS DE SEXE MASCULIN</h3>
        </div>
        <div class="card-body" style="background-color: #cea380 ;">
            <table class="table table-bordered" id="liste2">
                <thead class="text-white text-center" style="border-radius : 12px; background-color : #140344 ;">
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Niveau Etude</th>
                        <th>Sexe</th>
                    </tr>
                </thead>
                <tbody class="" style="color : #140344 ;">
                        @foreach ($candidats as $cad)
                            @if ($cad->sexe=="Masculin")
                                <tr>
                                    <th>{{$cad->id}}</th>
                                    <th>{{$cad->nom}}</th>
                                    <th>{{$cad->prenom}}</th>
                                    <th>{{$cad->email}}</th>
                                    <th>{{$cad->age}} ans</th>
                                    <th>{{$cad->niveauEtude}}</th>
                                    <th>{{$cad->sexe}}</th>    
                                </tr>
                            @endif      
                        @endforeach
                        <?php
                            $nbSexeMas = 0;
                            foreach($candidats as $cad) {?> 
                               <?php
                               if($cad["sexe"]=="Masculin") {
                                   $nbSexeMas++;
                                 }
                              ?>
                            <?php }
                        ?>
                    <div class="text-center">Nombre de Candidat : {{$nbSexeMas}} </div>               
                </tbody>
            </table>
        </div>
   </div>
</div>    
<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header" style="border-radius : 5px; background-color : #140344 ;">
            <h3 class="text-center text-white">REPARTION DES CANDIDATS DE SEXE FEMININ</h3>
        </div>
        <div class="card-body" style="background-color: #cea380 ;">
            <table class="table table-bordered" id="liste3">
                <thead class=" text-white text-center" style="border-radius : 12px; background-color : #140344 ;">
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Niveau Etude</th>
                        <th>Sexe</th>
                    </tr>
                </thead>
                <tbody class="" style="color : #140344 ;">
                        @foreach ($candidats as $cad)
                            @if ($cad->sexe=="Feminin")
                                <tr>
                                    <th>{{$cad->id}}</th>
                                    <th>{{$cad->nom}}</th>
                                    <th>{{$cad->prenom}}</th>
                                    <th>{{$cad->email}}</th>
                                    <th>{{$cad->age}} ans</th>
                                    <th>{{$cad->niveauEtude}}</th>
                                    <th>{{$cad->sexe}}</th>    
                                </tr> 
                            @endif     
                        @endforeach
                        <?php
                            $nbSexeFem = 0;
                            foreach($candidats as $cad) {?> 
                               <?php
                               if($cad["sexe"]=="Feminin") {
                                   $nbSexeFem++;
                                 }
                              ?>
                            <?php }
                        ?>
                    <div class="text-center">Nombre de Candidat : {{$nbSexeFem}} </div>         
                </tbody>
            </table>
        </div>
    </div>
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