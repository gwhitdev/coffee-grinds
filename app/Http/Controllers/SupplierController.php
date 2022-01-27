<?php

namespace App\Http\Controllers;

use App\Http\Services\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function edit(Request $request, int $id, SupplierService $supplierService)
    {

    }

    public function delete(Request $request, int $id, SupplierService $supplierService)
    {
        $deleted = $supplierService->delete($id);
        if ($deleted) return redirect('/manage/suppliers');
        return redirect('/manage/suppliers');
    }
}
