@props(['userFavCurrencies' => [], 'title'])
<div class="bg-gray-100 h-screen p-4">
    <h2 class="text-lg font-semibold text-center">
        {{ $title }}
    </h2>
    <ul class="mt-4">
       {{ $slot }}
    </ul>
</div>
