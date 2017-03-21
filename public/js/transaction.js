$('#purchaseBarcode').scannerDetection({  
  //https://github.com/kabachello/jQuery-Scanner-Detection
  timeBeforeScanTest: 200, // wait for the next character for upto 200ms
  avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
  preventDefault: false,
  endChar: [13],
  onComplete: function(barcode, qty){
    validScan = true;
    $.ajax({
      type: "GET",
      dataType: "json",
      cache: false,
      url: '/product/'+barcode,
      success: function(data){
        for(var i in data){
          console.log(data[i].name);
          // console.log(data[i].name);
          // $('#purchaseBarcode').val(data[i].id).change();
          // $('#namabarang').val(data[i].id).change();
          $('#qty').val(1);
        }
      }
    })
    .done(function(data){});
  },
  onError: function(string, qty) {}
});

$('#modalDelete').on('click','.btn-danger',function(e){
  var action = $(this).data('url');
  // console.log(action);
  $.ajax({
    type: "GET",
    cache: false,
    url: action,
    success: function(result){
      location.reload();
    }
  });
});

function editPurchaseDetail(data){
  return $.ajax({
    type: "PUT",
    cache: false,
    url: '/purchasedetail',
    data: data
  });
}

function addPurchaseDetail(data){
  return $.ajax({
    type: "POST",
    cache: false,
    url: '/purchasedetail',
    data: data
  });
}

$(document).ready(function(){
  // var rows = $('#tablePurchase tbody').find('tr').length;
  // console.log(rows);
});

function listPurchaseDetail(data){
  var rows = $('#tablePurchase tbody').find('tr').length;
  var rowsTotal = rows + 1;
  var tot = data.price * data.quantity;
  var price = data.price.toString().replace(/\B(?=(\d{3})+\b)/g, ",");
  var total = tot.toString().replace(/\B(?=(\d{3})+\b)/g, ",");
  // console.log(data);
  $('#tablePurchase tbody').append(
    '<tr class="productitem" data-product="'+data.productid+'" data-barcode="'+data.barcode+'">'+
      '<td name="no">'+rowsTotal+'</td>'+
      '<td name="pro">'+data.productname+'</td>'+
      '<td name="pri">'+price+'</td>'+
      '<td name="qty">'+data.quantity+'</td>'+
      '<td name="tot" data-value="'+tot+'">'+total+'</td>'+
    '</tr>'
  );

  grandTotal()
}

function showModalForm(data){
  $('#modalForm').find('div.modal-body').empty();
  $('#modalForm').find('h4.modal-title').text(data.title);

  $.ajax({
    type: "GET",
    cache: false,
    url: data.url,
    dataType: 'html',
  }).done(function(result){
    $('#modalForm').find('div.modal-body').append(result);
    $('#modalForm').find('#sid').val(data.supplier_id);
    $('#modalForm').find('#purNumber').val(data.pnumber);
    $('#modalForm').find('#_tipe').val(data.type);
    $('#modalForm').find('#_supplier').val(data.supplier_name);

    if(data.title == "Tambah Harga"){
      $('#modalForm').find('#proId').val(data.product_id);
      $('#modalForm').find('#_barang').val(data.product_name);
      $('#modalForm').find('#_harga').focus();
    }else if(data.title = "Tambah Barang"){
      $('#modalForm').find('#inputBarcode').val(data.barcode);
    }
  });

  $('#modalForm').modal('show');
}

function showModalPage(data,barcode,title){
  $.get(data).done(function(result){
    $('#modalPage').find('div.modal-body').empty().append(result);
    $('#modalPage').find('#inputBarcode').val(barcode);
  });
  $('#modalPage').modal('show');
}

function showModalInfo(content){
  $('#modalInfo').find('div.modal-body>p').text(content);
  $('#modalInfo').modal('show');
  // $('#closeModalInfo').focus();
}

function showModalDelete(data){
  $('#modalDelete').modal('show');
}

function productSupplier(barcode,supplier,type){
  return $.ajax({
    type: "GET",
    cache: false,
    url: '/supplierprice/'+barcode+'/'+supplier+'/'+type,
  });
}

function grandTotal(){
  gtotal = 0;
  $(document).find('td[name="tot"]').each(function(){
    gtotal += parseInt($(this).attr("data-value"));
  });
  grTotal = gtotal.toString().replace(/\B(?=(\d{3})+\b)/g, ",")
  $('#grandTotal').text('Rp. '+grTotal);

  // console.log(grTotal);
}