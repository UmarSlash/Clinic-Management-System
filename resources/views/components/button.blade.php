<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'block w-full select-none rounded-lg bg-gradient-to-tr from-teal-600 to-teal-400 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-teal-500/20 transition-all hover:shadow-lg hover:shadow-teal-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none'
]) }}>
{{ $slot }}
</button>
