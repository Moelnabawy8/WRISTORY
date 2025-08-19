@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 
                    shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 
                    px-4 py-2 text-sm placeholder-gray-400 dark:placeholder-gray-300 transition duration-150 ease-in-out'
    ]) }} 
/>
