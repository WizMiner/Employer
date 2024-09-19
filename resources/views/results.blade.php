<x-layout>
    <x-pageheading>Results</x-pageheading>

    <div class="space-y-6">

        @foreach ($jops as $jop )

        <x-jop-card-wide :$jop />
            
        @endforeach

    </div>
</x-layout>
