<div>
    @if (session('success'))
        {{ session('success') }}
    @endif

    @foreach ($animales as $animal)
        {{$animal->especie}} <br>
        <a href="{{route('animales.edit', $animal)}}">Editar</a>
    @endforeach
</div>
