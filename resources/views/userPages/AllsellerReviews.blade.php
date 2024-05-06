@extends('userPages.master')
@section('content')


<div class="container-fluid">
    <div class="container py-md-5 py-3">
        {{-- <h1 class="content3 pb-3">Seller Ratings and Reviews ({{$totalComments}})</h1> --}}
        <div class="row gap-5">
            @foreach($Allcomments as $comment)
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="img-section1 d-flex gap-4 align-items-start">
                            <img src="{{ asset('./assets/img/line-26.png') }}" alt="">
                            <div class="img-cont1">
                                <h1 class="con-1-h1">{{$comment->full_name}}</h1>
                                <p class="con1-p">{{$comment->comment}}
                                </p>
                            </div>

                        </div>

                    </div>

                    @php
                    $rating = \App\Models\FeedbackForm::getAverageRating($comment->id);
                    $wholeStars = floor($rating);
                    $halfStar = $rating - $wholeStars >= 0.5;
                @endphp
                    <div class="col-md-4 d-flex justify-content-end align-items-end">

                        <div class="rating d-flex justify-content-end">
                            @php
                            $rating = \App\Models\FeedbackForm::getAverageRating($comment->id);
                            $wholeStars = floor($rating);
                            $halfStar = $rating - $wholeStars >= 0.5;
                        @endphp

                        <p>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $wholeStars)
                                    <i class="fas fa-star" style="color: #FFCC00;"></i>
                                @elseif ($i == $wholeStars + 1 && $halfStar)
                                    <i class="fas fa-star-half-alt" style="color: #FFCC00;"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </p>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{-- <a href="{{ route('AllsellerReviews', ['store_id' => $store->id]) }}" style="float: right;">see more</a> --}}
    </div>
</div>



@endsection
