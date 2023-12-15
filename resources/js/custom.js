function selectRefresh(selector) {
    $(selector).select2({
        tags: true,
        placeholder: "Select an Option",
        allowClear: true,
        width: "100%",
    });
}

$(document).ready(function () {
    //---operator status activate & deactivate---
    $("body").on("click", ".operator_status", function (e) {
        let status = e.target.checked == true ? 1 : 0;
        let uid = e.target.id;
        let url = "operator/status";
        console.log("status=" + status, "uid=" + uid, "url=" + url);

        $.ajax({
            type: "get",
            dataType: "json",
            url: url,
            data: { status: status, uid: uid },
            success: function (response) {
                console.log(response.message);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    //---alert message hide after 3 seconds---
    $(".success-delay-fadeout").delay(3000).fadeOut(300);
    $(".danger-delay-fadeout").delay(8000).fadeOut(300);

    //---confirm before delete any record---
    $("body").on("click", ".delete-confirm", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        Swal.fire({
            title: "Are you sure?",
            text: "This record and it`s details will be permanantly deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });

    //---after select assemblyLine get their product's components (operator create)---
    $("select.select_category").change(function () {
        var category_uid = $(".select_category option:selected").val();
        var url = base_url + "/operator/get-components";
        console.log("category_uid=" + category_uid, "url=" + url);

        $.ajax({
            type: "GET",
            url: url,
            data: { category_uid: category_uid },
            dataType: "json",
            success: function (response) {
                $(".select_order").html("");
                $.each(response.products, function (key, value) {
                    var optgroup = $('<optgroup label="' + value.product_name + ' (' + value.model_number + ')">');
                    $.each(value.get_all_components, function (c_key, c_value) {
                        let x = c_value?.is_assigned ? "✓" : "";
                        optgroup.append('<option value="' + c_value.uid + '">' + c_value.name + ' ' + x + '</option>');
                    });
                    $(".select_order").append(optgroup);
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    //---after page load get component of selected product (operator edit)---
    function getComponent() {
        var category_uid = $(".select_cat_edit_page option:selected").val();
        var select_order = $(".select_order").attr("id");
        var order_id = $(".select_order").attr("order_id");
        var url = "../get-components";
        console.log(
            "category_uid=" + category_uid,
            "url=" + url,
            "select_order=" + select_order,
            "order_id=" + order_id
        );

        $.ajax({
            type: "GET",
            url: url,
            data: { category_uid: category_uid },
            dataType: "json",
            success: function (response) {
                $(".select_order").html(
                    '<option value="">---Select Order---</option>'
                );
                // if(order_id ==  1) {
                //     $(".select_order").append('<option value="1" selected>Chassis</option>');
                // } else {
                // $(".select_order").append('<option value="1">Chassis</option>');
                // }
                $.each(response.components, function (key, value) {
                    // var attr = (select_order == value.category_uid) ? "selected" : "";
                    var attr = "";
                    if (
                        select_order == value.product_uid &&
                        order_id == value.order_id
                    ) {
                        attr = "selected";
                    }
                    $(".select_order").append(
                        '<option value="' +
                            value.order_id +
                            '" ' +
                            attr +
                            ">" +
                            value.name +
                            "</option>"
                    );
                });
                console.log(response.components);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
    if (window.location.pathname.indexOf("/admin/operator/edit/") !== -1) {
        getComponent();
    }

    //---delete accordion component---
    $(".delete_component").on("click", function (event) {
        event.preventDefault();

        $.fn.gparent = function (recursion) {
            console.log("recursion: " + recursion);
            if (recursion > 1)
                return $(this)
                    .parent()
                    .gparent(recursion - 1);
            return $(this).parent().attr("id");
        };

        let trid = $(this).gparent(2);
        let component_uid = $(this).attr("uid");
        let url = "component/delete/" + component_uid;
        console.log(
            "product_uid=" + component_uid,
            "url=" + url,
            "trid=" + trid
        );

        Swal.fire({
            title: "Are you sure?",
            text: "This Component will be deleted permanently.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: { uid: component_uid },
                    dataType: "json",
                    success: function (response) {
                        $("#" + trid).css("display", "none");
                        console.log(response.message);
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            }
        });
    });

    //---after select product get that components---
    // $("select.selected_product").change(function () {
    //     var product_uid = $(".selected_product option:selected").val();
    //     var url = "/admin/operator/get-components";
    //     console.log("product_uid=" + product_uid, "url=" + url);

    //     $.ajax({
    //         type: "GET",
    //         url: url,
    //         data: { product_uid: product_uid },
    //         dataType: "json",
    //         success: function (response) {
    //             $(".components_res").empty();
    //             $.each(response.components, function (key, value) {
    //                 $(".components_res").append(
    //                     "<tr><td>" +
    //                         value.name +
    //                         "</td><td>" +
    //                         value.raw_material_id +
    //                         "</td><td>" +
    //                         value.order_id +
    //                         "</td></tr>"
    //                 );
    //             });
    //             console.log(JSON.parse(response).components, "custom");
    //         },
    //         error: function (error) {
    //             console.log(error);
    //         },
    //     });
    // });

    //---after select product get that components---
    $("select.select_product").change(function () {
        var product_uid = $(".select_product option:selected").val();
        var url = base_url + "/component/get-single-components";
        console.log("product_uid=" + product_uid, "url=" + url);

        $.ajax({
            type: "GET",
            url: url,
            data: { product_uid: product_uid },
            dataType: "json",
            success: function (response) {
                var html = "";
                $.each(response.components, function (key, value) {
                    html +=
                        "<option value='" +
                        value.uid +
                        "'>" +
                        value.name +
                        "</<option>";
                });
                $("div.all-skip-options").html(html);
                let component_length = $(".add_component").length;
                for (var i = 0; i < component_length; i++) {
                    $("#is_skip_component" + i).html(html);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $("#order").keyup(function () {
        var order_id = this.value;
        var category_uid = $(".selected_product option:selected").attr(
            "category_uid"
        );
        var url = "/admin/operator/check-order";
        // if(order_id == 1) {
        //     $('.order_error').html('Enter another order id except 1');
        // } else if(order_id != 1) {

        console.log(
            "category_uid=" + category_uid,
            "order_id=" + order_id,
            "url=" + url
        );
        $.ajax({
            type: "GET",
            url: url,
            data: { category_uid: category_uid, order_id: order_id },
            dataType: "json",
            success: function (response) {
                let result = JSON.stringify(response);
                if (response.message == "This order id already exists.") {
                    $(".order_error").html(response.message);
                } else {
                    $(".order_error").html(response.message);
                }
                console.log(response.message);
            },
            error: function (error) {
                console.log(error);
            },
        });
        // }
    });

    //---add component (component create)---
    $("body").on("click", ".add_component_btn", function (e) {
        let component_length = $(".add_component").length;
        console.log(component_length);
        let skipOptions = $(".all-skip-options").html();

        $(".add_component_layout").append(
            `<hr class="m-0" size="1" color="black" /> <div id="add_component_count` +
                component_length +
                `" class="card-body add_component">
        <div class="mb-2">
            <label for="name" class="form-label mb-0">Component Name</label>
            <input type="text" class="form-control" id="name` +
                component_length +
                `" name="name[]" placeholder="Enter component name" required />
        </div>
        <div class="mb-2">
            <label for="order" class="form-label mb-0">Order</label>
            <input type="number" class="form-control" id="order` +
                component_length +
                `" name="order[]" placeholder="Enter component order" required />
            <span class="order_error text-danger"></span>
        </div>
        <div class="mb-2">
            <label for="model number" class="form-label mb-0">Model Number</label>
            <div class="input-group">
                <input type="text" class="form-control input-sm" name="model_number[]" id="model_number` +
                component_length +
                `" placeholder="Enter model number" />
                <span class="input-group-btn" style="width:0px;"></span>
                <input type="text" class="form-control input-sm min" name="min[]" id="min` +
                component_length +
                `" placeholder="Enter minimum value" style="margin-left:-1px" />
                <span class="input-group-btn" style="width:0px;"></span>
                <input type="text" class="form-control input-sm max" name="max[]" id="max` +
                component_length +
                `" placeholder="Enter maximum value" style="margin-left:-2px" />
            </div>
            <label for="message" class="form-label mt-0 text-danger font-weight-light min_max_msg" id="min_max_msg` +
                component_length +
                `"></label>
        </div>
        <div class="mb-2">
            <label for="" class="form-label mb-0">Printable</label>
            <input type="checkbox" class="ml-2 get-checked-printable" id="is_print` +
                component_length +
                `" value="0" style="vertical-align: middle;">
            <input type="hidden" name="is_print[]" value="0">
        </div>
        <div class="mb-2 skipable_layout">
            <label for="is_skipable_component_checkbox ` +
                component_length +
                ` " class="form-label mb-0">Is Skipable Component</label>
            <input type="checkbox" class="ml-2 go_to_hide_skip" id="is_skipable_component_checkbox` +
                component_length +
                `" name="" value="1" style="vertical-align: middle;">

            <select name="is_skip_component[]" id="is_skip_component` +
                component_length +
                `" class="form-control my-1 goto-skip" style="display: none">
                ` +
                skipOptions +
                `
            </select>
        </div>
        <div class="text-end">
            <button type="button" id="remove_comp` +
                component_length +
                `" class="btn btn-danger btn-sm " >
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>`
        );

        $("#remove_comp" + component_length).on("click", function () {
            $("#add_component_count" + component_length).remove();
        });
    });

    $("body").on("click", ".add_product_btn", function (e) {
        let product_length = $(".add_product_component").length;
        let dynamicProduct = $(".get-dynamic-products").html();
        console.log(product_length);
        // return false;

        $(".add-dynamic-product-component-layout").append(
            `
            <hr class="m-0" size="1" color="black" />
            <div class="my-2 add_product_component add_product_component_count` +
                product_length +
                `">
                <div class="mb-2">
                    <label for="product" class="form-label mb-0 fs-6">Select Product<sup class="text-danger">*</sup></label><br>
                    <select class="form-select js-example-basic-single form-select-lg form-control select_category` +
                product_length +
                `" name="product[` +
                product_length +
                `][category_uid]" required id="category_uid">
                        ` +
                dynamicProduct +
                `
                    </select>
                </div>
                <div class="mb-2">
                    <label for="component" class="form-label mb-0 fs-6">Select Component<sup class="text-danger">*</sup></label><br>
                    <select class="form-select js-example-basic-single form-select-lg form-control select_order` +
                product_length +
                `" name="product[` +
                product_length +
                `][raw_material_uid]" required id="order_id">
                        
                    </select>
                </div>

                <div class="text-end">
                    <button type="button" id="remove_comp` +
                product_length +
                `" class="btn btn-danger btn-sm ">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        `
        );

        // $(".select_category" + product_length + ", .select_order" + product_length).select2();
        selectRefresh(".select_category" + product_length);
        selectRefresh(".select_order" + product_length);

        $("#remove_comp" + product_length).on("click", function () {
            $(".add_product_component_count" + product_length).remove();
        });

        $(".select_category" + product_length).on("change", function () {
            var category_uid = $(
                ".select_category" + product_length + " option:selected"
            ).val();
            var url = base_url + "/operator/get-components";

            $.ajax({
                type: "GET",
                url: url,
                data: { category_uid: category_uid },
                dataType: "json",
                success: function (response) {
                    console.log(response, "response");
                    $(".select_order" + product_length).html(
                        '<option value="">---Select Component---</option>'
                    );
                    $.each(response.components, function (key, value) {
                        let x = value?.is_assigned ? "✅" : "";
                        $(".select_order" + product_length).append(
                            '<option value="' +
                                value.uid +
                                '">' +
                                value.name +
                                x +
                                "</option>"
                        );
                    });
                    console.log(response.components);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    });

    $(".edit_select_category").on("change", function () {
        var $this_id = $(this).attr("id");
        var $key = $(this).data("key");
        var category_uid = $("#" + $this_id)
            .find("option:selected")
            .val();
        var url = base_url + "/operator/get-components";

        $.ajax({
            type: "GET",
            url: url,
            data: { category_uid: category_uid },
            dataType: "json",
            success: function (response) {
                $("#edit_select_order" + $key).html(
                    '<option value="">---Select Component---</option>'
                );
                $.each(response.components, function (key, value) {
                    let x = value?.is_assigned ? "✅" : "";
                    $("#edit_select_order" + $key).append(
                        '<option value="' +
                            value.uid +
                            '">' +
                            value.name +
                            x +
                            "</option>"
                    );
                });
                console.log(response.components);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    // remove edit product
    $(".remove_edit_product").on("click", function () {
        if (confirm("Are you sure you want to Delete ?")) {
            var $this_key = $(this).data("key");
            $(".add_product_component_count" + $this_key).remove();
        } else {
            // run code if cancel
        }
    });

    // Select/Deselect all checkboxes
    $("#select-all").change(function () {
        $(".select-checkbox").prop("checked", $(this).prop("checked"));
    });

    $("body").on("click", ".reset_count", function () {
        var selectedUids = [];
        $(".select-checkbox:checked").each(function () {
            selectedUids.push($(this).attr("id"));
        });
        let url = "operator/reset-count";
        console.log(selectedUids);

        $.ajax({
            type: "get",
            url: url,
            data: { uids: selectedUids },
            dataType: "json",
            success: function (response) {
                window.location.reload();
                console.log(response.message);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    const spinner = `
        <div class="text-center">
            <span class="spinner-border spinner-border-sm" role="status"></span> Loading...
        </div>
    `;
    //---get report (index)---
    $("body").on("click", ".get_report", function (e) {
        event.preventDefault();
        let start_date = $(".start_date").val();
        let end_date = $(".end_date").val();
        let url = "report/get-report";
        let btnHtml;
        console.log(start_date, end_date);

        $.ajax({
            type: "GET",
            url: url,
            data: { start_date: start_date, end_date: end_date },
            dataType: "json",

            beforeSend: function () {
                $('#productNameFilter').val('');
                $(".response").html('');
                btnHtml = $(".get_report_btn").html();
                $(".get_report_btn").html(
                    `<button class="btn btn-primary mt-4" type="button" disabled>${spinner}</button>`
                );
            },
            success: function (response) {
                // console.log(response.data);
                $(".response").html(response.data);
            },
            error: function (error) {
                console.log(error);
            },
            complete: function () {
                $(".get_report_btn").html(btnHtml);
            }
        });
    });
    // $("body").on("click", "#exportformbtn", function (e) {
    //     event.preventDefault();
    //     alert('dsklhfsjkhd');
    //     // let reportexportform = $("#reportexportform")
    //     // reportexportform.submit();
    // });

    //---min, max validation (product create/edit page)---
    $("body").on("keyup", ".max", function () {
        let min_value = $(this).siblings(".min").val();
        let max_value = parseInt(this.value);
        if (max_value <= min_value) {
            $(this)
                .parent(".input-group")
                .siblings(".min_max_msg")
                .html("Max value must be greater than Min value.");
        } else {
            $(this).parent(".input-group").siblings(".min_max_msg").html("");
        }
    });

    $(document).on("change", "input.go_to_hide_skip", function (e) {
        if ($(this).is(":checked")) {
            $(this).next().show();
        } else {
            $(this).next().remove();
        }
    });

    $(document).on("change", "input.get-checked-printable", function () {
        var value = $(this).val();
        var $this = $(this);
        if (value == 0) {
            value = 1;
        } else {
            value = 0;
        }
        $this.next().val(value);
        $(this).val(value);
    });

    $(document).on("change", "input#change-password-input", function () {
        var create_element = `
            <div class="input-group mb-3 change-password-container">
                <input type="password" autocomplete="false" name="password" id="new_password" class="form-control check_password_match" placeholder="Enter new passowrd" aria-label="Enter new passowrd" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary go_to_show_password" type="button"><i class="fa-solid fa-eye-slash"></i></button>
            </div>
            <div class="input-group mb-3 change-password-container">
                <input type="password" name="password" id="confirm_password" class="form-control check_password_match" placeholder="Enter new passowrd" aria-label="Enter new passowrd" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary go_to_show_password" type="button"><i class="fa-solid fa-eye-slash"></i></button>
            </div>
        `;
        if ($(this).is(":checked")) {
            $("div.create_dynamic_element").html(create_element);
            $("input#new_password").val("");
        } else {
            $("div.create_dynamic_element").html("");
            $("div.password_error").html("");
        }
    });

    $(document).on("click", "button.go_to_show_password", function () {
        var $prev = $(this).prev();
        var $type = $(this).prev().attr("type");
        if ($type == "password") {
            $prev.attr("type", "text");
            $(this).html(`<i class="fa-solid fa-eye"></i>`);
        } else {
            $prev.attr("type", "password");
            $(this).html(`<i class="fa-solid fa-eye-slash"></i>`);
        }
    });

    $(document).on("keyup", "input.check_password_match", function () {
        // password_error;
        var password = $("input#new_password").val();
        var confirm_password = $("input#confirm_password").val();
        if (password == confirm_password) {
            $("div.password_error").html("");
        } else {
            $("div.password_error").html(
                "Passowrd and Confirm Password ar not matched"
            );
        }
    });

    $(document).on("submit", "form.check-validation-on-submit", function (e) {
        if ($("input#change-password-input").is(":checked")) {
            var password = $("input#new_password").val();
            var confirm_password = $("input#confirm_password").val();

            if (password.length < 6) {
                console.log(password.length);
                $(".PASS_ER").text("Passowrd lenght must be 6 character");
                e.preventDefault();
                return false;
            }

            if (password == confirm_password) {
                $("div.password_error").text("");
            } else {
                e.preventDefault();
                $("div.password_error").text(
                    "Passowrd and Confirm Password ar not matched"
                );
                return false;
            }
        }
    });

    //---update rework component (scann-component)---
    $("body").on("click", ".is_rework", function (e) {
        // e.preventDefault();
        $(this).attr('disabled', true);
        let componentId = $(this).attr('id');
        let isRework = $(this).prop('checked');
        let productId = $(this).attr('product-id');
        let compName = $(this).attr('comp-name');
        let chassisId = $(this).attr('chassis-id');
        let url = "update-rework";
        console.log(componentId, isRework, url);

        $.ajax({
            type: "GET",
            url: url,
            data: { component_id: componentId, is_rework: isRework, product_uid: productId, name: compName, chassis_id: chassisId},
            dataType: "json",
            success: function (response) {
                $('#rework-layout').css('display', 'block');
                $('.rework-response').addClass('alert-success');
                $('.rework-response').html(response.message);
                setTimeout(function() { 
                    $('#rework-layout').css('display', 'none');
                }, 3000);
                console.log(response.data);
            },
            error: function (error) {
                $('#rework-layout').css('display', 'block');
                $('.rework-response').addClass('alert-danger');
                $('.rework-response').html(error);
                setTimeout(function() { 
                    $('#rework-layout').css('display', 'none');
                }, 3000);
                console.log(error);
            },
        });
    });
    
    // report product search results (report index page)
    let reportUrl = window.location.href;
    // if(reportUrl.includes('/report')) {
    //     document.getElementById('productNameFilter').addEventListener('input', function () {
    //         var searchValue = this.value.toLowerCase();
    //         console.log(searchValue);
    //         var accordionItems = document.querySelectorAll('.accordion-item');
    
    //         accordionItems.forEach(function (item) {
    //             var productName = item.querySelector('.accordion-button').textContent.toLowerCase();
    //             if (productName.includes(searchValue)) {
    //                 item.style.display = 'block';
    //             } else {
    //                 item.style.display = 'none';
    //             }
    //         });
    //     });
    // }
    // if(reportUrl.includes('/report')) {
    //     document.getElementById('productNameFilter').addEventListener('input', function () {
    //         var searchValue = this.value.toLowerCase();
    //         var accordionItems = document.querySelectorAll('.accordion-item');
        
    //         accordionItems.forEach(function (item) {
    //             var productName = item.querySelector('.accordion-button').textContent.toLowerCase();
    //             var trElements = item.querySelectorAll('tr');
    //             var found = false;
        
    //             trElements.forEach(function (tr) {
    //                 var tdElements = tr.querySelectorAll('td');
    //                 if (tdElements.length > 1) {
    //                     var cellData = tdElements[1].textContent.toLowerCase();
    //                     console.log(cellData);
        
    //                     if (cellData.includes(searchValue)) {
    //                         found = true;
    //                         tr.style.display = 'table-row';
    //                     } else {
    //                         tr.style.display = 'none';
    //                     }
    //                 }
    //             });
        
    //             if (productName.includes(searchValue) || found) {
    //                 item.style.display = 'block';
    //             } else {
    //                 item.style.display = 'none';
    //             }
    //         });
    //     });
    // }
    if(reportUrl.includes('/report')) {
        document.getElementById('productNameFilter').addEventListener('input', function () {
            var searchValue = this.value.trim().toLowerCase();
            var url = "report/search-component";
            console.log(searchValue, url);
    
            $.ajax({
                type: "GET",
                url: url,
                data: { search_value: searchValue },
                dataType: "json",

                beforeSend: function () {
                    if (searchValue === '') {
                        $('.response').html('');
                        return false;
                    }
                    $('.response').html(spinner);
                },
                success: function (response) {
                    $('.response').html(response.data);
                    console.log(response.data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    }

    //get real time scann records (dashboard)
    function getTimeTarget() {
        let url = "get-time-target";
        // console.log(url);

        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function (response) {
                // console.log(response.data);
                $('.show-time').html(response.data.time);
                $('.achieved-target').html(response.data.achievedProduct);
                $('.achieved-production').html('');
                $.each(response.data.allProducts, function (key, value) {
                    let tr = `
                        <tr>
                            <td>${value.product_name} (${value.model_number})</td>
                            <td>${value.plan_production}</td>
                            <td>${value?.finish_product?.today_quantity}</td>
                        </tr>
                    `;
                    $('.achieved-production').append(tr);
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
    setInterval(getTimeTarget, 20000);


    //---for responsive datatable---
    $(".datatable").DataTable({
        responsive: true,
    });

    //---select2 for product, component---
    $(".js-example-basic-single").select2();
    $('.js-example-basic-multiple').select2();
});
