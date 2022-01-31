<?php

namespace App\Http\Controllers;

use App\Http\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function delete(Request $request, int $id, BrandService $brandService)
    {
       $deleted = $brandService->delete($id);
       if ($deleted) return redirect('/manage/brands');
       return redirect('/manage/brands');
    }
}
