@empty($products)
<h1>No record found</h1>
@endempty
@foreach ($products as $product)
    <div class="col-md-6 col-lg-4 mt-2">
    <div class="card mobCardShahdow" data-price="{{ $product->price }}" id="productsContainer">
        <a href="{{ route('viewMobileDetails', ['product_id' => $product->id]) }}">
            @if ($product->images->isNotEmpty())
                <img src="{{ asset('storage/' . $product->images->first()->image) }}" class="card-img-top imgHeight"
                    alt="...">
            @else
                <img src="{{ asset('./assets/images/mobcardimg.png') }}" class="card-img-top imgHeight"
                    alt="Default Image">
            @endif



        </a>
        <div class="card-body">

            <p class="card-text">{{ $product->name }}</p>
            <div class="d-flex">
                <button type="button" class="btn priceBtn text-white">4.00 <span class="pb-5"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 8 9"
                            fill="none">
                            <path
                                d="M4 6.80801L6.472 8.30001L5.816 5.48801L8 3.59601L5.124 3.35201L4 0.700012L2.876 3.35201L0 3.59601L2.184 5.48801L1.528 8.30001L4 6.80801Z"
                                fill="white" />
                        </svg></span></button>

                <small class="pt-2 ms-2">(0)</small>
            </div>
            <p class="mobPrice mt-2">Rs {{ $product->price }}</p>

        </div>
    </div>
</div>

@endforeach
