export default {
    currencySymbol(context, data){
        return  this.$axios.$get('/currency')
    }
};