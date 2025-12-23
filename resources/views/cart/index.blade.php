@extends('layouts.app')
@section('title', 'cart')
@section('content')
<div class="container my-5 mb-5">

    <h2 class="text-center mb-4">🛒 Your Shopping Cart</h2>



    @if(count($cart) > 0)
    <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
    <div class="mb-4">
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


        <hr>
        <div class="row">
            @if (Auth::guard('web')->user() && Auth::guard('web')->user()->role == "admin")
                 <div class="col-md-6">
                 {{-- Cash On Dalivary  --}}
                 <h4 class="mt-2 d-flex align-items-center"><p class="mt-1">🚚</p>Cash On Dalivary</h4>
                <div class="confirm-order-section">
                    <form action="{{ route('order.store') }}" method="POST" class="mb-0">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control w-100" id="name" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control w-100" id="email" name="email" value="{{old('email')}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </div>
            </div>
            @endif


            <div class="col-md-6">
                 {{-- Payment Form Should Here --------- --}}
                 <h4 class="mt-2 d-flex align-items-center"><p class="mt-1">💳</p>Pay with Card</h4>

                <form id="payment-form" class="card-payment">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Card Details</label>
                        <div id="card-element" class="form-control w-100"></div>
                        <small id="card-error" class="text-danger"></small>
                    </div>

                    <input type="hidden" id="amount" value="{{ $grandTotal }}">

                    <button class="btn btn-primary" id="pay-btn">
                        Pay ${{ number_format($grandTotal, 2) }}
                    </button>
                </form>
            </div>

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
                    // ✅ Update row total
                    row.querySelector('.total').textContent = '$' + data.itemTotal;

                    // ✅ Update grand total (table)
                    document.getElementById('grand-total').textContent = '$' + data.grandTotal;

                    // ✅ Update Pay Button text
                    document.getElementById('pay-btn').innerText = 'Pay $' + data.grandTotal;

                    // ✅ Update hidden amount for Stripe
                    document.getElementById('amount').value = data.grandTotal;
                })
                .catch(err => console.error('Cart update error:', err));
            });
        });
    });
</script>



{{-- Stripe Payment Script --}}
<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    const errorDiv = document.getElementById('card-error');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        errorDiv.innerText = '';

        // 1️⃣ Create Payment Intent
        const res = await fetch("{{ route('stripe.pay') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
        });

        const data = await res.json();

        if (data.error) {
            errorDiv.innerText = data.error;
            return;
        }

        // 2️⃣ Confirm Card Payment
        const result = await stripe.confirmCardPayment(
            data.clientSecret,
            {
                payment_method: {
                    card: card,
                }

            }
        );

        // ❌ Payment failed
        if (result.error) {
            errorDiv.innerText = result.error.message;
            return;
        }

        // ✅ Payment successful
        if (result.paymentIntent.status === 'succeeded') {

            await fetch("{{ route('stripe.success') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
            });

            toastr.success("Payment Successful ✅");

            location.reload();
        }

    });
</script>




@endsection
