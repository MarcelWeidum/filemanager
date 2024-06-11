<div x-cloak x-data="{ show: false }"
    x-on:load-media.window="show = true"
    x-on:reset-media.window="show = false"
    :class="{ 'block animate-[slideIn_0.5s_forwards]': show, 'hidden animate-[slideOut_0.5s_forwards]': !show }"
    class="absolute w-screen max-w-md top-0 right-0 bottom-0">
        <div class="bg-white border-l min-h-full border-slate-300 p-4 relative">
            <div class="ml-3 absolute right-4 top-4 flex h-7 items-center">
                <button @click="Livewire.dispatch('reset-media', { media_id: null })" type="button" class="relative rounded-md border text-slate-500 border-slate-300 p-1 focus:outline-none focus:ring-2 focus:ring-white" @click="open = false">
                    <span class="absolute -inset-2.5"></span>
                    <span class="sr-only">Close panel</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            @if($media)
                <div class="px-4">
                    @if($media->hasGeneratedConversion('thumbnail'))
                        <img src="{{ $media->getUrl('thumbnail') }}" class="mx-auto shadow border p-1 bg-white max-w-20 max-h-20 mb-2" alt="folder">
                    @else
                        <x-dynamic-component :component="'livewire-filemanager::icons.mimes.' . getFileType($media->mime_type)" class="mx-auto w-16 h-16 mb-2.5" />
                    @endif
                </div>

                <ul class="mt-12 border-t pt-4">
                    <li>
                        <strong>{{ $media->name }}</strong>
                    </li>
                    <li>
                        {{ $media->mime_type }} - {{ $media->human_readable_size }}
                    </li>
                </ul>

                <div class="pb-4 pt-4">
                    <div class="flex text-sm">
                        <button type="button" wire:click.prevent="$dispatch('copy-link', { link: '{{ getMediaFullPath($media) }}' })" class="group inline-flex items-center font-medium text-blue-500 group-hover:text-blue-900">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z"></path>
                                <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z"></path>
                            </svg>
                            <span class="ml-2">{{ __('livewire-filemanager::filemanager.actions.copy_url') }}</span>
                        </button>
                    </div>
                </div>

                <div class="mt-4">
                    <strong>Informations</strong>
                    <dl class="mt-2 divide-y divide-gray-200 border-b border-t border-gray-200">
                        <div class="flex justify-between py-3 text-sm font-medium">
                            <dt class="text-gray-500">{{ __('livewire-filemanager::filemanager.created') }}</dt>
                            <dd class="text-gray-900">{{ $media->created_at->diffForHumans() }}</dd>
                        </div>
                        <div class="flex justify-between py-3 text-sm font-medium">
                            <dt class="text-gray-500">{{ __('livewire-filemanager::filemanager.modified') }}</dt>
                            <dd class="text-gray-900">{{ $media->updated_at->diffForHumans() }}</dd>
                        </div>
                    </dl>
                </div>
            @endif
        </div>
</div>
