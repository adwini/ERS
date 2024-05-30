
<div>


{{--
<section class="bg-white dark:bg-gray-900">


<div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 lg:grid-cols-4">
          @foreach($branches as $branch)
 <div class="w-full shadow-xl card sm:w-96 bg-base-100" wire:key"{{ $branch->id}}">
            <div class="card-body">
                <h1 class="font-semibold text-gray-500 sm:text-xl dark:text-gray-400 card-title">{{ $branch->branchName }}</h1>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Total Token: {{ $branch->no_of_token_available }}</p>
                <div class="justify-end card-actions">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Add Token
                    </span>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</section> --}}

    {{-- DEMO --}}
<section class="dark:bg-gray-900">
  <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6 ">
         <x-mary-header title="Token Distribution ">

    </x-mary-header>

      <div class="max-w-screen-sm mx-auto mb-8 text-center lg:mb-16">
          <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Total Tokens nga naa sa admin</h2>
          {{-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> --}}
      </div>
      <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-4">
                  @foreach($branches as $branch)

          <div class="items-center rounded-lg shadow bg-gray-50 sm:flex dark:bg-gray-800 dark:border-gray-700">
              <div class="w-full card sm:w-96" wire:key"{{ $branch->id}}">
            <div class="card-body">
                <h1 class="font-semibold text-gray-500 sm:text-xl dark:text-gray-400 card-title">{{ $branch->branchName }}</h1>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-l dark:text-gray-400">Total Token: {{ $branch->no_of_token_available }}</p>
                <div class="justify-end card-actions">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Add Token
                    </span>

                </div>
            </div>
        </div>
          </div>
          @endforeach

  </div>
</section>





</div>

