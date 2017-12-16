@extends('layout.master')

@section('content')
    <div class="widget widget-table action-table">
        <div class="widget-header"><i class="icon-th-list"></i>
            <h3>Maklumat Ahli </h3>
            <a href="/admin/user/create" class="pull-right" style="padding-right: 10px;">
                <button class="btn btn-success">Tambah Ahli <i style="color: white;" class="icon-plus"></i></button>
            </a>
        </div>
        <div class="widget-content" style="padding: 10px;">
        <div style="padding-bottom: 10px;">
            
        </div>
            <br>
            <table id="users" class="table table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Bil</th>
                    <th>No Ahli</th>
                    <th>Gelaran</th>
                    <th>Jawatan</th>
                    <th>Nama Penuh</th>
                    <th>No. MYKAD</th>
                    <th>No. Telefon Bimbit</th>
                    <th>Negeri</th>
                    <th>Tarikh Daftar</th>
                    <th>Arahan</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->no_ahli or null }}</td>
                        <td>{{ $user->title->name or null }}</td>
                        <td>{{ $user->job->name or null }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->no_kp }}</td>
                        <td>{{ $user->no_tel }}</td>
                        <td>{{ $user->state->name or null }}</td>
                        <td>{{ $user->tarikh_daftar !== null ? $user->tarikh_daftar->format('d-M-Y') : null }}</td>
                        <td>
                            <a href="/admin/user/{{ $user->id }}/edit"><button class="btn btn-primary"><i class="icon-edit"></i></button></a>
                            <a href="/admin/user/{{ $user->id }}/delete" onclick="return confirm('Anda pasti untuk buang {{ $user->nama }}?')"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                "language": {
                    "lengthMenu": "Paparkan _MENU_ rekod setiap halaman",
                    "zeroRecords": "Maklumat tidak dijumpai",
                    "info": "Paparan halaman _PAGE_ daripada _PAGES_",
                    "infoEmpty": "Tiada rekod dijumpai",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                        "first": "Pertaman",
                        "last": "Terakhir",
                        "next": "Seterusnya",
                        "previous": "Sebelum"
                    },
                    "search": "Cari:"
                }
            });
        });
    </script>
@endsection