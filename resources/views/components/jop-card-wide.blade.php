@props(['jop'])
<x-panel class=" flex gap-x-6">
    <div>
        <x-employer-logo :employer="$jop->employer"/>
    </div>
    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400">{{ $jop->employer->name }}</a>
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-1000">
            <a href="{{ $jop->URL }} "target="_blank">
                {{ $jop->title }} 
            </a>
        </h3>
        <p class="text-sm text-gray-400 mt-auto"> {{ $jop->salary }} </p>
    </div>
    <div>
        @foreach ($jop->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
