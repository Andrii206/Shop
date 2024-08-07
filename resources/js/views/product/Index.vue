<template>
    <div>
        <main class="overflow-hidden ">
            <!--Start Breadcrumb Style2-->
            <div class="breadcrumb-area" style="background-image: url(/assets/images/inner-pages/breadcum-bg.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                                <h2>Shop Grid</h2>
                                <div class="breadcrumb-menu">
                                    <ul>
                                        <li><router-link to="/"><i class="flaticon-home pe-2"></i>Home</router-link></li>
                                        <li> <i class="flaticon-next"></i> </li>
                                        <li class="active">Shop Grid</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Breadcrumb Style2-->
            <!--Start Product Categories One-->

            <!--End Product Categories One-->
            <!--Start product-grid-->
            <div class="product-grid pt-60 pb-120">
                <div class="container">
                    <div class="row gx-4">
                        <div class="col-xl-3 col-lg-4">
                            <div class="shop-grid-sidebar"> <button class="remove-sidebar d-lg-none d-block"> <i
                                        class="flaticon-cross"> </i> </button>
                                <div class="sidebar-holder">

                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                                        <h4>Select Categories</h4>
                                        <div class="checkbox-item">
                                            <form>
                                                <div v-for="category in filterList.categories" class="form-group">
                                                    <input :value="category.id" v-model="categories" type="checkbox"
                                                        :id="category.id"> <label :for="category.id">{{ category.title
                                                        }}</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <h4>Color Option </h4>
                                        <ul class="color-option">
                                        <li v-for="color in filterList.colors" :key="color.id">
                                            <a
                                            @click.prevent="addColor(color.id)"
                                            href="#0"
                                            class="color-option-single"
                                            :class="colors.includes(color.id) ? 'selected' : ''"
                                            :style="`background:#${color.title}`"
                                            >
                                            <span>{{ color.title }}</span>
                                            </a>
                                        </li>
                                        </ul>

                                    </div>
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <h4>Filter By Price</h4>
                                        <div class="slider-box">
                                            <div id="price-range" class="slider"></div>
                                            <div class="output-price"> <label for="priceRange">Price:</label> <input
                                                    type="text" id="priceRange" readonly> </div>
                                            <button @click.prevent="filterProducts()" class="filterbtn" type="submit">
                                                Filter
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0">
                                    <h4>Tags </h4>
                                    <ul class="popular-tag p-2">
                                        <li v-for="tag in filterList.tags" :key="tag.id">
                                        <a
                                            @click.prevent="addTag(tag.id)"
                                            href="#0"
                                            :class="tags.includes(tag.id) ? 'selected-tag' : ''"
                                        >
                                            {{ tag.title }}
                                        </a>
                                        </li>
                                    </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                                            aria-labelledby="pills-grid-tab">
                                            <div class="row">
                                                <div v-for="product in products" class="col-xl-4 col-lg-6 col-6 ">
                                                    <div class="products-three-single w-100  mt-30">
                                                        <div class="products-three-single-img"> <a
                                                                href="shop-details-3.html" class="d-block"> <img
                                                                    :src="product.image_url" class="first-img" alt="" />
                                                                <img src="/assets/images/home-three/productss2-hover-1.png"
                                                                    alt="" class="hover-img" />
                                                            </a>
                                                            <div class="products-grid-one__badge-box"> <span
                                                                    class="bg_base badge new ">New</span>
                                                            </div> <a @click.prevent="addToCart(product.id, true)"
                                                                class="addcart btn--primary style2">
                                                                Add To Cart </a>
                                                            <div class="products-grid__usefull-links">
                                                                <ul>
                                                                    <li><a
                                                                            @click.prevent="addToWishlist(product.id, true)">
                                                                            <i class="flaticon-heart">
                                                                            </i> <span>
                                                                                wishlist</span> </a> </li>
                                                                    <li><a
                                                                            @click.prevent="addToCompare(product.id, true)">
                                                                            <i
                                                                                class="flaticon-left-and-right-arrows"></i>
                                                                            <span>
                                                                                compare</span> </a> </li>
                                                                    <li><a @click="getProduct(product.id)"
                                                                            :href="`#popup${product.id}`"
                                                                            class="popup_link"> <i
                                                                                class="flaticon-visibility"></i>
                                                                            <span> quick view</span>
                                                                        </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div :id="`popup${product.id}`"
                                                            class="product-gird__quick-view-popup mfp-hide">
                                                            <div v-if="popupProduct" class="container">
                                                                <div
                                                                    class="row justify-content-between align-items-center">
                                                                    <div class="col-lg-6">
                                                                        <div class="quick-view__left-content">
                                                                            <div class="tabs">
                                                                                <div class="popup-product-thumb-box">
                                                                                    <ul>
                                                                                        <li v-for="productImage in popupProduct.product_images"
                                                                                            class="tab-nav popup-product-thumb">
                                                                                            <a
                                                                                                :href="`#tabb${productImage.id}`">
                                                                                                <img :src="productImage.url"
                                                                                                    alt="" /> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div v-if="popupProduct.product_images"
                                                                                    class="popup-product-main-image-box">
                                                                                    <div v-for="productImage in popupProduct.product_images"
                                                                                        :id="`tabb${productImage.id}`"
                                                                                        class="tab-item popup-product-image">
                                                                                        <div
                                                                                            class="popup-product-single-image">
                                                                                            <img :src="productImage.url"
                                                                                                alt="" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <button class="prev"> <i
                                                                                            class="flaticon-back"></i>
                                                                                    </button> <button class="next"> <i
                                                                                            class="flaticon-next"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="popup-right-content">
                                                                            <h3>{{ popupProduct.title }}</h3>
                                                                            <div class="ratting"> <i
                                                                                    class="flaticon-star"></i> <i
                                                                                    class="flaticon-star"></i> <i
                                                                                    class="flaticon-star"></i>
                                                                                <i class="flaticon-star"></i> <i
                                                                                    class="flaticon-star"></i>
                                                                                <span>(112)</span>
                                                                            </div>
                                                                            <p class="text"> {{ popupProduct.description
                                                                                }}
                                                                            </p>
                                                                            <div class="price">
                                                                                <h2> грн{{ popupProduct.price }} </h2>
                                                                                <h6> In stuck</h6>
                                                                            </div>
                                                                            <div class="color-varient">
                                                                                <template
                                                                                    v-for="groupProduct in popupProduct.group_products">
                                                                                    <template
                                                                                        v-for="color in groupProduct.colors">
                                                                                        <a @click.prevent="getProduct(groupProduct.id)"
                                                                                            :style="`background: #${color.title};`"
                                                                                            class="color-name"></a>
                                                                                    </template>
                                                                                </template>
                                                                            </div>
                                                                            <div class="add-product">
                                                                                <h6>Qty:</h6>
                                                                                <div class="button-group">
                                                                                    <div
                                                                                        class="qtySelector text-center">
                                                                                        <span class="decreaseQty"><i
                                                                                                class="flaticon-minus"></i>
                                                                                        </span> <input type="number"
                                                                                            class="qtyValue"
                                                                                            value="1" />
                                                                                        <span class="increaseQty"> <i
                                                                                                class="flaticon-plus"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <button
                                                                                        @click.prevent="addToCart(product.id, false)"
                                                                                        class="btn--primary "> Add
                                                                                        to
                                                                                        Cart </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="payment-method"> <a href="#0">
                                                                                    <img src="/assets/images/payment_method/method_1.png"
                                                                                        alt=""> </a>
                                                                                <a href="#0"> <img
                                                                                        src="/assets/images/payment_method/method_2.png"
                                                                                        alt=""> </a> <a href="#0"> <img
                                                                                        src="/assets/images/payment_method/method_3.png"
                                                                                        alt=""> </a>
                                                                                <a href="#0"> <img
                                                                                        src="/assets/images/payment_method/method_4.png"
                                                                                        alt=""> </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="products-three-single-content text-center">

                                                            <span v-if="product.category">{{ product.category.title
                                                                }}</span>

                                                            <h5>
                                                                <router-link
                                                                    :to="{ name: 'products.show', params: { id: product.id } }">
                                                                    {{ product.title }} </router-link>
                                                            </h5>
                                                            <p>грн {{ product.price }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center wow fadeInUp animated">
                                    <ul class="pagination text-center">
                                        <li @click.prevent="getProducts(pagination.current_page - 1)"
                                            v-if="pagination.current_page !== 1" class="next"><a href="#0"><i
                                                    class="flaticon-left-arrows" aria-hidden="true"></i> </a></li>
                                        <li v-for="link in pagination.links">
                                            <template
                                                v-if="Number(link.label) && (pagination.current_page - link.label < 2 && pagination.current_page - link.label > -2) || Number(link.label) === 1 || Number(link.label) === pagination.last_page">
                                                <a @click.prevent="getProducts(link.label)"
                                                    :class="link.active ? 'active' : ''" href="#0">{{ link.label }}</a>
                                            </template>
                                            <template
                                                v-if="Number(link.label) && (pagination.current_page - link.label === 2) && pagination.current_page !== 3 || Number(link.label) && (pagination.current_page - link.label === -2) && pagination.current_page !== pagination.last_page - 2">
                                                <a>...</a>
                                            </template>
                                        </li>
                                        <li v-if="pagination.current_page !== pagination.last_page"
                                            @click.prevent="getProducts(pagination.current_page + 1)" class="next"><a
                                                href="#0"><i class="flaticon-next-1" aria-hidden="true"></i>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End product-grid-->
        </main>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'Index',
    mounted() {
        $(document).trigger('changed')
        this.testFunction()
        this.getProducts()
        this.getFilterList()
    },

    data() {
        return {
            products: [],
            product: null,
            popupProduct: null,
            filterList: [],
            categories: [],
            tags: [],
            colors: [],
            prices: [],
            pagination: [],
        }
    },

    methods: {

        addToCart(id, isSingle) {
            this.axios.post(`/products/${id}`)
                .then(res => {
                    console.log('Fetched product:', res.data.data);
                    this.product = res.data.data;
                    let qty = isSingle ? 1 : parseInt(document.querySelector('.qtyValue').value, 10);
                    document.querySelector('.qtyValue').value = 0;

                    let cart = localStorage.getItem('cart');

                    let newProduct = {
                        'id': id,
                        'qty': qty,
                        'product': this.product,
                    };

                    if (!cart) {
                        localStorage.setItem('cart', JSON.stringify([newProduct]));
                        console.log('Added first product to wishlist');
                    } else {
                        cart = JSON.parse(cart);
                        let found = false;
                        cart.forEach(productInCart => {
                            if (productInCart.id === id) {
                                productInCart.qty = Number(productInCart.qty) + Number(qty);
                                found = true;
                            }
                        });
                        if (!found) {
                            cart.push(newProduct);
                        }

                        localStorage.setItem('cart', JSON.stringify(cart));

                        this.cart = cart;
                        console.log(JSON.parse(localStorage.getItem('cart')));


                        $(document).trigger('getCart');
                    }
                })
                .catch(error => {
                    console.error('Error fetching product:', error);
                });
        },
        addToWishlist(id, isSingle) {
            this.axios.post(`/products/${id}`)
                .then(res => {
                    console.log('Fetched product:', res.data.data);
                    this.product = res.data.data;

                    let wishlist = localStorage.getItem('wishlist');
                    let newProduct = {
                        'id': id,
                        'product': this.product,
                    };

                    if (!wishlist) {
                        localStorage.setItem('wishlist', JSON.stringify([newProduct]));
                        console.log('Added first product to wishlist');
                    } else {
                        wishlist = JSON.parse(wishlist);
                        const index = wishlist.findIndex(productInWishlist => productInWishlist.id === id);

                        if (index !== -1) {
                            // Видалити продукт, якщо він вже є в порівнянні
                            wishlist.splice(index, 1);
                            console.log('Removed product from wishlist');
                        } else {
                            // Додати продукт, якщо його немає в порівнянні
                            wishlist.push(newProduct);
                            console.log('Added product to wishlist');
                        }
                        // Перевірте, що зберігається в localStorage
                        console.log(JSON.parse(localStorage.getItem('wishlist')));


                        localStorage.setItem('wishlist', JSON.stringify(wishlist));
                    }

                    $(document).trigger('getWishlist');
                })
                .catch(error => {
                    console.error('Error fetching product:', error);
                });
        },


        addToCompare(id, isSingle) {
            this.axios.post(`/products/${id}`)
                .then(res => {
                    console.log('Fetched product:', res.data.data); // Логування для перевірки даних

                    this.product = res.data.data;

                    let compare = localStorage.getItem('compare');
                    let newProduct = {
                        'id': id,
                        'product': this.product,
                    };

                    if (!compare) {
                        localStorage.setItem('compare', JSON.stringify([newProduct]));
                        console.log('Added first product to compare');
                    } else {
                        compare = JSON.parse(compare);
                        const index = compare.findIndex(productInCompare => productInCompare.id === id);

                        if (index !== -1) {
                            // Видалити продукт, якщо він вже є в порівнянні
                            compare.splice(index, 1);
                            console.log('Removed product from compare');
                        } else {
                            // Додати продукт, якщо його немає в порівнянні
                            compare.push(newProduct);
                            console.log('Added product to compare');
                        }
                        // Перевірте, що зберігається в localStorage
                        console.log(JSON.parse(localStorage.getItem('compare')));


                        localStorage.setItem('compare', JSON.stringify(compare));
                    }

                    $(document).trigger('getCompare');
                })
                .catch(error => {
                    console.error('Error fetching product:', error);
                });
        },






        filterProducts() {
            let prices = $('#priceRange').val()

            this.prices = prices.replace(/[\s+]|[$]/g, '').split('-')



            this.getProducts()

        },
        addColor(id) {
            if (!this.colors.includes(id)) {
                this.colors.push(id)
            } else {
                this.colors = this.colors.filter(elem => {
                    return elem !== id
                })
            }
        },
        addTag(id) {
            if (!this.tags.includes(id)) {
                this.tags.push(id)
            } else {
                this.tags = this.tags.filter(elem => {
                    return elem !== id
                })
            }
        },
        getProduct(id) {
            this.axios.post(`/products/${id}`)
                .then(res => {
                    console.log(res.data.data)
                    this.popupProduct = res.data.data
                    console.log(this.popupProduct)
                })
                .finally(v => {
                    $(document).trigger('changed')
                })
        },
        getProducts(page = 1) {
            this.axios.post('/products', {
                'categories': this.categories,
                'tags': this.tags,
                'colors': this.colors,
                'prices': this.prices,
                'page': page,
            })
                .then(res => {
                    this.products = res.data.data;
                    console.log(this.products)
                    this.pagination = res.data.meta;
                })
                .finally(() => {
                    $(document).trigger('changed');
                });
        },
        testFunction() {
            axios.get('/test')
                .then(response => {
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },
        getFilterList() {
            this.axios.post(`/filters`)
                .then(res => {
                    this.filterList = res.data;
                    if (this.filterList && this.filterList.price) {
                        if (this.filterList.price.min !== undefined && this.filterList.price.max !== undefined) {
                            $("#price-range").slider({
                                range: true,
                                min: this.filterList.price.min,
                                max: this.filterList.price.max,
                                values: [this.filterList.price.min, this.filterList.price.max],
                                slide: function (event, ui) {
                                    $("#priceRange").val("$" + ui.values[0] + " - $" + ui.values[1]);
                                }
                            });
                            $("#priceRange").val("$" + $("#price-range").slider("values", 0) + " - $" + $("#price-range").slider("values", 1));
                        } else {
                            console.error('Price data is incomplete');
                        }
                    } else {
                        console.error('Price data is missing');
                    }
                })
                .catch(error => {
                    console.error('Error fetching filters:', error);
                })
                .finally(() => {
                    $(document).trigger('changed');
                });

        }

    },
}
</script>
<style></style>