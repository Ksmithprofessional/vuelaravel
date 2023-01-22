<div>
    <h2>Hey {{request('email')}}!</h2>
</div>

<div>
    <h3>Thank you for your order!</h3>
</div>

<div>
    <p>Your order: {{request('quote')}}</p>
    <p>Total: £{{request('price')}}</p>
</div>