<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Top Headlines
        </h2>
        <p>Exports selected data to the system</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-all-errors />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('headlines.store') }}" method="POST">

                        @csrf
                        <div class=" grid grid-cols-4 gap-x-4 gap-y-2">
                            <x-label>
                                <div>Category</div>
                                <x-select name="category">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category}}">{{ $category }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="category" />
                            </x-label>

                            <x-label>
                                <div>Counties</div>
                                <x-select name="country" >
                                    <option value="">Select</option>
                                    @foreach ($countries as $key => $country)
                                    <option value="{{ $key}}">{{ $country }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="country" />

                            </x-label>

                            <div class=" col-span-2">

                                <x-label>
                                    <div>Search</div>
                                    <x-input type="text" name="search"  />
                                    <x-input-error for="search" />

                                </x-label>
                            </div>
                            <div class=" col-span-4">

                                <button type="submit" class=" py-2 px-5 text-white bg-indigo-700 rounded block ml-auto">Insert To System</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">




            <div class=" overflow-hidden ">

                    <div class="shadow overflow-hidden border-b border-gray-300 sm:rounded-lg" >
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead  class="bg-gray-200">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">author</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"">published</th>
                            </thead>
                            <tbody  class="bg-white divide-y divide-gray-200">
                                @foreach ($news->articles as $news)

                                <tr>
                                    <td  class="px-6 py-2">
                                        <div class=" rounded overflow-hidden">
                                            <img class="object-cover h-16 w-auto" src="{{ $news->urlToImage }}">
                                        </div>
                                    </td>
                                    <td  class="px-6 py-2">{{ $news->title }}</td>
                                    <td  class="px-6 py-2 text-sm">{{ $news->author }}</td>
                                    <td  class="px-6 py-2 text-sm">{{ $news->description }}</td>
                                    <td  class="px-6 py-2 text-xs">{{ Carbon\Carbon::parse($news->publishedAt)->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div> --}}
</x-app-layout>
