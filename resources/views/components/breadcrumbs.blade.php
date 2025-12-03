@props(['breadcrumbs' => []])

@if (count($breadcrumbs))
    <nav class="bg-white border-b border-gray-200" aria-label="Breadcrumb">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol class="flex items-center space-x-4 h-12">
                @foreach ($breadcrumbs as $breadcrumb)
                    <li>
                        <div class="flex items-center">
                            @if (!$loop->first)
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            @endif
                            <a href="{{ $breadcrumb['url'] }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                               @if ($loop->last) aria-current="page" @endif
                            >{{ $breadcrumb['title'] }}</a>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </nav>
@endif
