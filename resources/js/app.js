/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import './bootstrap';
 import Utils from './utils';
 window.Utils = Utils;

 import Vue from 'vue';



 const app = new Vue({
   el: '#app',
 });

 // window.vm = app;
