(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

Vue.component('wpcfto_import_export', {
  props: ['data', 'id'],
  data: function data() {
    return {
      translations: wpcfto_global_settings['translations'],
      userData: [],
      importData: '',
      loading: false
    };
  },
  template: "\n\n        <div class=\"wpcfto_import_export\">\n        \n            <div class=\"wpcfto_import_export__export\">\n            \n                <input id=\"wpcfto_export_data\" type=\"hidden\" v-model=\"exportData\" />\n                <h3 v-html=\"translations.export_data_label\"></h3>\n                <a href=\"#\" class=\"button\" @click.prevent=\"copyExportData\">{{translations.export}}</a>\n                \n            </div>\n            \n            <div class=\"wpcfto_import_export__import\">\n            \n                <h3 v-html=\"translations.import_data_label\"></h3>\n                <textarea v-model=\"importData\"></textarea>\n                <div class=\"wpcfto_import_export__import_notice\" v-html=\"translations.import_notice\"></div>\n                <a href=\"#\" class=\"button\" @click.prevent=\"proceedData\">{{translations.import}}</a>\n                <span class=\"loading_import\" v-if=\"loading\">\n                    <i class=\"loading_v2\"></i>\n                </span>\n                \n            </div>\n            \n        </div>\n    ",
  mounted: function mounted() {
    this.userData = this.data;
  },
  methods: {
    copyExportData: function copyExportData() {
      var wpcftoExportData = document.querySelector('#wpcfto_export_data');
      wpcftoExportData.setAttribute('type', 'text');
      wpcftoExportData.select();

      try {
        var successful = document.execCommand('copy');
        alert(this.translations['exported_data']);
      } catch (err) {
        alert(this.translations['exported_data_error']);
      }
      /* unselect the range */


      wpcftoExportData.setAttribute('type', 'hidden');
      window.getSelection().removeAllRanges();
    },
    proceedData: function proceedData() {
      var vm = this;
      vm.loading = true;
      var url = stm_wpcfto_ajaxurl + '?action=wpcfto_save_settings&nonce=' + stm_wpcfto_nonces['wpcfto_save_settings'] + '&name=' + vm.id;
      this.$http.post(url, vm.importData).then(function (response) {
        vm.loading = false;
        location.reload();
      });
    }
  },
  computed: {
    exportData: function exportData() {
      return JSON.stringify(this.userData);
    }
  }
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImZha2VfNTAzMmE0NWQuanMiXSwibmFtZXMiOlsiVnVlIiwiY29tcG9uZW50IiwicHJvcHMiLCJkYXRhIiwidHJhbnNsYXRpb25zIiwid3BjZnRvX2dsb2JhbF9zZXR0aW5ncyIsInVzZXJEYXRhIiwiaW1wb3J0RGF0YSIsImxvYWRpbmciLCJ0ZW1wbGF0ZSIsIm1vdW50ZWQiLCJtZXRob2RzIiwiY29weUV4cG9ydERhdGEiLCJ3cGNmdG9FeHBvcnREYXRhIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwic2V0QXR0cmlidXRlIiwic2VsZWN0Iiwic3VjY2Vzc2Z1bCIsImV4ZWNDb21tYW5kIiwiYWxlcnQiLCJlcnIiLCJ3aW5kb3ciLCJnZXRTZWxlY3Rpb24iLCJyZW1vdmVBbGxSYW5nZXMiLCJwcm9jZWVkRGF0YSIsInZtIiwidXJsIiwic3RtX3dwY2Z0b19hamF4dXJsIiwic3RtX3dwY2Z0b19ub25jZXMiLCJpZCIsIiRodHRwIiwicG9zdCIsInRoZW4iLCJyZXNwb25zZSIsImxvY2F0aW9uIiwicmVsb2FkIiwiY29tcHV0ZWQiLCJleHBvcnREYXRhIiwiSlNPTiIsInN0cmluZ2lmeSJdLCJtYXBwaW5ncyI6IkFBQUE7O0FBRUFBLEdBQUcsQ0FBQ0MsU0FBSixDQUFjLHNCQUFkLEVBQXNDO0FBQ3BDQyxFQUFBQSxLQUFLLEVBQUUsQ0FBQyxNQUFELEVBQVMsSUFBVCxDQUQ2QjtBQUVwQ0MsRUFBQUEsSUFBSSxFQUFFLFNBQVNBLElBQVQsR0FBZ0I7QUFDcEIsV0FBTztBQUNMQyxNQUFBQSxZQUFZLEVBQUVDLHNCQUFzQixDQUFDLGNBQUQsQ0FEL0I7QUFFTEMsTUFBQUEsUUFBUSxFQUFFLEVBRkw7QUFHTEMsTUFBQUEsVUFBVSxFQUFFLEVBSFA7QUFJTEMsTUFBQUEsT0FBTyxFQUFFO0FBSkosS0FBUDtBQU1ELEdBVG1DO0FBVXBDQyxFQUFBQSxRQUFRLEVBQUUscWtDQVYwQjtBQVdwQ0MsRUFBQUEsT0FBTyxFQUFFLFNBQVNBLE9BQVQsR0FBbUI7QUFDMUIsU0FBS0osUUFBTCxHQUFnQixLQUFLSCxJQUFyQjtBQUNELEdBYm1DO0FBY3BDUSxFQUFBQSxPQUFPLEVBQUU7QUFDUEMsSUFBQUEsY0FBYyxFQUFFLFNBQVNBLGNBQVQsR0FBMEI7QUFDeEMsVUFBSUMsZ0JBQWdCLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixxQkFBdkIsQ0FBdkI7QUFDQUYsTUFBQUEsZ0JBQWdCLENBQUNHLFlBQWpCLENBQThCLE1BQTlCLEVBQXNDLE1BQXRDO0FBQ0FILE1BQUFBLGdCQUFnQixDQUFDSSxNQUFqQjs7QUFFQSxVQUFJO0FBQ0YsWUFBSUMsVUFBVSxHQUFHSixRQUFRLENBQUNLLFdBQVQsQ0FBcUIsTUFBckIsQ0FBakI7QUFDQUMsUUFBQUEsS0FBSyxDQUFDLEtBQUtoQixZQUFMLENBQWtCLGVBQWxCLENBQUQsQ0FBTDtBQUNELE9BSEQsQ0FHRSxPQUFPaUIsR0FBUCxFQUFZO0FBQ1pELFFBQUFBLEtBQUssQ0FBQyxLQUFLaEIsWUFBTCxDQUFrQixxQkFBbEIsQ0FBRCxDQUFMO0FBQ0Q7QUFDRDs7O0FBR0FTLE1BQUFBLGdCQUFnQixDQUFDRyxZQUFqQixDQUE4QixNQUE5QixFQUFzQyxRQUF0QztBQUNBTSxNQUFBQSxNQUFNLENBQUNDLFlBQVAsR0FBc0JDLGVBQXRCO0FBQ0QsS0FqQk07QUFrQlBDLElBQUFBLFdBQVcsRUFBRSxTQUFTQSxXQUFULEdBQXVCO0FBQ2xDLFVBQUlDLEVBQUUsR0FBRyxJQUFUO0FBQ0FBLE1BQUFBLEVBQUUsQ0FBQ2xCLE9BQUgsR0FBYSxJQUFiO0FBQ0EsVUFBSW1CLEdBQUcsR0FBR0Msa0JBQWtCLEdBQUcscUNBQXJCLEdBQTZEQyxpQkFBaUIsQ0FBQyxzQkFBRCxDQUE5RSxHQUF5RyxRQUF6RyxHQUFvSEgsRUFBRSxDQUFDSSxFQUFqSTtBQUNBLFdBQUtDLEtBQUwsQ0FBV0MsSUFBWCxDQUFnQkwsR0FBaEIsRUFBcUJELEVBQUUsQ0FBQ25CLFVBQXhCLEVBQW9DMEIsSUFBcEMsQ0FBeUMsVUFBVUMsUUFBVixFQUFvQjtBQUMzRFIsUUFBQUEsRUFBRSxDQUFDbEIsT0FBSCxHQUFhLEtBQWI7QUFDQTJCLFFBQUFBLFFBQVEsQ0FBQ0MsTUFBVDtBQUNELE9BSEQ7QUFJRDtBQTFCTSxHQWQyQjtBQTBDcENDLEVBQUFBLFFBQVEsRUFBRTtBQUNSQyxJQUFBQSxVQUFVLEVBQUUsU0FBU0EsVUFBVCxHQUFzQjtBQUNoQyxhQUFPQyxJQUFJLENBQUNDLFNBQUwsQ0FBZSxLQUFLbEMsUUFBcEIsQ0FBUDtBQUNEO0FBSE87QUExQzBCLENBQXRDIiwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5cblZ1ZS5jb21wb25lbnQoJ3dwY2Z0b19pbXBvcnRfZXhwb3J0Jywge1xuICBwcm9wczogWydkYXRhJywgJ2lkJ10sXG4gIGRhdGE6IGZ1bmN0aW9uIGRhdGEoKSB7XG4gICAgcmV0dXJuIHtcbiAgICAgIHRyYW5zbGF0aW9uczogd3BjZnRvX2dsb2JhbF9zZXR0aW5nc1sndHJhbnNsYXRpb25zJ10sXG4gICAgICB1c2VyRGF0YTogW10sXG4gICAgICBpbXBvcnREYXRhOiAnJyxcbiAgICAgIGxvYWRpbmc6IGZhbHNlXG4gICAgfTtcbiAgfSxcbiAgdGVtcGxhdGU6IFwiXFxuXFxuICAgICAgICA8ZGl2IGNsYXNzPVxcXCJ3cGNmdG9faW1wb3J0X2V4cG9ydFxcXCI+XFxuICAgICAgICBcXG4gICAgICAgICAgICA8ZGl2IGNsYXNzPVxcXCJ3cGNmdG9faW1wb3J0X2V4cG9ydF9fZXhwb3J0XFxcIj5cXG4gICAgICAgICAgICBcXG4gICAgICAgICAgICAgICAgPGlucHV0IGlkPVxcXCJ3cGNmdG9fZXhwb3J0X2RhdGFcXFwiIHR5cGU9XFxcImhpZGRlblxcXCIgdi1tb2RlbD1cXFwiZXhwb3J0RGF0YVxcXCIgLz5cXG4gICAgICAgICAgICAgICAgPGgzIHYtaHRtbD1cXFwidHJhbnNsYXRpb25zLmV4cG9ydF9kYXRhX2xhYmVsXFxcIj48L2gzPlxcbiAgICAgICAgICAgICAgICA8YSBocmVmPVxcXCIjXFxcIiBjbGFzcz1cXFwiYnV0dG9uXFxcIiBAY2xpY2sucHJldmVudD1cXFwiY29weUV4cG9ydERhdGFcXFwiPnt7dHJhbnNsYXRpb25zLmV4cG9ydH19PC9hPlxcbiAgICAgICAgICAgICAgICBcXG4gICAgICAgICAgICA8L2Rpdj5cXG4gICAgICAgICAgICBcXG4gICAgICAgICAgICA8ZGl2IGNsYXNzPVxcXCJ3cGNmdG9faW1wb3J0X2V4cG9ydF9faW1wb3J0XFxcIj5cXG4gICAgICAgICAgICBcXG4gICAgICAgICAgICAgICAgPGgzIHYtaHRtbD1cXFwidHJhbnNsYXRpb25zLmltcG9ydF9kYXRhX2xhYmVsXFxcIj48L2gzPlxcbiAgICAgICAgICAgICAgICA8dGV4dGFyZWEgdi1tb2RlbD1cXFwiaW1wb3J0RGF0YVxcXCI+PC90ZXh0YXJlYT5cXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cXFwid3BjZnRvX2ltcG9ydF9leHBvcnRfX2ltcG9ydF9ub3RpY2VcXFwiIHYtaHRtbD1cXFwidHJhbnNsYXRpb25zLmltcG9ydF9ub3RpY2VcXFwiPjwvZGl2PlxcbiAgICAgICAgICAgICAgICA8YSBocmVmPVxcXCIjXFxcIiBjbGFzcz1cXFwiYnV0dG9uXFxcIiBAY2xpY2sucHJldmVudD1cXFwicHJvY2VlZERhdGFcXFwiPnt7dHJhbnNsYXRpb25zLmltcG9ydH19PC9hPlxcbiAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cXFwibG9hZGluZ19pbXBvcnRcXFwiIHYtaWY9XFxcImxvYWRpbmdcXFwiPlxcbiAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9XFxcImxvYWRpbmdfdjJcXFwiPjwvaT5cXG4gICAgICAgICAgICAgICAgPC9zcGFuPlxcbiAgICAgICAgICAgICAgICBcXG4gICAgICAgICAgICA8L2Rpdj5cXG4gICAgICAgICAgICBcXG4gICAgICAgIDwvZGl2PlxcbiAgICBcIixcbiAgbW91bnRlZDogZnVuY3Rpb24gbW91bnRlZCgpIHtcbiAgICB0aGlzLnVzZXJEYXRhID0gdGhpcy5kYXRhO1xuICB9LFxuICBtZXRob2RzOiB7XG4gICAgY29weUV4cG9ydERhdGE6IGZ1bmN0aW9uIGNvcHlFeHBvcnREYXRhKCkge1xuICAgICAgdmFyIHdwY2Z0b0V4cG9ydERhdGEgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjd3BjZnRvX2V4cG9ydF9kYXRhJyk7XG4gICAgICB3cGNmdG9FeHBvcnREYXRhLnNldEF0dHJpYnV0ZSgndHlwZScsICd0ZXh0Jyk7XG4gICAgICB3cGNmdG9FeHBvcnREYXRhLnNlbGVjdCgpO1xuXG4gICAgICB0cnkge1xuICAgICAgICB2YXIgc3VjY2Vzc2Z1bCA9IGRvY3VtZW50LmV4ZWNDb21tYW5kKCdjb3B5Jyk7XG4gICAgICAgIGFsZXJ0KHRoaXMudHJhbnNsYXRpb25zWydleHBvcnRlZF9kYXRhJ10pO1xuICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgIGFsZXJ0KHRoaXMudHJhbnNsYXRpb25zWydleHBvcnRlZF9kYXRhX2Vycm9yJ10pO1xuICAgICAgfVxuICAgICAgLyogdW5zZWxlY3QgdGhlIHJhbmdlICovXG5cblxuICAgICAgd3BjZnRvRXhwb3J0RGF0YS5zZXRBdHRyaWJ1dGUoJ3R5cGUnLCAnaGlkZGVuJyk7XG4gICAgICB3aW5kb3cuZ2V0U2VsZWN0aW9uKCkucmVtb3ZlQWxsUmFuZ2VzKCk7XG4gICAgfSxcbiAgICBwcm9jZWVkRGF0YTogZnVuY3Rpb24gcHJvY2VlZERhdGEoKSB7XG4gICAgICB2YXIgdm0gPSB0aGlzO1xuICAgICAgdm0ubG9hZGluZyA9IHRydWU7XG4gICAgICB2YXIgdXJsID0gc3RtX3dwY2Z0b19hamF4dXJsICsgJz9hY3Rpb249d3BjZnRvX3NhdmVfc2V0dGluZ3Mmbm9uY2U9JyArIHN0bV93cGNmdG9fbm9uY2VzWyd3cGNmdG9fc2F2ZV9zZXR0aW5ncyddICsgJyZuYW1lPScgKyB2bS5pZDtcbiAgICAgIHRoaXMuJGh0dHAucG9zdCh1cmwsIHZtLmltcG9ydERhdGEpLnRoZW4oZnVuY3Rpb24gKHJlc3BvbnNlKSB7XG4gICAgICAgIHZtLmxvYWRpbmcgPSBmYWxzZTtcbiAgICAgICAgbG9jYXRpb24ucmVsb2FkKCk7XG4gICAgICB9KTtcbiAgICB9XG4gIH0sXG4gIGNvbXB1dGVkOiB7XG4gICAgZXhwb3J0RGF0YTogZnVuY3Rpb24gZXhwb3J0RGF0YSgpIHtcbiAgICAgIHJldHVybiBKU09OLnN0cmluZ2lmeSh0aGlzLnVzZXJEYXRhKTtcbiAgICB9XG4gIH1cbn0pOyJdfQ==
},{}]},{},[1])