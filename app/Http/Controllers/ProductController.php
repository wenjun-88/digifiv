<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DNS1D;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Expression;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    public function listing(Request $request)
    {
        $body = $request->all();

        // paging
        $offset = Arr::get($body, 'start', 0);
        $limit = Arr::get($body, 'length', 10);

        $query = Product::withTrashed();

        $countQuery = clone $query;

        // search
        $search = Arr::get($body, 'search');
        $q = Arr::get($search, 'value');
        if ($q) {
            $keyword = "%$q%";
            $query = $query->where(function ($query) use ($keyword) {
                $query = $query->where('name', 'LIKE', $keyword);
            });
        }

        // order
        $order = Arr::get($body, 'order', []);
        $columns = Arr::get($body, 'columns');
        foreach ($order as $value) {
            $column = $columns[$value['column']]['data'];
            if (strpos($column, '.') !== false) {
                $column = new Expression("`$column`");
            }
            $query->orderBy($column, $value['dir']);
        }

        // get from db
        $recordsFiltered = (clone $query)->count();
        $records = $query->offset($offset)->limit($limit)->get();
        $recordsTotal = $countQuery->count();

        return response()->json([
            'draw' => Arr::get($body, 'draw', 0),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $records,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $body = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'nullable',
        ]);

        $sanitizedBody = [];

        foreach ($body as $key => $value) {
            $sanitizedBody[$key] = htmlspecialchars($value, ENT_HTML5);
        }

        $product = Product::create($sanitizedBody);

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $body = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'nullable',
        ]);

        $sanitizedBody = [];

        foreach ($body as $key => $value) {
            $sanitizedBody[$key] = htmlspecialchars($value, ENT_HTML5);
        }

        $product->update($sanitizedBody);

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($id == 1) {
            return response(['error' => 'unable_to_delete_package'], Response::HTTP_BAD_REQUEST);
        }

        if (request('force')) {
            $product->forceDelete();
        } else {
            $product->delete();
        }
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
