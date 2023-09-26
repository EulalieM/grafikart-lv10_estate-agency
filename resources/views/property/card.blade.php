<div class="card h-100">
    @if ($property->getPicture())
        <img src="{{ $property->getPicture()->getImageUrl(360, 230) }}" alt="" class="img-fluid">
    @else
    <img src="/placeholder.png" alt="" class="img-fluid">
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
        </h5>
        <p class="card-text">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="text-primary fs-4 fw-bold">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>
