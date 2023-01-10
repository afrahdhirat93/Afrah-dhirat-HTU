<div class="d-flex justify-content-between">
<h1>HTU POS System</h1>
<div>
    <strong>Total Sales</strong>
    <span id="total-sales">0</span>
</div>
</div>
<hr>
<form id="userInputContainer" class="my-4 d-flex justify-content-between">
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Items</span>
    <select id="items" class="form-select" aria-label="Default select example">

    </select>

</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Quantity</span>
    <input id="quantity" type="number" class="form-control" aria-describedby="addon-wrapping" min="0">
</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Price (JOD)</span>
    <input id="price" type="number" class="form-control" aria-describedby="addon-wrapping" min="0">
</div>
<button id="add-item" class="btn btn-success w-25">Add</button>

</form>
<div id="dataTableContainer">
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price Per Unit</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>




</div>