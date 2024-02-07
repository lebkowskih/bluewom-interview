<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-all-favorite-currency')"
>{{ __('Delete all favorite currencies') }}</x-danger-button>

<x-modal name="confirm-delete-all-favorite-currency">
    <form class="p-6" method="POST" action="{{ route('currencies.favorite.delete.all') }}">
        @csrf
        @method('delete')
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete all your favorite currencies?') }}
        </h2>
         <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete currency') }}
                </x-danger-button>
            </div>
    </form>
</x-modal>
