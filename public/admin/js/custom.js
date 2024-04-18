$(document).ready(function() {

    // CHECK IF ADMIN PASSWORD IS CORRECT
    $("#current_password").keyup(function() {
        let current_password = $(this).val(); // Use $(this) instead of selecting the element again

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST', // Use uppercase for consistency
            url: '/admin/check-admin-password',
            data: { current_password: current_password },
            success: function(resp) {
                if (resp === "false") {
                    $("#check_password").html('<span style="color: red;">Current Password is incorrect ...</span>');
                } else if (resp === "true") {
                    $("#check_password").html('<span style="color: green;">Current Password is correct ...</span>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // UPDATE ADMIN STATUS
    $(document).on("click", ".updateAdminStatus", function() {
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-admin-status',
            data: { status: status, admin_id: admin_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#admin-id" + admin_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#admin-id" + admin_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // UPDATE SECTION STATUS
    $(document).on("click", ".updateSectionStatus", function() {
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr("section_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-section-status',
            data: { status: status, section_id: section_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#section-id" + section_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#section-id" + section_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE BRAND STATUS
    $(document).on("click", ".updateBrandStatus", function() {
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr("brand_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-brand-status',
            data: { status: status, brand_id: brand_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#brand-id" + brand_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#brand-id" + brand_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE CATEGORY STATUS
    $(document).on("click", ".updateCategoryStatus", function() {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-category-status',
            data: { status: status, category_id: category_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#category-id" + category_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#category_id" + category_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE PRODUCT STATUS
    $(document).on("click", ".updateProductsStatus", function() {
        var status = $(this).children("i").attr("status");
        var product_id = $(this).attr("product_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-product-status',
            data: { status: status, product_id: product_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#product_id" + product_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#product_id" + product_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE ATTRIBUTE STATUS
    $(document).on("click", ".updateAttributeStatus", function() {
        var status = $(this).children("i").attr("status");
        var attribute_id = $(this).attr("attribute_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-attribute-status',
            data: { status: status, attribute_id: attribute_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#attribute_id" + attribute_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#attribute_id" + attribute_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE IMAGE STATUS
    $(document).on("click", ".updateImageStatus", function() {
        var status = $(this).children("i").attr("status");
        var image_id = $(this).attr("image_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-image-status',
            data: { status: status, image_id: image_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#image_id" + image_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#image_id" + image_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE SLIDERS STATUS
    $(document).on("click", ".updateSliderStatus", function() {
        var status = $(this).children("i").attr("status");
        var slider_id = $(this).attr("slider_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-slider-status',
            data: { status: status, slider_id: slider_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#slider_id" + slider_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#slider_id" + slider_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE BANNER ONE STATUS
    $(document).on("click", ".updateBannerOneStatus", function() {
        var status = $(this).children("i").attr("status");
        var bannerone_id = $(this).attr("bannerone_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-bannerone-status',
            data: { status: status, bannerone_id: bannerone_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#bannerone_id" + bannerone_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#bannerone_id" + bannerone_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE BANNER TWO STATUS
    $(document).on("click", ".updateBannerTwoStatus", function() {
        var status = $(this).children("i").attr("status");
        var bannertwo_id = $(this).attr("bannertwo_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-bannertwo-status',
            data: { status: status, bannertwo_id: bannertwo_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#bannertwo_id" + bannertwo_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#bannertwo_id" + bannertwo_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE BANNER THREE STATUS
    $(document).on("click", ".updateBannerThreeStatus", function() {
        var status = $(this).children("i").attr("status");
        var bannerthree_id = $(this).attr("bannerthree_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-bannerthree-status',
            data: { status: status, bannerthree_id: bannerthree_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#bannerthree_id" + bannerthree_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#bannerthree_id" + bannerthree_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE BANNER FOUR STATUS
    $(document).on("click", ".updateBannerFourStatus", function() {
        var status = $(this).children("i").attr("status");
        var bannerfour_id = $(this).attr("bannerfour_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-bannerfour-status',
            data: { status: status, bannerfour_id: bannerfour_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#bannerfour_id" + bannerfour_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#bannerfour_id" + bannerfour_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE MAIN BANNER TOP STATUS
    $(document).on("click", ".updateMainBannerTopStatus", function() {
        var status = $(this).children("i").attr("status");
        var mainbannertop_id = $(this).attr("mainbannertop_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-mainbannertop-status',
            data: { status: status, mainbannertop_id: mainbannertop_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#mainbannertop_id" + mainbannertop_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#mainbannertop_id" + mainbannertop_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE MAIN BANNER BOTTOM STATUS
    $(document).on("click", ".updateMainBannerBottomStatus", function() {
        var status = $(this).children("i").attr("status");
        var mainbannerbottom_id = $(this).attr("mainbannerbottom_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-mainbannerbottom-status',
            data: { status: status, mainbannerbottom_id: mainbannerbottom_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#mainbannerbottom_id" + mainbannerbottom_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#mainbannerbottom_id" + mainbannerbottom_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE FILTERS STATUS
    $(document).on("click", ".updateFilterStatus", function() {
        var status = $(this).children("i").attr("status");
        var filter_id = $(this).attr("filter_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-filters-status',
            data: { status: status, filter_id: filter_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#filter_id" + filter_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#filter_id" + filter_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // UPDATE FILTER VALUE STATUS
    $(document).on("click", ".updateFilterValueStatus", function() {
        var status = $(this).children("i").attr("status");
        var filtervalue_id = $(this).attr("filtervalue_id");

        $.ajax({
            type: 'POST',
            url: '/Admin/update-filter-values-status',
            data: { status: status, filtervalue_id: filtervalue_id },
            success: function(resp) {
                // alert(resp);
                if (resp['status'] == 0) {
                    $("#filtervalue_id" + filtervalue_id).html("<i class='mdi mdi-checkbox-blank-circle' status='Inactive' style='color: red; font-size: 25px'></i>");
                } else if (resp['status'] == 1) {
                    $("#filtervalue_id" + filtervalue_id).html("<i class='mdi mdi-checkbox-marked-circle' status='Active' style='color: green; font-size: 25px'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        })
    });

    // CONFIRM DELETE | SWEET ALERT
        $(document).on("click", ".confirmDelete", function (){
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5BCCF6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location = "/Admin/delete-"+module+"/"+moduleid;
            }
        })
    });

    // APPEND CATEGORIES LEVEL
    $("#section_id").change(function(){
        var section_id = $(this).val();
        $.ajax({
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            type:'get',
            url:'/Admin/append-category-level',
            data:{section_id:section_id},
            success:function(resp){
                $("#appendCategoriesLevel").html(resp);
            },error:function(){
                alert("Error");
            }
        })
    });

    // ADD REMOVE FIELDS DYNAMICALLY WITH JQUERY
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="input-group mb-3"><input type="text" name="size[]" placeholder="Size" class="form-control mr-1"/><input type="text" name="sku[]" placeholder="SKU" class="form-control mr-1"/><input type="text" name="price[]" placeholder="Price" class="form-control mr-1"/><input type="text" name="stock[]" placeholder="Stock" class="form-control mr-1"/><a href="javascript:void(0);" class="remove_button" style="text-decoration: none; color: red"><span class="input-group-text" id="basic-addon2" style="background: #90B3C9; color: white; border-radius: 0px 5px 5px 0px">Remove&nbsp;</span></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
        x++; //Increment field counter
        $(wrapper).append(fieldHTML); //Add field html
    }
    });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

        // DISPLAY FILTERS ON SELECTION OF CATEGORY IN ADMIN PANEL
    $("#category_id").on('change', function () {
       var category_id = $(this).val();
       //alert(category_id);
        $.ajax({
            type: 'post',
            url: 'category-filters',
            data:{category_id:category_id},
            success:function (resp) {
                $(".loadFilters").html(resp.view);
            }
        })
    });



        // ACCORDION SCRIPT
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }

});
