@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Akun Admin</h5>
        <p>Menu "Daftar Akun Admin" memungkinkan admin untuk mengelola, memantau, dan memperbarui informasi Akun Admin secara efisien</p>

        <a href="{{route('admin.create')}}" class="btn btn-success btn-sm mb-4">
            <i class="fas fa-plus"></i> Tambah
        </a>
        <table id="zero-conf" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>username</th>
                    <th>email</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->email}}</td>
                    <td class="d-flex">
                        <a href="{{route('admin.edit', $admin->id)}}" class="btn btn-warning btn-sm ">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('admin.show', $admin->id)}}" class="btn btn-info btn-sm mx-2">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{route('admin.destroy', $admin->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" >
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>username</th>
                    <th>email</th>
                    <th>aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@push('custom-style')
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{asset('assets/css/main.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
@endpush


@push('custom-script')
      <!-- Javascripts -->
      <script src="{{asset('assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="https://unpkg.com/feather-icons"></script>
      <script src="{{asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
      <script src="{{asset('assets/plugins/DataTables/datatables.min.js')}}"></script>
      <script src="{{asset('assets/js/main.min.js')}}"></script>
      <script src="{{asset('assets/js/pages/datatables.js')}}"></script>
@endpush
