<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Book') }}
        </h2>
    </x-slot>
  
  
  
    <div class="py-12" @click={show=true}>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {!! Session::has('msg') ? Session::get("msg") : '' !!}
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-blue-100">
                <div class="border p-5 md:p-5 md:grid grid-cols-1 md:grid-cols-4 gap-5">
                  <div class="col-span-1 px-1 md:px-2 space-y-2">
                    <h1 class="font-bold text-gray-900 border-b border-grey-200 my-3 py-2">Table of Contents</h1>
                    @if($chapters->count() > 0)
                      @foreach($chapters as $chapter)
                          <div class="rounded overflow-hidden shadow-md px-6 py-2 text-gray-500 hover:text-gray-900">
                            <a href="{{ route('admin.book.addcontent', $chapter->id) }}" class="">
                               {{ $chapter->chapter }}
                            </a>
                          </div>
                      @endforeach
                    @else
                      <div class="rounded overflow-hidden shadow-md px-6 py-2 text-gray-500 hover:text-gray-900">
                        No Chapter Found.
                      </div>
                    @endif
                    
                    <div class="rounded overflow-hidden shadow-md px-1 py-2 text-gray-500 hover:text-gray-900">
                        {{-- {{ $chapters->links() }} --}}
                    </div>
                </div>
                <div class="col-span-3 border border-grey-200 my-3 mx-4">
                  <h1 class="flex-row space-x-10 font-bold border-b border-grey-200 p-4"> 
                    <span><a href="{{ route('admin.book.show', $content->book_id)  }}" class="font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75 border border-grey-200">&#8592; Back</a></span>
                      <span>&nbsp;</span>
                      <span class="text-center">
                        {{ $content->chapter }}
                      </span>
                      
                      
                      </h1>

                    <form action="" method="post">
                      <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="chapter_title" value="{{ $content->chapter }}" id="chapter_title" placeholder="Introduction / Chapter and/or Title" />
                      <input type="hidden" name="chapter_id" value="{{ $content->id }}">

                      <textarea class="w-full" name="" id="chapter_content" cols="30" rows="10">
                        {!! $content->chapter_content !!}
                      </textarea>
                      <br>
                      <button id="pay" type="submit" class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75">Update Content</Button>
                      
                        <a class="bg-black text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75" onclick="return confirm('Are you sure?')" href="">Delete</a>
                    </form>

                </div>
              </div>
          </div>
      </div>
  </div>
  @section('script')
  <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
        .create( document.querySelector( '#chapter_content' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
  @endsection
  </x-app-layout>
  