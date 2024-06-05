<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="productName" value="{{ $product->productName }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="productDescription" rows="4" required>{{ $product->productDescription }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="productPrice" value="{{ $product->productPrice }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Product Image</label>
                                <input type="text" class="form-control" id="image" name="productImage" value="{{ $product->productImage }}">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
