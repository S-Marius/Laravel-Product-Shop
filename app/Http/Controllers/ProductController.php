<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
        ->where('user_id', request()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate();
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'productName' => ['required', 'string', 'max:255'],
            'productDescription' => ['required', 'string'],
            'productPrice' => ['required', 'numeric', 'min:0'],
            'productImage' => ['nullable', 'string'],
        ]);

        $data['user_id'] = $request->user()->id;

        $product = Product::create($data);

        return to_route('product.show', $product)->with('message', 'Product was created!');
    }

    public function show(Product $product)
    {   
        if ($product->user_id !== request()->user()->id) {
            abort(403);
        }

        return view('product.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {   
        if ($product->user_id !== request()->user()->id) {
            abort(403);
        }

        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Check if the authenticated user is the owner of the product
        if ($product->user_id !== $request->user()->id) {
            abort(403);
        }

        // Validate the request data
        $data = $request->validate([
            'productName' => ['required', 'string', 'max:255'],
            'productDescription' => ['required', 'string'],
            'productPrice' => ['required', 'numeric', 'min:0'],
            'productImage' => ['nullable', 'string'],
        ]);

        // Update the product with validated data
        $product->update($data);

        // Redirect to the product index page with a success message
        return redirect()->route('product.index')->with('message', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->user_id !== request()->user()->id) {
            abort(403);
        }
        
        $product->delete();

        return to_route('product.index')->with('message', 'Product deleted successfully');
    }
}