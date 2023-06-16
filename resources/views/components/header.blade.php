<header class="bg-white shadow col-start-2 col-end-7 row-start-1 h-20">
    <div class="p-2 bg-white block sm:flex items-center justify-between border-b border-gray-200 h-20">
        <div class="my-3 px-4">
            <div class="my-4 ">
                <nav class="flex mb-2 text-center" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        @foreach ($breadcrumbs as $breadcrumb)
                        @if ($loop->last)
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2">{{ $breadcrumb['title'] }}</span>
                            </div>
                        </li>
                        @else
                        <li class="inline-flex items-center">
                            <a href="{{ $breadcrumb['url'] }}" class="inline-flex items-center text-gray-700 hover:text-primary-600">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                {{ $breadcrumb['title'] }}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $pageTitle }}</h1>
            </div>
        </div>
    </div>
</header>
