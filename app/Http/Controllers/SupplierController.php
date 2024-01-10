<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $suppliers = Supplier::paginate();  
        return view('supplier/index', compact('suppliers')); 
         
    }
    public function create(){
        
        return view('supplier/create'); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request,Supplier $supplier)
    {
        $data = $request->validated();
        $supplier->create($data);
        return redirect()->route('fornecedor.index')->with('message', 'Fornecedor cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        if (!$supplier = Supplier::find($id)) {
            return back();
        }

        return view('supplier/edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierUpdateRequest $request,Supplier $supplier)
    {
        $data = $request->validated(); 
        $supplier->update($data);
        return redirect()->route('fornecedor.index')->with('message', 'Fornecedor atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('fornecedor.index')->with('message', 'Fornecedor deletado com sucesso');
    }
}
