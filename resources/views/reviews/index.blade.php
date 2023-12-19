<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Review buku') }}
        </h2>
        </h2>
        <a href="{{ route('buku.index') }}" class="text-blue-500 hover:underline">Back to Books</a>
    </x-slot>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-8">

                    <strong class=" text-3xl mt-8">{{ $buku->judul }} Reviews </strong>

                    <div class="card-body mt-8">
                        <!-- Show existing reviews -->



                        <!-- Form for submitting a new review -->
                        @auth
                            <form action="{{ route('review.submit', ['bukuId' => $buku->id]) }}" method="POST"
                                class="flex-row">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control w-full" name="review" placeholder="Write a review..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-success bg-green-500 justify-end">Submit
                                    Review</button>
                            </form>
                        @else
                            <p class="text-muted">Login to submit a review.</p>
                        @endauth


                        <ul class="list-group mb-3 mt-8">
                            @foreach ($reviews as $review)
                                <li class="list-group-item rounded">
                                    <strong>{{ $review->user->name }}</strong>:
                                    {{ $review->review }}
                                    @if (Auth::check() && Auth::user()->id == $review->user_id)
                                        <form action="{{ route('review.delete', ['reviewId' => $review->id]) }}"
                                            method="POST" class="float-right">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger bg-red-500">Delete</button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
