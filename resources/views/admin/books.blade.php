<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Book List') }}
      </h2>
  </x-slot>



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      {!! Session::has('msg') ? Session::get("msg") : '' !!}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-blue-100">
              <table class="min-w-full table-auto">
                <thead class="justify-between">
                  <tr class="bg-blue-800">
                    <th class="px-16 py-4">
                      <span class="text-gray-300"></span>
                    </th>
                    <th class="px-16 py-4">
                      <span class="text-gray-300">Title</span>
                    </th>
                    <th class="px-16 py-4">
                      <span class="text-gray-300">Description</span>
                    </th>
                    <th class="px-16 py-4">
                      <span class="text-gray-300">Price</span>
                    </th>
                    <th class="px-16 py-4">
                      <span class="text-gray-300">Date</span>
                    </th>
            
                    <th class="px-16 py-4">
                      <span class="text-gray-300">Actions</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-gray-200">
                  @foreach ($books as $book)
                  <tr class="bg-white border-2 border-gray-200">
                    <td class="px-6 py-2 flex flex-row items-center">
                      <img
                        class="h-10 w-12 object-cover "
                        src="{{ Storage::url($book->cover) }}"
                        alt=""
                      />
                    </td>
                    <td>
                      <a href="{{ route('admin.book.show', $book->id) }}">
                        <span class="text-center ml-2 font-semibold">{{ $book->title }}</span>
                      </a>
                    </td>
                    <td>
                      <span class="text-center ml-2 font-semibold">{{ $book->description }}</span>
                    </td>
                    <td class="px-16 py-2">
                      <span>05/06/2020</span>
                    </td>
                    <td class="px-16 py-2">
                      <span>10:00</span>
                    </td>
            
                    <td class="px-16 py-2 flex space-x-5">
                      <a href="{{ route('books.edit', $book->id) }}">
                        <span class="text-blue-800">
                          <img src="images/svg/edit.svg" style="height: 20px; width:20px; color:blue;" alt="">
                        </span>
                      </a>
                      &nbsp;
                      <a href="{{ route('books.destroy', $book->id) }}" onclick="return confirm('Are you sure?')">
                        <span class="text-red-800">
                          <img src="images/svg/delete.svg" style="height: 20px; width:20px; color:red; !imporant" alt="">
                        </span>
                      </a>
                      &nbsp;
                      <form action="{{ route('books.destroy') }}" method="post" id="delete">
                        <input type="hidden" name="delete" value="{{ $book->id }}">
                        {{-- <button type="submit" id="delete" onclick="delete(event)" class="text-red-800">
                          <img src="images/svg/delete.svg" style="height: 20px; width:20px; color:red; !imporant" alt="">
                        </button> --}}
                        {{-- <button type="submit">Del </button> --}}
                        {{-- <input type="submit" onclick="return confirm('Are you sure you want to delete this?')" value="X" /> --}}
                        {{-- <a href="{{ route('books.destroy') }}/{{ $book->id }}" onclick="return confirm('Are you sure?')"><img src="images/svg/delete.svg" style="height: 15px; width:15px; color:red; !imporant" alt=""></a> --}}
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function delete() {
    alert("Javascript working");
    // e.preventDefault();
    // let del = document.getElementById("delete");
    //  if (!confirm('Do you want to submit?')) {
    //      del.submit();
    //  } else {
    //      return false;
    //  }
  }

</script>
</x-app-layout>
