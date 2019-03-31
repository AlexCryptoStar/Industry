$(document).ready( function () {

    var date = new Date();
    var needDay = new Date(date.getFullYear(), date.getMonth(), (date.getDate() - 10));

    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        startDate: needDay,
        endDate: moment().startOf('hour'),
        locale: {
            format: 'MM/DD/YYYY'
        }					
    });

    var date = $('input[name="daterange"]').val();
    getDateList( date );
    $('input[name="daterange"]').change(function() {
        var date = $(this).val();
        getDateList( date );
    });

    $('#table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                footer: true,
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
            },
            {
                extend: 'print',
                footer: true,
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
            },
        ],
        "language": {
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
        },
        "scrollX": true,
        "columns": [
            { "width": "10px" },
            { "width": "50px" },
            { "width": "80px" },
            { "width": "100px" },
            { "width": "70px" },
            { "width": "80px" },
            { "width": "70px" },
            { "width": "70px" },
            { "width": "100px" },
            { "width": "100px" },
            { "width": "100px" },
        ],
    } );
    
    // save button click via trigger submit button.
    $('#cargoRegist').click(function(){
        
        // validation only image.
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        
        if ($("#image").val() == '') {
            $('#alertP').html("Please select proof document image.").css('color', 'red');
            return;
        }
        var input = document.getElementById('image');
        for ( var i = 0; i < input.files.length; i++) {
            
            if ( $.inArray(input.files[i].name.split('.').pop().toLowerCase(), fileExtension) == -1 ) { 
                
                $('#alertP').html("Can entry *.jpeg, *.jpg, *.png, *.gif, *.bmp files.").css('color', 'red');
                setTimeout(function() {
                    $('#count').css("border", "solid 1px #ced4da");
                    $('#alertP').html("");
                }, 2000);
                $("#image").val('').focus();
                return;
            }
        }
        
        $('#cargoSubmit').trigger('click', function() {
            $('#cargoRegist').attr('disabled', 'disabled');
        });

    });
    
    // save button click when update the row 
    $('#cargoUpdate').click(function(){
        
        var selectedAmount = $('#update_amount select[name="amount_change"]').val();
        console.log(selectedAmount);

        if ( selectedAmount == 2 ) {

            var count = $('#count').val();
            var countShow = $('input[name="count_show"]').val();
            if ( parseInt(count) < 0 ) {
                
                $('#count').css("border", "solid 1px red");
                $('#alert').html("Please entry correct amount.").css('color', 'red');
                setTimeout(function() {
                    $('#count').css("border", "solid 1px #ced4da");
                    $('#alert').html("");
                }, 1500);
                $('#count').val('').focus();
                return false;
            } 

            if ( parseInt(countShow) < parseInt(count) ) {

                $('#count').css("border", "solid 1px red");
                parseInt(countShow) == 0 ? $('#alert').html("Doesn't enough the amount").css('color', 'red') : $('#alert').html("Please input small value than current value.").css('color', 'red');
                setTimeout(function() {
                    $('#count').css("border", "solid 1px #ced4da");
                    $('#alert').html("");
                }, 1500);
                $('#count').val('').focus();
                return false;
            }
            
            var weight = $('#weight').val();
            var weightShow = $('input[name="weight_show"]').val();
            if ( parseInt(weight) < 0 ) {
                
                $('#weight').css("border", "solid 1px red");
                $('#alertW').html("Please entry correct amount.").css('color', 'red');
                setTimeout(function() {
                    $('#weight').css("border", "solid 1px #ced4da");
                    $('#alertW').html("");
                }, 1500);
                $('#weight').val('').focus();
                return false;
            }

            if ( parseInt(weightShow) < parseInt(weight) ) {

                $('#weight').css("border", "solid 1px red");
                parseInt(weightShow) ? $('#alertW').html("Doesn't enough the amount").css('color', 'red') : $('#alertW').html("Please input small value than current value.").css('color', 'red');
                setTimeout(function() {
                    $('#weight').css("border", "solid 1px #ced4da");
                    $('#alertW').html("");
                }, 1500);
                $('#weight').val('').focus();
                return false;
            }
            
            var length = $('#length').val();
            var lengthShow = $('input[name="length_show"]').val();
            if ( parseInt(length) < 0 ) {
                
                $('#length').css("border", "solid 1px red");
                $('#alertL').html("Please entry correct amount.").css('color', 'red');
                setTimeout(function() {
                    $('#length').css("border", "solid 1px #ced4da");
                    $('#alertL').html("");
                }, 1500);
                $('#length').val('').focus();
                return false;
            } 

            if ( parseInt(lengthShow) < parseInt(length) ) {

                $('#length').css("border", "solid 1px red");
                parseInt(lengthShow) == 0 ? $('#alertL').html("Doesn't enough the amount").css('color', 'red') : $('#alert').html("Please input small value than current value.").css('color', 'red');
                setTimeout(function() {
                    $('#length').css("border", "solid 1px #ced4da");
                    $('#alertL').html("");
                }, 1500);
                $('#length').val('').focus();
                return false;
            }
        }

        if ($("#updateImage").val() == '') {
            $('#alertPU').html("Please select proof document image.").css('color', 'red');
            setTimeout(function() {
                $('#count').css("border", "solid 1px #ced4da");
                $('#alertPU').html("");
            }, 2000);
            return false;
        }
        
        // validation only image.
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        var input = document.getElementById('updateImage');
        for ( var i = 0; i < input.files.length; i++) {
            
            if ( $.inArray(input.files[i].name.split('.').pop().toLowerCase(), fileExtension) == -1 ) { 
                
                $('#alertPU').html("Can upload only *.jpeg, *.jpg, *.png, *.gif, *.bmp files.").css('color', 'red');
                setTimeout(function() {
                    $('#count').css("border", "solid 1px #ced4da");
                    $('#alertPU').html("");
                }, 2000);
                $("#updateImage").val('').focus();
                return;
            }
        }

        $('#updateSubmit').trigger('click', function() {
            $('#cargoRegist').attr('disabled', 'disabled');
        });
    });

} );

function openModal(param) {
    
    if ( param == -1 ) {
        $('#submitModal').trigger('reset');
        $('#dataModalScrollable').modal('show');
    } else {
        $.ajax({
            type: 'get',
            url: '/edit',
            data: {rowId: param},
            success: function( data ) {
                $('input[name="id"]').val(data[0].id);
                $('input[name="name"]').val(data[0].name);
                $('input[name="amount_change"]').val(data[0].amount_change);
                $('input[name="standard"]').val(data[0].standard);
                $('input[name="material"]').val(data[0].material);
                $('input[name="count_show"]').val(data[0].count);
                $('input[name="weight_show"]').val(data[0].weight);
                $('input[name="length_show"]').val(data[0].length);
                $('input[name="manufacture"]').val(data[0].manufacture);
                $('input[name="note"]').val(data[0].note);
            }
        });

        $('#editModalScrollable').modal('show');
    }
}

// showing the data to datatable when click date list in side bar
function getDataByDate(e, date) {
    
    $("a.active").removeClass("active");
    $(e).addClass('active');

    $.ajax({
        type: 'get',
        url: '/getDataByDate',
        data: {date: date},
        success: function (data) {
            
            var table = $('#table_id').DataTable(); 
            table.clear().draw();

            var array = [];
            $.map(data, function(value, index) {
                array.unshift(value);
            });

            $.map(array, function(element) {                

                var reason = element.amount_change == 1 ? '入库' : '出库';
                var img_urls = element.img_url.split('|');
                img_urls.pop();

                var note = element.note ? element.note : '';                

                var img_url = '';
                $.map(img_urls, function(val) {
                    img_url += '<img class="proof-img" onclick="proofImageModal(this)" src="https://'+ val + '"/>';
                })

                var tr = "<td style='text-align: center;'>"+
                            '<button type="button" rel="tooltip" disabled=disabled id="btn_edit" class="btn btn-success btn-round btn-just-icon btn-sm" >Edit</button>'+
                        '</td>'+
                        '<td>' + img_url + '</td>' +
                        '<td>'+ element.name +'</td>' +
                        '<td>'+ reason +'</td>' +
                        '<td>'+ element.standard +'</td>'+
                        '<td>'+ element.material +'</td>'+
                        '<td>'+ element.count +'</td>'+
                        '<td>'+ element.weight +'</td>'+
                        '<td>'+ element.length +'</td>'+
                        '<td>'+ element.manufacture +'</td>'+
                        '<td>'+ note +'</td>';
                var jRow = $('<tr>').append(tr);
    
                table.row.add( jRow ).draw();
            });
        }
    });
}

// showing date list in side bar
function getDateList( date ) {
    
    $.ajax({
        type: 'get',
        url: '/getDate',
        data: {date: date},
        success: function ( data ) {
            if ( data != '' ) {
                var list = '';
                $.map(data, function(element) {
                    var date = JSON.stringify(element);
                    list += "<li class='nav-item' ><a class='nav-link' onclick='getDataByDate(this, " + date + ")'>" + element +"</a></li>";
                });
                $('.nav-list').html(list);
            } else {
                var list = "<li class='nav-item' ><a class='nav-link'>Doesn't exist record</a></li>";
                $('.nav-list').html(list);
            }
        }
    });
}

// go initial datatable.
function undoBasic() {
    location.reload();
}

// Rows Proof image modal
function proofImageModal(e) {
    
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");
    modal.style.display = "block";
    modalImg.src = e.src;
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
}
