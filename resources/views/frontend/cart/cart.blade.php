@extends('frontend.master')

@section('body')
    {{--<script>
       $(document).read(function () {
           @foreach($cartItems as $item)
          $("update_cart").submit(function () {
             var rowId =  $("rowId").val();
             var newQty = $("qty").val();
             $.ajax({
                 url:'{{route('update_cart')}}',
                 data: 'rowId' + rowId + 'qty' + newQty,
                 type: 'get',
                 success:function (response) {
                     console.log(response);
                 }
             });
          });
          @endforeach
       });

    </script>
--}}
    <script>
        $(document).ready(function () {
            $('#submit').click(function() {


                var form1 = $('#customer_form').serialize();
                var form2 = $('#shipping').serialize();
                //var form4 = new FormData($("#imagesform").get(0));
                //alert(form4);

              /*  $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN':
                            $('meta[name="_token"]').attr('content') }
                });*/

                $.ajax({
                    url      :"{{route('customer_registration')}}",
                    type: 'POST',
                    data: {form1: form1, form2: form2},
                    dataType:'json',
                    success:function(data){
                        alert(data);

                    }

                });
            });
        });
/*
        submitforms = function() {
            document.forms['customer_form'].action='';
            document.forms['customer_form'].submit();
            document.forms['shipping'].action='';
            document.forms['shipping'].submit();
            /!* document.forms["customer_form"].submit();
             document.forms["shipping"].submit();*!/
        }
*/

            /*$('#submit').onclick(function(){
                var data = $("#customer_form").serialize() + "&" + $("#shipping").serialize();
                $.ajax({
                    url  : ,
                    method : "post",
                    data : data,
                    success : function(d){
                        alert(d);
                    }
                });
            });*/

    </script>

<section class="main-container col1-layout">
    <div class="main container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="product-area">
                    <div class="title-tab-product-category">
                        <div class="text-center">
                            <ul class="nav jtv-heading-style" role="tablist">
                                <li role="presentation" class="active"><a href="#cart" aria-controls="cart" role="tab" data-toggle="tab">1 Shopping cart</a></li>
                                <li role="presentation" class=""><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab">2 Checkout</a></li>
                                <li role="presentation" class=""><a href="#complete-order" aria-controls="complete-order" role="tab" data-toggle="tab">3 Complete Order</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-tab-product-category">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="cart">
                                <!-- cart are start-->
                                <div class="cart-page-area">
                                    <form method="post" action="">
                                        <div class="table-responsive">

                                            <table class="shop-cart-table">
                                                <thead>
                                                <tr>
                                                    <th class="product-thumbnail ">Image</th>
                                                    <th class="product-name ">Product Name</th>
                                                    <th class="product-price ">Unit Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal ">Total</th>
                                                    <th class="product-remove">Remove</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cartItems as $item)
                                                <tr class="cart_item">

                                                    <td class="item-img"><a href="#"><img src="{{asset('uploads/ProductImage/'.$item->options->image)}}" alt="{{$item->name}}"> </a></td>
                                                    <td class="item-title"><a href="#">{{$item->name}} </a></td>
                                                    <td class="item-price"> ${{$item->price}} </td>
                                                    <td class="item-qty"><div class="cart-quantity">
                                                            <div class="product-qty">
                                                                <div class="cart-quantity">
                                                                    <div class="cart-plus-minus">


                                                                        <div class="inc qtybutton" onClick=" var rowID =  document.getElementById('rowId{{$item->id}}'); var ID = rowID.value;   var result = document.getElementById('qty{{$item->id}}');  var qty = result.value; if( !isNaN( qty )) result.value--; var newqty = result.value; $.ajax({
                                                                                url:'{{route('update_cart')}}',
                                                                                data: 'rowID=' + ID + '&newQty=' + newqty,
                                                                                type: 'get',
                                                                                success:function (response) {
                                                                                console.log(response);
                                                                                location.reload();

                                                                                }
                                                                                });" >-</div>
                                                                        <input value="{{$item->qty}}" maxlength="12" id="qty{{$item->id}}" name="qty" class="cart-plus-minus-box" type="text">
                                                                        <input value="{{$item->rowId}}"  id="rowId{{$item->id}}" type="hidden">
                                                                        <div class="inc qtybutton" onClick=" var rowID =  document.getElementById('rowId{{$item->id}}'); var ID = rowID.value;   var result = document.getElementById('qty{{$item->id}}');  var qty = result.value; if( !isNaN( qty )) result.value++; var newqty = result.value; $.ajax({
                                                                                url:'{{route('update_cart')}}',
                                                                                data: 'rowID=' + ID + '&newQty=' + newqty,
                                                                                type: 'get',
                                                                                success:function (response) {
                                                                                console.log(response);
                                                                                location.reload();

                                                                                }
                                                                        });"  >+</div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div></td>
                                                    <td class="total-price"><strong> ${{$item->price * $item->qty}}</strong></td>
                                                    <td class="remove-item">
                                                        <a href="{{route('delete-cart-item', $item->rowId)}}"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            {{--    <tr class="cart_item">
                                                    <td class="item-img"><a href="#"><img src="images/products/product-fashion-1.jpg" alt="Product tilte is here "> </a></td>
                                                    <td class="item-title"><a href="#">Product tilte is here </a></td>
                                                    <td class="item-price"> $139.00 </td>
                                                    <td class="item-qty"><div class="cart-quantity">
                                                            <div class="product-qty">
                                                                <div class="cart-quantity">
                                                                    <div class="cart-plus-minus">
                                                                        <div class="dec qtybutton">-</div>
                                                                        <input value="1" name="qtybutton" class="cart-plus-minus-box" type="text">
                                                                        <div class="inc qtybutton">+</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></td>
                                                    <td class="total-price"><strong> $139.00</strong></td>
                                                    <td class="remove-item"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="item-img"><a href="#"><img src="images/products/product-fashion-1.jpg" alt="Product tilte is here "> </a></td>
                                                    <td class="item-title"><a href="#">Product tilte is here </a></td>
                                                    <td class="item-price"> $99.00 </td>
                                                    <td class="item-qty"><div class="cart-quantity">
                                                            <div class="product-qty">
                                                                <div class="cart-quantity">
                                                                    <div class="cart-plus-minus">
                                                                        <div class="dec qtybutton">-</div>
                                                                        <input value="1" name="qtybutton" class="cart-plus-minus-box" type="text">
                                                                        <div class="inc qtybutton">+</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></td>
                                                    <td class="total-price"><strong> $99.00</strong></td>
                                                    <td class="remove-item"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="item-img"><a href="#"><img src="images/products/product-fashion-1.jpg" alt="Product tilte is here "> </a></td>
                                                    <td class="item-title"><a href="#">Product tilte is here </a></td>
                                                    <td class="item-price"> $79.00 </td>
                                                    <td class="item-qty"><div class="cart-quantity">
                                                            <div class="product-qty">
                                                                <div class="cart-quantity">
                                                                    <div class="cart-plus-minus">
                                                                        <div class="dec qtybutton">-</div>
                                                                        <input value="1" name="qtybutton" class="cart-plus-minus-box" type="text">
                                                                        <div class="inc qtybutton">+</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></td>
                                                    <td class="total-price"><strong> $79.00</strong></td>
                                                    <td class="remove-item"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="cart-bottom-area">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-7 col-xs-12">
                                                    <div class="update-coupne-area">
                                                        <div class="update-continue-btn text-right">
                                                            <button class="button btn-continue" title="Continue Shopping" type="button"><span>Continue Shopping</span></button>
                                                            <button class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span>Clear Cart</span></button>
                                                            <button class="button btn-update" title="Update Cart" value="update_qty" id="update_cart" name="update_cart_action" type="submit"><span>Update Cart</span></button>
                                                        </div>
                                                        <div class="coupn-area">
                                                            <div class="discount">
                                                                <h3>Discount Codes</h3>
                                                                <label for="coupon_code">Enter your coupon code if you have one.</label>
                                                                <input type="hidden" value="0" id="remove-coupone" name="remove">
                                                                <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                                                <button value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Apply Coupon</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-5 col-xs-12">
                                                    <div class="cart-total-area">
                                                        <div class="catagory-title cat-tit-5 text-right">
                                                            <h3>Cart Totals</h3>
                                                        </div>
                                                        <div class="sub-shipping">
                                                            <p>Subtotal <span>$575.00</span></p>
                                                            <p>Shipping <span>$75.00</span></p>
                                                        </div>
                                                        <div class="shipping-method text-right">
                                                            <div class="shipp">
                                                                <input type="radio" name="ship" id="pay-toggle1">
                                                                <label for="pay-toggle1">Flat Rate</label>
                                                            </div>
                                                            <div class="shipp">
                                                                <input type="radio" name="ship" id="pay-toggle3">
                                                                <label for="pay-toggle3">Direct Bank Transfer</label>
                                                            </div>
                                                            <p><a href="#">Calculate Shipping</a></p>
                                                        </div>
                                                        <div class="process-cart-total">
                                                            <p>Total <span>$500.00</span></p>
                                                        </div>
                                                        <div class="process-checkout-btn text-right">
                                                            <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- cart are end-->
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                <!-- Checkout are start-->
                                <div class="checkout-area">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="coupne-customer-area mb50">
                                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-checkout">
                                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                                <h4 class="panel-title"> <img src="images/acc.jpg" alt=""> Returning customer? <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Click here to login </a> </h4>
                                                            </div>
                                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                <div class="panel-body">
                                                                    <div class="sm-des"> If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section. </div>
                                                                    <div class="first-last-area">
                                                                        <div class="input-box">
                                                                            <label>User Name Or Email</label>
                                                                            <input type="email" placeholder="Your Email" class="info" name="email">
                                                                        </div>
                                                                        <div class="input-box">
                                                                            <label>Password</label>
                                                                            <input type="password" placeholder="Password" class="info" name="padd">
                                                                        </div>
                                                                        <div class="frm-action cc-area">
                                                                            <div class="input-box tci-box"> <a href="#" class="btn-def btn2">Login</a> </div>
                                                                            <span>
                                        <input type="checkbox" class="remr">
                                        Remember me </span> <a class="forgotten forg" href="#">Forgotten Password</a> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-checkout">
                                                            <div class="panel-heading" role="tab" id="headingThree">
                                                                <h4 class="panel-title"> <img src="images/acc.jpg" alt=""> Have A Coupon? <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Click here to enter your code </a> </h4>
                                                            </div>
                                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                <div class="panel-body coupon-body">
                                                                    <div class="first-last-area">
                                                                        <div class="input-box">
                                                                            <input type="text" placeholder="Coupon Code" class="info" name="code">
                                                                        </div>
                                                                        <div class="frm-action">
                                                                            <div class="input-box tci-box"> <a href="#" class="btn-def btn2">Apply Coupon</a> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="billing-details">
                                                            <div class="contact-text right-side">
                                                                <h2>Billing Details</h2>
                                                                <form id="customer_form" name="customer_form"  method="post">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>First Name <em>*</em></label>
                                                                                <input type="text" name="bfname" class="info" placeholder="First Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Last Name<em>*</em></label>
                                                                                <input type="text" name="blname" class="info" placeholder="Last Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Company Name</label>
                                                                                <input type="text" name="bcpany" class="info" placeholder="Company Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Email Address<em>*</em></label>
                                                                                <input type="email" name="bemail" class="info" placeholder="Your Email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Phone Number<em>*</em></label>
                                                                                <input type="text" name="bphone" class="info" placeholder="Phone Number">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Country <em>*</em></label>
                                                                                <select name="bcountry" class="selectpicker select-custom" data-live-search="true">
                                                                                    <option data-tokens="Bangladesh">Bangladesh</option>
                                                                                    <option data-tokens="India">India</option>
                                                                                    <option data-tokens="Pakistan">Pakistan</option>
                                                                                    <option data-tokens="Pakistan">Pakistan</option>
                                                                                    <option data-tokens="Srilanka">Srilanka</option>
                                                                                    <option data-tokens="Nepal">Nepal</option>
                                                                                    <option data-tokens="Butan">Butan</option>
                                                                                    <option data-tokens="USA">USA</option>
                                                                                    <option data-tokens="England">England</option>
                                                                                    <option data-tokens="Brazil">Brazil</option>
                                                                                    <option data-tokens="Canada">Canada</option>
                                                                                    <option data-tokens="China">China</option>
                                                                                    <option data-tokens="Koeria">Koeria</option>
                                                                                    <option data-tokens="Soudi">Soudi Arabia</option>
                                                                                    <option data-tokens="Spain">Spain</option>
                                                                                    <option data-tokens="France">France</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Address <em>*</em></label>
                                                                                <input type="text" name="badd1" class="info mb-10" placeholder="Street Address">
                                                                                <input type="text" name="badd2" class="info mt10" placeholder="Apartment, suite, unit etc. (optional)">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Town/City <em>*</em></label>
                                                                                <input type="text" name="bcity" class="info" placeholder="Town/City">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>State/Divison <em>*</em></label>
                                                                                <select name="bstate" class="selectpicker select-custom" data-live-search="true">
                                                                                    <option data-tokens="Barisal">Barisal</option>
                                                                                    <option data-tokens="Dhaka">Dhaka</option>
                                                                                    <option data-tokens="Kulna">Kulna</option>
                                                                                    <option data-tokens="Rajshahi">Rajshahi</option>
                                                                                    <option data-tokens="Sylet">Sylet</option>
                                                                                    <option data-tokens="Chittagong">Chittagong</option>
                                                                                    <option data-tokens="Rangpur">Rangpur</option>
                                                                                    <option data-tokens="Maymanshing">Maymanshing</option>
                                                                                    <option data-tokens="Cox">Cox's Bazar</option>
                                                                                    <option data-tokens="Saint">Saint Martin</option>
                                                                                    <option data-tokens="Kuakata">Kuakata</option>
                                                                                    <option data-tokens="Sajeq">Sajeq</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Post Code/Zip Code<em>*</em></label>
                                                                                <input type="text" name="bzipcode" class="info" placeholder="Zip Code">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="create-acc clearfix">
                                                                                <div class="acc-toggle">
                                                                                    <input type="checkbox" id="acc-toggle">
                                                                                    <label for="acc-toggle">Create an Account ?</label>
                                                                                </div>
                                                                                <div class="create-acc-body">
                                                                                    <div class="sm-des"> Create an account by entering the information below. If you are a returning customer please login at the top of the page. </div>
                                                                                    <div class="input-box">
                                                                                        <label>Account password <em>*</em></label>
                                                                                        <input type="password" name="bpass" class="info" placeholder="Password">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="billing-details">
                                                            <div class="right-side">
                                                                <div class="ship-acc clearfix">
                                                                    <div class="ship-toggle">
                                                                        <input type="checkbox" id="ship-toggle">
                                                                        <label for="ship-toggle">Ship to a different address?</label>
                                                                    </div>
                                                                    <div class="ship-acc-body">
                                                                        <form id="shipping" name="shipping" action="" method="post">
                                                                            @csrf

                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>First Name <em>*</em></label>
                                                                                        <input type="text" name="sfname" class="info" placeholder="First Name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Last Name<em>*</em></label>
                                                                                        <input type="text" name="slname" class="info" placeholder="Last Name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Company Name</label>
                                                                                        <input type="text" name="scpany" class="info" placeholder="Company Name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Email Address<em>*</em></label>
                                                                                        <input type="email" name="semail" class="info" placeholder="Your Email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Phone Number<em>*</em></label>
                                                                                        <input type="text" name="sphone" class="info" placeholder="Phone Number">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Country <em>*</em></label>
                                                                                        <select name="scountry" class="selectpicker select-custom" data-live-search="true">
                                                                                            <option data-tokens="Bangladesh">Bangladesh</option>
                                                                                            <option data-tokens="India">India</option>
                                                                                            <option data-tokens="Pakistan">Pakistan</option>
                                                                                            <option data-tokens="Pakistan">Pakistan</option>
                                                                                            <option data-tokens="Srilanka">Srilanka</option>
                                                                                            <option data-tokens="Nepal">Nepal</option>
                                                                                            <option data-tokens="Butan">Butan</option>
                                                                                            <option data-tokens="USA">USA</option>
                                                                                            <option data-tokens="England">England</option>
                                                                                            <option data-tokens="Brazil">Brazil</option>
                                                                                            <option data-tokens="Canada">Canada</option>
                                                                                            <option data-tokens="China">China</option>
                                                                                            <option data-tokens="Koeria">Koeria</option>
                                                                                            <option data-tokens="Soudi">Soudi Arabia</option>
                                                                                            <option data-tokens="Spain">Spain</option>
                                                                                            <option data-tokens="France">France</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Address <em>*</em></label>
                                                                                        <input type="text" name="sadd1" class="info mb-10" placeholder="Street Address">
                                                                                        <input type="text" name="sadd2" class="info mt10" placeholder="Apartment, suite, unit etc. (optional)">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Town/City <em>*</em></label>
                                                                                        <input type="text" name="scity" class="info" placeholder="Town/City">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>State/Divison <em>*</em></label>
                                                                                        <select name="sstate" class="selectpicker select-custom" data-live-search="true">
                                                                                            <option data-tokens="Barisal">Barisal</option>
                                                                                            <option data-tokens="Dhaka">Dhaka</option>
                                                                                            <option data-tokens="Kulna">Kulna</option>
                                                                                            <option data-tokens="Rajshahi">Rajshahi</option>
                                                                                            <option data-tokens="Sylet">Sylet</option>
                                                                                            <option data-tokens="Chittagong">Chittagong</option>
                                                                                            <option data-tokens="Rangpur">Rangpur</option>
                                                                                            <option data-tokens="Maymanshing">Maymanshing</option>
                                                                                            <option data-tokens="Cox">Cox's Bazar</option>
                                                                                            <option data-tokens="Saint">Saint Martin</option>
                                                                                            <option data-tokens="Kuakata">Kuakata</option>
                                                                                            <option data-tokens="Sajeq">Sajeq</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-box">
                                                                                        <label>Post Code/Zip Code<em>*</em></label>
                                                                                        <input type="text" name="szipcode" class="info" placeholder="Zip Code">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="form">
                                                                    <div class="input-box">
                                                                        <label>Order Notes</label>
                                                                        <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="area-tex"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout are end-->
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in" id="complete-order">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkout-payment-area">
                                            <div class="checkout-total">
                                                <h3>Your order</h3>
                                                <form action="#">
                                                    <div class="table-responsive">
                                                        <table class="checkout-area table">
                                                            <thead>
                                                            <tr class="cart_item check-heading">
                                                                <td class="ctg-type"> Product</td>
                                                                <td class="cgt-des"> Total</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr class="cart_item check-item prd-name">
                                                                <td class="ctg-type"> Product tilte is here × <span>1</span></td>
                                                                <td class="cgt-des"> $129.00</td>
                                                            </tr>
                                                            <tr class="cart_item check-item prd-name">
                                                                <td class="ctg-type"> Product tilte is here × <span>1</span></td>
                                                                <td class="cgt-des"> $76.00</td>
                                                            </tr>
                                                            <tr class="cart_item">
                                                                <td class="ctg-type"> Subtotal</td>
                                                                <td class="cgt-des">$205.00</td>
                                                            </tr>
                                                            <tr class="cart_item">
                                                                <td class="ctg-type">Shipping</td>
                                                                <td class="cgt-des ship-opt"><div class="shipp">
                                                                        <input type="radio" id="pay-toggle" name="ship">
                                                                        <label for="pay-toggle">Flat Rate: <span>$05</span></label>
                                                                    </div>
                                                                    <div class="shipp">
                                                                        <input type="radio" id="pay-toggle2" name="ship">
                                                                        <label for="pay-toggle2">Free Shipping</label>
                                                                    </div></td>
                                                            </tr>
                                                            <tr class="cart_item">
                                                                <td class="ctg-type crt-total"> Total</td>
                                                                <td class="cgt-des prc-total"> $ 200.00 </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="payment-section">
                                                <div class="pay-toggle">
                                                    <form name="payment" action="" method="get">
                                                        <div class="pay-type-total">
                                                            <div class="pay-type">
                                                                <input type="radio" id="pay-toggle01" name="pay">
                                                                <label for="pay-toggle01">Direct Bank Transfer</label>
                                                            </div>
                                                            <div class="pay-type">
                                                                <input type="radio" id="pay-toggle02" name="pay">
                                                                <label for="pay-toggle02">Cheque Payment</label>
                                                            </div>
                                                            <div class="pay-type">
                                                                <input type="radio" id="pay-toggle03" name="pay">
                                                                <label for="pay-toggle03">Cash on Delivery</label>
                                                            </div>
                                                            <div class="pay-type">
                                                                <input type="radio" id="pay-toggle04" name="pay">
                                                                <label for="pay-toggle04">Paypal</label>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <div class="input-box" > <a class="btn-def btn2" href="#"  id="submit">Place order</a> </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="jtv-crosssel-pro">
        <div class="jtv-new-title">
            <h2>you may be interested</h2>
        </div>
        <div class="category-products">
            <ul class="products-grid">
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                                <div class="new-label new-top-left">new</div>
                                <div class="sale-label sale-top-right">sale</div>
                                <div class="mask-shop-white"></div>
                                <div class="new-label new-top-left">new</div>
                                <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                    <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                </a> <a href="compare.html">
                                    <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                </a> </div>
                        </div>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title"> <a title="Product tilte is here" href="#">Product tilte is here </a> </div>
                                <div class="item-content">
                                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                    <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">$75.00</span></span></div>
                                    </div>
                                    <div class="actions"><a href="#" class="link-wishlist" title="Add to Wishlist"></a>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                        <a href="#" class="link-compare" title="Add to Compare"></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                                <div class="mask-shop-white"></div>
                                <div class="new-label new-top-left">new</div>
                                <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                    <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                </a> <a href="compare.html">
                                    <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                </a> </div>
                        </div>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title"> <a title="Product tilte is here" href="#">Product tilte is here </a> </div>
                                <div class="item-content">
                                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                    <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">$88.99</span></span></div>
                                    </div>
                                    <div class="actions"><a href="#" class="link-wishlist" title="Add to Wishlist"></a>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                        <a href="#" class="link-compare" title="Add to Compare"></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                                <div class="mask-shop-white"></div>
                                <div class="new-label new-top-left">new</div>
                                <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                    <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                </a> <a href="compare.html">
                                    <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                </a> </div>
                        </div>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title"> <a title="Product tilte is here" href="#">Product tilte is here </a> </div>
                                <div class="item-content">
                                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                    <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">$149.00</span></span></div>
                                    </div>
                                    <div class="actions"><a href="#" class="link-wishlist" title="Add to Wishlist"></a>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                        <a href="#" class="link-compare" title="Add to Compare"></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="images/products/product-fashion-1.jpg"> </a>
                                <div class="sale-label sale-top-left">sale</div>
                                <div class="mask-shop-white"></div>
                                <div class="new-label new-top-left">new</div>
                                <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                    <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                </a> <a href="compare.html">
                                    <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                </a> </div>
                        </div>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title"> <a title="Product tilte is here" href="#">Product tilte is here </a> </div>
                                <div class="item-content">
                                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                    <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">$139.55</span></span></div>
                                    </div>
                                    <div class="actions"><a href="#" class="link-wishlist" title="Add to Wishlist"></a>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                        <a href="#" class="link-compare" title="Add to Compare"></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection