<template>
    <div class="col-12 row px-0">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-1 py-1 portfolio-card" v-for="portfolio in portfolios" >
            <div class="col-12 px-0 pt-1 main-nafez-box-styles" > 
            <a href="/portfolio/">
                <div class="col-12 px-1"  >
                    <img class="lazy" v-src=" "   alt="صورة العمل" >
                </div>
                <div class="col-12  py-2 cairo portfolio-title" > 
                 
                </div>
            </a>
            </div>
        </div> 
    </div>

</template>
<script>
export default {

 
    props: [
        'portfoliosParm',
        'lazyImgUrlParm',
        'alternativeMainImgParm'
        
    ],

    data() {
        return {
            portfolios: JSON.parse(this.portfoliosParm)    ,
            lazyImgUrl:  this.lazyImgUrlParm, 
            alternativeMainImg: this.alternativeMainImgParm, 
        }
    },

    mounted() {

        //this.totalOrder=parseInt(this.food.price)*this.food.qty
        console.log(this.portfolios)


    },

    methods: {

/*        updateFoodCart(qty, type,quantity) {

            var _this = this;

            axios.post(_this.updateOrderUrl, {
                is_food: true,
                food_id: _this.food.id,
                qty: qty,
                quantity:quantity,
                type: type,
                cookie_id: COOKIE_ID,
            }).then(response => {
                console.log(response);
            });
        },
        updateDrinkCart(drinkId, qty, type) {

            var _this = this;

            axios.post(_this.updateOrderUrl, {
                is_food: false,
                food_id: _this.food.id,
                drink_id: drinkId,
                qty: qty,
                type: type,
                cookie_id: COOKIE_ID,
            }).then(response => {

            });
        },

        redirect: function(parm) {
            window.location = parm;
        },
        foodAddNumber() {
            if (!this.ajaxProcess) {
                this.food.qty = this.food.qty + 1
                this.totalOrder =   parseInt(this.food.price)*this.food.qty;
                //this.updateFoodCart(this.food.qty, 'add');
            }

        },
        foodSubNumber() {
            if (!this.ajaxProcess) {
                if (this.food.qty > 1) {
                    this.food.qty = this.food.qty - 1;
                    this.totalOrder =  parseInt(this.food.price)*this.food.qty;
                    //this.updateFoodCart(this.food.qty, 'sub');
                }

            }
        },
        setOrderTotal(drink){
            
            this.updateFoodCart(this.food.qty, 'create',this.food.qty)
            this.redirect(this.menuUrlParm)
        },
        drinkCheck(drink) {

            if (drink.checked) {
                var qty = (drink.qty) ? parseInt(drink.qty) : 1;

                this.temp = (parseInt(drink.price) * qty);
                this.totalOrder = parseInt(this.totalOrder) + parseInt(this.temp);

                this.updateDrinkCart(drink.id, qty, 'create');

            } else {
                var qty = (drink.qty) ? parseInt(drink.qty) : 1;
                this.temp = (parseInt(drink.price) * qty);
                this.totalOrder = parseInt(this.totalOrder) - parseInt(this.temp);
                this.updateDrinkCart(drink.id, qty, 'delete');

            }
        },
        drinkAddNumber(drink) {

            drink.qty = parseInt(drink.qty) + 1;
            if (drink.checked) {
                this.totalOrder = parseInt(this.totalOrder) + parseInt(drink.price);
                this.updateDrinkCart(drink.id, drink.qty, 'add');

            }

        },
        drinkSubNumber(drink) {

            if (drink.qty > 1) {
                drink.qty = drink.qty - 1;
                if (drink.checked) {
                    this.totalOrder = parseInt(this.totalOrder) - parseInt(drink.price);
                    this.updateDrinkCart(drink.id, drink.qty, 'sub');
                }
            }
        }*/



    },

    /* Computed attributes */
    computed: {

    },

    watch: {

    }
}

</script>
