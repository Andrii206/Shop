<template>
  <div>
    <header class="header-style-3">
      <!-- Start Desktop Menu -->
      <div class="menubox">
        <div class="container-fluid">
          <div class="row d-lg-none d-block">
            <div class="mobile-menu ">
              <div class="mobile-menu__menu-top border-bottom-0">
                <div class="container">
                  <div class="row">
                    <div class="menu-info d-flex justify-content-between align-items-center">
                      <div class="menubar"> <span></span> <span></span> <span></span> </div> <router-link to="/"
                        class="logo"> <img src="/assets/images/logo/logo.png" alt="Логотип"> </router-link>
                      <div class="cart-holder">
                        <a href="#0" class="cart cart-icon position-relative">
                          <i class="flaticon-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="menu-closer"></div>
              <div class="mobile-menu__sidebar-menu">
                <div class="menu-closer two"> <span> Close Menu</span> <span class="cross"><i
                      class="flaticon-cross"></i></span> </div>
                <div class="search-box-holder">
                  <form action="#0">
                    <div class="form-group search-box menu"> <input type="text" class="form-control"
                        placeholder="Search for products"> <span class="search-icon"> <i
                          class="flaticon-magnifying-glass"></i> </span> </div>
                  </form>
                </div>
                <ul class="page-dropdown-menu">
                  <li class="dropdown-list"> <router-link to="/"> <span>Product </span> </router-link>
                  </li>
                  <li class="dropdown-list"> <router-link to="/products/cart"> <span>Cart </span> </router-link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="d-lg-block d-none">
            <div class="row g-0 position-relative">
              <div class="col-lg-3 d-flex align-items-center justify-content-center border-rit ">
                <div class="logo"> <router-link to="/">  <img src="/assets/images/logo/logo.png" alt=""> </router-link>
                </div>
              </div>
              <div class="col-lg-9 g-0 p-0">
                <div class="row g-0 holder">
                  <div class="col-12">
                    <div class="some-info">
                      
                      
                    </div>
                  </div>
                </div>
                <div class="border-one"> </div>
                <div class="row g-0 holder">
                  <div class="col-12">
                    <div class="mega-menu-default mega-menu d-lg-block d-none">
                      <div class=" d-flex align-items-center justify-content-between ">
                        <nav>
                          <ul class="page-dropdown-menu d-flex align-items-center justify-content-center">
                            <li class="dropdown-list"> <router-link to="/"> <span>Product</span> </router-link>
                            </li>
                            <li class="dropdown-list"> <router-link to="/products/cart"> <span>Cart </span>
                              </router-link>
                            </li>
                          </ul>
                        </nav>


                        <div class="right d-flex align-items-center justify-content-end">
                          <ul class="main-menu__widge-box d-flex align-items-center ">

                            <li class="d-lg-block d-none"><router-link to="/products/wishlist" class="number"><i
                                  class="flaticon-heart"></i> <span class="count">({{ wishlistLength()
                                  }})</span></router-link> </li>
                            <li class="d-lg-block d-none"><router-link to="/products/compare" class="number"><i
                                  class="flaticon-left-and-right-arrows"></i> <span class="count">({{ compareLength()
                                  }})</span></router-link> </li>
                            <li class="cartm"> <a href="#0" class="number cart-icon"> <i
                                  class="flaticon-shopping-cart"></i><span class="count">({{ cartLength() }})</span>
                              </a> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <a href="shop-grid.html" class="offer-link"> Offer </a>
            </div>
          </div>
        </div>
      </div>




      <div class="sticy-header">
        <div class="mobile-menu d-lg-none d-block">
          <div class="mobile-menu__menu-top border-bottom-0">
            <div class="container">
              <div class="row">
                <div class="menu-info d-flex justify-content-between align-items-center">
                  <div class="menubar"> <span></span> <span></span> <span></span> </div> <a href="index.html"
                    class="logo"> <img src="/assets/images/logo/logo.png" alt=""> </a>
                  <div class="cart-holder">
                    <a href="#0" class="cart cart-icon position-relative">
                      <i class="flaticon-shopping-cart"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container position-relative d-lg-block d-none">
          <div class="d-flex align-items-center justify-content-between"> <router-link to="/"  class="logo me-2">
              <img src="/assets/images/logo/logo.png" alt=""> </router-link>
            <div class="mega-menu-default mega-menu d-lg-block d-none">
              <div class="container ">
                <div class="row">
                  <nav>
                    <ul class="page-dropdown-menu d-flex align-items-center justify-content-center">
                      <li class="dropdown-list"> <router-link to="/"> <span>Product</span> </router-link>
                      </li>
                      <li class="dropdown-list"> <router-link to="/products/cart"> <span>Cart </span> </router-link>
                      </li>
                    </ul>
                  </nav>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="side-cart-closer"></div>
      <div class="side-cart  top-0 right-0 w-80 max-h-screen overflow-y-auto bg-white shadow-lg z-50 p-4 side-cart d-flex flex-column justify-content-between">
        <div class="top">
          <div class="content d-flex justify-content-between align-items-center">
            <h6 class="text-uppercase">Your Cart ({{ cartLength() }}) </h6> <span
              class="cart-close text-uppercase">X</span>
          </div>
          <div v-for="product in cart" class="items d-flex justify-content-between align-items-center">
            <div class="left d-flex align-items-center">
              <a @click="getProduct(product.product.id)" :href="`products/${product.product.id}`"
                class="thumb d-flex justify-content-between align-items-center">
                <img :src="product.product.image_url" alt="">
              </a>
              <div class="text">
                <a @click="getProduct(product.product.id)" :href="`products/${product.product.id}`">
                  <h6>{{ product.product.title }}</h6>
                </a>
                <p>{{ product.qty }} X <span>${{ product.product.price }}</span></p>
              </div>
            </div>
            <div class="right">
              <div class="item-remove"><button @click.prevent="removeCart(product.product.id)"><i
                    class="flaticon-cross"></i></button></div>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="total-ammount d-flex justify-content-between align-items-center">
            <h6 class="text-uppercase">Total:</h6>
            <h6 class="ammount text-uppercase">грн {{ totalPrice() }}</h6>
          </div>
          <div class="button-box d-flex justify-content-between"> <router-link to="/products/cart"
              class="button-2 btn_theme"> View Cart
            </router-link> <router-link to="/products/cart" class="button-2 btn_theme"> Chekout </router-link> </div>
        </div>
      </div>
      <div class="sidebar-content-closer"></div>
      <div class="sidebar-content">
        <div class="sidebar-widget-container">
          <div class="widget-heading d-flex justify-content-end align-content-center"> <span
              class="close-side-widget">X</span> </div>
          <div class="sidebar-textwidget">
            <div class="sidebar-info-contents">
              <div class="content-inner">
                <div class="logo"> <a href="index.html"><img src="/assets/images/logo/logo-2.png" alt=""></a>
                </div>
                <div class="content-box">
                  <h4>About Us</h4>
                  <div class="inner-text">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                      Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                  </div>
                </div>
                <div class="form_inner">
                  <h4>Support</h4>
                  <form action="index.html" method="post">
                    <div class="form-group mt-4"> <input type="text" name="name" placeholder="Name" required=""> </div>
                    <div class="form-group mt-4"> <input type="email" name="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group mt-4"> <textarea name="message" placeholder="Message..."></textarea> </div>
                    <div class="form-group message-btn mt-4"> <button type="submit" class="btn--secondary"> <span
                          class="txt">Submit Now</span> </button> </div>
                  </form>
                </div>
                <div class="sidebar-contact-info">
                  <h4>Contact Info</h4>
                  <ul>
                    <li> <span class="flaticon-pin-1"></span> New York, United States </li>
                    <li> <span class="flaticon-telephone"></span> <a href="tel:+44203700001">+44 123 456
                        789</a> </li>
                    <li> <span class="flaticon-mail"></span> <a href="mailto:info@example.com">info@example.com</a>
                    </li>
                  </ul>
                </div>
                <div class="thm-medio-boxx1">
                  <ul class="social-box">
                    <li class="facebook"> <a href="https://www.facebook.com/" target="_blank"><i
                          class="flaticon-facebook-app-symbol"></i></a> </li>
                    <li class="twitter"> <a href="https://twitter.com/" target="_blank"><i
                          class="flaticon-twitter"></i></a> </li>
                    <li class="instagram"> <a href="https://www.instagram.com/" target="_blank"><i
                          class="flaticon-instagram"></i></a> </li>
                    <li class="youtube"> <a href="https://www.youtube.com/" target="_blank"><i
                          class="flaticon-youtube"></i></a> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </header>

    <router-view></router-view>


    <!--  Footer Three start -->
    <footer class="footer-default footer-3 ">
      <div class="footer-default__shap_1 position-absolute "> <img src="/assets/images/shape/footer-shape-1.png" alt="">
      </div>
      <!--Start Footer-->
      <div class="footer-default__main-footer position-relative">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
              <div class="footer-default__single-box">
                <div class="company-info">
                  <div class="footer-title">
                    <h4> Office</h4>
                  </div>
                  <div class="text1">
                    <p>29 Holles Place, Dublin 2 D02 YY46</p>
                  </div>
                  <div class="text2">
                    <p>68 Jay Street, Suite 902 New Side <br> Brooklyn, NY 11201</p>
                  </div>
                  <div class="text3">
                    <p>New York, United States</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- footer-bottom Footer-->
    </footer>
  </div>
</template>

<script>
import Wishlist from './views/product/Wishlist.vue';


export default {
  name: 'App',
  data() {
    return {
      cart: [],
      wishlist: [],
      compare: [],
    };
  },
  mounted() {
    $(document).trigger('changed')
    this.getProductToCart()
    this.getProductToWishlist()
    this.getProductToCompare()
    $(document).on('getCart', () => {
      this.getProductToCart();
    });
    $(document).on('getWishlist', () => {
      this.getProductToWishlist();
    });
    $(document).on('getCompare', () => {
      this.getProductToCompare();
    });
  },

  methods: {

    getProductToCart() {
      console.log(this.cart)
      let cart = JSON.parse(localStorage.getItem('cart'));

      if (cart && cart.length > 0) {
        this.cart = cart;
      }
    },
    getProductToWishlist() {
      let wishlist = JSON.parse(localStorage.getItem('wishlist'));
      if (wishlist && wishlist.length > 0) {
        this.wishlist = wishlist;
      }
    },
    getProductToCompare() {
      let compare = JSON.parse(localStorage.getItem('compare'));
      if (compare && compare.length > 0) {
        this.compare = compare;
      }
    },

    wishlistLength() {
      return this.wishlist.length
    },
    compareLength() {
      return this.compare.length
    },
    cartLength() {
      return this.cart.length;
    },

    getProduct(id) {
      this.axios.get(`/products/${id}`)
        .then(res => {
          this.popupProduct = res.data.data
        })
        .finally(v => {
          $(document).trigger('changed')
        })
    },

    removeCart(productId) {
      this.cart = this.cart.filter(product => product.product.id !== productId);
      localStorage.setItem('cart', JSON.stringify(this.cart));

      // Оновлення лічильника кількості товарів у корзині
      $(document).trigger('getCart');
    },
    totalPrice() {
      let total = 0;
      console.log(this.cart)
      this.cart.forEach(product => {
        total += product.product.price * product.qty;
      });
      console.log(total)
      return total;
    }

  },



}

</script>

<style></style>
