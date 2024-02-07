@props(['currency', 'code', 'mid'])
<div class="mx-auto bg-white flex w-3/4 border-gray-300 p-10 mb-4">
    <div class="w-1/4">
        <h1 class="font-bold text-xl">{{ $currency }}</h1>
    </div>
    <div class="w-1/4">
        <h1 class="font-bold text-xl">{{ $code }}</h1>
    </div>
    <div class="w-1/4">
        <h1 class="font-bold text-xl">{{ $mid }}</h1>
    </div>
    <div class="w-1/4 align-top">
       {{ $slot }}
    </div>
</div>
