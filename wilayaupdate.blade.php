@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('utilisateur.index')}}">Utilisateurs</a></li>
        <li class="active">Modifier un utilisateur</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des utilisateurs - Modification</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('utilisateur.update',$wilaya_enr)}}" class="container">
   @csrf
   @method('PUT')

   <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">code</span>
        </div>
        <input type="text"  name="id" value="{{$wilaya_enr->code_w}}" id="id" class="form-control {{$errors->has('id')? 'is-invalid' :''}}" placeholder="id" aria-label="id" aria-describedby="basic-addon1" readonly>
            @error('id')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Matricule</span>
        </div>
        <input type="text"  name="matricule" value="{{$wilaya_enr->matricule}}" id="matricule" class="form-control {{$errors->has('matricule')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="matricule" aria-describedby="basic-addon1">
            @error('matricule')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">nom_w</span>
        </div>
        <input type="text"  name="nom" value="{{$wilaya_enr->nom_w}}" id="nom" class="form-control {{$errors->has('nom')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="nom" aria-describedby="basic-addon1">
            @error('nom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">nom_w_arb</span>
        </div>
        <input type="text"  name="prenom" value="{{$wilaya_enr->nom_w_arb}}" id="prenom" class="form-control {{$errors->has('prenom')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="prenom" aria-describedby="basic-addon1">
            @error('prenom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Direction</span>
        </div>
        <input type="text"  name="nomdrread" value="{{$wilaya_enr->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>--}}

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">geom_w</span>
        </div>
        <input type="text"  name="structureread" value="{{$wilaya_enr->geom_w}}" id="structureread" class="form-control {{$errors->has('structureread')? 'is-invalid' :''}}" placeholder="exemple: agence x" aria-label="structureread" aria-describedby="basic-addon1" readonly>
            @error('structureread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    <livewire:listebagence>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">autre_nom_w</span>
        </div>
        <input type="text"  name="fonction" value="{{$wilaya_enr->autre_nom_w}}" id="fonction" class="form-control {{$errors->has('fonction')? 'is-invalid' :''}}" placeholder="exemple: directeur" aria-label="fonction" aria-describedby="basic-addon1">
            @error('fonction')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">siege_w</span>
        </div>
        <input type="text"  name="email" value="{{$wilaya_enr->siege_w}}" id="email" class="form-control {{$errors->has('email')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="email" aria-describedby="basic-addon1">
            @error('email')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{--<!-- <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Mot de passe</span>
        </div>
        <input type="text"  name="password" value="{{$wilaya_enr->password}}" id="password" class="form-control {{$errors->has('password')? 'is-invalid' :''}}" placeholder="exemple: 123456789" aria-label="password" aria-describedby="basic-addon1" readonly> 
            @error('password')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> -->--}}


    <livewire:listeprofile>            

   <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>

</form>

   <form  action="{{route('utilisateur.edit',$wilaya_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>       
    
    {{--@include('decoupage.wilayas.tblaffichagewilaya') --}}

           </div>
           
        </div>
    </div>
</div>  




@endsection