@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Wishlist
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
                        <h4>wishlist</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Wishlist</a></li>
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
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
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
                                            action
                                        </th>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="images/pro9_9.jpg" alt="product"
                                                class="img-fluid w-100">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>men's fashion sholder leather bag</p>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>in stock</p>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100" value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$180,00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a class="common_btn" href="#">add to cart</a>
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img">
                                            <img src="images/pro4.jpg" alt="product" class="img-fluid w-100">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>mean's casula fashion watch</p>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>in stock</p>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100" value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$140,00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a class="common_btn" href="#">add to cart</a>
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img">
                                            <img src="images/blazer_1.jpg" alt="product" class="img-fluid w-100">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>product name and details</p>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <span> out of stock</span>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100" value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$220,00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a class="common_btn" href="#">add to cart</a>
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img">
                                            <img src="images/pro2.jpg" alt="product" class="img-fluid w-100">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>
                                        <td class="wsus__pro_name">
                                            <p>product name and details</p>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>in stock</p>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <form class="select_number">
                                                <input class="number_area" type="text" min="1" max="100" value="1" />
                                            </form>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>$180.00</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a class="common_btn" href="#">add to cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
