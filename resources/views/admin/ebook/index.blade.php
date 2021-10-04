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
                  <div class="col-span-1">
                      <img class="rounded shadow-md focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                          src="{{ Storage::url($book->cover) }}" alt="">
                  </div>
                  <div class="col-span-2 px-5 md:px-20 space-y-2">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
    
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <h1 class="text-3xl md:text-4xl text-gray-800 font-bold pt-1 md:pt-20 mt-10 md:mt-20">{{ $book->title }}</h1>

                      <p class="text-gray-400">{{ $book->description }}</p>

                      <div x-data="{ show: false }">
                          <div class="">
                              <button @click={show=true} type="button"
                                  class="mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full mt-1 md:mt-4 lg:mt-0 py-2 px-5 shadow opacity-75">
                                  Create Chapters
                              </Button>
                              {{-- <button id="pay" type="button" onclick="transactionInit()"
                              class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75">Buy Now</Button>
                       --}}
                          </div>
                          <div x-show="show" tabindex="0"
                              class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                              <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
                                  style="width: 600px;">
                                  <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden text-gray-500">
                                      <button @click={show=false}
                                          class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                      <div class="px-6 py-3 text-xl border-b font-bold">Add Chapters to (<span id ="book">{{ $book->title }}</span>)</div>
                                      <div class="p-6 flex-grow">
                                          <form action="" method="post">
                                              @csrf
                                              <div>
                                                  <div>
                                                      <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="chapter_title" value="{{old('chapter_title')}}" id="chapter_title" placeholder="Introduction / Chapter and/or Title" />
                                                      <input type="hidden" name="book_id" value="{{ $book->id }}">

                                                      <textarea class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="chapter_content" id="chapter_content" value="{{old('chapter_content')}}" rows="6" placeholder="Chapter Content"></textarea>
                                                  </div>
                                                  <div></div>
                                              </div>
                                            </div>
                                            <div class="px-6 py-3 border-t">
                                              <div class="flex justify-between">
                                                <button class="font-bold  px-4 py-2"><span id="total">&nbsp;</span></button>
                                                <div>
                                                  <button id="close" @click={show=false} type="button"
                                                  class="bg-gray-200 text-gray-500 rounded-full px-4 py-2 mr-1">Cancel</Button>
                                                  <button id="pay" type="submit"
                                                  class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75">Add Chapter</Button>
                                                </div>
                                              </div>
                                            </form>
                                      </div>
                                  </div>
                              </div>
                              <div
                                  class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
                              </div>
                          </div>
                      </div>
                  </div>
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
                        {{ $chapters->links() }}
                    </div>
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
  