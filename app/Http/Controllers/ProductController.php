<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Load Data ke datatable
        if(request()->ajax()) {
            $query = Product::query();

            return DataTables::of($query)
                                ->editColumn('price', function($item) {
                                    return number_format($item->price);
                                })
                                ->addColumn('action', function($item) {
                                    return '
                                        <a href="'.route('dashboard.product.edit',$item->id).'">
                                            Edit
                                        </a>

                                        <form action="'.route('dashboard.product.destroy', $item->id).'" method="POST" class="inline-block">
                                            '.csrf_field().method_field('DELETE').'
                                            <button class="bg-red-500 text-white rounded-md px-2 py-1 m-2">Hapus</button>
                                        </form>
                                    ';
                                })
                                ->rawColumns(['action'])
                                ->make();
        }

        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // mengambil semua request
        $data = $request->all();
        // mengubah slug, dengan slug berdasarkan name
        $data['slug'] = Str::slug($request->name);

        // save data product ke database
        Product::create($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.dashboard.product.edit', ['item' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        // mengambil semua data yg dikirimkan di request
        $data = $request->all();

        // mengubah nama slug dengan menggenerate dari class Str
        $data['slug'] = Str::slug($request->name);

        // mengupdate data product di database
        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // menghapus data product di database
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}
