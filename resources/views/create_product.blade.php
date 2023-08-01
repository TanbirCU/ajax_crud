@extends('master')

@section('title')
    add product

@endsection

@section('body')
<section class="py-3">
    {{-- @if(session('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
@endif --}}
    <div class="container">
                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                Add Product
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('create_product') }}" method="post" id="addProductForm">
                @csrf

                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <div class="errMsgContainer">

                        </div>

                    <div class="row form-group mb-3">
                        <label class="col-md-3">Name :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <label class="col-md-3">Price :</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="price" id="price">
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_product">Save Product</button>
                    </div>

                </div>
                </div>

            </div>
        </form>
        <div class="row col-md-12">

        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="search here">
                <div class="card shadow">
                    <div class="card-header">Manage All Product</div>
                    <div class="card-body ">
                        <table class="table table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="product-view" class="table-data">


                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            @include('update_product')
        </div>


    </div>


</section>


@endsection
