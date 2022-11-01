<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Paypal payment</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2><a href="{{route('product.cart')}}" class="btn btn-success">Back to shop</a></h2>
            <h3 class="text-center" style="margin-top: 90px">Payment Information</h3>
            <div class="panel panel-default" style="margin-top: 60px">
                @if($message = \Session::get('success'))
                    <div class="alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            {!! $message !!}
                        </button>
                    </div>
                    <?php \Session::forget('success'); ?>
                @endif

                    @if($message = \Session::get('error'))
                        <div class="alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                {!! $message !!}
                            </button>
                        </div>
                        <?php \Session::forget('error'); ?>
                    @endif

                    <div class="panel-heading"><strong>Pay With Paypal</strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{route('paypal')}}">
                        @csrf
                        <div class="form-group {{ $errors->has('amount')?'has-error':'' }}">
                            <label for="amount" class="col-md-4">Enter Amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" readonly name="amount" value="{{session()->get('checkout')['total']}}" autofocus class="form-control">
                                @error('amount')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary" type="submit">
                                    Pay With Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                    <br>
                    <div class="panel-heading"><strong>Products Name</strong></div>
                    <ul class="products-cart">
                        @foreach (Cart::instance('cart')->content() as $item)
                            <li class="pr-cart-item">
                                <div class="product-name">
                                    <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                                <div class="price-field sub-total"><p class="price">${{ $item->subtotal}}</p></div>
                            </li>
                        @endforeach
                    </ul>
                    </div>
        </div>
            <div class=" main-content-area">
                    <div class="wrap-iten-in-cart">
                        @if(Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>Success</strong> {{Session::get('success_message')}}
                            </div>
                        @endif
                    </div>
            </div>
        </div>

    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
