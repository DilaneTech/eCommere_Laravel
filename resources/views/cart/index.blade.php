@extends('static.header')

@section('content')

    <!-- cart-main-area start -->
    @if(\Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                                        <tr>
                                            <td class="product-thumbnail"><img src="{{$product->model->image}}" alt="product img" /></td>
                                            <td class="product-name">{{$product->model->title}}</td>
                                            <td class="product-price"><span class="amount">{{$product->model->getPrice()}}</span></td>
                                            <td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">£165.00</td>
                                            <td class="product-remove">
                                                <form action="{{route('cart.destroy', $product->rowId)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <input type="submit" value="Update Cart" />
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input type="text" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table>
                                            <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Sous-total</th>
                                                <td><span class="amount">{{getPrice(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}</span></td>
                                            </tr>
{{--                                            <tr class="shipping">--}}
{{--                                                <th>Shipping and Handling</th>--}}
{{--                                                <td><span class="amount">£215.00</span></td>--}}
{{--                                            </tr>--}}
                                            <tr class="tax">
                                                <th>Taxe</th>
                                                <td><span class="amount">{{getPrice(\Gloudemans\Shoppingcart\Facades\Cart::tax())}}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <strong><span class="amount">{{getPrice(\Gloudemans\Shoppingcart\Facades\Cart::total())}}</span></strong>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="checkout.html">Passer a la caisse</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @else
        <h2 class="text-center">Votre Panier est vide.</h2>
    @endif
    <!-- cart-main-area end -->


@endsection
