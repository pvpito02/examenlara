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
            <h3 class="text-center text-white">LISTE DES FORMATIONS </h3>
        </div>
        <div class="card-body"  style="background-color: #cea380 ;">
            <table class="table table-bordered" id="liste2">
                <thead class="text-white text-center" style="border-radius : 12px; background-color : #140344 ;">
                    <tr>
                        <th>id</th>
                        <th>Formation</th>
                    </tr>
                </thead>
                <tbody class="" style="color : #140344 ;">
                    @foreach ($formations as $formation)
                        <tr>
                            <th>{{$formation->id}}</th>
                            <th>{{$formation->nomFormation}}</th>  
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
            <h3 class="text-center text-white">LISTE DES REFERENCES </h3>
        </div>
        <div class="card-body"  style="background-color: #cea380 ;">
            <table class="table table-bordered" id="liste3">
                <thead class="text-white text-center" style="border-radius : 12px; background-color : #140344 ;">
                    <tr>
                        <th>id</th>
                        <th>Reference</th>
                        <th>formation</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody class="" style="color : #140344 ;">
                    @foreach ($references as $refer)
                        <tr>
                            <th>{{$refer->id}}</th>
                            <th>{{$refer->libelle}}</th>
                            @foreach ($refer->formations as $referForm) 
                               <th>{{$referForm->nomFormation}}</th>
                            @endforeach
                            <th>{{$refer->type->libelleType}}</th>
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
            <h3 class="text-center text-white">FORMATION DE TYPE METIER </h3>
        </div>
        <div class="card-body"  style="background-color: #cea380 ;">    
            @foreach($references as $ref)
                @if($ref->type->libelleType == "Metier")
                    <div class="row">
                    <div class="col-md-6 mt-3">
                        Type : {{$ref->type->libelleType}} ------------>
                    </div>
                        @foreach($ref->formations as $formref)
                            <div class="col-md-6 mt-3">
                               {{$formref->nomFormation}}
                            </div>   
                        @endforeach 
                    </div>    
                @endif 
            @endforeach  
        </div>
    </div>
</div>
 
<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header" style="border-radius : 5px; background-color : #140344 ;">
            <h3 class="text-center text-white">FORMATION DE TYPE INITIATION </h3>
        </div>
        <div class="card-body"  style="background-color: #cea380 ;">    
            @foreach($references as $ref)
                @if($ref->type->libelleType == "Initiative")
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            Type : {{$ref->type->libelleType}} ------------>
                        </div>
                            @foreach($ref->formations as $formref)
                                <div class="col-md-6 mt-3">
                               Formation : {{$formref->nomFormation}}
                                </div>   
                            @endforeach 
                        </div>    
                @endif 
            @endforeach  
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