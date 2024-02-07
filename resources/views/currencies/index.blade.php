<x-app-layout>
    <div class="flex h-screen bg-gray-200">
        <div class="w-1/5">
            <x-sidebar :title="__('User favorite currencies')"/>
        </div>
        <div class="flex-1 flex-col">
            <div class="p-4">
                @foreach ($currencies as $currency)
                    <x-card :currency="$currency->currency" :code="$currency->code" :mid="$currency->mid">
                        <form method="POST" action="{{ route('currencies.add-favorite', ['currencyId' => $currency->id]) }}">
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
</x-app-layout>
