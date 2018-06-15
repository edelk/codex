<?php

namespace appCodex\Http\Controllers;

use Illuminate\Http\Request;
use appCodex\Unidade;
use Illuminate\Support\Facades\Redirect;
use appCodex\Http\Requests\UnidadeRequest;
use DB;

class UnidadeController extends Controller
{
    public function __construct(){
      //
    }

    public function index(Request $request){
      if($request){
        $query=trim($request->get('pesquisa'));
        $unidades=DB::table('unidade')
        ->where('nome', 'LIKE', '%'.$query.'%')
        ->where('status', '=', '1')
        ->orderBy('idunidade', desc)
        ->paginate(7);
        return view('admin.unidade.index', [
          "unidades"=>$unidades, "pesquisa"=>$query
          ]);
      }
    }

    public function create("admin.unidade.create"){

    }

    public function store(UnidadeRequest $request){
      $unidade = new Unidade;
      $unidade->nome=$request->get('nome');
      $unidade->campus=$request->get('campus');
      $unidade->status=1;
      $unidade->save();
      return Redirect::to('admin/unidade');
    }

    public function show($id){
      return view("admin.unidade.show",
      ["unidade"=>Unidade::findOrFail($id)]);
    }

    public function edit($id){
      return view("admin.unidade.edit",
      ["unidade"=>Unidade::findOrFail($id)]);
    }

    public function update(UnidadeRequest $request, $id){
      $unidade=Unidade::findOrFail($id);
      $unidade->nome=$request->get('nome');
      $unidade->campus=$request->get('campus');
      $unidade->update();
      return Redirect::to('admin/unidade');
    }

    public function destroy($id){
      $unidade=Unidade::findOrFail($id);
      $unidade->status='0';
      $unidade->update();
      return Redirect::to('admin/unidade');
    }
}
