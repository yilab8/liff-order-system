import './bootstrap';
import Vue from 'vue';
import LiffOrderSystem from './components/LiffOrderSystem.vue';

new Vue({
  render: h => h(LiffOrderSystem),
}).$mount('#app');
