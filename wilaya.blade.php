@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Wilayas</a></li>
        <li class="active">Liste Wilaya</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste des Wilayas</strong><small> filtre</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un Wilaya
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                 {{--    <div class="card card-body">
                        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="matricule" class=" form-control-label">Nom wilaya <span class="text-danger">*</span></label>
                                <input type="text" id="matricule" placeholder="Matricule" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}"autofocus>
                                @error('matricule')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> --}} 
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="nom" class=" form-control-label"> Nom wilaya<span class="text-danger">*</span></label>
                                    <input type="text" id="nom" placeholder="Nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}">
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="prenom" class=" form-control-label"> nom_w_arb<span class="text-danger">*</span></label>
                                    <input type="text" id="prenom" placeholder="Prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}"name="prenom">
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" form-control-label">siege_w <span class="text-danger">*</span></label>
                                <input type="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"name="email" >
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="fonction" class=" form-control-label">autre_nom_w <span class="text-danger">*</span></label>
                                <input type="text" id="fonction" placeholder="Fonction" class="form-control @error('fonction') is-invalid @enderror" value="{{ old('fonction') }}"name="fonction" >
                                @error('fonction')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                   {{--          <div id="app2"><dr-agence nomdr="{{ old('nom_dr') }}" st="{{ old('structure') }}" org="{{ old('organisme') }}" nomdrerror="@error('nom_dr'){{ $message }}@enderror" sterror="@error('structure'){{ $message }}@enderror" orgerror="@error('organisme'){{ $message }}@enderror" /></div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">geom_w <span class="text-danger">*</span></label>
                                <select class="form-control @error('profile') is-invalid @enderror" id="exampleFormControlSelect1" name="profile">
                                    <option value="" selected disabled>Séléctionner Le Profil</option>
                                      
                                </select>     
                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                                     
                            </div>--}} 
                            <div class="form-group">
                                <label for="exampleFormControlFile1">geom_w </label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                            
                            
                            
                       {{--      <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="password" class=" form-control-label">Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" id="password" placeholder="Mot de passe" class="form-control  @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="password_confirmation" class=" form-control-label">Confirmation mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" id="password_confirmation" placeholder="Confirmation mot de passe" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                </div>
                                
                            </div>--}} 
                            
                            @csrf                    
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                                    <i class="fa fa-save fa-lg "></i>
                                    <span id="payment-button-amount">Enregistrer</span>                            
                                </button>
                            </div>
                        </form>
                   </div>
                  </div>
                @endif
            </div>
            <div class="card-body card-block">


              @include('decoupage.wilayas.tblaffichagewilaya') 


</div>
               
</div>
</div>
</div> 


@endsection