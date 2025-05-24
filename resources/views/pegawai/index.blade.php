<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawais as $pegawai)
            <tr>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->divisi }}</td>
                <td>
                    @if($pegawai->foto)
                        <img src="{{ asset('image/' . $pegawai->foto) }}" alt="Foto Pegawai" width="100">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td>
                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
