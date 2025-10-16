<p>Dear {{ $name }},</p>

<p>Thank you for your order! Please find your invoice attached below.</p>

<p><strong>Order Summary:</strong></p>
<ul>
    @foreach ($cart as $item)
        <li>{{ $item['name'] }} — {{ $item['quantity'] }} × ${{ number_format($item['price'], 2) }}</li>
    @endforeach
</ul>

<p><strong>Grand Total:</strong> ${{ number_format($grandTotal, 2) }}</p>

<p>We hope to serve you again soon!</p>
