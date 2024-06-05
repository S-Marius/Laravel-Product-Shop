<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $product->productName }} | {{ $product->created_at }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <img src="{{ asset($product->productImage) }}" class="card-img-top" alt="{{ $product->productName }}">
                        </div>

                        <div class="mb-3">
                            <h5>Description</h5>
                            <p>{{ $product->productDescription }}</p>
                        </div>

                        <div class="mb-3">
                            <h5>Price</h5>
                            <p>${{ number_format($product->productPrice, 2) }}</p>
                        </div>

                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Back to Products</a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
