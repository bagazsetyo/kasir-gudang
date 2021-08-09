<div>
    <section class="container px-6 py-4 mx-auto">
        <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($items as $i)
            <div class="items-center p-4 bg-white border-2 border-gray-200 rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex justify-center items-center text-center">
                <p class="mb-2 text-sm font-medium text-gray-900">
                    {!! DNS1D::getBarcodeHTML($i->uuid, 'EAN8'); !!}
                </p>
                </div>
                <div class="flex justify-center items-center text-center">
                    <p class="block text-sm font-normal text-gray-800">{{ $i->uuid }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    {{ $items->links() }}
</div>
