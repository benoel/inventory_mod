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

function showModalPage(data,barcode,title){
  $.get(data).done(function(result){
    $('#modalPage').find('div.modal-body').empty().append(result);
    $('#modalPage').find('#inputBarcode').val(barcode);
  });
  // $('#modalPage').find('h4.modal-title').text(title);
  $('#modalPage').modal('show');
}

function showModalInfo(content){
  $('#modalInfo').find('div.modal-body>p').text(content);
  $('#modalInfo').modal('show');
}

function productSupplier(barcode,supplier,type){
  return $.ajax({
    type: "GET",
    cache: false,
    url: '/supplierprice/'+barcode+'/'+supplier+'/'+type,
  });
}
