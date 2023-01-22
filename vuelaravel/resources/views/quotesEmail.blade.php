<h3>Daily quotes:</h3>

<div>

<!-- email sends at scheduled time, just not with any data. -->
@foreach ($quotes as $quote)
<div style="margin-bottom:5px;">
    <p>{{ $quote->email }}</p>
    <p>{{ $quote->quote }}</p>
    <p>{{ $quote->price }}</p>
</div>
@endforeach
</div>