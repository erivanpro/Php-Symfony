
import "../css/app.scss";
const $ = require('jquery');
require('bootstrap');
import Vue from 'vue';

$(document).ready(function() {
  $('[data-toggle="popover"]').popover();
});

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


Vue.component('button-counter', {
    data: function () {
      return {
        count: 0
      }
    },
    template: '<button v-on:click="count++">Vous m\'avez cliqué {{ count }} fois.</button>'
  })
const app=new Vue({ el: '#components-demo' })
