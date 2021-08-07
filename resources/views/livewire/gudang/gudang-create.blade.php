<div>
    
    @if($errors->any())
        <div role="alert">
            <div class="border border-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </p>
            </div>
        </div>
    @endif
    <div class="">
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="block relative">
                <input
                    wire:model="nama" 
                    placeholder="Nama"
                    class="appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none " />
            </div>
            <div class="block relative">
                <input
                    wire:model="qty" 
                    placeholder="Quantity"
                    type="number"
                    class="uppercase appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div> 
            <div class="block relative">
                <input
                    wire:model="price" 
                    placeholder="Price"
                    type="number"
                    class="uppercase appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div> 
            <button wire:click="store" 
                    class="block h-10 uppercase float-right shadow bg-blue-500 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 ">
                Create
            </button>
        </div>   
    </div>    
</div>
