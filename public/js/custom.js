// js for roles =========
jQuery(function () {
    // ==== for edit role
    $("body").on("click", "#edit_role2", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");

        //alert(id);
        //console.log(id);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "get",
            url: "/admin/edit-role",
            data: {
                // "_token": "{{ csrf_token() }}",
                id: id,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#edit_role4").val(data.role);
                $("#edit_role_desc").val(data.role_description);
                $("#hid_id").val(data.id);
            },
        });
    });
});

// ==== for delete role
function delete_company(id) {
    var url = "delete-role";
    //var dltUrl = url+ "/" +id;

    //var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: "Do you really want to delete?",
        // text: "Deleted Successfully!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirm",
    }).then(function (result) {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "post",
                url: url,
                data: {
                    id: id,
                },
                dataType: "json",
                beforeSend: function () {},
                success: function (response) {
                    Swal.fire(
                        "Remind!",
                        "Role Data Delete successfully!",
                        "success"
                    );
                    setInterval("location.reload()", 1000);
                },
            });
        } else {
            swal("Cancelled", "Your data is safe :)", "error");
        }
    });
}

// ========================= js for Users =========

// ==== for edit user
//  $("body").on("click", "#edit_user2", function(e) {

//     alert('hello2');
//     e.preventDefault();
//     var id = $(this).attr("data-id");

//     alert(id);
//     //console.log(id);
//     $.ajaxSetup({
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//       });
//     $.ajax({
//         type: 'get',
//         url: "/admin/edit-user",
//         data: {
//             // "_token": "{{ csrf_token() }}",
//             "id": id
//         },
//         dataType: 'json',
//         success: function(data) {
//             console.log(data);
//              $('#user_name').val(data.name);
//              $('#user_email').val(data.email);
//              $('#user_role').val(data.role_id);
//              $('#user_status').val(data.status);
//              $('#hid_id').val(data.id);
//         }
//     });

// });

// ==== for Delete user

// function delete_user(id)
//  {

//             var url = 'delete-user';
//             Swal.fire({
//                 title: "Do you really want to delete?",
//                 // text: "Deleted Successfully!",
//                 type: "warning",
//                 showCancelButton: true,
//                 confirmButtonText: "Confirm"
//             }).then(function(result) {
//                 if (result.value) {

//                     $.ajaxSetup({
//                         headers: {
//                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                       });

//                     $.ajax({
//                         type: 'post',
//                         url: url,
//                         data: {
//                             "id": id
//                         },
//                         dataType: 'json',
//                         beforeSend: function() {},
//                         success: function(response) {
//                             Swal.fire(
//                                 'Remind!',
//                                 'Company Data successfully!',
//                                 'success'
//                             );
//                             setInterval('location.reload()', 1000);
//                         }
//                     });

//                 } else {
//                   swal("Cancelled", "Your data is safe :)", "error");
//                 }
//                 });
//         }

// for institute ==========

jQuery(function () {
    // ==== for edit role
    $("body").on("click", "#edit_insti2", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");

        //alert(id);
        //console.log(id);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "get",
            url: "/admin/edit-institute",
            data: {
                // "_token": "{{ csrf_token() }}",
                id: id,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#edit_insti4").val(data.name);
                $("#edit_insti_desc").val(data.address);
                $("#hid_id").val(data.id);
            },
        });
    });
});

function delete_insti(id) {
    //alert(id);

    var url = "/admin/delete-institute";
    Swal.fire({
        title: "Do you really want to delete?",
        // text: "Deleted Successfully!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirm",
    }).then(function (result) {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            $.ajax({
                type: "post",
                url: url,
                data: {
                    id: id,
                },
                dataType: "json",
                beforeSend: function () {},
                success: function (response) {
                    Swal.fire(
                        "Remind!",
                        "Institute Deleted successfully!",
                        "success"
                    );
                    setInterval("location.reload()", 1000);
                },
            });
        } else {
            swal("Cancelled", "Your data is safe :)", "error");
        }
    });
}

// for supervisor maseters ================

jQuery(function () {
    // ==== for edit role
    $("body").on("click", "#edit_supp2", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");

        //alert(id);
        //console.log(id);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "get",
            url: "/admin/edit-supervisor",
            data: {
                // "_token": "{{ csrf_token() }}",
                id: id,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $valu = data[0]["s_name"];

                //console.log(data[0]['s_name']);
                $("#sup_name").val(data[0]["s_name"]);
                //$( "#insti_id option:selected" ).val(data.institute_id);
                $(
                    "#insti_id option[value=" + data[0]["institute_id"] + "]"
                ).prop("selected", true);
                $(
                    "#department_id option[value=" +
                        data[0]["department_id"] +
                        "]"
                ).prop("selected", true);
                $("#hid_id").val(data[0]["id"]);
            },
        });
    });
});

function delete_supp(id) {
    //alert(id);

    var url = "/admin/delete-supervisor";
    Swal.fire({
        title: "Do you really want to delete?",
        // text: "Deleted Successfully!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirm",
    }).then(function (result) {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            $.ajax({
                type: "post",
                url: url,
                data: {
                    id: id,
                },
                dataType: "json",
                beforeSend: function () {},
                success: function (response) {
                    Swal.fire(
                        "Remind!",
                        "Supervisor Deleted successfully!",
                        "success"
                    );
                    setInterval("location.reload()", 1000);
                },
            });
        } else {
            swal("Cancelled", "Your data is safe :)", "error");
        }
    });
}

//for co-supervisor master====

jQuery(function () {
    // ==== for edit role
    $("body").on("click", "#edit_cosupp2", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");

        //alert(id);
        //console.log(id);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "get",
            url: "/admin/edit-cosupervisor",
            data: {
                // "_token": "{{ csrf_token() }}",
                id: id,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $valu = data[0]["s_name"];

                //console.log(data[0]['s_name']);
                $("#sup_name").val(data[0]["s_name"]);
                //$( "#insti_id option:selected" ).val(data.institute_id);
                $(
                    "#insti_id option[value=" + data[0]["institute_id"] + "]"
                ).prop("selected", true);
                $(
                    "#department_id option[value=" +
                        data[0]["department_id"] +
                        "]"
                ).prop("selected", true);
                $("#hid_id").val(data[0]["id"]);
            },
        });
    });
});

function delete_cosupp(id) {
    //alert(id);

    var url = "/admin/delete-cosupervisor";
    Swal.fire({
        title: "Do you really want to delete?",
        // text: "Deleted Successfully!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirm",
    }).then(function (result) {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            $.ajax({
                type: "post",
                url: url,
                data: {
                    id: id,
                },
                dataType: "json",
                beforeSend: function () {},
                success: function (response) {
                    Swal.fire(
                        "Remind!",
                        "Co-Supervisor Deleted successfully!",
                        "success"
                    );
                    setInterval("location.reload()", 1000);
                },
            });
        } else {
            swal("Cancelled", "Your data is safe :)", "error");
        }
    });
}

// for datatables

$(document).ready(function () {
    $("#datatable-buttons").dataTable();
});
