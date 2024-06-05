<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="{{ route('product.create') }}" class="btn mb-4 px-5 mt-4 bg-warning text-dark">New Product</a>

            </div>
        </div>
    </div>
    <div class="card-group">
        @foreach ($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ $product->productImage }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <!-- <h5 class="card-title">{{ $product->product }}</h5> -->
                    <p class="card-text mb-1"><b>{{ $product->productName }}</b></p>
                    <p class="card-text mb-1 h5 text-secondary"><b>{{ $product->productPrice }} €</b></p>
                    <p class="card-text mb-3">{{ Str::words($product->productDescription, 20) }}</p>
                    <div class="container row text-center">
                        <form action="{{ route('cart.add', $product) }}" method="POST" id="buy-form">
                            @csrf
                            <button class="btn mt-1 bg-secondary text-white" id="buy-button">Buy</button>
                        </form>
                        <a href="{{ route('product.show', $product) }}" class="btn btn-primary mt-1">View</a>
                        <a href="{{ route('product.edit', $product) }}" class="btn btn-primary mt-1">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
</x-app-layout>
