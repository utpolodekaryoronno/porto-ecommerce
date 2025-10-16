@extends('layouts.app')
@section('title', 'cart')
@section('content')
<div class="container my-5">

    <h2 class="text-center mb-4">🛒 Your Shopping Cart</h2>



    @if(count($cart) > 0)
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
    <div>
        <table class="table table-bordered text-center cart-table">
            <thead class="thead-gray">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total = $item['price'] * $item['quantity']; @endphp
                    <tr class="cart-row" data-id="{{ $id }}">
                        <td><img src="{{ $item['image'] }}" width="60" alt="{{ $item['name'] }}"></td>
                        <td>{{ $item['name'] }}</td>
                        <td class="price" data-price="{{ $item['price'] }}">${{ number_format($item['price'], 2) }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="product-single-qty custom-quantity d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn-minus btn btn-outline-secondary">−</button>
                                    <input type="text" class="text-center form-control quantity-input" value="{{ $item['quantity'] }}">
                                    <button type="button" class="btn-plus btn btn-outline-secondary">+</button>
                                </div>
                            </div>
                        </td>
                        <td class="total">${{ number_format($total, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @php $grandTotal += $total; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Grand Total:</strong></td>
                    <td colspan="2"><strong id="grand-total">${{ number_format($grandTotal, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="confirm-order-section">
            <form action="{{ route('order.store') }}" method="POST" class="mb-0">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control w-100" id="name" name="name" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control w-100" id="email" name="email">
                </div>

                <button type="submit" class="btn btn-primary">Confirm</button>
            </form>
        </div>
    </div>

    @else
        <div class="text-center">
            <p>Your cart is empty 😔</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    @endif
</div>


{{-- JS snippet to handle them --}}
<script>
    document.querySelectorAll('.btn-plus, .btn-minus').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.quantity-input');
            let value = parseInt(input.value) || 1;

            if (this.classList.contains('btn-plus')) value++;
            else if (value > 1) value--;

            input.value = value;
            input.dispatchEvent(new Event('input')); // trigger AJAX update
        });
    });
</script>



{{-- quantity ajax --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = document.querySelector('meta[name="csrf-token"]').content;

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('input', function () {
                const row = this.closest('.cart-row');
                const id = row.dataset.id;
                let quantity = parseInt(this.value);

                // ✅ Handle invalid inputs
                if (isNaN(quantity) || quantity < 1) {
                    this.value = 1;
                    quantity = 1;
                }

                // ✅ Send AJAX request
                fetch(`/cart/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ quantity: quantity })
                })
                .then(res => res.json())
                .then(data => {
                    // ✅ Update this row total
                    row.querySelector('.total').textContent = '$' + data.itemTotal;

                    // ✅ Update grand total
                    document.getElementById('grand-total').textContent = '$' + data.grandTotal;
                })
                .catch(err => console.error('Cart update error:', err));
            });
        });
    });
</script>




@endsection
