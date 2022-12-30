$(function () {
    const taskInput = $('#item-input');
    const add = $('#add');
    const taskContainer = $('#items-container');
    const baseUrl = "http://coh91-api.local";
    
  
    $.ajax({
        type: "POST",
        url: baseUrl + "/sales",
        success: function (response) {
            response.body.forEach(transaction => {
                taskContainer.append(`
                <tr data-id=${transaction.id}>
                <input type="hidden" name='id' data-id=id${transaction.id} value=${transaction.id}>
                <input type="hidden" name='quantity' id=id${transaction.quantity} value=${transaction.quantity}>
                <td class="text-center">
               </td>
               <td name='price' id=price ${transaction.price}class="text-center">${transaction.price}</td>
               <td id=total${transaction.total}class="text-center">${transaction.total}</td>

               
               <button type="submit" id=edit${transaction.id}  class="text-center btn"></button>
               <button  id=delete${transaction.id}  class="text-center btn"></button>

               </td>
</tr>



                `);


        
                    $.ajax({
                        type: "PUT",
                        url: baseUrl + "/sales/update",
                        data: JSON.stringify({
                            id: transaction.id
                        }),
                        dataType: "application/json",
                        success: function (response) {

                        }
                
                });

                $(`div[data-id="${transaction.id}"] button`).click(function () {
                    $.ajax({
                        type: "DELETE",
                        url: baseUrl + "/sales/delete",
                        data: JSON.stringify({
                            id: transaction.id
                        }),
                        dataType: "application/json",
                        success: function (response) {

                        }
                    });
                    $(this).parent().hide('slow', function () {
                        $(this).remove();
                    });
                });
            });
        }
    });



    taskInput.focus();

    add.click(function () {
        let task = product.val();

        if (task == "") {
            alert('You need to enter a task to proceed!');
            return;
        }

        });

        if (taskSwitch) {
            return;
        }

        $.ajax({
            type: "POST",
            url: baseUrl + "/sales/create",
            data: JSON.stringify({
                name: task
            }),
            success: function (response) {
                console.log(response);
                response.body.forEach(transaction => {
                    taskContainer.append(`
                        <p class="m-0 d-flex align-items-center">${transaction.id}</p>
                        <p class="m-0 d-flex align-items-center">${transaction.products_id}</p>
                        <p class="m-0 d-flex align-items-center">${transaction.total}</p>

                        <button class="btn btn-danger" type="button">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    `);

                    $(`div[data-id="${transaction.id}"] input`).change(function () {
                        $(this).parent().toggleClass('completed');
                        $.ajax({
                            type: "PUT",
                            url: baseUrl + "/sales/update",
                            data: JSON.stringify({
                                id: transaction.id
                            }),
                            dataType: "application/json",
                            success: function (response) {

                            }
                        });
                    });

                    $(`div[data-id="${transaction.id}"] button`).click(function () {
                        $.ajax({
                            type: "DELETE",
                            url: baseUrl + "/sales/delete",
                            data: JSON.stringify({
                                id: transaction.id
                            }),
                            dataType: "application/json",
                            success: function (response) {

                            }
                        });
                        $(this).parent().hide('slow', function () {
                            $(this).remove();
                        });
                    });
                });
                taskInput.val('');
                taskInput.focus();
            }
        });
    });



