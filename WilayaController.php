<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Wilaya;
use App\User;
use Auth;
use DB;

class WilayaController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    
    public function recherche($p){
        $search= request('search');
       
              if($p=='N'){
                $wilayas=wilaya::where('nom_w', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif ($p=='R'){
                $wilayas=wilaya::where('nom_dr', auth::user()->nom_dr)
                   ->where('nom_w', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif($p=='W'){
                    $wilaya=wilaya::where('nom_w', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $wilaya=wilaya::where('nom_w', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $wilaya=wilaya::where('nom_w', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $wilayas=wilaya::where('nom_w', 'like',"%$search%")
                ->latest()->paginate(20);  
             }              
        return $wilayas;     
     }
  
      public function index() {

        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();

        $wilaya=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $wilayas = DB::table('b_wilaya')->get();
        if ( $privilege->consultation) return view('decoupage.wilayas.wilaya',compact('wilaya','privilege','wilayas')) ;
        else return view('layouts.pasacces');   
      }
  
     public function create(){
        
      $privilege = DB::table('p_privileges') ->join('p_wilayas', 'p_wilayas.code', '=', 'p_privileges.wilaya_code')
      ->where('p_wilayas.code','=', Auth::user()->wilaya)
      ->where('volet_app','=','wilayas')
      ->first();     
   
       $wilaya=$this->recherche($privilege->visibilite);
       $auth= Auth::user();
       return view('wilayas.wilayacreate',compact('wilaya','privilege')) ;
      }
  
      public function edit($id){

        //$privilege = DB::table('p_privileges') ->join('p_wilayas', 'p_wilayas.code', '=', 'p_privileges.wilaya_code')
        //->where('p_wilayas.code','=', Auth::user()->wilaya)
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      
  
       $wilaya=$this->recherche($privilege->visibilite);
       $auth= Auth::user();
       $wilaya_enr= wilaya::where('id',$id)
        ->first();
        return view('wilayas.wilayaupdate',compact('wilaya','wilaya_enr','privilege')) ;
      }
  
      public function update(Request $request){
        $data=request()->all();

        if ($request->nom_dr=='') $nom_dr=$request->nomdrread;
        else  $nom_dr=$request->nom_dr;

        if ($request->structure=='') $structure=$request->structureread;
        else  $structure=$request->structure;   

        if ($request->nom_dr==''){
        $this->validate($request,[
           'nom_w'=>'required',
           'nom_w_arb'=>'required',
            'siege_w'=>'required',
             'autre_nom_w'=>'required',
            'geom_w'=>'required',
                 ]);
        }else{
          $this->validate($request,[
            'nom_w'=>'required',
            'nom_w_arb'=>'required',
             'siege_w'=>'required',
              'autre_nom_w'=>'required',
             'geom_w'=>'required',
                   ]);
        }        
  
        wilaya::where('id','like',$request->id)
                 ->update([
                'code_w' =>$request->id,
                 'nom_w' =>$request->nom,
                 'nom_w_arb' =>$request->prenom,                 
                 'siege_w' =>$request->email,
                 'autre_nom_w' =>$request->fonction,
                 'geom_w' =>$request->structureread,
                 ]);                   
                 
        return back();
     }
    
  
    /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request){
  
        $data=request()->all();
       
        $this->validate($request,[
          'nom_w'=>'required',
          'nom_w_arb'=>'required',
           'siege_w'=>'required',
            'autre_nom_w'=>'required',
           'geom_w'=>'required',
                 ]);
                 
         $fam= new wilaya;
         $fam->matricule =$request->matricule;
         $fam->nom_w =$request->nom;
         $fam->nom_w_arb =$request->prenom;
         $fam->siege_w =$request->email;
         $fam->autre_nom_w =$request->fonction;
         $fam->geom_w =$request->image;
        
         $fam->save();
         return back();
      }   
  
      public function destroy($id){
        
        wilaya::where('id',$id)->delete();;
       
         return back();
      }
}
