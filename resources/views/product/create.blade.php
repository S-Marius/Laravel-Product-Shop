<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Create New Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group mb-3">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" value="" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="productDescription">Description</label>
                                <textarea class="form-control" id="productDescription" name="productDescription" rows="4" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="productPrice">Price</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" value="" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="productImage">Product Image URL</label>
                                <input type="text" class="form-control" id="productImage" name="productImage" value="img/" placeholder="img/keyboard.jpg">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Create Product</button>
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
