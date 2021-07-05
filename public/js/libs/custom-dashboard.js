/*
Theme Name: Niva JS Dashboard
Theme URI: https://niva.lucian.host/
Description: Agency Theme
Version: 1.0
Author: Sweet Themes

*/


( function ( $ ) {
    'use strict';
    $( document ).ready( function () {
		$('.table-responsive form #options').on("click", function(){
            if(this.checked){
                $('.checkboxes').each(function(){
                    this.checked = true;
                    jQuery('#options1').prop('checked', true);
                });
            }else {
                $('.checkboxes').each(function(){
                    this.checked = false;
                    jQuery('#options1').prop('checked', false);
                });
            }
        });
        $('.table-responsive form #options1').on("click", function(){
            if(this.checked){
                $('.checkboxes').each(function(){
                    this.checked = true;
                    jQuery('#options').prop('checked', true);
                });
            }else {
                $('.checkboxes').each(function(){
                    this.checked = false;
                    jQuery('#options').prop('checked', false);
                });
            }
        });

        if ( jQuery( ".dropzone" ).length ) {
            Dropzone.autoDiscover = false;
          
            var myDropzone = new Dropzone(".dropzone", { 
               maxFilesize: 10,
               acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp"
            });
        }

        if ( jQuery( ".form-menu" ).length ) {
            $(".form-menu input[type='radio']").on("click", function(){
                var radioValue = $(this).val();
                if(radioValue == 1){
                    $(".form-menu .submeniu-code").removeClass("hide");
                }
                if(radioValue == 0){
                    $(".form-menu .submeniu-code").addClass("hide");
                }
            });
        }


    })
} ( jQuery ) )