@props(['disabled' => false])

    <textarea
        {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
    ></textarea>

    {{-- @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif --}}