import Vue from 'vue';

Vue.prototype.inArray = (value, array) =>{
    const length = array.length;
    for(let i = 0; i < length; i++) {
        if(array[i].id === value) return true;
    }
    return false;
}
