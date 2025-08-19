<button 
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center justify-center w-full px-4 py-2 
                    bg-blue-600 !important border border-transparent rounded-md font-medium text-sm 
                    text-white uppercase tracking-wide shadow-sm 
                    hover:bg-blue-700 !important
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                    transition duration-150 ease-in-out'
    ]) }}
>
    {{ $slot }}
</button>
