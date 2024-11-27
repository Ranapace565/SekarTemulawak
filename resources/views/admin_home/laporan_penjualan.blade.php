<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3>Ini Dashboard</h3>
    <div class="container px-4 mx-auto">

        <div class="p-6 m-20 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>

    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
</x-admin_layout>
