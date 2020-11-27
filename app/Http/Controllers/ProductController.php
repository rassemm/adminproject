<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    
    {
        $products = Product::where ([
            ['name','!=', Null],
            [function ($query)use ($request){
                if (($term =$request ->term)) {
                    $query ->orwhere('name','LIKE','%' .$term . '%')->get();
                }
            }]
        ])
        ->orderBy("id","desc")
        ->paginate(10);
        return view('product.index',compact('products'))
        ->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'test' => 'required',
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                        'content' => 'required',
        ]);
         if ($files = $request->file('image')) {
           $file=$request->file('image');
           $ext=$file->getClientOriginalExtension();
           $filename='image'.'_'.time() . ',' . $ext;
           $file->storeAs('public/image',$filename);
            }
        // $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);
        // $form_data = array(
        //     'name'       =>   $request->name,
        //     'author'        =>   $request->author,
        //     'image'            =>   $new_name,
        //     'test'           => $request ->test,
        //     'content'     =>$request->content
        // );

        Product::create($request->all());

        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'test' => 'required',
            'content' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('product.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    { 

        $product->delete();

        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }

    public function downloadPDF() {
        $products = Product::all();
        $pdf = PDF::loadView('pdf', compact('products'));
        
        return $pdf->download('product.pdf');
}
}
