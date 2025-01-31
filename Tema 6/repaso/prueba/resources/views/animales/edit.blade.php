<div>
    <form action="{{ route('animales.update', $animal) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label>Especie:</label>
        <input type="text" name="especie" value="{{$animal->especie}}">
        @error('especie')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label>Peso:</label>
        <input type="number" name="peso" step="0.1" value="{{$animal->peso}}">
        @error('peso')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="{{$animal->fecha_nacimiento}}">
        @error('fecha_nacimiento')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label>Imagen:</label>
        <input type="file" name="imagen">
        @error('imagen')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit">Editar</button>
    </form>

</div>
