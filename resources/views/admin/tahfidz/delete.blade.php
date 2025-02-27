@foreach ($tahfidz as $data)
    <p>{{ $data->santri_id }} - {{ $data->surat }} {{ $data->ayat }}</p>
    <form action="{{ route('tahfidz.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
@endforeach
