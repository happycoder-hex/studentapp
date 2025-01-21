<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class productController extends Controller
{
    
    protected $products;
    public function __construct(){
        $this->products = new Product();
    }   
    public function index()
    {
        $products = $this->products->all();      
        return view('product.index', compact('products'));
    }
 
    public function create()
    {
       
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productname' => 'required',
        
            'description' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file size and allowed extensions as needed
        ]);
        // Check if the file was uploaded successfully
        if ($request->hasFile('photo')) {
            // Generate a unique file name
            $fileName = time().$request->file('photo')->getClientOriginalName();
            // Move the uploaded file to the public/images directory
            $request->file('photo')->move(public_path('images'), $fileName);
            // Save the product with the file name
            $validatedData['photo'] = $fileName; 
        }
        Product::create($validatedData);
        return redirect()->back();
    }
    
    public function show(string $id)
    {
       
    }
   
    public function edit(string $id)
    {
       
    }
    
    public function update(Request $request, string $id)
    {
        
    }
    
    public function destroy(string $id)
    {
        
    }
}
