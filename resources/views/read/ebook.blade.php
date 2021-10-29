<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>{{ $book->title }}</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
   </head>
   <body class="h-screen">
       
       <div x-data="{ sidebarOpen: true }" class="flex overflow-x-hidden h-screen">
           <aside class="flex-shrink-0 w-64 flex flex-col border-r transition-all duration-300" :class="{ '-ml-64': !sidebarOpen }">
      <div class="bg-gray-900">
        <img class="rounded shadow-md inline"
        src="{{ Storage::url($book->cover) }}" alt="{{ $book->title }}">
      </div>
      <nav class="flex-1 flex flex-col bg-white">
        @if($chapters->count() > 0)
          @foreach($chapters as $chapter)
              <a href="/readbook/{{ $book->id}}/{{ $chapter->chapter }}" class="rounded overflow-hidden shadow-md px-6 py-2 text-gray-500 hover:text-gray-900">
                  {{ $chapter->chapter }}
              </a>
          @endforeach
        @else
        <div class="my-10 mx-10 rounded overflow-hidden shadow-md px-6 py-2 text-gray-500 hover:text-gray-900">
          No Chapter Found.
        </div>
      @endif
      </nav>
    </aside>
    <div class="flex-1 flex-1 overflow-y-auto">
        <header style="position: fixed; width:100%; overflow:hidden;" class="flex items-center p-4 text-semibold text-gray-100 bg-gradient-to-r from-pink-700 to-red-500">
            <button class="p-1 mr-4" @click="sidebarOpen = !sidebarOpen">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        <button class="p-1 mr-4">
            <a href="{{ route('myprofile') }}"><img src="/images/svg/home.svg" style="fill:white !important; width:20px;" ></a></button>
        <h1 class="w-full text-2xl font-bold inline-flex float-root">
            <span class="hidden md:block">{{ $book->title }}
            <span class="float-right">&nbsp;</span>
        </h1>
    </header>
    <main class="w-full md:w-2/3 p-10 h-auto shadow my-10 mx-auto border border-gray-100 rounded content-justify">
      @if($chapters->count() > 0)
        {!! $book->chapter_content !!}
      @else
      <div class="my-10 mx-10 rounded overflow-hidden shadow-md px-6 py-2 text-gray-500 hover:text-gray-900">
        No Content available.
      </div>
      @endif
    </main>
</div>
</div>
</body>
</html>