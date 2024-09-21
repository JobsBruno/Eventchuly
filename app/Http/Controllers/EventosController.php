<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Eventos;


class EventosController extends Controller
{
        // Tela de adm 

        public function MostrarHome() {
            return view('homeadm');
        }
        
        
        // tela de cadastros  Read cRud
        public function MostrarCadastroEvento() {
            return view('cadastroevento');
        }


         // salvar os registro na tabela eventos Create Crud
        public function CadastrarEventos(Request $request) {
            $registros = $request ->validate ([
                'nomeEvento' => 'string|required',
                'localEvento' => 'string|required',
                'dataEvento' => 'date|required',
                'imgEvento' => 'string|required'
            ]);

            Eventos::create($registros);
            return Redirect::route('home-adm');
        }
      
        // apagar os registros da tabela   Delete cruD
        public function destroy(Eventos $id){
            $id->delete();
            return Redirect::route('home-adm');
        }

        // para alterar os dados na tabela   Update crUd
        public function Update(Eventos $id,Request $request) {
            $registros = $request ->validate ([
                'nomeEvento' => 'string|required',
                'localEvento' => 'string|required',
                'dataEvento' => 'date|required',
                'imgEvento' => 'string|required'
            ]);
            $id->fill($registros);
            $id->save();

            return Redirect::route('home-adm');
    }

        //para mostrar apenas por codigo  SHOW
        public function MostrarEventoCodigo(Eventos $id){
            return view('altera-evento', ['registrosEvento'=>$id]);
        }

           //buscar evento pela descrição/nome 
        public function MostrarEventoNome (Request $request){
            $registros = Eventos::query();
            $registros ->when($request->nomeEvento,function($query,$valor){
                $query->where('nomeEvento', 'like','%'.$valor.'%');
            });
            $todosRegistros = $registros->get();
            return view('listaEventos',['registrosEvento'=>$todosRegistros]);
        }
    }
