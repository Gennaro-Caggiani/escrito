<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tareas;
class TareasController extends Controller

{

       public function InsertarTarea(Request $request){
       
        $validatedData = $request->validate([
              'titulo' => 'required|min:1|max:255',
              'contenido' => 'required|min:1',
           ]);
                  
      $tarea = new Tareas();
      $tarea -> titulo = $request -> post("titulo");
      $tarea -> contenido = $request -> post("contenido");
      $tarea -> estado = $request -> post("estado");
      $tarea -> autor = $request -> post("autor");
      $tarea -> save();
      return $tarea;
        }

             public function ModificarTarea(Request $request, $id){
       
              $validatedData = $request->validate([
            'titulo' => 'required|min:1|max:255',
            'contenido' => 'required|min:1|max:255',
            ]);

            $tarea = new Tareas();
            $tarea ->  titulo = $request -> post("titulo");
            $tarea ->  contenido = $request -> post("contenido");
            $tarea ->  estado = $request -> post("estado");
            $tarea ->  autor = $request -> post("autor");
            $tarea -> save();
            return $tarea;

             }
   
         
             public function EliminarTarea(Request $request, $id){
                $tarea = Tareas::findOrFail($id);
                $tarea -> delete();
                
                         return [ "response" => "Object with ID $id deleted"];
            }
        
            public function Listar(Request $request){
                return Tareas::all();
            }
        
            public function ListarUno(Request $request, $id){
                return Tareas::findOrFail($id);
            }



}
