
<div>
     <x-mary-header title="Token Distribution">

    </x-mary-header>

    {{-- <div class="flex space-x-4">
        @foreach($branches as $branch)
            <div class="shadow-xl card w-96 bg-base-100">
                <div class="card-body">
                    <h2 class="font-bold card-title">{{ $branch->branchName }}</h2>
                    <p>Total Token: 500</p>
                    <div class="justify-end card-actions">
                    <button class="btn btn-primary">Add Token</button>
                    </div>
                </div>
            </div>
        @endforeach

</div> --}}

{{--
<div class="flex flex-col space-y-4 sm:flex-row sm:space-x-4 sm:space-y-0">
    @foreach($branches as $branch)

    @endforeach
</div> --}}

<div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 lg:grid-cols-4">
          @foreach($branches as $branch)
 <div class="w-full shadow-xl card sm:w-96 bg-base-100">
            <div class="card-body">
                <h1 class="font-bold card-title">{{ $branch->branchName }}</h1>
                <p>Total Token: {{ $branch->no_of_token_availabe }}</p>
                <div class="justify-end card-actions">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Add Token
                    </span>

                </div>
            </div>
        </div>     @endforeach
    </div>






</div>

