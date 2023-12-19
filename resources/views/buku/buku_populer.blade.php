<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Buku Populer') }}
        </h2>
        </h2>
        <a href="{{ route('buku.index') }}" class="text-blue-500 hover:underline">Back to Books</a>
    </x-slot>



    <ul>
        @foreach ($bukuPopuler as $buku)
            <div class="bg-white shadow-md p-4 mt-8 mr-8 ml-8 rounded-md ">
                <h3 class="text-xl font-semibold">{{ $buku->judul }}</h3>
                <p class="text-gray-600">{{ $buku->penulis }}</p>
                <p>Rating: {{ $buku->rating }}</p>
            </div>
        @endforeach
    </ul>

</x-app-layout>
