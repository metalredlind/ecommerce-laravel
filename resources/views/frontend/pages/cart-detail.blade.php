@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Cart details
@endsection

@section('content')
    <!--============================
            BREADCRUMB START
        ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BREADCRUMB END
        ==============================-->


    <!--============================
            CART VIEW PAGE START
        ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_status">
                                            status
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_tk">
                                            price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn">clear cart</a>
                                        </th>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="images/pro9_9.jpg" alt="product"
                                                class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>men's fashion sholder leather bag</p>
                                            <span>color: red</span>
                                            <span>size: XL</span>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>in stock</p>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100"
                                                    value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$180,00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img">
                                            <img src="images/pro4.jpg" alt="product" class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>mean's casula fashion watch</p>
                                            <span>color: black</span>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>in stock</p>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100"
                                                    value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$140,00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img">
                                            <img src="images/blazer_1.jpg" alt="product" class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>product name and details</p>
                                            <span>color: black</span>
                                            <span>size: M</span>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <span>almost gone</span>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100"
                                                    value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$220,00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img">
                                            <img src="images/pro2.jpg" alt="product" class="img-fluid w-100">
                                        </td>
                                        <td class="wsus__pro_name">
                                            <p>product name and details</p>
                                            <span>color: black</span>
                                            <span>size: L</span>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>in stock</p>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100"
                                                    value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$180.00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span>$124.00</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span>$10.00</span></p>
                        <p class="total"><span>total:</span> <span>$134.00</span></p>

                        <form>
                            <input type="text" placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="check_out.html">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i
                                class="fab fa-shopify"></i> go shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
              CART VIEW PAGE END
        ==============================-->
@endsection
