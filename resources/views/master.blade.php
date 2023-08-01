<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- ajax  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.min.css">
      <!-- Toastr CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

      <!-- jQuery -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <!-- Toastr JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      {{-- line awosome --}}
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
      <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">LOGO</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('master') }}" class="nav-link">Home</a></li>
                <li><a href="{{ route('add-student') }}" class="nav-link">Add_Student</a></li>
                <li><a href="{{ route('add-product') }}" class="nav-link">Add-product</a></li>

            </ul>
        </div>

    </nav>

    @yield('body')

<script src="{{ asset('/') }}js/bootstrap.min.js""></script>
<script src="{{ asset('/') }}js/bootstrap.min.js""></script>
{{-- <link rel="stylesheet" href="{{ asset('/') }}js/jquery-3.6.0.min.js"> --}}
{{-- <link rel="stylesheet" href="{{ asset('/') }}js/bootstrap.min.js"> --}}
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

});
</script>
<script>
    $(document).ready(function(){

        $(document).on('click', '[data-toggle="modal"]', function() {
                var target = $(this).data('target');
                $(target).modal('show');
            });
            $(document).on('click', '[data-dismiss="modal"]', function() {
            var modal = $(this).closest('.modal');
            modal.modal('hide');
        });
        //ajax-----
        //add product
        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            // console.log(name+price);
            $.ajax({
                // url: "{{ route('create_product') }}",
                url: "{{ url('product-create') }}",
                method:'post',
                data:{name:name,price:price},
                success:function(res){
                    if(res.status=='success'){

                        $('#exampleModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        // $('.table').load(location.href+' .table');
                        productShow()
                        //toaster
                        Command: toastr["success"]("Product Added successfully", "success")

                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                    }
                    // a();

                },error:function(err){

                    let error = err.responseJSON;
                    $.each(error.errors,function(index,value) {
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');

                    });


                }
            });
        });

        // update product
        $(document).on('click','.upProductForm',function(e){
            e.preventDefault();
            let id = $(this).data('id');
            $('#up_id').val(id);
            $('#updateModal').modal('show');
            $.ajax({
                url: "{{ route('product.edit', '') }}" + '/' + id,
                method:'get',
                data:{id: id},
                success:function(res){
                    $('#up_name').val(res.name);
                    $('#up_price').val(res.price);
                },
                error: function(err) {
                    console.error("Error fetching product details:", err);
                }
            });

        });
        $(document).on('click','.update_product',function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();

            // console.log(name+price);
            $.ajax({

                url: "{{ route('product.update') }}",
                method:'post',
                data:{up_id:up_id,up_name:up_name,up_price:up_price},
                dataType: 'json',
                success:function(res){
                    if(res.status=='success'){
                        $('#updateModal').modal('hide');
                        $('#upProductForm')[0].reset();
                        // productShow();
                        //toaster
                        Command: toastr["success"]("Product Updated successfully", "success")

                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }

                    }
                    productShow();


                },error:function(err){

                    let error = err.responseJSON;
                    $.each(error.errors,function(index,value) {
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');

                    });


                }
            });

        });
        //delete product
        $(document).on('click','.delete_product',function(e){
                e.preventDefault();
                let product_id = $(this).attr('id');
                // alert(product_id);
                // console.log(product_id);
            if(confirm('Are you sure want to delete product?')){
                $.ajax({
                    url: "{{ url('delete-product') }}",
                    method:'post',
                    data:{product_id:product_id},
                    // console.log(product_id);
                    success:function(res){


                        if(res.status=='success'){
                            productShow();
                            // $('.table').load(location.href+' .table');
                            //toaster
                            Command: toastr["success"]("Product Deleted Successfully", "success")

                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                    },
                    error:function(er){
                        console.log(er);
                    }

                });
            }

        });

        // pagination
        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            product(page)

        });
        function product(page){

            $.ajax({
                url:"/pagination/paginate-data?page="+page,

                success:function(res){
                    $('.table-data').html(res);


                }
            });
        }

        //search
        $(document).on('keyup',function(e){
            e.preventDefault();
            let search_string = $('#search').val();
            // console.log(search_string);
            $.ajax({
                url:"{{ route('product_search') }}",
                method:'GET',
                data:{search_string:search_string},
                success:function(res){
                    $('.table-data').html(res);
                    // productShow();
                    if(res.status=='nothing found'){
                        $('.table-data').html("<span class='text-danger'>nothing found</span>");
                    }
                }
            })
        });



        //fuction

        productShow();

        function productShow(){
            $.ajax({
                url: "{{ url('productview') }}",
                method:'get',
                dataType:'html',
                success:function(res){
                    console.log(res);
                    $("#product-view").html(res);

                },
                error:function(e){
                    console.log(e);
                }
            });

        }

        //add
        // addProduct();
        // function addProduct(){
        //     $.ajax({
        //         url: "{{ url('addProduct') }}",
        //         method:'get',
        //         dataType:'html',
        //         success:function(res){
        //             // console.log(res);
        //             $(".add_product").html(res);

        //         },
        //         error:function(e){
        //             console.log(e);
        //         }
        //     });

        // }




    });






</script>
@include('addProduct_js')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

</body>
</html>
