<div
    class="relative p-6 bg-gradient-to-r from-blue-100 to-indigo-200 rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 block  max-w-sm">
    @can($permission)
        <div class="flex absolute top-2 right-2 justify-end space-x-4 items-center">
            {{ $slot }}
        </div>
    @endcan
    <div class="pt-8">
        <a href="{{ route('works.index', ['field' => $field, 'value' => $model->id, 'filter' => $title]) }}"
            class="">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $title }}</h5>
            <div class="flex justify-between">
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $subtitle }}.</p>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $model->works->count() }}
                    registros
                </p>
            </div>
        </a>
    </div>
   
</div>