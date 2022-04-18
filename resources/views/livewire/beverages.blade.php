<div>
    <button wire:click.prevent="create"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add new product
    </button>

    <table class="table min-w-full mt-4">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Name</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Price</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    {{ $product->name }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    {{ $product->price }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    <button
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                        wire:click.prevent="edit({{ $product->id }})">Edit
                    </button>
                    <button
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                        wire:click.prevent="delete({{ $product->id }})"
                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No products found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $products->links() }}

    <div
        class="@if (!$showModal) hidden @endif flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
        <div class="bg-white rounded-lg w-1/2">
            <form wire:submit.prevent="save" class="w-full">
                <div class="flex flex-col items-start p-4">
                    <div class="flex items-center w-full border-b pb-4">
                        <div class="text-gray-900 font-medium text-lg">{{ $productId ? 'Edit Product' : 'Add New Product' }}</div>
                        <svg wire:click="close"
                             class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                        </svg>
                    </div>
                    <div class="w-full">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Name
                        </label>
                        <input wire:model.defer="product.name"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"/>
                    </div>
                    <div class="py-4 border-b w-full mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Price
                        </label>
                        <input wire:model.defer="product.price"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"/>
                    </div>
                    <div class="ml-auto">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">{{ $productId ? 'Save Changes' : 'Save' }}
                        </button>
                        <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded"
                                wire:click="close"
                                type="button"
                                data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

