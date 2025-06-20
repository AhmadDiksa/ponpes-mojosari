<x-filament::page>
    <div class="flex space-x-6">
        <div class="flex-1">
            {{ $this->form }}
        </div>
        <aside class="w-80 bg-white rounded-lg shadow p-4 overflow-y-auto" style="max-height: 600px;">
            <h2 class="text-lg font-semibold mb-4">Daftar Konten Halaman</h2>
            <ul>
                @foreach ($pageContents as $content)
                    <li class="mb-2">
                        <a href="{{ $resource::getUrl('edit', ['record' => $content]) }}" class="text-blue-600 hover:underline">
                            {{ ucfirst($content->section_name) }} - 
                            @if (is_array($content->content) && !empty($content->content))
                                {{ \Illuminate\Support\Str::limit(strip_tags($content->content[0] ?? ''), 30) }}
                            @else
                                {{ \Illuminate\Support\Str::limit(strip_tags($content->content ?? ''), 30) }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</x-filament::page>
