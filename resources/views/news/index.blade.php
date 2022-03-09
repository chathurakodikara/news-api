<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            News Feeds
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-success-message />

            <div class=" overflow-hidden ">

                    <div>
                        @foreach ($news as $row)
                            <div class="grid grid-cols-2 bg-white border-gray-200 shadow-sm sm:rounded-lg overflow-hidden mb-2">
                                <div>
                                    <img src="{!! $row->url_to_image !!}" alt="">
                                </div>
                                <div class=" 1 p-5 ">
                                    <h3 class=" mb-2">
                                        <a  class=" font-bold text-xl leading-tight hover:text-indigo-800 transition-colors duration-150 ease-in-out"
                                            href="{{ route('news.show', $row->id) }}">
                                            {{ $row->title }}
                                        </a>
                                    </h3>
                                    @if ($row->author)

                                    <div class=" font-bold text-sm">By {{ $row->author }}</div>
                                    @endif
                                    <div class="text-xs font-bold mb-2">published {{ $row->published_at->diffForHumans() }}</div>

                                    <p>{{ $row->description }}</p>
                                    {{-- <a class="text-sm font-bold mb-4" href="{{ $row->url }}">Read More..</a> --}}

                                </div>

                            </div>
                        @endforeach

                            <div>
                                {{ $news->onEachSide(3)->links() }}
                            </div>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
