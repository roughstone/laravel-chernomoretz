<template>
<div class="row col-12 justify-content-center">
    <div class="row col-12 col-sm-7 border border-info text-white athlete-container">
        <a class="col-4 px-0" :href="origin + '/athletes/' + data.id + '/edit'">
            <div class="w-100 h-100 athlete-image" :style="(data.image ? 'background-image: url('+ data.image +')' : 'background-image: url('+origin + '/storage/images/kid.svg)')"><!-- url(' + data->image + ')' -->
            </div>
        </a>
         <div class="row col-8 row">
            <a class="text-center bg-primary col-12 p-sm-3 m-0" :href="origin + '/athletes/' + data.id + '/edit'">
                <span class="athlete-name">{{data.f_name}} {{data.m_name}} {{data.l_name}}</span>
            </a>
            <div v-for="(month, index) in data.currentThreeMonths" :key="month.id" :class="'col-4 month-record px-0 ' + (index != data.currentThreeMonths.length - 1 ? 'border-right border-white': '')"
                :data-url="origin + '/month/' + month.id">
                <p class="show-month h-33 text-center border-bottom border-white bg-dark p-sm-3 m-0 ">
                    {{month.date_bg.slice(0, month.date.indexOf(' '))}}
                </p>
                <p :class="'active h-33 text-center border-bottom border-white p-sm-3 m-0 ' + (month.active === 1 ? 'bg-success' : 'bg-danger')">Активен</p>
                <p :class="'paid h-33 text-center p-sm-3 m-0 ' + (month.paid === 1 ? 'bg-success' : 'bg-danger')">Платил</p>
            </div>
        </div>
    </div>
    <div class="row col-12 col-sm-7 my-1 my-sm-3 text-white">
        <button class="col-6 col-sm-3 p-2 m-0 ml-auto text-white bg-dark h5 delete-btn" v-on:click="deleteAthlete()" :data-url="origin + '/athletes/' + data.id">Изтрий</button>
    </div>
    <div class="row col-12 col-sm-7 my-sm-0 text-center text-white">
        <a class="col-12 bg-primary m-0 h5 py-1" v-on:click="showPayment = showPayment ? false : true">Покажи {{showPayment ? 'месеци': 'задължения'}}</a>
        <p class="text-center bg-dark col-12 m-0">
            Всички {{!showPayment ? 'месеци': 'задължения'}}:
        </p>
        <div v-if="!showPayment" v-for="(month, index) in data.allMonths" :key="month.id" :class="'col-3 col-sm-2 month-record px-0 ' + (index != data.allMonths.length -1 ? 'border-right border-white' : '')"
            :data-url="origin + '/month/' + month.id">
            <p class="show-month h-33 text-center border-bottom border-white bg-dark p-sm-3 m-0">
                {{ month.date_bg }}
            </p>
            <p :class="'active h-33 text-center border-bottom border-white p-sm-3 m-0 ' + (month.active === 1 ? 'bg-success' : 'bg-danger')">Активен</p>
            <p :class="'paid h-33 text-center p-sm-3 m-0 ' + (month.paid === 1 ? 'bg-success' : 'bg-danger')">Платил</p>
        </div>
        <div v-if="showPayment" class="col-12 row" v-for="payment in data.payments" :key="payment.id">
            <div class="month-record payment-container col-12 row" :data-url="origin + '/payments/' + payment.id + '/update'">
                <p class="col-9 bg-primary py-sm-2"><span>{{payment.reason}}</span> - <span>{{payment.month.date_bg}}</span> <span class="float-right">{{payment.amount}} лв.</span></p>
                <p :class="'paid col-3 text-center py-sm-2 ' + (payment.paid === 1 ? 'bg-success' : 'bg-danger')">Платил</p>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                data: JSON.parse(this.athletephp),
                origin: location.origin,
                monthData: null,
                showPayment: true,
                Swal: require('sweetalert2')
            }
        },
        methods: {
            deleteAthlete() {
                this.$swal({
                    title: 'Изтриването не може да бъде възтановено!',
                    text: 'Изтрий ' + $('.athlete-name').text(),
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Не',
                    confirmButtonText: 'Да'
                    })
                .then((result) => {
                    if (result.value) {
                        axios.delete($('.delete-btn').data('url'))
                        .then(() => {
                            /* location.href = location.origin + '/athletes' */
                        })
                        .catch((e) => {
                            console.log(e);
                        })
                    }
                })
            }
        },
        props: [
            'athletephp'
        ],
        mounted() {

        }
    }
</script>
