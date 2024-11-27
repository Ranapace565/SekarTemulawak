@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-green-600 text-white' : 'text-green-600 hover:bg-green-600 hover:text-white' }} block rounded-md  px-3 py-2 text-sm font-medium "
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
