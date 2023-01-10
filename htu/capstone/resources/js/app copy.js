$(function () {
    const baseUrl = "http://127.0.0.1/";
    const items = $('#items');
    const quanitiy = $('#quantity');
    const price = $('#price');
    const addItem = $('#add-item');
    const table = $('tbody');
    const totalSalesElement = $('#total-sales');
    let totalSales = 0;
    
    

    $.ajax({
        type: "GET",
        url: baseUrl + "sales",
        success: function (data) {
            data.body.forEach((item) => {
                $('#items').append(`
                <option data-id="${item.id}" value="${item.product_name}">${item.product_name}</option>
                `)
            });    
        }
    });



    $('#items').change(function(){
        item_id=$(this).children(":selected").attr('data-id');
        $.ajax({
            type: "POST",
            url: baseUrl + 'api/item',
            data: JSON.stringify({id:item_id}),
            success: function (response) {
            $('#quantity').attr({
                'max':response.body.Quantity,
                'value':$('#quantity').val(),
            });
            $('#quantity').change(function(){
                quanitiy_item=$('#quantity').val(),
                $('#price').attr({
                    "value":response.body.selling_price * $('#quantity').val(),
                })
            })
            }
        });
    })



 

    let counter = 1;
    addItem.click(function (e) {
        e.preventDefault();
        let item = items.val();
        let q = quanitiy.val();
        let p = price.val();
        if (q == "" || p == "" || item == "") {
            alert("You need to enter the item values to proceed!");
            return;
        }
        table.append(`
    <tr>
        <td>${counter}</td>
        <td>${item}</td>
        <td>${q}</td>
        <td>${p}</td>
        <td>${q * p}</td>
    </tr>
    `);
        totalSales += q * p;
        totalSalesElement.text(totalSales);
        counter++;
        $('#userInputContainer').trigger('reset');
    });
});








   