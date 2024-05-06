<div class="row mt-5 mb-5" >
    @foreach($stores as $store)
  <div class="col-md-6">
    <div class="find-store-div text-justify p-2 p-sm-3 p-md-4 pb-3">
        <h5>{{ $store->name }}</h5>
        <p>{{ $store->description }}</p>
        <p>{{ $store->location }}</p>
      <div class="d-flex" style="align-items: center ">
        <a href="">
            <i class="fa-brands fa-2x fa-whatsapp" style="color:rgb(7, 230, 7); font-size:1.3rem !important; margin-right:0.5rem"></i>
        </a>
        <a href="" class="text-decoration-none">
          <div class="d-flex call_store">
            <a href="/chatify/{{ $store->user->id }}"><i class="fa-brands fa-rocketchat" style="color:#f86f03; margin-left:0.5rem; font-size:1.3rem !important"></i></a>
             {{-- class="btn btn-primary"><p class="find-store-callnow" style="font-size: 1rem; margin-left:0.3rem ">Message Now</p></a> --}}
          </div>
        </a>
      </div>
      <div class="d-flex justify-content-md-end">
        <div class="d-lg-flex">
            <a href="{{ route('viewStore', ['store_id' => $store->id]) }}">
                <button type="button" class="btn find-store-view px-4 py-2">View Store</button>
            </a>
            <a href="{{ route('BookRepair', ['store_id' => $store->id]) }}"> <button
            type="button"
            class="btn find-store-book mx-1 px-4 py-2"
          >
            Book Now
          </button></a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col-md-6 mt-md-0 mt-3">

  </div>
</div>

