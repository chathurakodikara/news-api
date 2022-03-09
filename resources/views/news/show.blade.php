<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" overflow-hidden ">
                    <div class="grid grid-cols-2 bg-white border-gray-200 shadow-sm sm:rounded-lg overflow-hidden mb-2">
                        <div>
                            <img src="{!! $news->url_to_image !!}" alt="">
                        </div>
                        <div class=" 1 p-5 ">
                            <h3 class=" mb-2">
                                <a  class=" font-bold text-lg leading-tight" href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                            </h3>
                            @if ($news->author)

                            <div class=" font-bold text-sm">By {{ $news->author }}</div>
                            @endif
                            <div class="text-xs font-bold mb-2">published {{ $news->published_at->diffForHumans() }}</div>

                            <p>{{ $news->description }}</p>
                            <a class="text-sm font-bold mb-4" href="{{ $news->url }}">Read More..</a>

                        </div>

                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
