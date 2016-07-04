<?php 
namespace App\Traits;

use Illuminate\Http\Request;

trait ResolvesResponse {
    
    private function resolve_response(Request $request, $data) {
        if ($request->header('Accept') != 'application/json' && view()->exists($request->route()->getName())) {
            return response()->view($request->route()->getName(), ['data' =>$data]);
        } else {
            return response()->json($data);
        }
    }
    
}