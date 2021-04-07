
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Organisme</th>
            <th>Direction</th>
            <th>Structure</th>
            <th>Fonction</th>
            <th>Profile</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($wilaya as $wilayas)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $wilayas->matricule  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->nom  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->prenom  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->organisme  }}   </td>
                <td >  {{ $wilayas->nom_dr  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->structure  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->fonction  }}   </td>
                <td>  {{ $wilayas->profile  }}   </td>
                <td>
                @if ( $privilege->modification) <a href="{{route('wilaya.edit',$wilayas->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('wilaya.destroy',$wilayas->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>

<div class="d-flex justify-content-left pagination">
    {!! $wilaya->appends(['search'=>request('search')])->links() !!}
</div>
