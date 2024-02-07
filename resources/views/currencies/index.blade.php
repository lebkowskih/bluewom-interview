<x-app-layout>
    <div class="flex h-screen bg-gray-200">
        <div class="w-1/5">
            <x-sidebar :title="__('User favorite currencies')">
                <ul>
                    @foreach ($favoriteCurrencies as $favoriteCurrency)
                        <li class="flex mb-4">
                            <p class="flex-auto">{{ $favoriteCurrency->code }}</p>
                            @include('currencies.partials.delete-favorite-currency-form')
                        </li>
                    @endforeach
                </ul>
                @include('currencies.partials.delete-all-favorite-currency-form')
            </x-sidebar>
        </div>
        <div class="flex-1 flex-col">
            <div class="p-4">
                @foreach ($currencies as $currency)
                    <x-card :currency="$currency->currency" :code="$currency->code" :mid="$currency->mid">
                        <form method="POST" action="{{ route('currencies.favorite.add', ['currency' => $currency->id]) }}">
                            @csrf
                            <button type="submit" class="btn">
                                {{ __('Add currency to favorite!') }}
                            </button>
                        </form>
                    </x-card>
                @endforeach
            </div>
            <div class="mx-5">
                {{ $currencies->links() }}
            </div>
        </div>
    </div>

    @if ($errors->any())
        <x-modal name="modal" :show="true">
            <div class="py-6 px-6">
                <p class="text-red-700 font-medium">{{ __('You have already added this currency') }}</p>
            </div>
        </x-modal>
    @endif

</x-app-layout>
