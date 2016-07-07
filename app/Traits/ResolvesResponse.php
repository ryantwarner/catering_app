<?php 
namespace App\Traits;

use Illuminate\Http\Request;

trait ResolvesResponse {
    
    private function resolve_response(Request $request, $data) {
        $view_name = preg_replace('/.{(.*?)}+/', '', $request->route()->getName());
        if ($request->header('Accept') != 'application/json' && view()->exists($view_name)) {
            return response()->view($view_name, ['data' =>$data]);
        } else {
            return response()->json($data);
        }
    }
    
}