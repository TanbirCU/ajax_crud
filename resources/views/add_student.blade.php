@extends('master')

@section('title')
add-student

@endsection

@section('body')
<section class="py-5">

    <div class="container">
        <div class="row">
            @if(session('success'))
            <script>
                toastr.success('{{ session('success') }}');
            </script>
        @endif
            <div class="col-md-8  mx-auto">
                <div class="card shadow">
                    <div class="card-header text-center">Add Student</div>
                    <div class="card-body">
                        {{-- <h4 class="text-success text-center">{{ Session::get('message') }}</h4> --}}
                        <form action="{{ route('student_add') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="mobile">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-outline-success"  value="Add Student">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection
