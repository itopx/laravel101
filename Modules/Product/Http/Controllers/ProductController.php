<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Verot\Upload\Upload;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['lists'] = Product::orderBy('id', 'DESC')->paginate(20);

        return view('product::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $result = Product::create($request->all());
        if ($result) {
            $handle = new Upload($_FILES['cover']);
            if ($handle->uploaded) {
                $filename = $handle->file_src_name_body.'_'.uniqid();
                $handle->file_new_name_body = $filename;
                $handle->process(storage_path('app/public/product'));
                if ($handle->processed) {
                    if ($request->hasFile('cover')) {
                        Product::where('id', $result->id)->update([
                            'cover' => $handle->file_dst_name
                        ]);
                    }

                    $handle->clean();
                } else {
                    echo 'error : '.$handle->error;
                }
            }
        }

        return redirect()->route('product.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['result'] = Product::where('id', $id)->first();

        return view('product::view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['result'] = Product::where('id', $id)->first();

        return view('product::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $result = $product->update($request->all());
        if ($result) {
            $handle = new Upload($_FILES['cover']);
            if ($handle->uploaded) {
                $filename = $handle->file_src_name_body.'_'.uniqid();
                $handle->file_new_name_body = $filename;
                $handle->process(storage_path('app/public/product'));
                if ($handle->processed) {
                    if ($request->hasFile('cover')) {
                        Product::where('id', $id)->update([
                            'cover' => $handle->file_dst_name
                        ]);
                    }

                    $handle->clean();
                } else {
                    echo 'error : '.$handle->error;
                }
            }
        }


        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $product = Product::destroy($id);

        return redirect()->route('product.index');
    }
}
