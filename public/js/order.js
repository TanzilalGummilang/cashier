document.getElementById("name").addEventListener("change", function(){
  let thisOption = this.options[this.selectedIndex];
  let price = thisOption.getAttribute('data-price');
  document.getElementById('price').value = parseFloat(price);
});

document.getElementById("name").addEventListener("change", subTotal);
document.getElementById("qty").addEventListener("input", subTotal);

let orders = [];


function orderAdd()
{
  let id = document.getElementById("name").options[document.getElementById("name").selectedIndex].value;
  let name = document.getElementById("name").options[document.getElementById("name").selectedIndex].text;
  let price = document.getElementById("price").value;
  let qty = document.getElementById("qty").value;
  let subTotal = document.getElementById("sub-total").value;

  let order = {
    id: id,
    name: name,
    price: price,
    qty: qty,
    subTotal: subTotal
  };

  orders.push(order);

  // console.log(orders);

  let tbody = document.getElementById("tbody");
  tbody.innerHTML += `
    <tr>
      <td>
        <button onclick="orderDelete(this)" class="btn btn-danger btn-sm cursor-pointer">Hapus</button>
      </td>
      <td>${name}</td>
      <td>${price}</td>
      <td>${qty}</td>
      <td>${subTotal}</td>
    </tr> 
  `;

  grandTotal();
}

function orderDelete(element) {
  // console.log(element.parentElement.parentElement);
  let row = element.parentElement.parentElement.rowIndex-1;
  orders.splice(row, 1);
  // console.log(orders);
  element.parentElement.parentElement.remove();
  grandTotal();
}

function subTotal(){
  let qty = document.getElementById('qty').value;
  let price = document.getElementById('price').value;

  let amountPrice = (price != '') ? parseFloat(price) : 0;
  let amountQty = (qty != '') ? parseFloat(qty) : 0;

  document.getElementById('sub-total').value = (amountPrice * amountQty);
}

function grandTotal(){
  // console.log(orders);
  let subTotals = orders.map(function(property){
    return property.subTotal;
  });

  let sumSubTotals = subTotals.reduce((previousValue, currentValue) => parseFloat(previousValue) + parseFloat(currentValue), 0);

  console.log(sumSubTotals);

  document.getElementById('grand-total').value = sumSubTotals;
}