<x-app-layout>
    <div class="container text-center">
        <h2 id="shopping-title">Your Shopping Cart</h2>
        @if($cart && $cart->items->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                        <tr>
                            <td>{{ $item->product->productName }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->product->productPrice }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button class="btn mb-4 px-5 bg-warning text-dark"">Pay with CARD</button>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</x-app-layout>
