@props(['jop'])
<x-panel class="flex flex-col text-center ">
    <div class="self-start text-sm">{{ $jop->employer->name }}</div>
    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl  font-bold transition-colors duration-1000">
            <a href="{{ $jop->URL }}" target="_blank">
                {{ $jop->title }}
            </a>
        </h3>
        <p class="text-sm mt-4">{{ $jop->salary }} </p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($jop->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>
        <x-employer-logo :employer="$jop->employer" : width="42" />
    </div>
</x-panel>
