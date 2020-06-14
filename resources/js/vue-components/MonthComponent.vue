<template>
    <div class="month-component row col-12 col-sm-7 my-sm-0 text-center bg-dark text-white">
        <p>{{ data.date_bg }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: this.$parent.monthData
            }
        },
        mounted() {
            console.log()
        }
    }
</script>
